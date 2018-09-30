<?php

namespace DtechBook\Book\App\Repositories;

use DtechBook\Book\App\Models\Book;

class BookRepository extends BaseRepository
{
    protected  $book;

    /**
     * BookRepository constructor.
     * @param Book $book
     */
    public function __construct(Book $book)
    {
        parent::__construct();
        $this->book = $book;
    }

    /**
     * Lấy danh sách Book theo phân trang
     *
     * @param int $pageSize
     * @return mixed
     */
    public function paginate($pageSize = 10)
    {
        return Book::paginate($pageSize);
    }

    /**
     * Lấy thông tin Book theo ID của nó
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return Book::find($id);
    }

    /**
     * Xử lý lưu thông tin Book
     *
     * @param $data
     * @return bool
     */
    public function store($data)
    {
        if (Book::create($data)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Xử lý cập nhật thông tin Book
     *
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data)
    {
        $book = Book::find($id);

        if ($book->update($data)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Xử lý xóa thông tin Book
     *
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if ($book->destroy($id)) {
            return true;
        } else {
            return false;
        }
    }
}