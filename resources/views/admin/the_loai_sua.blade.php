@extends('admin.layout')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4>Cập nhật thể loại</h4>
        </div>
        <div class="card-body">

            <form action="{{ url('the-loai-sua') }}" method="post" class="form-inline">@csrf
                <input type="hidden" value="{{ $tl->id_theloai }}" name="idtl">
                <input type="text" value="{{ $tl->ten_theloai }}" placeholder="Tên thể loại" name="ttl" maxlength="50" required class="form-control">
                <input class="btn btn-info mx-1" type="submit" value="Lưu lại">
                <a href="{{ url('the-loai') }}" class="btn btn-outline-secondary">Hủy</a>
            </form>

        </div>
    </div>
@endsection
