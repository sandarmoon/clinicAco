<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;
use PDF;

class PdfController extends Controller
{
    public function createTreatmentReport($id)
    {
        $treatmentId=$id;
        // dd($id);
    	$data['treatment'] = Treatment::with('medicines')->
        find($id);
        
        $pdf = PDF::setOptions([
            'images' => true,'enable_php'=>true
        ]);
        $pdf->loadView('pdfs/treatmentRecordPdf', $data);
        
         // return view('pdfs/treatmentRecordPdf',compact('treatment'));
         return $pdf->stream('pdfs/treatmentRecordPdf');
        // return $pdf->download('Nicesnippets.pdf');
    }

    public function printIncomeListpdf(Request $request){

    	$startdate=$request->startdate;
        $enddate=$request->enddate;

        $pdf=PDF::loadView('pdfs/incomelistPdf');
        return $pdf->stream('pdfs/incomelistPdf');
    }
}
