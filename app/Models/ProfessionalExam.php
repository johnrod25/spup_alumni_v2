<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalExam extends Model
{
    protected $fillable = ['user_details_id', 'exam_name', 'exam_date', 'exam_rating'];

    public function userDetails()
    {
        return $this->belongsTo(User_Details::class);
    }
}
