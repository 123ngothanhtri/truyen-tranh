<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\Truyen;
class TheLoaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $tl=TheLoai::orderBy('id_theloai', 'desc')->get();
        return view('admin.the_loai',['tl'=>$tl]);
    }
    public function edit($id){
        $tl=TheLoai::find($id);
        return view('admin.the_loai_sua',compact('tl'));
    }
    
    function store(Request $r){
        $them = new TheLoai;
        $them->ten_theloai = $r->input_tentheloai;
        $them->save();
        return back()->with('success','Đã thêm');
    }
    function update(Request $r){
        $sua = TheLoai::find($r->idtl);
        if($sua){
            $sua->ten_theloai = $r->ttl;
            $sua->save();
            return redirect('the-loai')->with('success','Cập nhật thành công');
        }
        return "<h1>404 - Không tìm thấy</h1>";;
        
    }
    function destroy($id){

        $tt=Truyen::all()->where('id_theloai',$id);
        if(count($tt)==0){
            TheLoai::destroy($id);
            return back()->with('success','Đã xóa');
        }
        else{
            return back()->with('failure','Có truyện thuộc loại này');
        }
    }
}
