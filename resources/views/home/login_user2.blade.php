@extends('home.layout')

@section('content')

    @if (session('success'))
        <div class="alert alert-warning">
            {{ session('success') }}<button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif
    <div class="jumbotron alert-info mt-2 text-center">
        <h1>Đăng nhập</h1>
        <hr>
        <a class="btn btn-light" href="{{ url('/get-google-sign-in-url') }}">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" alt="">
            Đăng nhập bằng Google
        </a>
    </div>

@endsection
