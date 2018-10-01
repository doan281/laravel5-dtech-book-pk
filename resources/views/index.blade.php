@extends('book::layout')
@section('title', trans('book::book.book_list'))
@section('content')
    <h3>{{ trans('book::book.book_list') }}</h3>
    <div><a href="{{ route('books.create_path') }}">{{ trans('book::book.create') }}</a></div>
    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">{{ trans('book::book.book_title') }}</th>
                <th class="text-center">{{ trans('book::book.author') }}</th>
                <th class="text-center">{{ trans('book::book.created_at') }}</th>
                <th class="text-center">{{ trans('book::book.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td></td>
                <td>
                    <a href="{{ route('books.show_path', [$book->id]) }}">{{ trans('book::book.show') }}</a> |
                    <a href="{{ route('books.edit_path', [$book->id]) }}">{{ trans('book::book.edit') }}</a>
                    <form action="{{ route('books.destroy_path', [$book->id]) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="{{ trans('book::book.delete') }}">
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="4">{{ trans('book::book.no_data') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="text-center">{{ $books->links() }}</div>
    </div>
@endsection