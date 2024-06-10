<?php

namespace App\Http\Controllers;
use Illumniate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
class PDFController extends Controller
{
    //
    public function generatePDF_ex()
    {
        $alumni = User::with(['user' => function ($query) {
            $query->orderBy('degree', 'desc');
        }])->where('usertype','2')->where('is_deleted',0)->get();
        $users_collection = collect($alumni);
        $grouped_users = $users_collection->groupBy('degree');
        $data = [
            'title' => 'PDF Report',
            'date' => date('m/d/Y'),
            'grouped_users' => $grouped_users,
        ];

        $pdf = PDF::loadView('public.alumni_pdf', $data);
        return $pdf->download('report.pdf');
    }

    public function generatePDF(){
        $users = DB::select('select user_id, name, email, usertype, is_deleted, is_approved, phone_number, batch, degree, home_address, year_graduated  from users users left join(select id,email, phone_number, batch, degree, home_address, year_graduated from user__details) details on details.id = users.user_id  where is_deleted = 0 and usertype = 2 and is_approved = 1 order by degree');
        $users_collection = collect($users);
        $grouped_users = $users_collection->groupBy('degree');
        $data = [
            'grouped_users' => $grouped_users,
        ];
        $pdf = PDF::loadView('public.alumni_pdf', $data);
        return $pdf->download('alumni_list.pdf');
        // return view('public.alumni_pdf',$data);
    }
    public function viewPDF()
    {
        $users = DB::select('select user_id, name, email, usertype, is_deleted, phone_number, batch, degree, home_address, year_graduated  from users users left join(select id,email, phone_number, batch, degree, home_address, year_graduated from user__details) details on details.id = users.user_id  where is_deleted = 0 and usertype = 2 order by degree');
        $users_collection = collect($users);
        $grouped_users = $users_collection->groupBy('degree');
        //  dd($grouped_users);

        return view('public.alumni_pdf', [
            'grouped_users' => $grouped_users
        ]);
    }
}
