<?php

namespace App\Http\Controllers;

use App\Models\User_Details;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        // Fetch user details grouped by degree, excluding deleted and non-approved users
        $grouped_users = User_Details::whereHas('user', function ($query) {
            $query->where('is_deleted', 0)->where('is_approved', 1);
        })->get()->groupBy('degree');

        // Load the view and pass the data
        $pdf = PDF::loadView('public.alumni_pdf', compact('grouped_users'));

        // Return the PDF stream to the browser
        return $pdf->download('SPUP_alumni.pdf');
    }
}

