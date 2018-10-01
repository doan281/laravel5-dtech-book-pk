@extends('book::layout')
@section('title', trans('book::book.edit_a_book'))
@section('content')
    <h3>{{ trans('book::book.book_store') }}</h3>
    <p><a href="{{ route('books.index_path') }}">{{ trans('book::book.home') }}</a></p>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header">{{ trans('book::book.edit') }}</h5>
                <div class="card-body">
                    @if(isset($errors))
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{ route('books.update_path', [$book->id] ) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{ $book->id }}">
                        <div class="form-group">
                            <label for="title">{{ trans('book::book.title') }}</label>
                            <input type="text" class="form-control" name="title" value="{{ $book->title }}">
                        </div>
                        <div class="form-group">
                            <label for="author">{{ trans('book::book.author') }}</label>
                            <input type="text" class="form-control" name="author" value="{{ $book->author }}">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ trans('book::book.save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection