<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return response()->json([
            'status' => true,
            'message'  => 'Done correctly',
            'data'=> $roles,
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

        ]);

        if(!$validator->fails()){

            $roles = new Role();

            $roles->name = $request->get('name');
            $roles->guard_name = $request->get('guard_name');

            $isSaved = $roles->save();
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = Role::findOrFail($id);
        if(is_null($roles)){
            return $this->sendError('city not found');
        }
        return response()->json([
            'status' => true,
            'message' => 'details',
            'data' => $roles,

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

        ]);

        if(!$validator->fails()){

            $roles = Role::findOrFail($id);

            $roles->name = $request->get('name');
            $roles->guard_name = $request->get('guard_name');

            $isSaved = $roles->save();
            if($isSaved){

                return response()->json([
                 'status' => true,
                 'message' => 'updated successfully'
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = Role::destroy($id);

        if($roles){
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
