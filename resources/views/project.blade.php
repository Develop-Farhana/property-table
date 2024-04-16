@extends('masters')
@section("content")
<br><br>
<div class="container">
	<h1> Project Data
   <a href="addprojects" class="btn btn-outline-primary">Add Products</a>
   <a href="/logout" class="btn btn-outline-warning">Logout</a>
  </h1>
</div>
<table class="table table-hover table-bordered">
  <thead>
    <tr>  
                      <th>City</th>
                    <th>Property Type</th>
                    <th>Property Description</th>
                    <th>sq.ft area</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($projects as $property)
    <tr>
    <td>{{$property['city']}}</td>
      <td>{{$property['type']}}</td>
      <td>{{$property['description']}}</td>
      <td>{{$property['area']}}</td>
      <td>{{$property['price']}}</td>
      <td>{{$property['status']}}</td>  
      <td>
      <a href="{{ asset($property->image) }}" target="_blank">
          <img src="{{ asset($property->image) }}" alt="Property Image" style="max-width: 90px;">
      </a>
</td>
<td>
      <a href={{"edit-proj/".$property['id']}}  class="btn btn-outline-success">Edit</a>
     <a href={{"delete-proj/".$property['id']}} class="btn btn-outline-Danger">Delete</a>
         
      </td>
    </tr>
    @endforeach
  </tbody>
</table>