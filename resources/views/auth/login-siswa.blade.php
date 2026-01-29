@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary text-white">Login Siswa</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login.siswa') }}">
                    @csrf
                    <div class="mb-3">
                        <label>NIS</label>
                        <input type="number" name="nis" class="form-control" placeholder="Masukkan NIS Anda" required>
                        @error('nis') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Kelas</label>
                        <input type="text" name="kelas" class="form-control" placeholder="Masukkan Kelas Anda" required>
                        @error('kelas') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <button class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection