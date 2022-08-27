<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return response()->json([
            'status' => true,
            'message'  => 'Done correctly',
            'data'=> $contacts,
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
            'name' => 'required|String|min:3|max:20',

           ]);

           if(!$validator->fails()){
               $contacts= new Contact();
               $contacts->name = $request->get('name');
               $contacts->email = $request->get('email');
               $contacts->title = $request->get('title');
               $contacts->message = $request->get('message');
               $isSaved = $contacts->save();

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
        $contacts = Contact::findOrFail($id);
        if(is_null($contacts)){
            return $this->sendError('city not found');
        }
        return response()->json([
            'status' => true,
            'message' => 'details',
            'data' => $contacts,

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
            'name' => 'required|String|min:3|max:20',

           ]);

           if(!$validator->fails()){
               $contacts= contact::findOrFail($id);
               $contacts->name = $request->get('name');
               $contacts->email = $request->get('email');
               $contacts->title = $request->get('title');
               $contacts->message = $request->get('message');
               $isSaved = $contacts->save();

               if($isSaved){

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
        $contacts = Contact::destroy($id);

        if($contacts){
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
