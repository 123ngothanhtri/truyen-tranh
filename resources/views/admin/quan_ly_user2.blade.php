@extends('admin.layout')

@section('content')
    <div class="card ">
        <div class="card-header">
            <h4>Danh sách người dùng đã đăng nhập bằng Google</h4>
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
                </tr>
                @foreach ($user2 as $index => $x)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $x->name }}</td>
                        <td>{{ $x->email }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


@endsection
