<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\Client;
use App\Models\Dentist;
use App\Models\Room;
use App\Notifications\create_City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::orderBy('id','desc')->simplePaginate(5);
        if ($request->get('city_name')) {
            $cities = City::where('city_name', 'like', '%' . $request->city_name . '%');
            $cities =$cities->simplePaginate(5);
        }
        $this->authorize('viewAny', City::class);
        return response()->view('cms.city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', City::class);
        return response()->view('cms.city.create');
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
            'code' => 'required|String|min:3|max:20',

           ]);

           if(!$validator->fails()){
               $cities= new City();
               $cities->city_name = $request->get('city_name');
               $cities->code = $request->get('code');
               $isSaved = $cities->save();

               $clients = Client::where('id','!=',auth()->guard()->user()->id)->get();
               $admins = Admin::where('id','!=',auth()->guard()->user()->id)->get();
               $dentists = Dentist::where('id','!=',auth()->guard()->user()->id)->get();
               $city_create = auth()->guard()->user()->name;
                Notification::send($admins , new create_City($cities->id , $cities->city_name , $city_create ));
                Notification::send($dentists , new create_City($cities->id , $cities->city_name , $city_create ));
                Notification::send($clients , new create_City($cities->id , $cities->city_name , $city_create ));


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
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::findOrFail($id);
        $this->authorize('update', City::class);
        return response()->view('cms.city.edit' , compact('cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[
            'city_name' => 'required|String|min:3|max:20',
            'code' => 'required|String|min:3|max:20',

           ]);

           if(!$validator->fails()){
               $cities= City::findorFail($id);
               $cities->city_name = $request->get('city_name');
               $cities->code = $request->get('code');
               $isUpdated = $cities->save();

               return ['redirect' => route('cities.index' , $id)];

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
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', City::class);
        $cities = City::destroy($id);
    }
}
