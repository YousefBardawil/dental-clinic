<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions =Permission::orderBy('id','desc')->simplePaginate(5);
        $this->authorize('viewAny', Permission::class);
        return response()->view('cms.spatie.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Permission::class);
        return response()->view('cms.spatie.permission.create');
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

            $permissions = new Permission();

            $permissions->name = $request->get('name');
            $permissions->guard_name = $request->get('guard_name');

            $isSaved = $permissions->save();

            if($isSaved){
                return response()->json(['icon'=>'success' , 'title' => 'created successfully' ] , 200);

            }
        }else{
            return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );

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
        $permissions =Permission::findOrFail($id);
        $this->authorize('update', Permission::class);
        return response()->view('cms.spatie.permission.edit',compact('permissions'));
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

            $permissions =Permission::findOrFail($id);

            $permissions->name = $request->get('name');
            $permissions->guard_name = $request->get('guard_name');

            $isUpdated = $permissions->save();

            return ['redirect' => route('permissions.index')];


            if($isUpdated){
                return response()->json(['icon'=>'success' , 'title' => 'updated successfully' ] , 200);

            }
        }else{
            return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );

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
        $this->authorize('delete', Permission::class);
        $permissions = Permission::destroy($id);
    }
}
