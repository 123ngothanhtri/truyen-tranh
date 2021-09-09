@extends('admin.layout')

@section('content')
    <h4>Danh sách chương</h4>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}<button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    @foreach ($truyen as $t)
        <div class="card my-3" >
            <div class="card-header font-weight-bold d-flex justify-content-between">
                {{ $t->ten_truyen }}
                <a href="{{ url('chuong-them/'.$t->id_truyen) }}" class="btn btn-sm btn-secondary">Thêm</a>
            </div>
            
            <div class="card-body">
                @foreach ($chuon as $c)
                    @if ($t->id_truyen == $c->id_truyen)
                        <div class=" d-flex justify-content-between ">
                            <p>{{ $c->ten_chuong }}</p>
                            <span>
                                <span>Cập nhật ngày {{ $c->ngaythem_chuong }} </span>
                                <a href="{{ url('chuong-sua/' . $c->id_chuong) }}" class="btn btn-sm btn-outline-info">
                                    Sửa
                                </a>
                                <a onclick="return confirm('Xóa thật chứ ?');" href="{{ url('chuong-xoa/' . $c->id_chuong) }}" class="btn btn-sm btn-outline-danger">
                                    Xóa
                                </a>
                            </span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center">{!! $truyen->links() !!}</div>
@endsection
