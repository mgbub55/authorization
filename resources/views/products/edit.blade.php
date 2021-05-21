@extends('products.layout')


{{-- @section('content') --}}

<div class="ml-auto bg-light p-3">
    <div class="pull-right ml-5">
        <a class="btn btn-primary" href="{{ route('products.index') }}" title="Go back"> <i class="fas fa-book "></i> Dashboard </a>
    </div>
<div class="row text-center">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">

            <h2> <i class="fas text-primary fa-edit  fa-lg"></i>  Edit List</h2>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.update',$product->id) }}" method="POST" style="width: 500px" class="mx-auto">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description</strong>
                <textarea class="form-control" style="height:150px" name="detail"
                    placeholder="Description">{{ $product->detail }}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
</div>

{{-- @endsection --}}
