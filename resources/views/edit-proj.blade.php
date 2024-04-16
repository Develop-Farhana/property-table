@extends('masters')
@section("content")
<br><br>
<div class="container">
	<h1>Edit Form</h1></div>

<div class="container custom-edit">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
      <form method="POST" action="/edit-proj" enctype="multipart/form-data">
	     @csrf
         <div class="mb-3">
                                    <label for="cityDropdown" class="form-label">City</label>
                                    <select class="form-select" id="city" name="city">
                                        <option value="" disabled>Select City</option>
                                        <option value="Bhopal" {{ $property->city === 'Bhopal' ? 'selected' : '' }}>
                                            Bhopal
                                        </option>
                                        <option value="Jabalpur" {{ $property->city === 'Jabalpur' ? 'selected' : '' }}>
                                            Jabalpur</option>
                                        <option value="Chhindwara"
                                            {{ $property->city === 'Chhindwara' ? 'selected' : '' }}>
                                            Chhindwara</option>
                                        <option value="Seoni" {{ $property->city === 'Seoni' ? 'selected' : '' }}>Seoni
                                        </option>
                                        <option value="Nagpur" {{ $property->city === 'Nagpur' ? 'selected' : '' }}>
                                            Nagpur
                                        </option>
                                    </select>
                                </div>
            <div class="mb-3">
		  	<input type="hidden" name="id" value="{{$property['id']}}">
		    <label for="id" class="form-label">Property Type</label>
		    <input type="text" name="type" value="{{$property['type']}}" class="form-control" id="type">  
		  </div>
          <div class="mb-3">
		    <label for="description"  class="form-label">Description</label>
		    <input type="text" name="description" value="{{$property['description']}}"class="form-control" id="description">
		  </div>
		  <div class="mb-3">
		    <label for="price"  class="form-label">Sq.Ft</label>
		    <input type="text" name="area" value="{{$property['area']}}"class="form-control" id="area">
		  </div>
		  <div class="mb-3">
		    <label for="price"  class="form-label">Price</label>
		    <input type="text" name="price" value="{{$property['price']}}"class="form-control" id="price">
		  </div>
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="" disabled>Select Status</option>
                <option value="completed"
                    {{$property->status === 'completed' ? 'selected' : '' }}>Completed
                </option>
                <option value="NearCompletion"
                    {{$property->status === 'NearCompletion' ? 'selected' : '' }}>Near
                    Completion</option>
                <option value="Active"
                    {{$property->status === 'Active' ? 'selected' : '' }}>
                    Active</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="price"  class="form-label">iFrame Link</label>
            <input type="text" name="iframe" value="{{$property['price']}}"class="form-control" id="iframe">
        </div>
        <div class="mb-3">
            <label for="price"  class="form-label">Add Property Image</label>
            <input type="file" name="image" value="{{$property['image']}}"class="form-control" id="image">
        </div>
		  <button type="submit" class="btn btn-primary">Edit</button>
		</form>
	</div>
</div>
</div>
</div>
