@extends('admin.layout')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4>Thêm chương</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('chuong-them') }}" method="post" enctype="multipart/form-data" class="form-group">@csrf
                
                Tiêu đề chương
                <input class="form-control" type="text" name="ipc" maxlength="100" required>

                Thuộc truyện
                <select class="form-control" name="ipidt">
                    @foreach ($truyen as $i)
                        <option value="{{ $i->id_truyen }}" @if(isset($id)&&$id==$i->id_truyen) selected @endif>{{ $i->ten_truyen }}</option>
                    @endforeach
                </select>

                Nội dung
                <textarea name="editor" id="editor"></textarea>
                <input class="btn btn-info" type="submit" value="Thêm">
                <a href="{{ url('chuong') }}" class="btn btn-outline-secondary">Hủy</a>
            </form>
            
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type='text/javascript'>
        CKEDITOR.replace('editor');
    </script>
@endsection
