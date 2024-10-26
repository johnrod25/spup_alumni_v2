<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_Details;
use Illuminate\Http\Request;

class UserDetailsController extends Controller
{
    public function index()
    {
        return view('public.Admin.alumni', [
            'datas' => User::where('usertype', '2')
                ->where('is_deleted', 0)
                ->where('is_approved', 1)
                ->orderBy('id', 'DESC')
                ->get()
        ]);
    }

    public function edit_alumni(Request $request)
{
    $request->validate(['id' => "required"]);
    $userDetails = User_Details::with('user')->where('user_id', $request->id)->first();

    if ($userDetails) {
        return response()->json([
            'response' => 'success',
            'user' => $userDetails
        ]);
    } else {
        return response()->json([
            'response' => 'error',
            'message' => 'User details not found.'
        ]);
    }
}

    public function update_alumni(Request $request)
    {
        $request->validate(['id' => "required"]);
        $student_number = $request->student_number ?? "";

        $data = User_Details::where('user_id', $request->id)->first();

        $data->user->name = $request->name;
        $data->user->current_position = $request->current_position;
        $data->user->telephone_number = $request->telephone_number;
        $data->user->mobile_number = $request->mobile_number;
        $data->user->email = $request->email;
        $data->user->gender = $request->gender;
        $data->user->age = $request->age;
        $data->user->civil_status = $request->civil_status;
        $data->user->degree = $request->degree;
        $data->user->college = $request->college;
        $data->user->year_graduated = $request->year_graduated;
        $data->user->awards = $request->awards;
        $data->user->exams = $request->exams;
        $data->user->training = $request->training;
        $data->user->employed = $request->employed;
        $data->user->organization = $request->organization;
        $data->user->address = $request->address;
        $data->user->place_of_work = $request->place_of_work;
        $data->user->organization_type = $request->organization_type;
        $data->user->occupation = $request->occupation;
        $data->user->employment_status = $request->employment_status;
        $data->user->monthly_income = $request->monthly_income;

        $data->save();
        $data->user->save();

        return ['response' => 'success', 'message' => 'Updated Successfully.'];
    }

    public function destroy_alumni($id)
    {
        $user = User::findOrFail($id);
        $user->is_deleted = 1;
        $user->save();

        return redirect()->route('admin-alumni')->with('success', 'Alumni deleted successfully.');
    }

    public function alumni_request()
    {
        return view('public.Admin.alumni-request', [
            'datas' => User::where('usertype', '2')
                ->where('is_deleted', 0)
                ->where('is_approved', 0)
                ->orderBy('id', 'DESC')
                ->get()
        ]);
    }

    public function alumni_approved($id)
    {
        $data_del = User::find($id);
        $data_del->is_approved = 1;
        $data_del->save();
        return redirect()->route('admin-alumni-request');
    }

    public function alumni_reject($id)
    {
        $data_del = User::find($id);
        $data_del->is_approved = 2;
        $data_del->save();
        return redirect()->route('admin-alumni-request');
    }

    public function register_form(DegreeController $degreeController)
    {
        $degrees = $degreeController->getAllDegrees();
        return view('public.Home.register-form', compact('degrees'));
    }
}

