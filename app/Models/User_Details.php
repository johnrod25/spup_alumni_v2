<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Details extends Model
{
    protected $table = 'user__details';

    protected $fillable = [
        'user_id',
        'name',
        'current_position',
        'telephone_number',
        'mobile_number',
        'email',
        'gender',
        'age',
        'civil_status',
        'degree',
        'college',
        'year_graduated',
        'awards',
        'exams',
        'training',
        'employed',
        'organization',
        'address',
        'place_of_work',
        'organization_type',
        'occupation',
        'employment_status',
        'self_employed_skills',
        'business_type',
        'monthly_income',
        'first_job',
        'previous_jobs_count',
        'first_job_level',
        'current_job_level',
        'job_acceptance_reasons',
        'first_job_duration',
        'first_job_duration_other',
        'job_finding_method',
        'job_finding_method_other',
        'time_to_first_job',
        'time_to_first_job_other',
        'curriculum_relevance',
        'useful_competencies',
        'useful_competencies_other',
        'job_difficulties',
        'job_difficulties_other',
        'time_to_find_job',
        'time_to_find_job_other',
        'waiting_time_reasons',
        'paulinian_relevance',
        'recommend_spup',
        'recommend_spup_reason',
        'well_being' ,
        'well_being_other',
        'spup_involvement',
        'spup_involvement_other',
        'networking_steps',
        'networking_steps_other',
        'marketing_assist',
        'marketing_assist_other',
        'education_service_suggestions',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function professionalExams()
    {
        return $this->belongsTo(ProfessionalExam::class, 'user_id', 'user_details_id');
        // return $this->hasMany(ProfessionalExam::class);
    }

}
