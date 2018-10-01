@extends('book::layout')
@section('title', trans('book::book.show_a_book'))
@section('content')
    <h3>{{ trans('book::book.book_store') }}</h3>
    <p><a href="{{ route('books.index_path') }}">{{ trans('book::book.home') }}</a></p>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header">{{ trans('book::book.show') }}</h5>
                <div class="card-body">
                    <label for="title">{{ trans('book::book.title') }}:</label>&nbsp;{{ $book->title }}
                    <br>
                    <label for="author">{{ trans('book::book.author') }}:</label>&nbsp;{{ $book->author }}
                </div>
            </div>
        </div>
    </div>
@endsection