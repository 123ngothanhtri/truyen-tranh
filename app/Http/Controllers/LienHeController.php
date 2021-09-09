<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LienHe;
use Illuminate\Support\Facades\Auth;

class LienHeController extends Controller
{
    function lienhe(){
        return view('home.lien_he');
    }
    function themlienhe(Request $r){
        // $this->validate($r,[
        //     'noidung'=>'required|min:10|max:100',
        //     'email'=>'required|min:10|max:50',
        // ],[
        //     'noidung.required'=>'Vui lòng nhập tin nhắn',
        //     'noidung.min'=>'Tin nhắn từ 10 đến 100 kí tự ',
        //     'noidung.max'=>'Tin nhắn từ 10 đến 100 kí tự',
        //     'email.required'=>'Vui lòng nhập Email',
        //     'email.min'=>'Email từ 10 đến 50 kí tự',
        //     'email.max'=>'Email từ 10 đến 50 kí tự',
        // ]);
        $them = new LienHe;
        $them->id = Auth::guard('user2')->user()->id;
        $them->noidung_lienhe = $r->noidung;
        $them->ngay_lienhe=date('Y-m-d');
        $them->save();
        return back()->with('success','Đã gửi');
        
    }
    function quanlylienhe(){
        $qllh=LienHe::join('user2','lienhe.id','user2.id')->orderBy('id_lienhe', 'desc')->get();
        return view('admin.quan_ly_lien_he',compact('qllh'));
    }
    function xoalienhe($id){
        LienHe::destroy($id);
        return back()->with('success','Đã xóa');
    }
}
