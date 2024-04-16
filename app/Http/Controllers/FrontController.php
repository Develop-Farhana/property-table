<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;


class FrontController extends Controller
{
    //
    
    public function show()
    {
        $properties = Project::all(); // Fetch all properties from the database
        return view('frontend.back', ['properties' => $properties]);
    }

   
}
