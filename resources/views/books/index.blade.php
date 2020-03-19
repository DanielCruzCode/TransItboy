{{-- @extends('books.layout') --}}
@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Books</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-outline-success my-3" href="{{ route('books.create') }}"> Create New Book</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
     <div class="alert alert-success alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ $message }}</p>
      </div>
    @endif


    <table class="table table-striped table-borderless table-hover">
        <thead class="thead-dark">
            <tr>
                <th>N°</th>
                <th>Name</th>
                <th>Details</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
	    @foreach ($books as $book)
	    <tbody>
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->detail }}</td>
                <td>
                    <form action="{{ route('books.destroy',$book->id) }}" method="POST">
                        <a class="btn btn-outline-info" href="{{ route('books.show',$book->id) }}">Mostrar</a>
                        <a class="btn btn-outline-dark" href="{{ route('books.edit',$book->id) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Borrar</button>
                    </form>
                </td>
            </tr>
	    </tbody>
	    @endforeach
    </table>


@endsection