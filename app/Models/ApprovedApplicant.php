<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovedApplicant extends Model
{
    protected $fillable = [
        'student_record_id',
        'user_id',

        'first_name',
        'middle_name',
        'last_name',
        'age',
        'birth_date',
        'gender',
        'contact_number',
        'email',
        'address',

        'elementary_school',
        'elementary_year',

        'highschool_school',
        'highschool_year',

        'college_school',
        'college_course',
        'college_year',

        'father_name',
        'father_occupation',

        'mother_name',
        'mother_occupation',

        'guardian_name',
        'guardian_contact',

        'annual',

        'approved_at',
    ];
}