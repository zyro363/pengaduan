@extends('layouts.app')

@section('content')
<h2>Admin Dashboard (Laporan Masuk)</h2>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.dashboard') }}" class="row g-3">
            <div class="col-md-3">
                <label>Date</label>
                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="col-md-3">
                <label>Month</label>
                <select name="month" class="form-select">
                    <option value="">All</option>
                    @for($i=1; $i<=12; $i++)
                        <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>{{ date("F", mktime(0, 0, 0, $i, 10)) }}</option>
                        @endfor
                </select>
            </div>
            <div class="col-md-3">
                <label>Category</label>
                <select name="category" class="form-select">
                    <option value="">All</option>
                    @foreach($kategoris as $cat)
                    <option value="{{ $cat->id_kategori }}" {{ request('category') == $cat->id_kategori ? 'selected' : '' }}>
                        {{ $cat->ket_kategori }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 align-self-end">
                <button class="btn btn-primary w-100">Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>NIS</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Desc</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporans as $laporan)
                <tr>
                    <td>{{ $laporan->created_at->format('d M Y') }}</td>
                    <td>{{ $laporan->nis }}</td>
                    <td>{{ $laporan->kategori->ket_kategori }}</td>
                    <td>{{ $laporan->lokasi }}</td>
                    <td>{{ $laporan->ket }}</td>
                    <td>
                        <span class="badge bg-{{ $laporan->aspirasi->status == 'Selesai' ? 'success' : ($laporan->aspirasi->status == 'Proses' ? 'warning' : 'secondary') }}">
                            {{ $laporan->aspirasi->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.edit', $laporan->id_pelaporan) }}" class="btn btn-sm btn-info text-white">Update Status</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection