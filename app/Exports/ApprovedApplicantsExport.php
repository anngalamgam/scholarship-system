<?php

namespace App\Exports;

use App\Models\ApprovedApplicant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ApprovedApplicantsExport implements
    FromCollection,
    WithHeadings
{
    /*
    |--------------------------------------------------------------------------
    | TABLE DATA
    |--------------------------------------------------------------------------
    */

    public function collection()
{
    return ApprovedApplicant::get()->values()->map(function ($student, $index) {

        return [

            'scholar_id' =>
                '2026-' . str_pad($index + 1, 5, '0', STR_PAD_LEFT),

            'first_name' => $student->first_name,
            'middle_name' => $student->middle_name,
            'last_name' => $student->last_name,

            'age' => $student->age,
            'birth_date' => $student->birth_date,
            'gender' => $student->gender,

            'contact_number' => $student->contact_number,
            'email' => $student->email,
            'address' => $student->address,

            'elementary_school' => $student->elementary_school,
            'elementary_year' => $student->elementary_year,

            'highschool_school' => $student->highschool_school,
            'highschool_year' => $student->highschool_year,

            'college_school' => $student->college_school,
            'college_course' => $student->college_course,
           

            'father_name' => $student->father_name,
            'father_occupation' => $student->father_occupation,

            'mother_name' => $student->mother_name,
            'mother_occupation' => $student->mother_occupation,

            'guardian_name' => $student->guardian_name,
            'guardian_contact' => $student->guardian_contact,

            'annual' => $student->annual,

            

        ];

    });
}
    /*
    |--------------------------------------------------------------------------
    | TABLE HEADERS
    |--------------------------------------------------------------------------
    */

    public function headings(): array
    {
        return [

             
            'CTRL NO.',
            'FIRST NAME',
            'MIDDLE NAME',
            'LAST NAME',

            'AGE',
            'BIRTH DATE',
            'GENDER',

            'CONTACT NUMBER',
            'EMAIL',
            'ADDRESS',

            'ELEMENTARY SCHOOL',
            'ELEMENTARY YEAR',

            'HIGHSCHOOL SCHOOL',
            'HIGHSCHOOL YEAR',

            'COLLEGE SCHOOL',
            'COLLEGE COURSE',
            

            'FATHER NAME',
            'FATHER OCCUPATION',

            'MOTHER NAME',
            'MOTHER OCCUPATION',

            'GUARDIAN NAME',
            'GUARDIAN CONTACT',

            'ANNUAL INCOME',

         
            

        ];
    }
}