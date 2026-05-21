<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentRecord;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Application;

class StudentController extends Controller
{
    public function dashboard()
    {
        // GET USER RECORD
        $record = StudentRecord::where('user_id', auth()->id())->first();

        return view('student.dashboard', [
            'record' => $record
        ]);
    }

   public function store(Request $request)
{
    // CHECK IF ALREADY SUBMITTED
    $record = StudentRecord::where('user_id', auth()->id())->first();

    // IF RECORD EXISTS
    if ($record) {

        return redirect()->back()
            ->with('already_submitted', true);

    }

    // VALIDATION
    $validated = $request->validate([

        // STEP 1
        'first_name'        => 'required|string|max:255',
        'middle_name'       => 'required|string|max:255',
        'last_name'         => 'required|string|max:255',
        'age'               => 'required|numeric',
        'birth_date'        => 'required|date',
        'gender'            => 'required',
        'contact_number'    => 'required|string|max:255',
        'email'             => 'required|email|max:255',
        'address'           => 'required|string',

        // STEP 2
        'elementary_school' => 'required|string|max:255',
        'elementary_year'   => 'required|string|max:255',
        'highschool_school' => 'required|string|max:255',
        'highschool_year'   => 'required|string|max:255',
        'college_school'    => 'required|string|max:255',
        'college_course'    => 'required|string|max:255',

        // STEP 3
        'father_name'       => 'required|string|max:255',
        'father_occupation' => 'required|string|max:255',
        'mother_name'       => 'required|string|max:255',
        'mother_occupation' => 'required|string|max:255',
        'guardian_name'     => 'required|string|max:255',
        'guardian_contact'  => 'required|string|max:255',
        'annual'            => 'required|string|max:255',

    ]);

    // SAVE USER ID
    $validated['user_id'] = auth()->id();

    /*
    |--------------------------------------------------------------------------
    | SAVE TO STUDENT RECORDS
    |--------------------------------------------------------------------------
    */

    StudentRecord::create($validated);

    /*
    |--------------------------------------------------------------------------
    | SAVE TO APPLICATIONS TABLE
    |--------------------------------------------------------------------------
    */

    Application::create($validated);

    return redirect()->back()
        ->with('success', true);
}

    public function print()
{
    $record = StudentRecord::where(
        'user_id',
        auth()->id()
    )->first();

    return view(
        'student.print-pds',
        compact('record')
    );
}
public function downloadPdf()
{
    $record = StudentRecord::where('user_id', auth()->id())->first();

    // LOGO PATHS (use public_path, NOT base_path)
    $pesoPath = public_path('build/assets/img/peso.png');
    $aparriPath = public_path('build/assets/img/aparri.png');

    // SAFETY CHECK (prevents silent failure)
    if (!file_exists($pesoPath)) {
        dd("Peso logo not found: " . $pesoPath);
    }

    if (!file_exists($aparriPath)) {
        dd("Favicon not found: " . $aparriPath);
    }

    // Convert to base64
    $pesoLogo = 'data:image/png;base64,' . base64_encode(file_get_contents($pesoPath));

    // ICO must be image/x-icon (NOT image/ico)
    $aparri = 'data:image/x-png;base64,' . base64_encode(file_get_contents($aparriPath));

    $pdf = Pdf::loadView('student.print-pds', [
        'record' => $record,
        'pesoLogo' => $pesoLogo,
        'aparri' => $aparri,
    ])
    ->setPaper([0, 0, 612, 936])
    ->setOptions([
        'isHtml5ParserEnabled' => true,
        'isRemoteEnabled' => false,
        'enable_local_file_access' => true, // IMPORTANT for dompdf images
    ]);

    return $pdf->download('Scholar-Application-Form.pdf');
}
}