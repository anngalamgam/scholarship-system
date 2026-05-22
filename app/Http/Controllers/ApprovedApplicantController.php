<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApprovedApplicant;
use Illuminate\Http\Request;
use App\Exports\ApprovedApplicantsExport;
use Maatwebsite\Excel\Facades\Excel;

class ApprovedApplicantController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SHOW APPROVED APPLICANTS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $approved = ApprovedApplicant::latest()->get();

        return view(
            'admin.approved-applicants',
            compact('approved')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW ALL APPLICANTS
    |--------------------------------------------------------------------------
    */

    public function applicants()
    {
        $applicants = Application::latest()->get();

        return view(
            'admin.applicants',
            compact('applicants')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | APPROVE APPLICANT
    |--------------------------------------------------------------------------
    */

    public function approve($id)
{
    $student = Application::findOrFail($id);

    /*
    |--------------------------------------------------------------------------
    | CHECK DUPLICATE NAME
    |--------------------------------------------------------------------------
    */

    $exists = ApprovedApplicant::where('first_name', $student->first_name)
        ->where('middle_name', $student->middle_name)
        ->where('last_name', $student->last_name)
        ->exists();

    /*
    |--------------------------------------------------------------------------
    | IF DUPLICATE FOUND
    |--------------------------------------------------------------------------
    */

    if ($exists) {

        return redirect()
            ->route('admin.applicants')
            ->with(
            'error',
            'Duplicate applicant name already exists!'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SAVE APPROVED APPLICANT
    |--------------------------------------------------------------------------
    */

    ApprovedApplicant::create([

        'user_id' => $student->user_id,

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
        'college_year' => $student->college_year,

        'father_name' => $student->father_name,
        'father_occupation' => $student->father_occupation,

        'mother_name' => $student->mother_name,
        'mother_occupation' => $student->mother_occupation,

        'guardian_name' => $student->guardian_name,
        'guardian_contact' => $student->guardian_contact,

        'annual' => $student->annual,

        'status' => 'approved',
    ]);

    /*
    |--------------------------------------------------------------------------
    | DELETE FROM APPLICATION TABLE
    |--------------------------------------------------------------------------
    */

    $student->delete();

    return redirect()
        ->route('admin.applicants')
        ->with(
            'success',
            'Applicant approved successfully!'
        );
}

public function export()
{
    return Excel::download(
        new ApprovedApplicantsExport,
        'approved_applicants.xlsx'
    );
}

    /*
    |--------------------------------------------------------------------------
    | DELETE APPROVED APPLICANT
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $approved = Application::findOrFail($id);

        $approved->delete();

        return back()->with(
            'success',
            'Applicant deleted successfully!'
        );
    }


    public function destroys($id)
    {
        $approved = ApprovedApplicant::findOrFail($id);

        $approved->delete();

        return back()->with(
            'success',
            'Approved applicant deleted successfully!'
        );
    }
}