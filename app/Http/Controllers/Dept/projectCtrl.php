<?php

namespace App\Http\Controllers\Dept;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\project;
use Illuminate\Support\Facades\Storage;
class projectCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
        $userproject = auth()->user()->department;

        $data = Project::where('department', $userproject)->get();
        
        return view('dept.project', compact('data'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:204833443',
            'title' => 'required',
            'leader' => 'required',
            'fund' => 'required',
            'description' => 'required',
            
            'department' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,txt|max:102400',
        ]);
        
        $prog = new project();
        $prog->title = $request->input('title');
        $prog->leader = $request->input('leader');
        $prog->fund = $request->input('fund');
        $prog->description = $request->input('description');
        $prog->department = auth()->user()->department; 
        
       
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
        
        return redirect()->back()->with('success', 'Project Posted Successfully.');
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
        $program = project::find($id);


        if ($program) {
            
            $program->fill($request->only([ 'title', 'leader', 'fund', 'description']));
        
           
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
            return redirect()->back()->with('success', 'Project Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = Project::findOrFail($id);

        
        if ($program->file && Storage::exists('public/' . $program->file)) {
            Storage::delete('public/' . $program->file);
        }

        
        $program->delete();

        return redirect()->back()->with('message', 'Project Deleted Successfully.');
    }
}
