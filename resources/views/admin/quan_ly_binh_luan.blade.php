@extends('admin.layout')

@section('content')
    <div class="card ">
        <div class="card-header ">
            <h4>Danh sách bình luận</h4>
        </div>
        <div class="card-body overflow-auto">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}<button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            <table class="table table-sm " >
                <tr class="font-weight-bold alert-secondary">
                    <td>#</td>
                    <td>Tên</td>
                    <td>Email</td>
                    <td>Nội dung</td>
                    <td>Truyện</td>
                    <td>Ngày</td>
                    <td></td>
                </tr>
                @foreach ($binhluan as $index => $x)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $x->name }}</td>
                        <td>{{ $x->email }}</td>
                        <td>{{ $x->noidung_binhluan }}</td>
                        <td><a href="{{ url('chi-tiet-truyen/'.$x->id_truyen) }}" >Xem</a></td>
                        <td>{{ $x->ngay_binhluan }}</td>
                        <td>
                            <a href="{{ url('xoa-binh-luan/' . $x->id_binhluan) }}" class="btn btn-sm btn-warning">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


@endsection
