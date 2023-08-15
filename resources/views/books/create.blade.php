<!DOCTYPE html>
<html>
<head>
    <title>Thêm sách mới</title>
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
    <h1>Thêm sách mới</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ten_sach">Tên sách:</label>
            <input type="text" id="ten_sach" name="ten_sach" required>
        </div>
        <div class="form-group">
    <label for="isbn">ISBN:</label>
    <input type="text" id="isbn" name="isbn" value="" required>
</div>
        <div class="form-group">
            <label for="tac_gia">Tác giả:</label>
            <select id="tac_gia" name="tac_gia" required>
                <option value="">Chọn tác giả</option>
                <option value="Tác giả 1">Phan Văn Trung</option>
                <option value="Tác giả 2">Nguyễn Hữu Khương</option>
                <option value="Tác giả 3">Tô hoài</option>
            </select>
        </div>
        <div class="form-group">
            <label for="the_loai">Thể loại:</label>
            <select id="the_loai" name="the_loai" required>
                <option value="">Chọn thể loại</option>
                <option value="Thể loại 1">Tình cảm</option>
                <option value="Thể loại 2">Thơ</option>
                <option value="Thể loại 3">Văn</option>
            </select>
        </div>
        <div class="form-group">
            <label for="so_trang">Số trang:</label>
            <input type="number" id="so_trang" name="so_trang" required>
        </div>
        <div class="form-group">
            <label for="nam_xuat_ban">Năm xuất bản:</label>
            <input type="number" id="nam_xuat_ban" name="nam_xuat_ban" max="{{ date('Y') }}" required>
        </div>
        <button type="submit">Lưu dữ liệu</button>
    </form>
</body>
</html>