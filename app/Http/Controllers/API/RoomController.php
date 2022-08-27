<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return response()->json([
            'status' => true,
            'message'  => 'Done correctly',
            'data'=> $rooms,
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
            'room_name' => 'required|String|min:3|max:20',

           ]);

           if(!$validator->fails()){
               $rooms= new Room();
               $rooms->room_name = $request->get('room_name');
               $isSaved = $rooms->save();

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
        $rooms = Room::findOrFail($id);
        if(is_null($rooms)){
            return $this->sendError('room not found');
        }
        return response()->json([
            'status' => true,
            'message' => 'details',
            'data' => $rooms,

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
            'room_name' => 'required|String|min:3|max:20',

           ]);

           if(!$validator->fails()){
               $rooms= Room::findOrFail($id);
               $rooms->room_name = $request->get('room_name');
               $isUpdated = $rooms->save();

               if($isUpdated){

                return response()->json([
                 'status' => true,
                 'message' => 'Updated successfully'
                ] , 200 );
            }else {

             return response()->json([
                 'status' => false,
                 'message' => 'Updated failed'
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
        $rooms = Room::destroy($id);

        if($rooms){
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
