<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\accomplishment;
use Illuminate\Support\Facades\Storage;
use App\Models\images;

class landingaccompCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve all accomplishments
// Fetch all accomplishments
$accomplishments = Accomplishment::all();

// Group accomplishments by department
$groupedAccomplishments = $accomplishments->groupBy('department');

// Fetch images related to accomplishments
$images = Images::with('accomplishment')->get(); // Assuming you have an 'Image' model related to 'Accomplishment'

// Find a specific accomplishment by ID (if needed)
$selectedAccomplishment = Accomplishment::find($id);

// Get all unique departments (based on the 'department' column)
$uniqueDepartments = Accomplishment::distinct()->get(['department']);

// Get all accomplishments, if you want to pass them to the view
$data = $accomplishments;

// Pass the data to the view
return view('accomplishment', [
    'selectedAccomplishment' => $selectedAccomplishment,
    'groupedAccomplishments' => $groupedAccomplishments,
    'uniqueDepartments' => $uniqueDepartments,
    'category' => $data,  // All accomplishments
    'images' => $images   // Pass the images data here
]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
