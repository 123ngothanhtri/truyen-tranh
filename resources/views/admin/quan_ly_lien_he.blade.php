@extends('admin.layout')

@section('content')
    <div class="card ">
        <div class="card-header">
            <h4>Danh sách liên hệ</h4>
        </div>
        <div class="card-body overflow-auto">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}<button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            <table class="table table-sm ">
                <tr class="font-weight-bold alert-secondary">
                    <td>#</td>
                    <td>Tên</td>
                    <td>Email</td>
                    <td>Nội dung</td>
                    <td>Ngày liên hệ</td>
                    <td></td>
                </tr>
                @foreach ($qllh as $index => $x)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $x->name }}</td>
                        <td>{{ $x->email }}</td>
                        <td>{{ $x->noidung_lienhe }}</td>
                        <td>{{ $x->ngay_lienhe }}</td>
                        <td>
                            <a href="{{ url('xoa-lien-he/' . $x->id_lienhe) }}" class="btn btn-sm btn-outline-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


@endsection
