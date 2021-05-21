@extends('products.layout')

@section('content')

<div class="container jumbotron" style="margin-top:50px">
     {{-- <div class="text-center">
        <table class="table table-responsive">


            @foreach ($products as $product)
                 <h3>Welcome {{ $product->name }}</h3>
        </table>
        </div>

            @endforeach --}}

    <div class="content-center">

      <h6 class="ml-3"><i class="fas  fa-book  fa-lg"></i> MVC TO DO LIST</h6>

      @if ($errors->any())
    <div class="alert alert-danger">
        <strong><i class="fas fa-plus-circle"></i> Error!</strong> There were some problems with your input. <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="row">
          <div class="col-md-6">
            <div class="container mt-4">
              <form action="{{ route('products.store') }}" method="post">
                @csrf
                <div class="row">
                    <form action="" method="post">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Tittle:</strong>
                          <input type="text" name="name" class="form-control" placeholder="Tittle">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Description:</strong>
                          <textarea class="form-control" style="height:100px" name="detail"
                              placeholder="description"></textarea>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </div>

              </form>
            </div>
          </div>
          <div class="col-md-6">
              <form action="{{ route('logout')}}" method="post">
                  @csrf
              <div class="div d-flex justify-content-end">
              <button title="Logout" type="submit" class="btn btn text-danger" style="border: none; background-color:transparent;">
                  <i class="fas  fa-book  fa-lg"></i> Logout
              </button>
              </div>
              </form>
              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif
          <table class="table table-responsive">
              <tr>
                  <th>#</th>
                  <th>Tittle</th>
                  <th>Description</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
              @foreach ($products as $product)
                  <tr>
                      <td>{{ $product->id }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->detail }}</td>
                      <td>
                        <a href="{{ route('products.edit',$product->id) }}" title="edit" class="btn btn" style="border: none; background-color:transparent;">
                            <i class="fas text-primary fa-edit  fa-lg"></i>
                        </a>
                      </td>
                      <td>
                          <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                              @csrf
                              @method('DELETE')

                              <button type="submit" title="delete" onclick="return confirm('Are you sure you want to delete?')" style="border: none; background-color:transparent; padding: 10px; outline: 0;">
                                  <i class="fas fa-trash fa-lg text-danger"></i>
                              </button>
                          </form>
                      </td>
                  </tr>
              @endforeach


        </div>

          </div>
        </div>
    </div>
  </div>



@endsection
