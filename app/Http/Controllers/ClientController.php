<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Appointment;
use App\Models\City;
use App\Models\Client;
use App\Models\Dentist;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::with('city','user')->withCount('medicalhistories','appointments','reviews','payments')->orderBy('id','desc')->simplePaginate(5);
        if ($request->get('email')) {
            $clients = Client::where('email', 'like', '%' . $request->email . '%');
            $clients =$clients->simplePaginate(5);
        }
        if ($request->get('name')) {
            $clients = Client::where('name', 'like', '%' . $request->name . '%');
            $clients =$clients->simplePaginate(5);
        }
        $this->authorize('viewAny', Client::class);
        return response()->view('cms.client.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $cities = City::all();
      $this->authorize('create', Client::class);
      $roles = Role::where('guard_name' ,'client')->get();
      return response()->view('cms.client.create',compact('cities','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'name' => 'required|String|min:3|max:20',

           ]);

           if(!$validator->fails()){
               $clients= new Client();
               if(request()->hasFile('image')){
                $image = $request->file('image');
                $imageName =time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('images/client', $imageName);
                $clients->image = $imageName;
                 }
               $clients->email = $request->get('email');
               $clients->name = $request->get('name');
               $clients->password= Hash::make($request->get('password')) ;
               $isSaved = $clients->save();

               if($isSaved){

                $users= new User();
                $roles = Role::findOrFail($request->get('role_id'));
                $users->mobile = $request->get('mobile');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->age = $request->get('age');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($clients);

                $isSaved = $users->save();
                 return response()->json(['icon'=>'success' , 'title' => $isSaved ? 'created succesfully' : 'created failed' ] , $isSaved ? 200 : 400);
               }
               else {

                return response()->json(['icon'=>'error' , 'title' => 'created failed' ] , 400);

            }

           }
           else{

               return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients = Client::findOrFail($id);
        $cities = City::all();

        return response()->view('cms.client.show',compact('cities','clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {

        $clients =Client::findOrFail($id);
        $this->authorize('update', Client::class);
        $cities=City::all();
        return response()->view('cms.client.edit',compact('cities','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $validator = Validator($request->all(),[
            'name' => 'required|String|min:3|max:20',

           ]);


           if(!$validator->fails()){
               $clients= Client::findOrFail($id);
               if(request()->hasFile('image')){
                $image = $request->file('image');
                $imageName =time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('images/client', $imageName);
                $clients->image = $imageName;
                 }

               $clients->email = $request->get('email');
               $clients->name = $request->get('name');
               $clients->password= Hash::make($request->get('password')) ;
               $isSaved = $clients->save();

               if($isSaved){

                $users= $clients->user;
                $users->mobile = $request->get('mobile');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->age = $request->get('age');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($clients);

                $isUpdated = $users->save();
                return ['redirect' => route('clients.index' , $id)];

                 return response()->json(['icon'=>'success' , 'title' => $isUpdated ? 'updated succesfully' : 'updated failed' ] , $isUpdated ? 200 : 400);
               }
               else {

                return response()->json(['icon'=>'error' , 'title' => 'updated failed' ] , 400);

            }

           }
           else{

               return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Client::class);
        $clients = Client::destroy($id);
    }
}
