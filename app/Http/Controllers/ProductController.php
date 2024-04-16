<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    
    function showData()
    {
      $data=Product::all();
      return view('dash',['products'=>$data]);
    }

    

    function delete($id)
     {
        $data=Product::find($id);
        $data->delete();
        return redirect('Dashboard');
     }

      function saveData($id)
     {
        $data =Product::find($id);
        return view('edit',['data'=>$data]);

     }
     //in form we need Request
     function update(Request $req)
     {
       // return  $req->input();
        $data = Product::find($req->id);
        $data->name=$req->name;
        $data->price=$req->price;
        $data->description=$req->description;
        $data->save();
        return redirect('Dashboard');
        


     }

     function addData(Request $req)
     {
        
       $product = new Product;
       $product->id=$req->id;
       $product->name=$req->name;
       $product->price=$req->price;
       $product->description=$req->description;
       $product->save();
       return redirect('Dashboard'); 
     }
}

