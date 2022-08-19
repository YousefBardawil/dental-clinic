<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Medical_history;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexmedicalhistories($id)
    {

        $medicalhistories = Medical_history::where('client_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        return response()->view('cms.med-history.index', compact('medicalhistories','id'));
    }


    public function createmedicalhistories($id)
    {

        return response()->view('cms.med-history.create', compact('id' ));
    }

    public function index()
    {
        //
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
            $medicalhistories= new Medical_history();
            if(request()->hasFile('xray')){
                $file = $request->file('xray');
                $fileName =time() . 'xray.' . $file->getClientOriginalExtension();
                $file->move('files/xray', $fileName);
                $medicalhistories->xray = $fileName;
           }

           if(request()->hasFile('report')){
            $file = $request->file('report');
            $fileName =time() . 'report.' . $file->getClientOriginalExtension();
            $file->move('files/report', $fileName);
            $medicalhistories->report = $fileName;
          }

          if(request()->hasFile('prescription')){
           $file = $request->file('prescription');
           $fileName =time() . 'prescription.' . $file->getClientOriginalExtension();
           $file->move('files/prescription', $fileName);
           $medicalhistories->prescription = $fileName;
          }



            $medicalhistories->client_id = $request->get('client_id');

            $isSaved = $medicalhistories->save();

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
     * @param  \App\Models\Medical_history  $medical_history
     * @return \Illuminate\Http\Response
     */
    public function show(Medical_history $medical_history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medical_history  $medical_history
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicalhistories = Medical_history::findOrFail($id);
        $clients = Client::all();
        return response()->view('cms.med-history.edit' , compact('medicalhistories','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medical_history  $medical_history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[

        ]);
        if(!$validator->fails()){
            $medicalhistories=  Medical_history::findOrFail($id);
            if(request()->hasFile('xray')){
                $file = $request->file('xray');
                $fileName =time() . 'xray.' . $file->getClientOriginalExtension();
                $file->move('files/xray', $fileName);
                $medicalhistories->xray = $fileName;
           }

           if(request()->hasFile('report')){
            $file = $request->file('report');
            $fileName =time() . 'report.' . $file->getClientOriginalExtension();
            $file->move('files/report', $fileName);
            $medicalhistories->report = $fileName;
          }

          if(request()->hasFile('prescription')){
           $file = $request->file('prescription');
           $fileName =time() . 'prescription.' . $file->getClientOriginalExtension();
           $file->move('files/prescription', $fileName);
           $medicalhistories->prescription = $fileName;
          }



            $medicalhistories->client_id = $request->get('client_id');

            $isUpdated = $medicalhistories->save();
            return ['redirect' => route('index.med.history' , $medicalhistories->client_id)];


            if($isUpdated){

                return response()->json(['icon'=>'success' , 'title' => 'edited successfully' ] , 200);
            }else {

                return response()->json(['icon'=>'error' , 'title' => 'edited failed' ] , 400);

            };

        } else {

            return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medical_history  $medical_history
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicalhistories = Medical_history::destroy($id);
    }
}
