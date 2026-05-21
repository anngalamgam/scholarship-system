<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentRecord;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $record = StudentRecord::where('user_id', auth()->id())->first();

    $completion = $record ? 100 : 0;

    // RECENT ACTIVITY
    $activities = [];

    if ($record) {

        $activities[] = [
            'icon' => 'fa-file-circle-check',
            'title' => 'Scholar Form Submitted',
            'time' => $record->created_at->diffForHumans(),
            'color' => 'success'
        ];

        $activities[] = [
            'icon' => 'fa-user-pen',
            'title' => 'Profile Completed',
            'time' => $record->updated_at->diffForHumans(),
            'color' => 'primary'
        ];

    } else {

        $activities[] = [
            'icon' => 'fa-circle-exclamation',
            'title' => 'No Activity Yet',
            'time' => 'Please fill-up your form',
            'color' => 'danger'
        ];
    }

    return view('home', compact(
        'record',
        'completion',
        'activities'
    ));
    }
}
