@extends('masters')
@section("content")
<br><br>
<div class="container">
	<h1> Product Data
   <a href="add" class="btn btn-outline-primary">Add Products</a>
   <a href="/logout" class="btn btn-outline-warning">Logout</a>
  </h1>
</div>
<table class="table table-hover table-bordered">
  <thead>
    <tr>  
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $item)
    <tr>
      <td>{{$item['name']}}</td>
      <td>{{$item['price']}}</td>
      <td>{{$item['description']}}</td>
      <td>
      <a href={{"edit/".$item['id']}}  class="btn btn-outline-success">Edit</a>
     <a href={{"delete/".$item['id']}} class="btn btn-outline-Danger">Delete</a>
         
      </td>
    </tr>
    @endforeach
  </tbody>
</table>