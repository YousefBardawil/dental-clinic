<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return response()->json([
            'status' => true,
            'message'  => 'Done correctly',
            'data'=> $cities,
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
            'city_name' => 'required|String|min:3|max:20',
            // 'code' => 'required|String|min:3|max:20',

           ]);

           if(!$validator->fails()){
               $cities= new City();
               $cities->city_name = $request->get('city_name');
               $cities->code = $request->get('code');
               $isSaved = $cities->save();

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
        $cities = City::findOrFail($id);
        if(is_null($cities)){
            return $this->sendError('city not found');
        }
        return response()->json([
            'status' => true,
            'message' => 'details',
            'data' => $cities,

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
            'city_name' => 'required|String|min:3|max:20',
            // 'code' => 'required|String|min:3|max:20',

           ]);

           if(!$validator->fails()){
               $cities= City::findOrFail($id);
               $cities->city_name = $request->get('city_name');
               $cities->code = $request->get('code');
               $isUpdated = $cities->save();

               if($isUpdated){

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
        $cities = City::destroy($id);

        if($cities){
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

