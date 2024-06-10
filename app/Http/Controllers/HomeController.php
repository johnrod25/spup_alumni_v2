<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Gallery;
use App\Models\News;
use App\Models\User;
use App\Models\User_Details;
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

    public function register_form_submit(Request $request){
        $validated = $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            // 'student_number' => 'required',
            'email' => 'required',
            'phone_number' => 'required|digits:11',
            'home_address' => 'required',
            'birthdate' => 'required',
            'degree' => 'required',
            'batch' => 'required',
            'involve_purpose' => 'required',
            'year_graduated' => 'required|before:today',
            'company_name' => 'required',
            'specialization' => 'required',
            'occupation' => 'required',
            'work_status' => 'required',
            'before_employed' => 'required',
        ]);
        $student_number = "";
        if($request->student_number != null){
            $student_number = $request->student_number;
        }
        User_Details::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'student_number' => $student_number,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'home_address' => $request->home_address,
            'birthdate' => $request->birthdate,
            'degree' => $request->degree,
            'batch' => $request->batch,
            'involve_purpose' => $request->involve_purpose,
            'year_graduated' => $request->year_graduated,
            'company_name' => $request->company_name,
            'specialization' => $request->specialization,
            'occupation' => $request->occupation,
            'work_status' => $request->work_status,
            'before_employed' => $request->before_employed,

        ])->save();
        $data = User::create([
            'user_id' => User_Details::latest()->first()->id,
            'name' => $request->firstname.' '.$request->middlename.' '.$request->lastname,
            'username' => $request->email,
            'password' => bcrypt($request->lastname.$request->student_number),
            'usertype' => 2,
            'is_deleted' => 0,
        ]);
        $data->save();

        return back()->with(['success_message' => 'Registered Successfully.']);
    }
}
