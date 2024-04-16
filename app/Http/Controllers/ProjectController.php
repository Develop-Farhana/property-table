<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function showProject()
    {
      $property=Project::all();
        return view('project',['projects'=>$property]);
      }


      
      public function editDemo($id)
    {
        $property = Project::findOrFail($id); // Fetch the property to be edited
        return view('edit-proj', compact('property')); // Pass the property data to the edit view
    }
  
      public function editProject( Request $req )
      {
        $property = Project::find($req->id);
        $property->city=$req->city;
        $property->type=$req->type;
        $property->description=$req->description;
        $property->area=$req->area;
        $property->price=$req->price;
        $property->status=$req->status;
        $property->iframe_link=$req->iframe_link;
       

      

      // Check if a new image is uploaded
      if ($req->hasFile('image')) {
          // Store the new image in the public/images folder
          $image = $req->file('image');
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

   
        return redirect('project'); 
      }


      public function addProject(Request $request)
      {
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

       
        return redirect('project'); 
      }

      public function destroy($id)
    {
      $property=Project::find($id);
      $property->delete();
        return redirect('project');
    }
      

}
