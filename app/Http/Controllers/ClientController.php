<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::with('city','user')->withCount('medicalhistories')->orderBy('id','desc')->simplePaginate(5);
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
      return response()->view('cms.client.create',compact('cities'));
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
               $clients->email = $request->get('email');
               $clients->name = $request->get('name');
               $clients->password= Hash::make($request->get('password')) ;
               $isSaved = $clients->save();

               if($isSaved){

                $users= new User();
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
    public function edit($id)
    {
        $clients =Client::findOrFail($id);
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
        $clients = Client::destroy($id);
    }
}
