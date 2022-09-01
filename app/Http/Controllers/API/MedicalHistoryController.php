<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MedicalHistory;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicalhistories = MedicalHistory::all();
        return response()->json([
            'status' => true,
            'message'  => 'Done correctly',
            'data'=> $medicalhistories,
        ]);
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

                return response()->json([
                 'status' => true,
                 'message' => 'added successfully'
                ] , 200 );
            }else {

             return response()->json([
                 'status' => false,
                 'message' => 'added failed'
                ] , 400 );

            };

        } else {

            return response()->json([
             'status'=>false ,
             'message'=>$validator->getMessageBag()->first()
             ] ,400 );
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
        $medicalhistories = MedicalHistory::findOrFail($id);
        if(is_null($medicalhistories)){
            return $this->sendError('city not found');
        }
        return response()->json([
            'status' => true,
            'message' => 'details',
            'data' => $medicalhistories,

        ]);
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
            $medicalhistories= MedicalHistory::findOrFail($id);
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

            if($isUpdated){

                return response()->json([
                 'status' => true,
                 'message' => 'updated successfully'
                ] , 200 );
            }else {

             return response()->json([
                 'status' => false,
                 'message' => 'updated failed'
                ] , 400 );

            };

        } else {

            return response()->json([
             'status'=>false ,
             'message'=>$validator->getMessageBag()->first()
             ] ,400 );
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
        $medicalhistories = MedicalHistory::destroy($id);

        if($medicalhistories){
            return response()->json([
                'status' => true,
                'message' => 'deleted successfully'
               ] , 200 );
           }else {

            return response()->json([
                'status' => false,
                'message' => 'deleted failed'
               ] , 400 );
            }
    }
}
