
@extends('products.layout')

@section('content')

<div class="container jumbotron" style="margin-top:100px;">
  <div class="content-center">

      	<div class="container text-center">
        	<h3 class="mb-3"><i class="fa fa-lock fa-lg text-danger"></i></h3>

            <i class="text-primary">Every user must signup or login</i>

            <h1 class="text-danger mb-3">USER AUTHENTICATION</h1>

        	<form action="" method="post">

            <a href="{{ url('products.signup') }}" class="btn btn-outline-primary">Sign Up</a>
            <a href="{{ url('products.login') }}" class="btn btn-primary px-3 mx-2">Login</a>


        	</form>
      	</div>
    	</div>

  </div>
</div>
@endsection



