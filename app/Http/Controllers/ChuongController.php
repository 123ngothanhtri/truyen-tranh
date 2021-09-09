<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chuong;
use App\Models\Truyen;
class ChuongController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $chuong= Chuong::select('chuong.id_chuong','chuong.ten_chuong','chuong.ngaythem_chuong')->where('truyen.id_truyen','chuong.id_truyen')->get();
        // return $chuong;
        $truyen=Truyen::orderBy('id_truyen','desc')->paginate(10);
        $chuong = Chuong::join('truyen', 'chuong.id_truyen', 'truyen.id_truyen')->get();
        $chuon=Chuong::all();
        return view('admin.chuong',compact('chuong','truyen','chuon'));
    }

    public function create()
    {
        $truyen=Truyen::select('id_truyen','ten_truyen')->orderBy('id_truyen', 'desc')->get();
        return view('admin.chuong_them',compact('truyen'));
    }
    public function create2($id)
    {
        $truyen=Truyen::select('id_truyen','ten_truyen')->orderBy('id_truyen', 'desc')->get();
        return view('admin.chuong_them',compact('truyen','id'));
    }

    public function store(Request $r)
    {
        $new =new Chuong;
        $new->ten_chuong = $r->ipc;
        $new->id_truyen = $r->ipidt;
        $new->noidung_chuong = $r->editor;
        $new->ngaythem_chuong = date('Y-m-d');
        $new->save();
        return redirect('/chuong')->with('success','Đã thêm');
    }

    public function edit($id)
    {
        $chuong = Chuong::find($id);
        return view('admin.chuong_sua',compact('chuong'));
    }

    public function update(Request $r)
    {
        $capnhat=Chuong::find($r->ipidc);
        $capnhat->ten_chuong = $r->ipc;
        $capnhat->noidung_chuong = $r->editor;
        $capnhat->save();
        return redirect('/chuong')->with('success','Cập nhật thành công');
    }

    public function destroy($id)
    {
        Chuong::destroy($id);
        return back()->with('success','Đã xóa');
    }
}
