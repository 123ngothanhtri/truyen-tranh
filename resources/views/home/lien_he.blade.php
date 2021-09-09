@extends('home.layout')

@section('content')
    @if (session('success'))
        <div class="alert alert-success my-2">
            ✔ {{ session('success') }}
        </div>
    @endif
    <div class="card my-3 mx-auto" style="max-width: 600px">
        <div class="card-header bg-warning font-weight-bold">Liên hệ</div>
        <div class="card-body alert-warning">
            <form action="{{ url('them-lien-he') }}" method="POST">@csrf
                
                <div class="form-group">
                    <label>Nội dung</label>
                    @error('tinnhan')
                        <code class="text-red-500 text-xs">{{ $message }}</code>
                    @enderror
                    <textarea class="form-control" name="noidung" cols="30" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-secondary">Gửi</button>
            </form>
        </div>
    </div>
@endsection
