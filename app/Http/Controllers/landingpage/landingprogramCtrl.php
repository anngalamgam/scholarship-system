<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\program;
use Illuminate\Support\Facades\Storage;


class landingprogramCtrl extends Controller
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
        $program = program::all();
        $groupedprogram = $program->groupBy('department');
        $selectedprogram = program::find($id);


        $data = program::all();
    
        $view = $data->unique('department');

        $category = program::all();

    
        return view('landingpage.view-program', compact('selectedprogram', 'groupedprogram','view','category'));
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
