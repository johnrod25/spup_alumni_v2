<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Gallery;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('public.Admin.index', [
            'alumnis' => User::where('usertype','2')->where('is_deleted',0)->count(),
            'announcements' => Announcement::count(),
            'galleries' => Gallery::count(),
            'news' => News::count(),
        ]);
    }
}
