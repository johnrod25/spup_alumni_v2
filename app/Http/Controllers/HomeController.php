<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Announcement;
use App\Models\Gallery;
use App\Models\News;
use App\Models\User;
use App\Models\Degree;
use App\Models\User_Details;
use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Models\ProfessionalExam;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.Home.index', [
            'announcements' => Announcement::limit(2)->orderBy('id', 'DESC')->get(),
            'galleries' => Gallery::limit(12)->orderBy('id', 'DESC')->get(),
            'news' => News::limit(10)->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function search_record()
    {
        return view('public.Home.search-record');
    }

    public function search_record_submit(Request $request)
    {
        if ($request->row_number == 1) {
            $validated = $request->validate([
                'lastname' => 'required',
                'firstname' => 'required',
                'middlename' => 'required',
                'birthdate' => 'required',
            ]);
            $users = DB::table('users')
                ->leftJoin('user__details', 'users.user_id', '=', 'user__details.id')
                ->where('lastname', $request->lastname)
                ->where('firstname', $request->firstname)
                ->where('middlename', $request->middlename)
                ->where('birthdate', $request->birthdate)
                ->where('is_deleted', 0)
                ->count();
        } else {
            $validated = $request->validate([
                'student_number' => 'required',
                'last_name' => 'required',
            ]);
            $users = DB::table('users')
                ->leftJoin('user__details', 'users.user_id', '=', 'user__details.id')
                ->where('lastname', $request->last_name)
                ->where('student_number', $request->student_number)
                ->where('is_deleted', 0)
                ->count();
        }

        if ($users == 0) {
            return back()->with([
                'status' => 'warning',
                'message' => 'We apologize but your record is not in our database, kindly double-check your data and try again. Or you may input your data manually.',
                'count' => $users,
            ]);
        } else {
            return back()->with([
                'status' => 'success',
                'message' => 'You are already registered.',
                'count' => $users,
            ]);
        }
    }

    public function register_form()
    {
        $degrees = Degree::all();
        return view('public.Home.register-form', [
            'degrees' => $degrees,
            'announcements' => Announcement::limit(2)->orderBy('id', 'DESC')->get(),
            'galleries' => Gallery::limit(12)->orderBy('id', 'DESC')->get(),
            'news' => News::limit(10)->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function register_form_submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'current_position' => 'required',
            'telephone_number' => 'nullable',
            'mobile_number' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'age' => 'required',
            'civil_status' => 'required',
            'degree' => 'nullable',
            'college' => 'nullable',
            'year_graduated' => 'nullable',
            'awards' => 'nullable',
            'exams' => 'nullable',
            'training' => 'nullable',
            'employed' => 'nullable',
            'organization' => 'nullable',
            'address' => 'nullable',
            'place_of_work' => 'nullable',
            'organization_type' => 'nullable',
            'occupation' => 'nullable',
            'employment_status' => 'nullable|string',
            'self_employed_skills' => 'nullable|string',
            'business_type' => 'nullable|array',
            'monthly_income' => 'nullable',
            'exam_name' => 'nullable|array',
            'exam_date' => 'nullable|array',
            'exam_rating' => 'nullable|array',
            'first_job' => 'nullable|string',
            'previous_jobs_count' => 'nullable|integer',
            'first_job_level' => 'nullable|string',
            'current_job_level' => 'nullable|string',
            'job_acceptance_reasons' => 'nullable|array',
            'first_job_duration' => 'nullable|string',
            'first_job_duration_other' => 'nullable|string',
            'job_finding_method' => 'nullable|array',
            'job_finding_method_other' => 'nullable|string',
            'time_to_first_job' => 'nullable|string',
            'time_to_first_job_other' => 'nullable|string',
            'curriculum_relevance' => 'nullable|string',
            'useful_competencies' => 'nullable|array',
            'useful_competencies_other' => 'nullable|string',
            'job_difficulties' => 'nullable|array',
            'job_difficulties_other' => 'nullable|string',
            'time_to_find_job' => 'nullable|string',
            'time_to_find_job_other' => 'nullable|string',
            'waiting_time_reasons' => 'nullable|array',
            'paulinian_relevance' => 'nullable|string',
            'recommend_spup' => 'nullable|string',
            'recommend_spup_reason' => 'nullable|string',
            'well_being' => 'nullable|array',
            'well_being_other' => 'nullable|string',
            'spup_involvement' => 'nullable|array',
            'spup_involvement_other' => 'nullable|string',
            'networking_steps' => 'nullable|array',
            'networking_steps_other' => 'nullable|string',
            'marketing_assist' => 'nullable|array',
            'marketing_assist_other' => 'nullable|string',
            'education_service_suggestions' => 'nullable|string',

        ]);

        // dd($request);
        // Create the User record first
        $user = User::create([

            'name' => $request->name,
            'username' => $request->email,
            'password' => bcrypt($request->email),
            'usertype' => 2,
            'is_deleted' => 0,
        ]);

        $first_job_duration = $request->first_job_duration == "" ? $request->first_job_duration_other : $request->first_job_duration;
        $time_to_first_job = $request->time_to_first_job == "" ? $request->time_to_first_job_other : $request->time_to_first_job;
        $time_to_find_job = $request->time_to_find_job == "" ? $request->time_to_find_job_other : $request->time_to_find_job;

        $job_acceptance_reasons = (array)$request->job_acceptance_reasons;
        if($request->job_acceptance_reasons_other){
            $job_acceptance_reasons[] = $request->job_acceptance_reasons_other;
        }

        $job_finding_method = (array)$request->job_finding_method;
        if($request->job_finding_method_other){
            $job_finding_method[] = $request->job_finding_method_other;
        }

        $useful_competencies = (array)$request->useful_competencies;
        if($request->useful_competencies_other){
            $useful_competencies[] = $request->useful_competencies_other;
        }

        $job_difficulties = (array)$request->job_difficulties;
        if($request->job_difficulties_other){
            $job_difficulties[] = $request->job_difficulties_other;
        }

        $well_being = (array)$request->well_being;
        if($request->well_being_other){
            $well_being[] = $request->well_being_other;
        }

        $spup_involvement = (array)$request->spup_involvement;
        if($request->spup_involvement_other){
            $spup_involvement[] = $request->spup_involvement_other;
        }

        $networking_steps = (array)$request->networking_steps;
        if($request->networking_steps_other){
            $networking_steps[] = $request->networking_steps_other;
        }

        $marketing_assist = (array)$request->marketing_assist;
        if($request->marketing_assist_other){
            $marketing_assist[] = $request->marketing_assist_other;
        }

        // Create the User_Details record and link it to the User
        $userDetails = User_Details::create([
            'user_id' => $user->id, // Link to the User record
            'name' => $request->name,
            'current_position' => $request->current_position,
            'telephone_number' => $request->telephone_number,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'gender' => $request->gender,
            'age' => $request->age,
            'civil_status' => $request->civil_status,
            'degree' => $request->degree,
            'college' => $request->college,
            'year_graduated' => $request->year_graduated,
            'awards' => $request->awards,
            'exams' => $request->exams,
            'exam_name' => json_encode($request->exam_name),
            'exam_date' => json_encode($request->exam_date),
            'exam_rating' => json_encode($request->exam_rating),
            'training' => $request->training,
            'employed' => $request->employed,
            'organization' => $request->organization,
            'address' => $request->address,
            'place_of_work' => $request->place_of_work,
            'organization_type' => $request->organization_type,
            'occupation' => $request->occupation,
            'employment_status' => $request->employment_status,
            'self_employed_skills' => $request->self_employed_skills,
            'business_type' => json_encode($request->business_type),  // store business types as JSON
            'monthly_income' => $request->monthly_income,
            'first_job' => $request->first_job,
            'previous_jobs_count' => $request->previous_jobs_count,
            'first_job_level' => $request->first_job_level,
            'current_job_level' => $request->current_job_level,
            'job_acceptance_reasons' => json_encode($job_acceptance_reasons),  // Store reasons as JSON
            'first_job_duration' => $first_job_duration,
            'first_job_duration_other' => $request->first_job_duration_other,
            'job_finding_method' => json_encode($job_finding_method),
            'job_finding_method_other' => $request->job_finding_method_other,
            'time_to_first_job' => $time_to_first_job,
            'time_to_first_job_other' => $request->time_to_first_job_other,
            'curriculum_relevance' => $request->curriculum_relevance,
            'useful_competencies' => json_encode($useful_competencies),
            'useful_competencies_other' => $request->useful_competencies_other,
            'job_difficulties' => json_encode($job_difficulties),
            'job_difficulties_other' => $request->job_difficulties_other,
            'time_to_find_job' => $time_to_find_job,
            'time_to_find_job_other' => $request->time_to_find_job_other,
            'waiting_time_reasons' => json_encode($request->waiting_time_reasons),
            'paulinian_relevance' => $request->paulinian_relevance,
            'recommend_spup' => $request->recommend_spup,
            'recommend_spup_reason' => $request->recommend_spup_reason,
            'well_being' => json_encode($well_being),
            'well_being_other' => $request->well_being_other,
            'spup_involvement' => json_encode($spup_involvement),
            'spup_involvement_other' => $request->spup_involvement_other,
            'networking_steps' => json_encode($networking_steps),
            'networking_steps_other' => $request->networking_steps_other,
            'marketing_assist' => json_encode($marketing_assist),
            'marketing_assist_other' => $request->marketing_assist_other,
            'education_service_suggestions' => $request->education_service_suggestions,
        ]);
        // Add Professional Examinations Passed
        if ($request->exam_name) {
            foreach ($request->exam_name as $index => $examName) {
                if ($examName) {
                    ProfessionalExam::create([
                        'user_details_id' => $userDetails->id,
                        'exam_name' => $examName,
                        'exam_date' => $request->exam_date[$index] ?? null,
                        'exam_rating' => $request->exam_rating[$index] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('home')
            ->with(['success_message' => 'Registered Successfully. Please complete the tracer study questionnaire.']);
    }


    public function send_email(ContactRequest $request)
    {
        $data = $request->validated();
        Mail::send('public.email.contact', $data, function ($message) use ($data) {
            $message->to(env('ADMIN_EMAIL'))
                ->subject($data['subject']);
        });

        // Send confirmation email to the contact
        Mail::send('public.email.contact_confirmation', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject('Thank you for contacting us');
        });

        return redirect('/#contact')->with(['success' => 'Thank you for contacting us, ' . $data['name'] . '!']);
    }
}
