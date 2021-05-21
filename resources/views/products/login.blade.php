
@extends('products.layout')

@section('content')

<div class="container jumbotron" style="margin-top:100px">
  <div class="content-center">

      	<div class="container">
		  <div class="div mx-auto" style="width: 50%">
        	<h3 class="mb-3 text-center">Login</h3>

        	<form action="{{ route('login') }}" method="post">
			@if(session('msg'))
				<div style="width: 20em; margin: 0 auto" class="text-center p-3 mb-2 bg-success text-white">
					{{ session('msg') }}
				</div>
			@endif
			  @csrf

          	<div class="form-group">
            	<input type="text" placeholder="Email" name="email" class="form-control @error('last_name') border border-danger @enderror" value="{{ old('lastst_name') }}">
          	</div>
			  <div class="text-danger">
				@error('last_name')
					{{ $message }}
				@enderror
			  </div>
          	<div class="form-group">
            	<input type="password" placeholder="Password" name="password" class="form-control @error('email') border border-danger @enderror" value="{{ old('email') }}">
          	</div>
			  <div class="text-danger">
				@error('email')
					{{ $message }}
				@enderror
			  </div>
           	<button type="submit" class="btn btn-primary">Login</button>
			  <br> You don't have an account  <a href="{{ url('products.signup') }}" >Sign Up</a>
</div>
        	</form>
      	</div>
    	</div>

  </div>
</div>
@endsection



