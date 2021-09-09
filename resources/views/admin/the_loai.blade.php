@extends('admin.layout')

@section('content')
    <div class="card ">
        <div class="card-header">
            <h3>Danh sách thể loại truyện</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}<button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif
            @if (session('failure'))
                <div class="alert alert-danger">
                    {{ session('failure') }}<button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif
            <table class="table table-hover table-sm">
                <tr class="font-weight-bold alert-secondary">
                    <td>#</td>
                    <td>Tên thể loại</td>
                    <td>
                        <button class="btn btn-sm btn-secondary mb-2" data-toggle="modal" data-target="#myModal">
                            Thêm
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Thêm thể loại</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('the-loai-them') }}" method="post">@csrf
                                            <input class="form-control" type="text" placeholder="Tên thể loại" name="input_tentheloai" maxlength="50" required><br />
                                            <input class="btn btn-sm btn-info" type="submit" value="Thêm">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->

                    </td>
                </tr>
                @foreach ($tl as $index => $i)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $i->ten_theloai }}</td>
                        <td>
                            <a onclick="return confirm('Xóa thật chứ ?');" href="{{ url('the-loai-xoa/' . $i->id_theloai) }}" class="btn btn-sm btn-outline-info">Xóa</a>
                            <a href="{{ url('the-loai-sua/' . $i->id_theloai) }}" class="btn btn-sm btn-outline-info">Sửa</a>



                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


@endsection
