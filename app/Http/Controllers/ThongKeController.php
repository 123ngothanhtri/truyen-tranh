<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chuong;
use App\Models\Truyen;
use App\Models\LienHe;
use App\Models\TheLoai;
use App\Models\BinhLuan;
use App\Models\User2;
use Illuminate\Support\Facades\DB;
class ThongKeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function thongke()
    {
        $top3truyen = DB::table('truyen')
        ->select('ten_truyen','hinhanh_truyen')
        ->selectRaw('(select sum(luotxem_chuong) from chuong where chuong.id_truyen=truyen.id_truyen) as tongluotxem')
        //->havingRaw('tongluotxem is not null')
        ->orderByRaw('tongluotxem desc')
        ->limit(3)
        ->get();

        $top3truyenComment = DB::table('truyen')
        ->select('ten_truyen','hinhanh_truyen')
        ->selectRaw('(select count(id_binhluan) from binhluan where binhluan.id_truyen=truyen.id_truyen) as soluong')
        //->havingRaw('tongluotxem is not null')
        ->orderByRaw('soluong desc')
        ->limit(3)
        ->get();

        

        $top3UserComment = DB::table('user2')
        ->select('name','email')
        ->selectRaw('(select count(id_binhluan) from binhluan where binhluan.id=user2.id) as soluong')
        ->orderByRaw('soluong desc')
        ->limit(3)
        ->get();
        
        $TruyenTheoLoai = DB::table('theloai')
        ->select('ten_theloai')
        ->selectRaw('(select count(id_truyen) from truyen where truyen.id_theloai=theloai.id_theloai) as soluong')
        ->orderByRaw('soluong desc')
        ->get();

        $chuong = Chuong::select('id_chuong')->get();
        $truyen=Truyen::select('id_truyen')->get();
        $theloai=TheLoai::select('id_theloai')->get();
        $lienhe=LienHe::select('id_lienhe')->get();
        $user2=User2::select('id')->get();
        $binhluan=BinhLuan::select('id_binhluan')->get();

        return view('admin.thong_ke',compact(
            'top3truyen',
            'top3truyenComment',
            'top3UserComment',
            'TruyenTheoLoai',
            'chuong',
            'truyen',
            'theloai',
            'lienhe',
            'user2',
            'binhluan'
        ));
    }
}
