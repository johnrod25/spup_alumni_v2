<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;

class AlumniController extends Controller
{
    public function generatePDF($id)
    {
        $alumni = User::with('userDetails')->findOrFail($id);

        $pdf = PDF::loadView('public.Admin.alumni_pdf', compact('alumni'));

        return $pdf->download('SPUP_Alumni_Information.pdf');
    }
}
