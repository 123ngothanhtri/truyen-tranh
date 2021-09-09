@extends('admin.layout')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4>Cập nhật chương</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('chuong-sua') }}" method="post" enctype="multipart/form-data" class="form-group">@csrf
                <input type="hidden" value="{{ $chuong->id_chuong }}" name="ipidc">
                Tiêu đề chương
                <input type="text" name="ipc" value="{{ $chuong->ten_chuong }}" maxlength="100" required class="form-control">

              
                Nội dung
                <textarea name="editor" id="editor" rows="30" cols="80">{{ $chuong->noidung_chuong }}</textarea>
                <input class="btn btn-info" type="submit" value="Lưu lại">
                <a href="{{ url('chuong') }}" class="btn btn-outline-secondary">Hủy</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type='text/javascript'>
        CKEDITOR.replace('editor');
    </script>
@endsection
