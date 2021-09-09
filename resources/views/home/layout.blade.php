<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Truyện hay online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@500&display=swap" rel="stylesheet">
    <style> *{font-family: 'Exo 2', sans-serif}</style>
</head>

<body>
    <div class="bg-success sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light container">
            <a class="navbar-brand" href="{{ url('/') }}">Truyện hay</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link btn btn-success" href="{{ url('/') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-success" href="{{ url('/lien-he') }}">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        @if (Auth::guard('user2')->check())
                            <a class="nav-link btn btn-success" href="{{ url('/profile-user2') }}">Hồ sơ</a>
                        @else
                            <a class="nav-link btn btn-success" href="{{ url('/login-user2') }}">Đăng nhập</a>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        @yield('content')
    </div>

    <footer class="alert-secondary text-center text-lg-start bg-success sticky-bottom">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <p>Truyện hay - Đọc truyện online, đọc truyện chữ, truyện tranh. Website luôn cập nhật những bộ truyện mới thuộc các thể loại đặc sắc như truyện tiên hiệp, truyện kiếm hiệp, hay truyện ngôn tình một cách nhanh nhất.</p>
                </div>
                
                
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a class="text-dark" href="{{ url('/') }} ">Trang chủ</a>
                        </li>
                        <li>
                            <a class="text-dark" href="{{ url('/lien-he') }} ">Liên hệ</a>
                        </li>
                        <li>
                            <a class="text-dark" href="{{ url('/login-user2') }} ">Đăng nhập</a>
                        </li>
                        
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <ul class="list-unstyled">
                        <li>Email: genshin.impact@gmail.com</li>
                        <li>Số điện thoại: 0123456789</li>
                        <li>Facebook Zalo Instagram</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <a class="text-dark" target="_blank" href="{{ url('thong-ke') }} ">© 2021 Copyright: Admin</a>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>
