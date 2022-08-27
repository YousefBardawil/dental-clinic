<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        $dentists = Dentist::all();
        return response()->json([
            'status' => true,
            'message'  => 'Done correctly',
            'data'=> $dentists,
        ]);
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
                $users->mobile = $request->get('mobile');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->age = $request->get('age');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($dentists);

                $isSaved = $users->save();
                if($isSaved){

                    return response()->json([
                     'status' => true,
                     'message' => 'added successfully'
                    ] , 200 );
                }else {

                 return response()->json([
                     'status' => false,
                     'message' => 'added failed'
                    ] , 400 );

                };

            } else {

                return response()->json([
                 'status'=>false ,
                 'message'=>$validator->getMessageBag()->first()
                 ] ,400 );
            }
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dentists = Dentist::findOrFail($id);
        if(is_null($dentists)){
            return $this->sendError('city not found');
        }
        return response()->json([
            'status' => true,
            'message' => 'details',
            'data' => $dentists,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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

               $isSaved = $dentists->save();

               if($isSaved){

                $users= $dentists->user;
                $users->mobile = $request->get('mobile');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->age = $request->get('age');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($dentists);

                $isSaved = $users->save();
                if($isSaved){

                    return response()->json([
                     'status' => true,
                     'message' => 'Updated successfully'
                    ] , 200 );
                }else {

                 return response()->json([
                     'status' => false,
                     'message' => 'updated failed'
                    ] , 400 );

                };

            } else {

                return response()->json([
                 'status'=>false ,
                 'message'=>$validator->getMessageBag()->first()
                 ] ,400 );
            }
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {

        $dentists = Dentist::destroy($id);

        if($dentists){
            return response()->json([
                'status' => true,
                'message' => 'deleted successfully'
               ] , 200 );
           }else {

            return response()->json([
                'status' => false,
                'message' => 'deleted failed'
               ] , 400 );
            }

    }
}
