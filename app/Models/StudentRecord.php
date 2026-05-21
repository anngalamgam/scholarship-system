<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',

        // Student Profile
        'first_name',
        'middle_name',
        'last_name',
        'age',
        'birth_date',
        'gender',
        'contact_number',
        'email',
        'address',
        

        // Education
        'elementary_school',
        'elementary_year',
        'highschool_school',
        'highschool_year',
        'college_school',
        'college_course',
        'college_year',

        // Family
        'father_name',
        'father_occupation',
        'mother_name',
        'mother_occupation',
        'guardian_name',
        'guardian_contact',
        'annual',

    ];
}
