<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\Dentist;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexappointment($id)
    {

        $appointments = Appointment::where('client_id', $id)->orderBy('created_at', 'desc')->paginate(5);


        return response()->view('cms.appointment.index', compact('appointments','id'));
    }


    public function createapponintment ($id)
    {
        $services = Service::all();
        $rooms = Room::all();
        $dentists = Dentist::all();
        $clients = Client::all();

        return response()->view('cms.appointment.create', compact('id' ,'services','rooms','dentists','clients' ));
    }
    public function index()
    {
        $appointments = Appointment::orderBy('id','desc')->simplePaginate(5);
        $clients = Client::all();
        $dentists = Dentist::all();
        $services = Service::all();
        $rooms = Room::all();
        $this->authorize('viewAny', Appointment::class);

        return response()->view('cms.appointment.indexall',compact('appointments' , 'clients' ,'dentists','rooms','services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Appointment::class);
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
            $appointments= new Appointment();
            $appointments->dentist_id = $request->get('dentist_id');
            $appointments->client_id = $request->get('client_id');
            $appointments->service_id = $request->get('service_id');
            $appointments->room_id = $request->get('room_id');
            $appointments->date= $request->get('date');
            $appointments->time = $request->get('time');


            $isSaved = $appointments->save();

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
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointments = Appointment::findOrFail($id);
        $clients = Client::all();
        $dentists = Dentist::all();
        $services = Service::all();
        $rooms = Room::all();
        $this->authorize('update', Appointment::class);

        return response()->view('cms.appointment.edit',compact('appointments','clients','rooms','dentists','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[

        ]);
        if(!$validator->fails()){
            $appointments= Appointment::findOrFail($id);
            $appointments->dentist_id = $request->get('dentist_id');
            $appointments->client_id = $request->get('client_id');
            $appointments->service_id = $request->get('service_id');
            $appointments->room_id = $request->get('room_id');
            $appointments->date= $request->get('date');
            $appointments->time = $request->get('time');


            $isUpdated = $appointments->save();
            // return ['redirect' => route('index.appointments' , $appointments->client_id)];



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
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Appointment::class);
        $appointments = Appointment::destroy($id);
    }
}
