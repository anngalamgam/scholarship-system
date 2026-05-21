<?php

namespace App\Http\Controllers\admin\program;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\program;
use Illuminate\Support\Facades\Storage;

class programCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $program = program::all();
        return view ('admin.program',compact('program'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,jfif|max:204833443',
            'title' => 'required',
            'leader' => 'required',
            'fund' => 'required',
            'description' => 'required',
            'location' => 'required',
            'schedule' => 'required|date',
            'scheduleend' => 'required|date|after_or_equal:schedule',
            'department' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,txt|max:102400',
        ]);
        
        $prog = new program();
        $prog->title = $request->input('title');
        $prog->leader = $request->input('leader');
        $prog->fund = $request->input('fund');
        $prog->description = $request->input('description');
        $prog->location = $request->input('location');
        $prog->schedule = $request->input('schedule');
        $prog->scheduleend = $request->input('scheduleend');
        $prog->department = $request->input('department');
        
       
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/file', $fileName);
            $prog->file = $fileName;
        }
        
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('public/image', $imageName);
            $prog->image = $imageName;
        }
        
        
        $prog->save();
        
        return redirect()->back()->with('success', 'Program Posted Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
        $program = program::find($id);


        if ($program) {
            
            $program->fill($request->only([ 'title', 'leader', 'fund', 'description', 'location', 'schedule', 'scheduleend',  'department']));
        
           
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '_' .  $file->getClientOriginalName();
                $file->storeAs('public/file', $fileName);
                if ($program->file) {
                    Storage::delete('public/file/' . $program->file);
                }
                $program->file = $fileName;
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' .  $file->getClientOriginalName();
                $file->storeAs('public/image', $fileName);
                if ($program->image) {
                    Storage::delete('public/image/' . $program->image);
                }
                $program->image = $fileName;
            }
            $program->save();
            return redirect()->back()->with('success', 'Program Updated!');
        }
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = Program::findOrFail($id);

        
        if ($program->file && Storage::exists('public/' . $program->file)) {
            Storage::delete('public/' . $program->file);
        }

        
        $program->delete();

        return redirect()->back()->with('message', 'Program Deleted Successfully.');
    }
}
