<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // foreach(auth()->guard()->user()->unreadNotifications as $notification){
        //     $getNotifications= DB::table('notifications')->where('notifiable_id',auth()->guard()->user()->id)->get();
        // }
        return response()->view('cms.home' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function markAllRead(){

       foreach(auth()->guard()->user()->unreadNotifications as $notification){
        $notification->markAsRead();
        // to delete notifications from database
        // $notification->delete();
       }

       return redirect()->back();

    }
    public function readNotification(){

       foreach(auth()->guard()->user()->unreadNotifications as $notification){
        $getNotifId= DB::table('notifications')->where('notifiable_id',auth()->guard()->user()->id)->pluck('id');
        DB::table('notifications')->where('id',$getNotifId)->update(['read_at'=>now()]);
       }
       return redirect()->back();

    }


}
