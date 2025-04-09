<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class ConfigController extends Controller {

    public function pdf(Request $request) {
        $data = ['title' => 'Пример PDF'];

        $customWidth = 227 * 2.83;  // 210 мм в points
        $customHeight = 323 * 2.83; // 350 мм в points
        $pdf = PDF::loadView('configuration_pdf', $data)
        ->setOptions(['dpi' => 310, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'chroot' => public_path()])
        ->setPaper([0, 0, $customWidth, $customHeight]);
        
        $pdf->save(storage_path('app/public/pdf/example.pdf'));
        $pdfUrl = asset('storage/pdf/example.pdf');

        return response()->json(['pdfUrl' => $pdfUrl]);
    }
}