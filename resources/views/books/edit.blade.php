{{-- @extends('books.layout') --}}
@extends('layouts.app')


@section('content')
<div class="card bg-dark text-white">
  <div class="card-body">
    <div class="card-title">
        <h2 class="text-center">Edit Book</h2>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('books.update',$book->id) }}" method="POST">
        @csrf
        @method('PUT')


         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $book->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $book->detail }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-lg btn-light">Submit</button>
            </div>
        </div>


    </form>
     <div class="pull-right">
        <a class="btn btn-outline-light" href="{{ route('books.index') }}"> Back</a>
    </div>

  </div>
</div>


@endsection