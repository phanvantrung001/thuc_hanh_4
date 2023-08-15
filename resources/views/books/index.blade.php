<!DOCTYPE html>
<html>
<head>
    <title>Danh sách</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Danh sách</h1>

    <div class="search_box">
        <div class="search_wrapper">
            <form class="form-inline my-2 my-lg-0" action="{{ route('books.index') }}" method="GET">
                <div class="input-group">
                    <input class="form-control" name="search" type="text" placeholder="Tìm kiếm">
                    <button class="btn btn-success" type="submit">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>

    <a href="{{ route('books.create') }}" class="btn btn-info">Thêm chi tiêu</a>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sách</th>
                <th>Isbn</th>
                <th>Tác giả</th>
                <th>Thể loại</th>
                <th>Số trang</th>
                <th>Năm Xuất bản</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->ten_sach }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->tac_gia }}</td>
                    <td>{{ $book->the_loai }}</td>
                    <td>{{ $book->so_trang }}</td>
                    <td>{{ $book->nam_xuat_ban }}</td>
                    <td>
                        <form action="{{ route('books.destroy', $book->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Sửa</a>
                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function confirmDelete(form) {
            if (confirm('Bạn có muốn xoá sách?')) {
                form.submit();
            }
        }
    </script>
</body>
</html>