<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\InputAspirasi;
use App\Models\Aspirasi;
use App\Models\Kategori;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Auth::guard('siswa')->user();
        // Eager load for efficiency
        $laporans = InputAspirasi::with(['kategori', 'aspirasi'])
            ->where('nis', $siswa->nis)
            ->latest()
            ->get();

        return view('siswa.index', ['laporans' => $laporans]);
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('siswa.create', ['kategoris' => $kategoris]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'lokasi' => 'required|string|max:50',
            'ket' => 'required|string|max:50',
        ]);

        $siswa = Auth::guard('siswa')->user();

        // 1. Create InputAspirasi
        $input = InputAspirasi::create([
            'nis' => $siswa->nis,
            'id_kategori' => $request->id_kategori,
            'lokasi' => $request->lokasi,
            'ket' => $request->ket,
        ]);

        // 2. Automatically create Aspirasi with 'Menunggu'
        Aspirasi::create([
            'id_pelaporan' => $input->id_pelaporan,
            'status' => 'Menunggu',
            'id_kategori' => $request->id_kategori,
            'feedback' => null,
        ]);

        return redirect()->route('siswa.dashboard')->with('success', 'Laporan berhasil dikirim');
    }
}
