@extends('book::layout')
@section('title', 'Create a book')
@section('content')
    <h3>Book Store</h3>
    <p><a href="{{ route('books.index_path') }}">Home</a></p>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header">Create</h5>
                <div class="card-body">
                    @if(isset($errors))
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{ route('books.store_path') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" name="author">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
