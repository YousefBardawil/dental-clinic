<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function index(){
      $rooms = Room::all();
      return response()->view('cms.room.pdf',compact('rooms'));

    }

    public function downloadPdf()
    {
        $rooms = Room::all();
        $pdf = PDF::loadview('cms.room.pdf',compact('rooms'));
        return $pdf->download('rooms.pdf');
    }
}
