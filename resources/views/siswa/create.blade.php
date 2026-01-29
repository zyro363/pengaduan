@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Buat Laporan</div>
            <div class="card-body">
                <form action="{{ route('siswa.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-select" required>
                            @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id_kategori }}">{{ $kategori->ket_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" placeholder="Contoh: Gedung A Lt 2" required>
                    </div>
                    <div class="mb-3">
                        <label>Keterangan</label>
                        <textarea name="ket" class="form-control" rows="3" required></textarea>
                    </div>
                    <button class="btn btn-primary">Kirim Laporan</button>
                    <a href="{{ route('siswa.dashboard') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection