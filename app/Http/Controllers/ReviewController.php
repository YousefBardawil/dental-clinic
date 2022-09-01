<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexreview($id)
    {

        $reviews = Review::where('client_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        $this->authorize('viewAny', Review::class);
        return response()->view('cms.review.index', compact('reviews','id'));
    }


    public function createreview($id)
    {
        $this->authorize('create', Review::class);
        return response()->view('cms.review.create',compact('id'));
    }
    public function index()
    {
        $this->authorize('viewAny', Review::class);
        $reviews =Review::orderBy('id','desc')->simplePaginate(5);
        return response()->view('cms.review.indexall' ,compact('reviews'));

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
            $reviews= new Review();
            $reviews->client_id = $request->get('client_id');
            $reviews->comment= $request->get('comment');


            $isSaved = $reviews->save();

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
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reviews = Review::findOrFail($id);
        $this->authorize('update', Review::class);

        return response()->view('cms.review.edit',compact('reviews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[

        ]);
        if(!$validator->fails()){
            $reviews= Review::findOrFail($id);
            $reviews->client_id = $request->get('client_id');
            $reviews->comment= $request->get('comment');


            $isUpdated = $reviews->save();
            return ['redirect' => route('index.reviews' , $reviews->client_id)];


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
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Review::class);

        $reviews = Review::destroy($id);
    }
}
