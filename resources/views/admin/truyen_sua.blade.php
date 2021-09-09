@extends('admin.layout')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4>Cập nhật truyện</h4>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}<button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            <form action="{{ url('truyen-sua') }}" method="post" enctype="multipart/form-data" class="form-group">@csrf
                <div class="row">
                    <div class="col-md">
                        <input type="hidden" name="ipidt" value="{{ $truyen->id_truyen }}">

                        Tên truyện
                        <input type="text" name="ipt" value="{{ $truyen->ten_truyen }}" required class="form-control">

                        Thể loại
                        <select class="form-control" name="iptl">
                            @foreach ($theloai as $i)
                                <option value="{{ $i->id_theloai }}" @if ($i->id_theloai == $truyen->id_theloai)
                                    selected
                            @endif
                            >{{ $i->ten_theloai }}</option>
                            @endforeach
                        </select>

                        Trạng thái
                        <select class="form-control" name="iptt">
                            <option value="Đang tiến hành">Đang tiến hành</option>
                            <option value="Trọn bộ">Trọn bộ</option>
                        </select>

                        Mô tả
                        <input type="text" name="ipmt" value="{{ $truyen->mota_truyen }}" required class="form-control">

                        Tác giả
                        <input type="text" name="iptg" value="{{ $truyen->tacgia_truyen }}" class="form-control" required>

                    </div>
                    <div class="col-md">
                        Link hình ảnh
                        <div>
                            <input onchange="showImg()" value="{{ $truyen->hinhanh_truyen }}" type="text" name="ipha" id="link_image" class="form-control">
                            <img id="output_image" src="{{ $truyen->hinhanh_truyen }}" style="width: 200px" />
                        </div>
                        <br>
                        <input type="submit" value="Lưu lại" class="btn btn-info">
                        <a href="{{ url('truyen') }}" class="btn btn-outline-secondary">Hủy</a>
                    </div>
                </div>


            </form>
        </div>
    </div>

    <script type='text/javascript'>
        function showImg() {
            var x = document.getElementById('link_image').value;
            document.getElementById("output_image").src = x;
        }
    </script>
@endsection
