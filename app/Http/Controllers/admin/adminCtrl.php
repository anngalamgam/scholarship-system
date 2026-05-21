<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Project;
use App\Models\User;  
use App\Models\Narratives;
use App\Models\Application;


class adminCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applicants = Application::latest()->get();

        return view(
            'admin.applicants',
            compact('applicants')
        );
    }


     public function indessx()
    {
        $totalProgram = Program::count();
        $totalProject = Project::count();
        $totalUsers = User::count();  
        $totalNarrative = Narratives::count(); 
    
        return view('admin.admin-dashboard',compact('totalProgram', 'totalUsers','totalNarrative','totalProject'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
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
