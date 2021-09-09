<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\Truyen;
use App\Models\Chuong;
use App\Models\BinhLuan;
use App\Models\User2;

use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    
    public function trangchu()
    {
        //$truyen=Truyen::orderBy('id_truyen', 'desc')->get();
        $truyen=Truyen::orderBy('id_truyen', 'desc')->paginate(9);
        $theloai=TheLoai::all();
        return view('home.trang_chu',compact('truyen','theloai'));
    }
    public function chitiettruyen($id)
    {
        
        $truyen=Truyen::find($id);
        if($truyen){
            $chuong=Chuong::select('id_chuong','ten_chuong','ngaythem_chuong','luotxem_chuong')->where('id_truyen',$id)->get();
            $binhluan=BinhLuan::where('id_truyen',$id)
            ->join('user2','binhluan.id','user2.id')
            ->orderBy('id_binhluan', 'desc')->get();

            
            return view('home.chi_tiet_truyen',compact('truyen','chuong','binhluan'));
        }
        return "<h1>404 - Không tìm thấy</h1>";
    }
    public function doctruyen($idt,$idc)
    {
        $truyen=Truyen::find($idt);
        $chuong=Chuong::find($idc);
        if($truyen && $chuong){
            $dschuong=Chuong::where('id_truyen',$idt)->get();
            $chuong->luotxem_chuong++;
            $chuong->save();
            return view('home.doc_truyen',compact('chuong','truyen','dschuong'));
        }
        return "<h1>404 - Không tìm thấy</h1>";
        
        
        
    }
    function timkiemtruyen(Request $r){
        $tukhoa=$r->tktk;
        //$lt=LoaiBaiViet::all();
        $truyen=Truyen::join('theloai', 'truyen.id_theloai', 'theloai.id_theloai')
                    ->where('ten_truyen','like',"%$tukhoa%")
                    ->get();//->stake(30)->paginate(5);
        return view('home.tim_kiem_truyen',compact('truyen','tukhoa'));
    }
    public function loc($id_theloai)
    {
        $truyen=Truyen::where('id_theloai',$id_theloai)->paginate(9);
        $xn=$id_theloai;
        $theloai=TheLoai::all();
        return view('home.trang_chu',compact('truyen','theloai','xn'));
    }
}
