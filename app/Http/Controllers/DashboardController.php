<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Gallery;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $work_place_data = DB::table('user__details')
        ->join('users', 'users.id', '=', 'user__details.user_id')
        ->where('users.is_approved', 1)
        ->select('place_of_work', DB::raw('COUNT(*) as count'))
        ->groupBy('place_of_work')
        ->get();
        $work_place = $work_place_data->pluck('place_of_work')->toArray();
        $work_place_count = $work_place_data->pluck('count')->toArray();

        $gender_data = DB::table('user__details')
        ->join('users', 'users.id', '=', 'user__details.user_id')
        ->where('users.is_approved', 1)
        ->select('gender', DB::raw('COUNT(*) as count'))
        ->groupBy('gender')
        ->get();
        $gender = $gender_data->pluck('gender')->toArray();
        $gender_count = $gender_data->pluck('count')->toArray();

        $degree_data = DB::table('user__details')
        ->join('users', 'users.id', '=', 'user__details.user_id')
        ->where('users.is_approved', 1)
        ->select('degree', DB::raw('COUNT(*) as count'))
        ->groupBy('degree')
        ->get();
        $degree = $degree_data->pluck('degree')->toArray();
        $degree_count = $degree_data->pluck('count')->toArray();

        $organization_type_data = DB::table('user__details')
        ->join('users', 'users.id', '=', 'user__details.user_id')
        ->where('users.is_approved', 1)
        ->select('organization_type', DB::raw('COUNT(*) as count'))
        ->groupBy('organization_type')
        ->get();
        $organization_type = $organization_type_data->pluck('organization_type')->toArray();
        $organization_type_count = $organization_type_data->pluck('count')->toArray();

        // dd($work_place);
        return view('public.Admin.index', [
            'alumnis' => User::where('usertype', '2')->where('is_deleted', 0)->where('is_approved', 1)->count(),
            'announcements' => Announcement::count(),
            'galleries' => Gallery::count(),
            'news' => News::count(),
            'registration_requests' => User::where('usertype', '2')->where('is_deleted', 0)->where('is_approved', 0)->count(), // Adjust query as needed
            'work_place' => json_encode($work_place),
            'work_place_count' => json_encode($work_place_count),
            'degree' => json_encode($degree),
            'degree_count' => json_encode($degree_count),
            'gender' => json_encode($gender),
            'gender_count' => json_encode($gender_count),
            'organization_type' => json_encode($organization_type),
            'organization_type_count' => json_encode($organization_type_count),
        ]);
    }
}

