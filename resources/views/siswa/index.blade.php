@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>My Reports</h2>
    <a href="{{ route('siswa.create') }}" class="btn btn-success">+ New Report</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporans as $laporan)
                <tr>
                    <td>{{ $laporan->created_at->format('d M Y') }}</td>
                    <td>{{ $laporan->kategori->ket_kategori }}</td>
                    <td>{{ $laporan->lokasi }}</td>
                    <td>{{ $laporan->ket }}</td>
                    <td>
                        <span class="badge bg-{{ $laporan->aspirasi->status == 'Selesai' ? 'success' : ($laporan->aspirasi->status == 'Proses' ? 'warning' : 'secondary') }}">
                            {{ $laporan->aspirasi->status }}
                        </span>
                    </td>
                    <td>{{ $laporan->aspirasi->feedback ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection