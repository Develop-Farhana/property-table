@extends('masters')
@section("content")
<br><br>
<div class="container">
	<h1>Edit Form</h1></div>

<div class="container custom-edit">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
      <form method="POST" action="/edit">
	     @csrf
		  <div class="mb-3">
		  	<input type="hidden" name="id" value="{{$data['id']}}">
		    <label for="id" class="form-label">Name</label>
		    <input type="text" name="name" value="{{$data['name']}}" class="form-control" id="name">  
		  </div>
		  <div class="mb-3">
		    <label for="price"  class="form-label">Price</label>
		    <input type="text" name="price" value="{{$data['price']}}"class="form-control" id="price">
		  </div>
		  <div class="mb-3">
		    <label for="description"  class="form-label">Description</label>
		    <input type="text" name="description" value="{{$data['description']}}"class="form-control" id="description">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Edit</button>
		</form>
	</div>
</div>
</div>
</div>
