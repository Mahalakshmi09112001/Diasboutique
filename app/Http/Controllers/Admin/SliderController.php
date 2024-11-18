<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $sliders = Slider::all(); // Fetch all sliders
        return view('admin.sliders.index', compact('sliders')); // Pass to the view
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('admin.sliders.create'); // Return the creation form
    }

    // Store a newly created resource in storage
    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    // Store the image
    $imagePath = $request->file('image')->store('sliders', 'public');

    // Create the slider
    Slider::create([
        'image' => $imagePath,
        'title' => $request->title,
        'description' => $request->description,
    ]);

    return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully.');
}

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $slider = Slider::findOrFail($id); // Find the slider or return 404
        return view('admin.sliders.edit', compact('slider')); // Return the edit view
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id); // Find the slider or return 404

        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp', // Optional image validation
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // If a new image is uploaded
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($slider->image); // Delete old image
            $imagePath = $request->file('image')->store('sliders', 'public'); // Store new image
            $slider->image = $imagePath; // Update the image path
        }

        // Update other fields
        $slider->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id); // Find the slider or return 404

        Storage::disk('public')->delete($slider->image); // Delete the associated image
        $slider->delete(); // Delete the slider record

        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
