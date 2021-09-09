@extends('home.layout')

@section('content')
    
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Trang chủ</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('chi-tiet-truyen/' . $truyen->id_truyen) }}">{{ $truyen->ten_truyen }}</a>
        </li>
        <li class="breadcrumb-item active">
            {{ $chuong->ten_chuong }}
        </li>
    </ul>
<div class="alert-success p-2">
    <img  style="width:150px" src="{{ $truyen->hinhanh_truyen }}" alt="ảnh">
    <h5>{{ $truyen->ten_truyen }}</h5>
    <hr>
    <h5>{{ $chuong->ten_chuong }}</h5>
    <p>Cập nhật ngày {{ $chuong->ngaythem_chuong }}</p>
    <p>Lượt xem {{ $chuong->luotxem_chuong }}</p>
</div>
    <div>
        <style>
            img {width: 100%}
        </style>
        {!! $chuong->noidung_chuong !!}
    </div>

    <div class="card my-2">
        <div class="card-header">
            Danh sách chương
        </div>
        <div style="max-height: 300px;overflow:auto">
            
                @foreach ($dschuong as $c)
                    <div class="px-3 d-flex justify-content-between" style="border-bottom:1px solid rgb(218, 218, 218)">
                        @if ($c->id_chuong==$chuong->id_chuong)
                            <span class="text-primary">{{ $c->ten_chuong }} <small class="text-success">(Hiện tại)</small> </span>
                        @else
                            <a href="{{ url('doc-truyen/' . $truyen->id_truyen . '/' . $c->id_chuong) }}">{{ $c->ten_chuong }}</a>
                        @endif
                        <p class="small">Lượt xem {{ $c->luotxem_chuong }} - Cập nhật ngày {{ $c->ngaythem_chuong }}</p>
                    </div>
                @endforeach
        </div>
    </div>
@endsection
