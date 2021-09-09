<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\Truyen;
use App\Models\Chuong;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\Storage;
class TruyenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $truyen = Truyen::join('theloai', 'truyen.id_theloai', 'theloai.id_theloai')->orderBy('id_truyen', 'desc')->paginate(10);
        return view('admin.truyen',compact('truyen'));
    }

    public function create()
    {
        $tl=TheLoai::all();
        return view('admin.truyen_them',['tl'=>$tl]);
    }

    public function store(Request $r)
    {
        $new =new Truyen;
        $new->ten_truyen = $r->ipt;
        $new->id_theloai = $r->iptl;
        $new->trangthai_truyen = $r->iptt;
        $new->ngayphathanh_truyen = date('Y-m-d');
        $new->mota_truyen = $r->ipmt;
        $new->tacgia_truyen = $r->iptg;
        $new->hinhanh_truyen = $r->ipha;
        //$new->hinhanh_truyen = $r->file('ipha')->store('hinhanh','public');
        //Storage::disk('public')->putFile('hinhanh', $r->file('input_hinhanh'));
        $new->save();
        return redirect('/truyen')->with('success','Thêm thành công');
    }

    public function edit($id)
    {
        $truyen = Truyen::find($id);
        $theloai = TheLoai::all();
        return view('admin.truyen_sua',compact('truyen','theloai'));
    }

    public function update(Request $r)
    {
        $capnhat=Truyen::find($r->ipidt);
        $capnhat->ten_truyen = $r->ipt;
        $capnhat->id_theloai = $r->iptl;
        $capnhat->trangthai_truyen = $r->iptt;
        $capnhat->mota_truyen = $r->ipmt;
        $capnhat->tacgia_truyen = $r->iptg;
        if($r->ipha){
            $capnhat->hinhanh_truyen = $r->ipha;
        }
        //$capnhat->hinhanh_truyen = $r->file('ipha')->store('hinhanh','public');
        //Storage::disk('public')->putFile('hinhanh', $r->file('input_hinhanh'));
        $capnhat->save();
        return redirect('/truyen')->with('success','Cập nhật thành công');
    }

    public function destroy($id)
    {
        Chuong::where('id_truyen',$id)->delete();
        BinhLuan::where('id_truyen',$id)->delete();
        Truyen::find($id)->delete();
        //Storage::disk('public')->delete($xoa->hinhanh_truyen);
        return back()->with('success','Đã xóa');
    }
}
