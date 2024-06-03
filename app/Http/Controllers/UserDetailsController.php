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
            'datas' => User::where('usertype','2')->orderBy('id', 'DESC')->get()
        ]);
    }
    public function edit_alumni(Request $request)
    {
        $request->validate(['id' => "required"]);
        return ['response' => 'success', 'user' => User::with('user')->where('user_id', $request->id)->latest()->get()];
    }
}
