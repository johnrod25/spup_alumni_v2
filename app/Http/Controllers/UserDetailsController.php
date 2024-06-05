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
            'datas' => User::where('usertype','2')->where('is_deleted', 0)->orderBy('id', 'DESC')->get()
        ]);
    }
    public function edit_alumni(Request $request)
    {
        $request->validate(['id' => "required"]);
        return ['response' => 'success', 'user' => User::with('user')->where('user_id', $request->id)->latest()->get()];
    }

    public function update_alumni(Request $request)
    {
        $request->validate(['id' => "required"]);
        $data =  User::with('user')->where('user_id',$request->id)->first();
        // dd($data);
        // $data->user_id = $request->id;
        // $data->usertype = $request->usertype;
        $data->name = $request->firstname.' '.$request->middlename.' '.$request->lastname;
        $data->username = $request->email;
        $data->password = bcrypt($request->lastname.$request->student_number);
        $data->user->lastname = $request->lastname;
        $data->user->firstname = $request->firstname;
        $data->user->middlename = $request->middlename;
        $data->user->student_number = $request->student_number;
        $data->user->email = $request->email;
        $data->user->phone_number = $request->phone_number;
        $data->user->home_address = $request->home_address;
        $data->user->birthdate = $request->birthdate;
        $data->user->degree = $request->degree;
        $data->user->batch = $request->batch;
        $data->user->involve_purpose = $request->involve_purpose;
        $data->user->year_graduated = $request->year_graduated;
        $data->user->company_name = $request->company_name;
        $data->user->specialization = $request->specialization;
        $data->user->occupation = $request->occupation;
        $data->user->work_status = $request->work_status;
        $data->user->before_employed = $request->before_employed;
        $data->save();
        $data->user->save();
        return ['response' => 'success', 'message' => 'Updated Successfully.'];
    }

    public function destroy_alumni($id)
    {
        $data_del =  User::find($id);
        $data_del->is_deleted = 1;
        $data_del->save();
        return redirect()->route('admin-alumni');
    }
}
