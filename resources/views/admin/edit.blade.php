@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Update Status Laporan #{{ $aspirasi->inputAspirasi->id_pelaporan }}</div>
            <div class="card-body">
                <div class="mb-3">
                    <label><strong>Pelapor (NIS):</strong></label>
                    <p>{{ $aspirasi->inputAspirasi->nis }}</p>
                </div>
                <div class="mb-3">
                    <label><strong>Lokasi & Keterangan:</strong></label>
                    <p>{{ $aspirasi->inputAspirasi->lokasi }} - {{ $aspirasi->inputAspirasi->ket }}</p>
                </div>

                <hr>

                <form action="{{ route('admin.update', $aspirasi->inputAspirasi->id_pelaporan) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-select">
                            <option value="Menunggu" {{ $aspirasi->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="Proses" {{ $aspirasi->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                            <option value="Selesai" {{ $aspirasi->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Feedback</label>
                        <textarea name="feedback" class="form-control" rows="3">{{ $aspirasi->feedback }}</textarea>
                    </div>

                    <button class="btn btn-primary">Update Status</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection