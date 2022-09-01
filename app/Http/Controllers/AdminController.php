<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Dentist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('id','desc')->simplePaginate(5);
        $this->authorize('viewAny', Admin::class);
        return response()->view('cms.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('guard_name' ,'admin')->get();
        $this->authorize('create', Admin::class);
        return response()->view('cms.admin.create',compact('roles'));
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

            $admins= new Admin();
            $admins->name = $request->get('name');
            $admins->email = $request->get('email');
            $roles = Role::findOrFail($request->get('role_id'));
            $admins->assignRole($roles->name);
            $admins->password = Hash::make($request->get('password')) ;
            if(request()->hasFile('image')){
                $image = $request->file('image');
                $imageName =time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('images/admin', $imageName);
                $admins->image = $imageName;
                 }

            $isSaved = $admins->save();

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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins = Admin::findOrFail($id);
        $this->authorize('update', Admin::class);
        return response()->view('cms.admin.edit',compact('admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[

        ]);

        if(!$validator->fails()){

            $admins=  Admin::findOrFail($id);
            $admins->name = $request->get('name');
            $admins->email = $request->get('email');

            if(request()->hasFile('image')){
                $image = $request->file('image');
                $imageName =time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('images/admin', $imageName);
                $admins->image = $imageName;
                 }

            $isUpdated = $admins->save();
            return ['redirect' => route('dashborad')];


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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Admin::class);
        $admins = Admin::destroy($id);
    }
}
