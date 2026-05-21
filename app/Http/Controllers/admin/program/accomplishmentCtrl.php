<?php

namespace App\Http\Controllers\admin\program;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\accomplishment_img;
use App\Models\accomplishment;
use App\Models\images;
use Illuminate\Support\Facades\Storage;

class accomplishmentCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $images = Images::with('accomplishment')->get()->groupBy('accomplishment_id');
    
       
        return view('admin.accomplishment-img', compact('images'));
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
            'images' => 'required|array', 
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:9999999999999999', 
            'title' => 'required|string|max:255',
            'leader' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);
    
       
        $accomplishment = Accomplishment::create([
            'title' => $request->input('title'),
            'leader' => $request->input('leader'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'department' => $request->input('department'),
        ]);
    
       
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('image', 'public'); 
              
                $accomplishment->images()->create([
                    'path' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Program Updated!');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $accomplishment = accomplishment_img::findOrFail($id);
    
      
        if ($request->hasFile('image')) {
         
            if (Storage::exists('public/' . $accomplishment->image)) {
                Storage::delete('public/' . $accomplishment->image);
            }
    
        
            $path = $request->file('image')->store('uploads', 'public');
            $accomplishment->image = $path;
        }
    
        $accomplishment->save();
    
        return redirect()->route('accomplishment.index')->with('success', 'Image updated successfully!');
    }
    


    
     
    public function destroy($id)
    {
        $accomplishment = accomplishment_img::findOrFail($id);
 
        if (Storage::exists('public/' . $accomplishment->image)) {
            Storage::delete('public/' . $accomplishment->image);
        }
    
        $accomplishment->delete();
    
        return redirect()->route('accomplishment.index')->with('success', 'Image deleted successfully!');
    }
    
}
