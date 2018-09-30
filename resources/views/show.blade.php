@extends('book::layout')
@section('title', 'Show a book')
@section('content')
    <h3>Book Store</h3>
    <p><a href="{{ route('books.index_path') }}">Home</a></p>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header">Show</h5>
                <div class="card-body">
                    <label for="title">Title:</label>&nbsp;{{ $book->title }}
                    <br>
                    <label for="author">Author:</label>&nbsp;{{ $book->author }}
                </div>
            </div>
        </div>
    </div>
@endsection