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

        
        'first_name' => strtoupper($student->first_name),
        'middle_name' => strtoupper($student->middle_name),
        'last_name' => strtoupper($student->last_name),

        'age' => $student->age,

        'birth_date' => $student->birth_date,

        'gender' => strtoupper($student->gender),

        'contact_number' => $student->contact_number,

        'email' => strtoupper($student->email),

        'address' => strtoupper($student->address),

        'elementary_school' => strtoupper($student->elementary_school),
        'elementary_year' => $student->elementary_year,

        'highschool_school' => strtoupper($student->highschool_school),
        'highschool_year' => $student->highschool_year,

        'college_school' => strtoupper($student->college_school),
        'college_course' => strtoupper($student->college_course),

        'father_name' => strtoupper($student->father_name),
        'father_occupation' => strtoupper($student->father_occupation),

        'mother_name' => strtoupper($student->mother_name),
        'mother_occupation' => strtoupper($student->mother_occupation),

        'guardian_name' => strtoupper($student->guardian_name),
        'guardian_contact' => strtoupper($student->guardian_contact),

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