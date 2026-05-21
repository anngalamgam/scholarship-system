<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class adminuser extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = user::all();
        return view('admin.admin-adduser', compact('user'));
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
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email',
            
            'password' => 'required|max:255',
            'role_as' => 'nullable|integer',
        ], [
            'email.unique' => 'Oops! This email is already registered. Please use a different one.',
        ]);
        
        $add = new User();
        
        $add->name = $request->input('name');
        
        $add->email = $request->input('email');
        $add->password = Hash::make($request->input('password'));
        $add->role_as = $request->input('role_as');
        
        $add->save();
        
        return redirect()->back()->with('success', 'Account Successfully Added!');
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
