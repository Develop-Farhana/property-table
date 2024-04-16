@extends('masters')
@section("content")

<br><br>
<div class="container">
	<h1>Login Form</h1></div>
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
      <form method="POST" action="">
	     @csrf
		  <div class="mb-3">
		  	<input type="hidden" name="id">
		    <label for="name" class="form-label">Name</label>
		    <input type="text" name="name" class="form-control" id="name">  
		  </div>
		  <div class="mb-3">
		    <label for="password"  class="form-label">Password</label>
		    <input type="password" name="password"class="form-control" id="password">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Login</button>
		</form>
	</div>
</div>
</div>
</div>
</div>