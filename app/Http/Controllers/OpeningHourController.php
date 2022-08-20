<?php

namespace App\Http\Controllers;

use App\Models\Dentist;
use App\Models\OpeningHour;
use Illuminate\Http\Request;

class OpeningHourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexopeninghours($id)
    {

        $openinghours = OpeningHour::where('dentist_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        return response()->view('cms.opening-hours.index', compact('openinghours','id'));
    }


    public function createopeninghours($id)
    {

        return response()->view('cms.opening-hours.create', compact('id' ));
    }
    public function index()
    {
        
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
        $validator = Validator($request->all(),[

        ]);
        if(!$validator->fails()){
            $openinghours= new OpeningHour();
            $openinghours->dentist_id = $request->get('dentist_id');
            $openinghours->day= $request->get('day');
            $openinghours->opening_at = $request->get('opening_at');
            $openinghours->closing_at = $request->get('closing_at');

            $isSaved = $openinghours->save();

            if($isSaved){

                return response()->json(['icon'=>'success' , 'title' => 'added successfully' ] , 200);
            }else {

                return response()->json(['icon'=>'error' , 'title' => 'added failed' ] , 400);

            };

        } else {

            return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OpeningHour  $openingHour
     * @return \Illuminate\Http\Response
     */
    public function show(OpeningHour $openingHour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OpeningHour  $openingHour
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $openinghours = OpeningHour::findOrFail($id);
        $dentists = Dentist::all();
        return response()->view('cms.opening-hours.edit' , compact('openinghours','dentists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OpeningHour  $openingHour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[

        ]);
        if(!$validator->fails()){
            $openinghours=  OpeningHour::findOrFail($id);
            $openinghours->dentist_id = $request->get('dentist_id');
            $openinghours->day= $request->get('day');
            $openinghours->opening_at = $request->get('opening_at');
            $openinghours->closing_at = $request->get('closing_at');

            $isUpdated = $openinghours->save();
            return ['redirect' => route('index.opening.hours' , $openinghours->dentist_id)];


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
     * @param  \App\Models\OpeningHour  $openingHour
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $openinghours = OpeningHour::destroy($id);
    }
}
