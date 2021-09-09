@extends('admin.layout')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4>Thêm truyện</h4>
        </div>
        <div class="card-body">

            <form action="{{ url('truyen-them') }}" method="post" enctype="multipart/form-data" class="form-group">@csrf
                <div class="row">
                    <div class="col-md">
                        Tên truyện
                        <input class="form-control" type="text" name="ipt" maxlength="222" required>

                        Thể loại
                        <select class="form-control" name="iptl">
                            @foreach ($tl as $i)
                                <option value="{{ $i->id_theloai }}">{{ $i->ten_theloai }}</option>
                            @endforeach
                        </select>

                        Trạng thái
                        <select class="form-control" name="iptt">
                            <option value="Đang tiến hành">Đang tiến hành</option>
                            <option value="Trọn bộ">Trọn bộ</option>
                        </select>

                        Mô tả
                        <input class="form-control" type="text" name="ipmt" maxlength="222" required>

                        Tác giả
                        <input class="form-control" type="text" name="iptg" maxlength="99" required>

                    </div>
                    <div class="col-md">
                        Link hình ảnh
                        <div>
                            <input onchange="showImg()" type="text" name="ipha" id="link_image" maxlength="900" required class="form-control">
                            <img id="output_image" style="width: 200px" />
                        </div>
                        <br>
                        <input class="btn btn-info" type="submit" value="Thêm">
                        <a href="{{ url('truyen') }}" class="btn btn-outline-secondary">Hủy</a>
                    </div>

                </div>
            </form>


        </div>
    </div>
    <script>
        function showImg() {
            var x = document.getElementById('link_image').value;
            document.getElementById("output_image").src = x;
        }
    </script>

@endsection
