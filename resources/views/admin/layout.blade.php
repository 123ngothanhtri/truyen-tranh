<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin truyện</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@500&display=swap" rel="stylesheet">
    <style>*{font-family: 'Exo 2', sans-serif}</style>
</head>

<body class="alert-dark">
    <nav class="navbar navbar-expand-md navbar-light bg-success sticky-top">
        <a class="navbar-brand text-light" href="#">ADMIN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mr-1">
                    <a class=" btn btn-success " href="{{ url('/') }}" >
                        Trang chủ
                    </a>
                </li>
                <li class="nav-item mr-1">
                    <a class=" btn btn-success" href="{{ url('/thong-ke') }}" @if($_SERVER['REQUEST_URI']=='/truyentranh/public/thong-ke') style="color:cyan" @endif>
                        Thống kê
                    </a>
                </li>
                <li class="nav-item mr-1">
                    <a class="btn btn-success" href="{{ url('quan-ly-user2') }}" @if($_SERVER['REQUEST_URI']=='/truyentranh/public/quan-ly-user2') style="color:cyan" @endif>
                        Người dùng
                    </a>
                </li>
                <li class="nav-item mr-1">
                    <a class="btn btn-success" href="{{ url('the-loai') }}" @if($_SERVER['REQUEST_URI']=='/truyentranh/public/the-loai') style="color:cyan" @endif>
                        Thể loại
                    </a>
                </li>
                <li class="nav-item mr-1">
                    <a class="btn btn-success" href="{{ url('truyen') }}" @if($_SERVER['REQUEST_URI']=='/truyentranh/public/truyen') style="color:cyan" @endif>
                        Truyện
                    </a>
                </li>
                <li class="nav-item mr-1">
                    <a class="btn btn-success" href="{{ url('chuong') }}" @if($_SERVER['REQUEST_URI']=='/truyentranh/public/chuong') style="color:cyan" @endif>
                        Chương
                    </a>
                </li>
                <li class="nav-item mr-1">
                    <a class="btn btn-success" href="{{ url('quan-ly-lien-he') }}" @if($_SERVER['REQUEST_URI']=='/truyentranh/public/quan-ly-lien-he') style="color:cyan" @endif>
                        Liên hệ
                    </a>
                </li>
                <li class="nav-item mr-1">
                    <a class="btn btn-success" href="{{ url('quan-ly-binh-luan') }}" @if($_SERVER['REQUEST_URI']=='/truyentranh/public/quan-ly-binh-luan') style="color:cyan" @endif>
                        Bình luận
                    </a>
                </li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf
                <button type="submit" class="btn btn-success">Đăng xuất</button>
            </form>
        </div>
    </nav>
    
    
        <div class="container">
            @yield('content')
        </div>
    
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>
