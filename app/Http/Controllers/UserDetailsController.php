<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDetailsController extends Controller
{
    //
    public function index()
    {
        return view('public.Admin.alumni', [
            'datas' => User::orderBy('id', 'DESC')->get()
        ]);
    }
}
