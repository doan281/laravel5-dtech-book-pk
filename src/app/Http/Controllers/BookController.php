<?php

namespace DtechBook\Book\App\Http\Controllers;

use DtechBook\Book\App\Http\Requests\Book\DeleteBookRequest;
use DtechBook\Book\App\Http\Requests\Book\EditBookRequest;
use DtechBook\Book\App\Http\Requests\Book\ShowBookRequest;
use DtechBook\Book\App\Http\Requests\Book\StoreBookRequest;
use DtechBook\Book\App\Http\Requests\Book\UpdateBookRequest;
use DtechBook\Book\App\Models\Book;
use DtechBook\Book\App\Repositories\BookRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    protected $bookRepository;

    /**
     * BookController constructor.
     * @param BookRepository $bookRepository
     */
    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * Danh sách Book
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $pageSize = config('book.pageSize', 10);

        $books = $this->bookRepository->paginate($pageSize);

        return view('book::index', compact('books'));
    }

    /**
     * Form tạo Book
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('book::create');
    }

    /**
     * Xử lý lưu thông tin Book
     *
     * @param StoreBookRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBookRequest $request)
    {
        $this->bookRepository->store($request->all());

        return redirect()->route('books.index_path');
    }

    /**
     * Hiển thị thông tin chi tiết Book
     *
     * @param ShowBookRequest $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(ShowBookRequest $request, $id)
    {
        $book = $this->bookRepository->findById($id);

        return view('book::show', compact('book'));
    }

    /**
     * Form cập nhật thông tin Book
     *
     * @param EditBookRequest $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(EditBookRequest $request, $id)
    {
        $book = $this->bookRepository->findById($id);

        return view('book::edit', compact('book'));
    }

    /**
     * Xử lý cập nhật thông tin Book
     *
     * @param UpdateBookRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBookRequest $request, $id)
    {
        $this->bookRepository->update($id, $request->all());

        return redirect()->route('books.index_path');
    }

    /**
     * Xử lý xóa thông tin Book
     *
     * @param DeleteBookRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(DeleteBookRequest $request, $id)
    {
        $this->bookRepository->destroy($id);

        return redirect()->route('books.index_path');
    }
}
