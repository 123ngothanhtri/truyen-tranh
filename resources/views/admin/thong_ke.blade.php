@extends('admin.layout')

@section('content')
    <h3 class="bg-light py-3 mb-3 rounded text-center ">Thống kê</h3>

    <h5>Top 3 truyện có nhiều lượt xem nhất (Trong tổng số {{ count($truyen) }} truyện)</h5>
    <div class="row">
        @foreach ($top3truyen as $index => $i)
            <div class="col-md-4 mb-3">
                <div class="h-100 m-1 py-2 px-3 bg-white rounded d-flex justify-content-between">

                    <span>
                        <h5 class="text-danger">Top {{ $index + 1 }}</h5>
                        <div class="text-info">{{ $i->tongluotxem }} lượt xem</div>
                        <div>{{ $i->ten_truyen }}</div>
                    </span>
                    <img height="100px" src="{{ $i->hinhanh_truyen }}">

                </div>
            </div>
        @endforeach
    </div>
    <hr>

    <h5>Top 3 truyện có nhiều bình luận nhất</h5>
    <div class="row">
        @foreach ($top3truyenComment as $index => $i)
            <div class="col-md-4 mb-3">
                <div class="h-100 m-1 py-2 px-3 bg-white rounded d-flex justify-content-between">

                    <span>
                        <h5 class="text-danger">Top {{ $index + 1 }}</h5>
                        <div class="text-info">{{ $i->soluong }} bình luận</div>
                        <div>{{ $i->ten_truyen }}</div>
                    </span>
                    <img height="100px" src="{{ $i->hinhanh_truyen }}">

                </div>
            </div>
        @endforeach
    </div>
    
    <hr>
    <h5>Top 3 người dùng bình luận nhiều nhất (Trong tổng số {{ count($user2) }} người dùng)</h5>
    <div class="row">
        @foreach ($top3UserComment as $index => $i)
            <div class="col-md-4 mb-3">
                <div class="h-100 m-1 py-2 px-3 bg-white rounded">
                    <div class="d-flex justify-content-between">
                        <h5 class="text-danger text-xl-left">Top {{ $index + 1 }}</h5>
                        <span class="text-info text-right">{{ $i->soluong }} bình luận</span>
                    </div>

                    <div>{{ $i->name }}</div>
                    <div>{{ $i->email }}</div>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <h5>Tổng số truyện theo thể loại</h5>
    <div class="row ">
        @foreach ($TruyenTheoLoai as $i)
            <div class="col-md-2 mb-3">
                <div class="h-100 bg-light rounded p-2 text-center">
                    <p>{{ $i->ten_theloai }}</p>
                    <h4>{{ $i->soluong }}</h4>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="row card-body ">
        <div class="col-md-4">
            <div class="jumbotron text-center">
                <h3 class="">{{ count($theloai) }}</h3> 
                    Tổng số thể loại 
                </div>
            </div>
            <div class=" col-md-4">
                    <div class="jumbotron text-center">
                        <h3>{{ count($truyen) }}</h3> Truyện
                    </div>
            </div>
            <div class="col-md-4 ">
                <div class="jumbotron text-center">
                    <h3>{{ count($chuong) }}</h3> Tổng số chương của tất cả truyện
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="jumbotron text-center">
                    <h3>{{ count($user2) }}</h3> Người dùng
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="jumbotron text-center">
                    <h3>{{ count($lienhe) }}</h3> Liên Hệ
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="jumbotron text-center">
                    <h3>{{ count($binhluan) }}</h3> Tổng số bình luận của tất cả truyện
                </div>
            </div>
            {{-- <div class="col-md-5 ">
                <img width="100%" src="https://i.ibb.co/QbZbLGK/Screenshot-214.png" alt="z">
            </div> --}}
        </div>


    @endsection
