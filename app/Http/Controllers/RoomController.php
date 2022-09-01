<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rooms = Room::orderBy('id','desc')->simplePaginate(5);
        if ($request->get('room_name')) {
            $rooms = Room::where('room_name', 'like', '%' . $request->room_name . '%');
            $rooms =$rooms->simplePaginate(5);
        }
        $this->authorize('viewAny', Room::class);
        return response()->view('cms.room.index',compact('rooms'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Room::class);
        return response()->view('cms.room.create');
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

                   return response()->json(['icon'=>'success' , 'title' => 'created successfully' ] , 200);
               }else {

                   return response()->json(['icon'=>'error' , 'title' => 'created failed' ] , 400);

               };

           } else {

               return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rooms =Room::findOrFail($id);
        $this->authorize('update', Room::class);
        return response()->view('cms.room.edit',compact('rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = Validator($request->all(),[
            'room_name' => 'required|String|min:3|max:20',

           ]);

           if(!$validator->fails()){
               $rooms= Room::findOrFail($id);
               $rooms->room_name = $request->get('room_name');
               $isUpdated = $rooms->save();
               return ['redirect' => route('rooms.index' , $id)];


               if($isUpdated){

                   return response()->json(['icon'=>'success' , 'title' => 'updated successfully' ] , 200);
               }else {

                   return response()->json(['icon'=>'error' , 'title' => 'updated failed' ] , 400);

               };

           } else {

               return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Room::class);
        $rooms = Room::destroy($id);
    }
}
