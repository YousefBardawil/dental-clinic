<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\MedicalHistory;
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

        $medicalhistories = MedicalHistory::where('client_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        $this->authorize('viewAny', MedicalHistory::class);
        return response()->view('cms.med-history.index', compact('medicalhistories','id'));
    }


    public function createmedicalhistories($id)
    {
        $this->authorize('create', MedicalHistory::class);
        return response()->view('cms.med-history.create', compact('id' ));
    }

    public function index()
    {
        $medicalhistories = MedicalHistory::orderBy('id','desc')->simplePaginate(5);
        $this->authorize('viewAny', MedicalHistory::class);
        return response()->view('cms.med-history.indexall',compact('medicalhistories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            $medicalhistories= new MedicalHistory();
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
     * @param  \App\Models\MedicalHistory  $MedicalHistory
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalHistory $MedicalHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalHistory  $MedicalHistory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicalhistories = MedicalHistory::findOrFail($id);
        $clients = Client::all();
        $this->authorize('update', MedicalHistory::class);
        return response()->view('cms.med-history.edit' , compact('medicalhistories','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicalHistory  $MedicalHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[

        ]);
        if(!$validator->fails()){
            $medicalhistories=  MedicalHistory::findOrFail($id);
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
     * @param  \App\Models\MedicalHistory  $MedicalHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', MedicalHistory::class);
        $medicalhistories = MedicalHistory::destroy($id);
    }
}
