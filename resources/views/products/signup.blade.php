
@extends('products.layout')

@section('content')

<div class="container jumbotron" style="margin-top:100px">
  <div class="content-center">

      	<div class="container">
		  <div class="div mx-auto" style="width: 50%">

        	<h3 class="mb-3 text-center">Sign Up</h3>
        	<form action="{{ route('register') }}" method="post">
			  @csrf
              <div class="form-group">
            	<input type="text" placeholder="Full Name" name="name" class="form-control @error('name') border border-danger @enderror" value="{{ old('first_name') }}">
          	</div>
			  <div class="text-danger">
				@error('name')
					{{ $message }}
				@enderror
			  </div>


          	<div class="form-group">
            	<input type="text" placeholder="Email" name="email" class="form-control @error('email') border border-danger @enderror" value="{{ old('lastst_name') }}">
          	</div>
			  <div class="text-danger">
				@error('email')
					{{ $message }}
				@enderror
			  </div>
          	<div class="form-group">
            	<input type="password" placeholder="Password" name="password" class="form-control @error('passowrd') border border-danger @enderror" value="{{ old('email') }}">
          	</div>
			  <div class="text-danger">
				@error('password')
					{{ $message }}
				@enderror
			  </div>
           	<button type="submit" class="btn btn-primary">Sign Up</button>
			   Already have an account  <a href="{{ url('products.login') }}" >Login</a>

</div>
        	</form>
            {{-- @foreach ($users as $user)
                {{ $user->error }}
                {{ $user->fix }}
            @endforeach --}}
      	</div>
    	</div>

  </div>
</div>
@endsection



