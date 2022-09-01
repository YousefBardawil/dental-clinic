<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $services = Service::orderBy('id','desc')->simplePaginate(5);

        if ($request->get('service_name')) {
            $services = Service::where('service_name', 'like', '%' . $request->service_name . '%');
            $services =$services->simplePaginate(5);
        }

        $this->authorize('viewAny', Service::class);
        return response()->view('cms.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Service::class);
        return response()->view('cms.service.create');
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
            'service_name' => 'required|String|min:3|max:20',

           ]);

           if(!$validator->fails()){
               $services= new Service();
               if(request()->hasFile('image')){
                $image = $request->file('image');
                $imageName =time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('images/service', $imageName);
                $services->image = $imageName;
                 }

               $services->service_name = $request->get('service_name');
               $services->description = $request->get('description');
               $services->price = $request->get('price');
               $isSaved = $services->save();

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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Service::findOrFail($id);
        $this->authorize('update', Service::class);
        return response()->view('cms.service.edit', compact('services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[
            'service_name' => 'required|String|min:3|max:20',

           ]);

           if(!$validator->fails()){
               $services= Service::findOrFail($id);
               if(request()->hasFile('image')){
                $image = $request->file('image');
                $imageName =time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('images/service', $imageName);
                $services->image = $imageName;
                 }

               $services->service_name = $request->get('service_name');
               $services->description = $request->get('description');
               $services->price = $request->get('price');
               $isUpdated = $services->save();
               return ['redirect' => route('services.index' , $id)];


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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Service::class);

        $services = Service::destroy($id);
    }
}
