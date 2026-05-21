<?php

namespace App\Http\Controllers\Dept;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\project;
use App\Models\accomplishment;
class deptadminCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
            $userDepartment = auth()->user()->department;

            $totalProject = project::where('department', $userDepartment)->count();
            $totalaccomp = accomplishment::where('department', $userDepartment)->count();

            return view('dept.index', compact('totalProject', 'totalaccomp'));

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
        //
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
