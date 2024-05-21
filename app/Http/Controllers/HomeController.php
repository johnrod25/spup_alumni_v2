<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('public.Home.index', [
            'announcements' => Announcement::limit(2)->orderBy('id', 'DESC')->get(),
            'galleries' => Gallery::limit(12)->orderBy('id', 'DESC')->get(),
            'news' => News::limit(10)->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function register_form()
    {
        return view('public.Home.register-form', [
            'announcements' => Announcement::limit(2)->orderBy('id', 'DESC')->get(),
            'galleries' => Gallery::limit(12)->orderBy('id', 'DESC')->get(),
            'news' => News::limit(10)->orderBy('id', 'DESC')->get(),
        ]);
    }
}
