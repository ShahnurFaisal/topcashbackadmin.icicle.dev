<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;


class PDFController extends Controller
{
     public function pdfInventory()
    {
        
        $pdf = PDF::loadView('pdf.invoice');
        return $pdf->download('invoice.pdf');
    }
}
