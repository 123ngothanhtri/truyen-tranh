@extends('home.layout')

@section('content')
    
    <form action="{{ url('tim-kiem-truyen') }}" method="POST" class="form-inline mb-2 alert-secondary p-3">@csrf
        <input class="form-control w-50" value="{{ $tukhoa }}" name="tktk" type="search" placeholder="Tìm kiếm" required>
        <button class="btn btn-success mx-2" type="submit">Tìm kiếm</button>
        <a href="{{ url('/') }} " class="btn btn-secondary" >Trở lại </a>
    </form>
    <p>Tìm thấy {{ count($truyen) }} kết quả</p>
    <div class="row">
        @foreach ($truyen as $t)
            <div class="col-md-4">
                <div class="card m-2 alert-success">
                    <div class="card-body">
                        <div style="">
                            <img style="object-fit: contain;width: 100%; height:200px" src="{{ $t->hinhanh_truyen }}" alt="ảnh">
                        </div>
                    </div>
                    <div class="card-footer ">

                        <a href="{{ url('chi-tiet-truyen/' . $t->id_truyen) }}" class="font-weight-bold text-dark">{{ $t->ten_truyen }}</a>
                    </div>
                </div>
            </div>
        @endforeach
        @if (count($truyen)==0)
            <div class="jumbotron bg-light display-4 w-100 text-center">Không tìm thấy :(</div>
        @endif
    </div>
@endsection
