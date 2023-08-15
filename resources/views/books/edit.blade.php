<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa thông tin sách</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Chỉnh sửa thông tin sách</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ten_sach">Tên sách:</label>
            <input type="text" id="ten_sach" name="ten_sach" value="{{ $book->ten_sach }}" required>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" value="{{ $book->isbn }}" required>
        </div>
        <div class="form-group">
            <label for="tac_gia">Tác giả:</label>
            <select id="tac_gia" name="tac_gia" required>
                <option value="">Chọn tác giả</option>
                @foreach($authors as $author)
                    <option value="{{ $author }}" {{ $book->tac_gia == $author ? 'selected' : '' }}>{{ $author }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="the_loai">Thể loại:</label>
            <select id="the_loai" name="the_loai" required>
                <option value="">Chọn thể loại</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre }}" {{ $book->the_loai == $genre ? 'selected' : '' }}>{{ $genre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="so_trang">Số trang:</label>
            <input type="number" id="so_trang" name="so_trang" value="{{ $book->so_trang }}" required>
        </div>
        <div class="form-group">
            <label for="nam_xuat_ban">Năm xuất bản:</label>
            <input type="number" id="nam_xuat_ban" name="nam_xuat_ban" value="{{ $book->nam_xuat_ban }}" max="{{ date('Y') }}" required>
        </div>
        <button type="submit">Lưu dữ liệu</button>
    </form>
</body>
</html>