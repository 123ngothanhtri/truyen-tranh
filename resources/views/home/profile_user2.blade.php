@extends('home.layout')

@section('content')

    @if (Auth::guard('user2')->check())

        <div class="row m-3 rounded bg-dark text-white">
            <div class="col-md-4 p-5">
                <img width="200px" src="https://upload-os-bbs.mihoyo.com/upload/2021/04/08/82414705/8f060aa95635b3959433e7e811d7c591_5220222729782189462.webp?x-oss-process=image/resize,s_740/quality,q_80/auto-orient,0/interlace,1/format,webp" alt="">
            
            </div>
            <div class="col-md-8 p-5">
                <h5>Tên: {{ Auth::guard('user2')->user()->name }}</h5>
                <h5>Email: {{ Auth::guard('user2')->user()->email }}</h5>
                <br>
                <a href="{{ url('logout-user') }}" class="btn btn-light">Đăng xuất</a>
            </div>

        </div>
    @endif
@endsection
