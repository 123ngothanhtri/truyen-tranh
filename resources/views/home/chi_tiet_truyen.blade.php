@extends('home.layout')

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">
            {{ $truyen->ten_truyen }}
        </li>
    </ul>
    @if (session('success'))
        <div class="alert alert-warning">
            {{ session('success') }}<button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif
    <div class="card alert-success">
        <div class="card-body">
            <div>
                <img style="object-fit: cover; height:150px" src="{{ $truyen->hinhanh_truyen }}" alt="ảnh">
            </div>
        </div>
        <div class="card-footer">
            <h4>{{ $truyen->ten_truyen }}</h4>
            <p>Tác giả: {{ $truyen->tacgia_truyen }}</p>
            <p>Ngày cập nhật: {{ $truyen->ngayphathanh_truyen }}</p>
            <p>Trạng thái: <span class="badge badge-success">{{ $truyen->trangthai_truyen }}</span></p>
            <p>Mô tả: {{ $truyen->mota_truyen }}</p>
        </div>
    </div>

    <div class="card my-2">
        <div class="card-header">
            Danh sách chương
        </div>
        <div style="max-height: 300px;overflow:auto">

            @foreach ($chuong as $c)
                <div class="px-3 d-flex justify-content-between" style="border-bottom:1px solid rgb(218, 218, 218)">
                    <a href="{{ url('doc-truyen/' . $truyen->id_truyen . '/' . $c->id_chuong) }}">{{ $c->ten_chuong }}</a>
                    <p class="small">Lượt xem {{ $c->luotxem_chuong }} - Cập nhật ngày {{ $c->ngaythem_chuong }}
                    </p>
                </div>
            @endforeach

        </div>
    </div>

    <div class="card my-2 alert-secondary">
        <div class="card-header">
            Bình luận truyện
        </div>
        <div class="card-body">
            <form action="{{ url('gui-binh-luan') }}" method="post">@csrf
                <input type="hidden" name="input_idtruyen" value="{{ $truyen->id_truyen }}">
                <input type="text" placeholder="Nội dung" name="input_ndbl" maxlength="100" required class="form-control mb-1">
                <button type="submit" class="btn btn-success">Gửi</button>
            </form>

        </div>
    </div>
    @foreach ($binhluan as $i)
        <div class="py-2 px-3 my-1 rounded alert-secondary d-flex justify-content-between">
            {{-- <img src="https://img.icons8.com/ios-glyphs/15/000000/user--v1.png" /> --}}
            <div>
                <b>{{ $i->name }}</b>
                <small>({{ $i->ngay_binhluan }}): </small>
                <span class="text-info">{{ $i->noidung_binhluan }} </span>
            </div>
            <div>
                @if (Auth::guard('user2')->check() && $i->id == Auth::guard('user2')->user()->id)
                    <a href="{{ url('xoa-binh-luan/' . $i->id_binhluan) }}" class="text-danger">Xóa</a>
                @endif
            </div>
        </div>
    @endforeach

@endsection
