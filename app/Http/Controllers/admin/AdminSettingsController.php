<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminSettingsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SETTINGS PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return view('admin.settings');
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE SETTINGS
    |--------------------------------------------------------------------------
    */

    public function update(Request $request)
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'email' =>
                'required|email|unique:users,email,' . $user->id,

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

        $user->email = $request->email;

        /*
        |--------------------------------------------------------------------------
        | UPDATE PASSWORD
        |--------------------------------------------------------------------------
        */

        if ($request->filled('password')) {

            /*
            |--------------------------------------------------------------------------
            | CHECK CURRENT PASSWORD
            |--------------------------------------------------------------------------
            */

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
            'Admin settings updated successfully!'
        );
    }

    public function updatePassword(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'current_password' => 'required',
        'password' => 'required|min:8|confirmed',
    ]);

    if (!Hash::check($request->current_password, $user->password)) {
        return back()->with('error', 'Current password is incorrect!');
    }

    $user->password = Hash::make($request->password);
    $user->save();

    return back()->with('success', 'Password updated successfully!');
}
}