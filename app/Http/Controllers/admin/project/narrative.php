<?php

namespace App\Http\Controllers\admin\project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\narratives;
use App\Models\images;
class narrative extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $narrative = narratives::all();
        return view ('admin.narrative',compact('narrative'));
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
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title' => 'required|string|max:255',
                'leader' => 'required|string|max:255',
                'implementing' => 'required|string|max:255',
                'objective' => 'required|string|max:255',
                'afund' => 'required|string|max:255',
                'department' => 'required|string|max:255',
                'link' => 'required|string|max:255',
            ]);
        
           
            $accomplishment = narratives::create([
                'title' => $request->input('title'),
                'leader' => $request->input('leader'),
                'implementing' => $request->input('implementing'),
                'objective' => $request->input('objective'),
                'afund' => $request->input('afund'),
                'department' => $request->input('department'),
                'link' => $request->input('link'),
            ]);
        
            if ($request->hasFile('image')) {
                try {
                    $image = $request->file('image');
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $imagePath = $image->storeAs('public/image', $imageName);
        
                 
                    $accomplishment->update(['image' => $imageName]);
                } catch (\Exception $e) {
                    return redirect()->back()->withErrors(['error' => 'Image upload failed: ' . $e->getMessage()]);
                }
            
        
           
            return redirect()->back()->with('success', 'Narrative Posted Successfully.');
        }
        

    

}
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
        $narrative = narratives::find($id);


        if ($narrative) {
            
            $narrative->fill($request->only([ 'image','title', 'leader', 'afund', 'implementing', 'objective', 'schedule', 'department', 'link']));
        
           

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' .  $file->getClientOriginalName();
                $file->storeAs('public/image', $fileName);
                if ($narrative->image) {
                    Storage::delete('public/image/' . $narrative->image);
                }
                $narrative->image = $fileName;
            }
            $narrative->save();
            return redirect()->back()->with('success', 'Narrative Updated!');
    }
}
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $narrative = Narratives::findOrFail($id);

    
    if ($narrative->image && \Storage::exists('public/image/' . $narrative->image)) {
    
        \Storage::delete('public/image/' . $narrative->image);
    }

 
    $narrative->delete();

    return redirect()->back()->with('success', 'Narrative Report deleted successfully.');
    }
}
