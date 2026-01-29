@extends('layouts.app')

@section('content')
<div class="text-center mt-5">
    <h1 class="display-4 fw-bold text-primary">Aplikasi Pengaduan Sarana Sekolah</h1>
    <p class="lead text-muted">Sampaikan aspirasi anda untuk sekolah yang lebih baik.</p>

    <div class="mt-5 d-flex justify-content-center gap-3">
        <a href="{{ route('login.siswa') }}" class="btn btn-lg btn-outline-primary px-5 py-3 shadow-sm rounded-pill">
            Login Sebagai Siswa
        </a>
        <a href="{{ route('login.admin') }}" class="btn btn-lg btn-outline-dark px-5 py-3 shadow-sm rounded-pill">
            Login Sebagai Admin
        </a>
    </div>
</div>
@endsection