<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Dentist;
use App\Models\Payment;
use App\Models\Service;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexpayments($id)
    {

        $payments = Payment::where('client_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        $this->authorize('viewAny', Payment::class);
        return response()->view('cms.payment.index', compact('payments','id'));
    }


    public function createpayments($id)
    {
        $this->authorize('create', Payment::class);
        $dentists =Dentist::all();
        $services=Service::all();
        return response()->view('cms.payment.create', compact('id','dentists','services' ));
    }

    public function index(Request $request)
    {
        $payments = Payment::orderBy('id','desc')->simplePaginate(5);
        $clients = Client::all();
        if ($request->get('search')) {
            $payments = Payment::whereHas('client', function($query) use($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })->paginate(5);
        }

        $this->authorize('viewAny', Payment::class);
        return response()->view('cms.payment.indexall', compact('payments','clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Payment::class);

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
               $payments= new Payment();
               $payments->total_balance = $request->get('total_balance');
               $payments->total_receipt = $request->get('total_receipt');
               $payments->remaining_balance = $request->get('remaining_balance');
               $payments->client_id = $request->get('client_id');
               $payments->dentist_id = $request->get('dentist_id');
               $payments->service_id = $request->get('service_id');

               $isSaved = $payments->save();

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
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $payments = Payment::findOrFail($id);
        $clients = Client::all();
        $dentists =Dentist::all();
        $services=Service::all();
        $this->authorize('update', Payment::class);
        return response()->view('cms.payment.edit' , compact('payments','clients','dentists','services'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[


        ]);

        if(!$validator->fails()){
            $payments= Payment::findOrFail($id);
            $payments->total_balance = $request->get('total_balance');
            $payments->total_receipt = $request->get('total_receipt');
            $payments->remaining_balance = $request->get('remaining_balance');
            $payments->client_id = $request->get('client_id');
            $payments->dentist_id = $request->get('dentist_id');
            $payments->service_id = $request->get('service_id');

            $isUpdated = $payments->save();
            return ['redirect' => route('index.payment' , $payments->client_id)];


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
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete',Payment::class);
        $payments = Payment::destroy($id);
    }
}
