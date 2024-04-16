<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function create()
    {
        return view('admin.Add_Property');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'city' => 'required',
            'type' => 'required',
            'description' => 'required',
            'area' => 'required',
            'price' => 'required',
            'status' => 'required',
            'iframe' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg', // Max file size 2MB
        ]);

        // Store the image in the public/images folder
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;

        // Create a new property instance
        $property = new Project();
        $property->city = $validatedData['city'];
        $property->type = $validatedData['type'];
        $property->description = $validatedData['description'];
        $property->area = $validatedData['area'];
        $property->price = $validatedData['price'];
        $property->status = $validatedData['status'];
        $property->iframe_link = $validatedData['iframe'];
        $property->image = $imagePath; // Save the image path
        $property->save();

        // Redirect back or to any other page after successful submission

        // Flash success message

// Redirect to home page with the success message
        $successMessage = 'Property added successfully.';

// Redirect to the home page with the success message
        return redirect()->route('main', compact('successMessage'));

    }

    public function index()
    {
        $properties = Project::all(); // Fetch all properties from the database
        return view('admin.welcome', ['properties' => $properties]);
    }

    public function show()
    {
        $properties = Project::all(); // Fetch all properties from the database
        return view('admin.view', ['properties' => $properties]);
    }

    public function edit($id)
    {
        $property = Project::findOrFail($id); // Fetch the property to be edited
        return view('admin.edit', compact('property')); // Pass the property data to the edit view
    }

    public function update(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'city' => 'required',
            'type' => 'required',
            'description' => 'required',
            'area' => 'required',
            'price' => 'required',
            'status' => 'required',
            'iframe' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg', // Allow null or image file types
        ]);

        $property=Project::find($req->id); // Fetch the property to be updated
        $property->city = $validatedData['city'];
        $property->type = $validatedData['type'];
        $property->description = $validatedData['description'];
        $property->area = $validatedData['area'];
        $property->price = $validatedData['price'];
        $property->status = $validatedData['status'];
        $property->iframe_link = $validatedData['iframe'];

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Store the new image in the public/images folder
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;

            // Delete the old image if exists
            if ($property->image) {
                // Delete the old image file from storage
                $oldImagePath = public_path($property->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Update the property's image path with the new image path
            $property->image = $imagePath;
        }

        $property->save();

        return redirect()->route('main')->with('success', 'Property updated successfully.');
    }

    public function destroy(Project $property)
    {
        $property->delete();
        return redirect()->back()->with('success', 'Property deleted successfully.');
    }

}
