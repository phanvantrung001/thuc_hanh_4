<?php

namespace App\Http\Controllers;
use App\Book;


use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('books.index', ['books' => $books]);
    }
    public function create()
    {
        $books = Book::all();
        return view('books.create', compact('books'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ten_sach' => 'required',
            'isbn' => 'required|unique:books',
            'tac_gia' => 'required',
            'the_loai' => 'required',
            'so_trang' => 'required|numeric',
            'nam_xuat_ban' => 'required|numeric|max:' . date('Y'),
        ], [
            'isbn.unique' => 'ISBN đã tồn tại.',
            'so_trang.numeric' => 'Số trang phải là số.',
            'nam_xuat_ban.numeric' => 'Năm xuất bản phải là số.',
            'nam_xuat_ban.max' => 'Năm xuất bản không được quá năm hiện tại.',
        ]);
        $books = new Book();
        $books->ten_sach = $request->ten_sach;
        $books->isbn = $request->isbn;
        $books->tac_gia = $request->tac_gia;
        $books->the_loai = $request->the_loai;
        $books->so_trang = $request->so_trang;
        $books->nam_xuat_ban = $request->nam_xuat_ban;

    
        $books->save();
        return redirect()->route('books.index')->with('success', 'Thêm sách thành công!');
    
    }
    public function edit($id)
{
    $book = Book::findOrFail($id);
    $authors = ['Tác giả 1', 'Tác giả 2', 'Tác giả 3', 'Tác giả 4', 'Tác giả 5'];
    $genres = ['Thể loại 1', 'Thể loại 2', 'Thể loại 3', 'Thể loại 4', 'Thể loại 5'];

    return view('books.edit', compact('book', 'authors', 'genres'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'ten_sach' => 'required',
        'isbn' => 'required|unique:books,isbn,' . $id,
        'tac_gia' => 'required',
        'the_loai' => 'required',
        'so_trang' => 'required|numeric',
        'nam_xuat_ban' => 'required|numeric|max:' . date('Y'),
    ], [
        'isbn.unique' => 'ISBN đã tồn tại.',
        'so_trang.numeric' => 'Số trang phải là số.',
'nam_xuat_ban.numeric' => 'Năm xuất bản phải là số.',
        'nam_xuat_ban.max' => 'Năm xuất bản không được vượt quá năm hiện tại.',
    ]);

    $book = Book::findOrFail($id);
    $book->ten_sach = $request->ten_sach;
    $book->isbn = $request->isbn;
    $book->tac_gia = $request->tac_gia;
    $book->the_loai = $request->the_loai;
    $book->so_trang = $request->so_trang;
    $book->nam_xuat_ban = $request->nam_xuat_ban;
    $book->save();

    return redirect()->route('books.index')->with('success', 'Cập nhật thông tin sách thành công!');
}
public function destroy($id)
{
    $book = Book::findOrFail($id);
    $book->delete();

    return redirect()->route('books.index')->with('success', 'Xoá sách thành công!');
}

}