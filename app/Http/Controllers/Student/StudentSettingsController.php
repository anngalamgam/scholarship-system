<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentSettingsController extends Controller
{

    public function index()
    {
        return view('student.settings');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([

            'email' =>
                'nullable|email|unique:users,email,' . $user->id,

            'current_password' =>
                'nullable|required_with:password',

            'password' =>
                'nullable|min:8|confirmed',

        ]);

        /*
        |--------------------------------------------------------------------------
        | UPDATE EMAIL
        |--------------------------------------------------------------------------
        */

        if ($request->filled('email')) {

            $user->email = $request->email;

        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE PASSWORD
        |--------------------------------------------------------------------------
        */

        if ($request->filled('password')) {

            if (
                !Hash::check(
                    $request->current_password,
                    $user->password
                )
            ) {

                return back()->with(
                    'error',
                    'Current password is incorrect!'
                );

            }

            $user->password = Hash::make(
                $request->password
            );
        }

        $user->save();

        return back()->with(
            'success',
            'Settings updated successfully!'
        );
    }
}