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
        return ApprovedApplicant::select(

            'id',
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

            

            'created_at'

        )->get();
    }

    /*
    |--------------------------------------------------------------------------
    | TABLE HEADERS
    |--------------------------------------------------------------------------
    */

    public function headings(): array
    {
        return [

            'ID',
            'USER ID',

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
            'COLLEGE YEAR',

            'FATHER NAME',
            'FATHER OCCUPATION',

            'MOTHER NAME',
            'MOTHER OCCUPATION',

            'GUARDIAN NAME',
            'GUARDIAN CONTACT',

            'ANNUAL INCOME',

         
            'APPROVED DATE'

        ];
    }
}