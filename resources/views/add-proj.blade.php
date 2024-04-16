@extends('masters')
@section("content")
<br><br>
<div class="container"><h1>Add Products</h1></div>


<div class="container custom-product">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
      <form method="POST" action="" enctype="multipart/form-data">
	     @csrf
         <div class="mb-3">
            <label for="cityDropdown" class="form-label">City</label>
            <select class="form-select" id="city" name="city">
                <option value="" disabled selected>Select City</option>
                <option value="Bhopal">Bhopal</option>
                <option value="Jabalpur">Jabalpur</option>
                <option value="Chhindwara">Chhindwara</option>
                <option value="Seoni">Seoni</option>
                <option value="Nagpur">Nagpur</option>
            </select>
        </div>
		  <div class="mb-3">
		  	<input type="hidden" name="id">
		    <label for="name" class="form-label">Property Type</label>
		    <input type="text" name="type"  class="form-control"id="type" >  
		  </div>
		  <div class="mb-3">
		    <label for="description"  class="form-label"> Property Description</label>
		    <input type="text" name="description" class="form-control" id="description">
		  </div>
          <div class="mb-3">
		    <label for="price"  class="form-label">Sq.Ft</label>
		    <input type="text" name="area" class="form-control" id="area">
		  </div>
          <div class="mb-3">
		    <label for="price"  class="form-label">Price</label>
		    <input type="text" name="price" class="form-control" id="price">
		  </div>

          <div class="mb-3">
            <label for="status" class="form-label">status</label>
            <select class="form-select" id="status" name="status">
                <option value="" disabled selected>Select Status</option>
                <option value="completed">completed</option>
                <option value="NearCompletion">NearCompletion</option>
                <option value="Active">Active</option>
            </select>
        </div>
        <div class="mb-3">
        <label for="formFile" class="form-label">Add Property Image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <div class="mb-3">
    <label for="iframe" class="form-label">iFrame Link</label>
    <textarea class="form-control" id="iframe" name="iframe" placeholder="Paste iframe link Here for 3D model"
        rows="3" style="resize: none;"></textarea>
        </div>

		  <button type="submit" class="btn btn-primary">Save</button>
		</form>
	</div>
</div>
</div>
</div>
