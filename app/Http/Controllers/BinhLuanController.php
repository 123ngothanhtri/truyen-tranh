<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\BinhLuan;
class BinhLuanController extends Controller
{
    function guibinhluan(Request $r){
        $gbl=new BinhLuan;
        $gbl->id = Auth::guard('user2')->user()->id;
        $gbl->noidung_binhluan=$r->input_ndbl;
        $gbl->id_truyen=$r->input_idtruyen;
        $gbl->ngay_binhluan=date('Y-m-d');
        $gbl->save();
        return back()->with('success','Đã bình luận');
        
    }
    function quanlybinhluan(){
        $binhluan=BinhLuan::join('truyen','binhluan.id_truyen','truyen.id_truyen')
        ->join('user2','binhluan.id','user2.id')
        ->orderBy('id_binhluan', 'desc')
        ->get();
        return view('admin.quan_ly_binh_luan',compact('binhluan'));
    }
    function xoabinhluan($id){
        Binhluan::destroy($id);
        return back()->with('success','Đã xóa');
    }
}
