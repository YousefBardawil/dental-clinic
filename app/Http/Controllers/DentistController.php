<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Dentist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DentistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dentists = Dentist::with('city')->withCount('openinghours')->orderBy('id','desc')->simplePaginate(5);
        $this->authorize('viewAny', Dentist::class);
        return response()->view('cms.dentist.index',compact('dentists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $roles = Role::where('guard_name' ,'dentist')->get();
        $this->authorize('create', Dentist::class);
        return response()->view('cms.dentist.create',compact('cities' ,'roles'));
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
               $dentists= new Dentist();
               $dentists->email = $request->get('email');
               $dentists->name = $request->get('name');
               $dentists->password= Hash::make($request->get('password')) ;
               if(request()->hasFile('image')){
                $image = $request->file('image');
                $imageName =time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('images/dentist', $imageName);
                $dentists->image = $imageName;
                 }

               $isSaved = $dentists->save();

               if($isSaved){

                $users= new User();
                $roles = Role::findOrFail($request->get('role_id'));
                $dentists->assignRole($roles->name);
                $users->mobile = $request->get('mobile');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->age = $request->get('age');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($dentists);

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
     * @param  \App\Models\Dentist  $dentist
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dentists = Dentist::findOrFail($id);
        $cities = City::all();

        return response()->view('cms.dentist.show',compact('cities','dentists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dentist  $dentist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $dentists =Dentist::findOrFail($id);
        $cities=City::all();
        $this->authorize('update', Dentist::class);
        return response()->view('cms.dentist.edit',compact('cities','dentists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dentist  $dentist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[
            'name' => 'required|String|min:3|max:20',

           ]);

           if(!$validator->fails()){
               $dentists= Dentist::findOrFail($id);
               $dentists->email = $request->get('email');
               $dentists->name = $request->get('name');
               $dentists->password= Hash::make($request->get('password')) ;

               if(request()->hasFile('image')){
                $image = $request->file('image');
                $imageName =time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('images/dentist', $imageName);
                $dentists->image = $imageName;
                 }
               $isUpdated= $dentists->save();

               if($isUpdated){

                $users= $dentists->user;
                $users->mobile = $request->get('mobile');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->age = $request->get('age');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($dentists);

                $isUpdated = $users->save();
                return ['redirect' => route('dashborad')];

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
     * @param  \App\Models\Dentist  $dentist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Dentist::class);
        $dentists = Dentist::destroy($id);

    }
}
