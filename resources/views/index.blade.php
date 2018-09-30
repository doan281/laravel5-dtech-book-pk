@extends('book::layout')
@section('title', 'Book list')
@section('content')
    <h3>Book List</h3>
    <div><a href="{{ route('books.create_path') }}">Create</a></div>
    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">Book name</th>
                <th class="text-center">Author</th>
                <th class="text-center">Created at</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td></td>
                <td>
                    <a href="{{ route('books.show_path', [$book->id]) }}">show</a>
                    <a href="{{ route('books.edit_path', [$book->id]) }}">edit</a>
                    <form action="{{ route('books.destroy_path', [$book->id]) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="delete">
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="3">Không có dữ liệu</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="text-center">{{ $books->links() }}</div>
    </div>
@endsection