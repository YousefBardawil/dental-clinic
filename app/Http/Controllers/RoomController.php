<?php

namespace App\Http\Controllers;

use App\Events\NewNotification;
use App\Models\Room;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\RoomExport;
use App\Imports\ImportRoom;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Dentist;
use App\Models\User;
use App\Notifications\create_Room;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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


            //    $auth = auth()->guard()->user()->where('id','!=',auth()->guard()->user()->id)->get();
               $clients = Client::where('id','!=',auth()->guard()->user()->id)->get();
               $admins = Admin::where('id','!=',auth()->guard()->user()->id)->get();
               $dentists = Dentist::where('id','!=',auth()->guard()->user()->id)->get();
               $room_create = auth()->guard()->user()->name;
               Notification::send($admins , new create_Room($rooms->id , $rooms->room_name , $room_create ));
               Notification::send($dentists , new create_Room($rooms->id , $rooms->room_name , $room_create ));
               Notification::send($clients , new create_Room($rooms->id , $rooms->room_name , $room_create ));


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
    public function show($id)
    {
        $rooms = Room::findOrFail($id);
        // $getNotifId= DB::table('notifications')->where('notifiable_id',auth()->guard()->user()->id)->where('data->rooms_id',$id)->pluck('id');
        // DB::table('notifications')->where('id',$getNotifId)->update(['read_at'=>now()]);

        return response()->view('cms.room.show',compact('rooms'));

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

    public function exportToExcel(){

        return Excel::download(new RoomExport, 'Rooms.xlsx');

    }

    public function importView(Request $request){
        return view('cms.room.importFile');
    }

    public function import(Request $request){
        Excel::import(new ImportRoom, $request->file('file')->store('files'));
        return redirect()->back();
    }
}
