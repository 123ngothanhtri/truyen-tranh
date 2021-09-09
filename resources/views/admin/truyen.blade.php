@extends('admin.layout')

@section('content')
    <div class="card ">
        <div class="card-header">
            <h4>Danh sách truyện</h4>
        </div>
        <div class="card-body overflow-auto">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}<button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            <table class="table table-hover table-sm table-striped">
                <tr class="font-weight-bold alert-secondary">
                    <td>#</td>
                    <td>Hình ảnh</td>
                    <td>Tên truyện</td>
                    <td>Tác giả</td>
                    <td>Ngày tạo</td>
                    <td>Trạng thái</td>
                    <td>Thể loại</td>
                    <td>Mô tả</td>
                    <td>
                        <a href="{{ url('truyen-them') }}" class="btn btn-secondary mb-2">
                            Thêm
                        </a>
                    </td>
                </tr>
                @foreach ($truyen as $index => $x)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><img height="100px" src="{{ $x->hinhanh_truyen }}" alt="ảnh"></td>
                        <td>
                            <div style="max-height:100px;overflow:auto">
                                {{ $x->ten_truyen }}
                            </div>
                        </td>
                        <td>{{ $x->tacgia_truyen }}</td>
                        <td>{{ $x->ngayphathanh_truyen }}</td>
                        <td>{{ $x->trangthai_truyen }}</td>
                        <td>{{ $x->ten_theloai }}</td>
                        <td>
                            <div style="max-height:100px;overflow:auto">
                                {{ $x->mota_truyen }}
                            </div>
                        </td>
                        <td>
                            <div class="btn-group-vertical w-100">
                            <a href="{{ url('truyen-sua/' . $x->id_truyen) }}" class="btn w-100 btn-sm btn-outline-success">
                                Sửa
                            </a>
                            <a onclick="return confirm('Xóa thật chứ ?');" href="{{ url('truyen-xoa/' . $x->id_truyen) }}" class="btn w-100 btn-sm btn-outline-danger">
                                Xóa
                            </a></div>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="d-flex justify-content-center">{!! $truyen->links() !!}</div>
        </div>
    </div>

@endsection
