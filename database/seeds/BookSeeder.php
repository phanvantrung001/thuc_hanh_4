<?php

namespace Database\Seeders;

use App\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [
                'ten_sach' => 'Dế mèn phiêu lưu kí',
                'isbn' => '76578878650',
                'tac_gia' => 'Tô hoài',
                'the_loai' => 'Đời sống',
                'so_trang' => 100,
                'nam_xuat_ban' => 1992,
            ],
            [
                'ten_sach' => 'Sóng',
                'isbn' => '098990889',
                'tac_gia' => 'Xuân Quỳnh',
                'the_loai' => 'Thơ',
                'so_trang' => 10,
                'nam_xuat_ban' => 1999,
            ],
            [
                'ten_sach' => 'mẹ em bắt chia tay ',
                'isbn' => '789099',
                'tac_gia' => 'Author 2',
                'the_loai' => 'Genre 2',
                'so_trang' => 200,
                'nam_xuat_ban' => 2019,
            ],
            [
                'ten_sach' => 'Chúng ta không thuộc về nhau',
                'isbn' => '3546',
                'tac_gia' => 'Phan Văn Trung',
                'the_loai' => 'Tình cảm',
                'so_trang' => 200,
                'nam_xuat_ban' => 2019,
            ],
            [
                'ten_sach' => 'chia tay đi ',
                'isbn' => '34534',
                'tac_gia' => 'Thái Phi Hùng',
                'the_loai' => 'Tình Cảm',
                'so_trang' => 200,
                'nam_xuat_ban' => 2019,
            ],
            [
                'ten_sach' => 'anh yêu em ',
                'isbn' => '43657',
                'tac_gia' => 'Nguyễn Hữu Khương',
                'the_loai' => 'tình cảm',
                'so_trang' => 200,
                'nam_xuat_ban' => 2019,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}