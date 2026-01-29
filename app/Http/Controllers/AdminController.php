<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputAspirasi;
use App\Models\Aspirasi;
use App\Models\Kategori;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Query builder with eager loading
        $query = InputAspirasi::with(['siswa', 'kategori', 'aspirasi']);

        // Filtering Logic
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        if ($request->filled('month')) {
            $query->whereMonth('created_at', $request->month);
        }

        if ($request->filled('category')) {
            $query->where('id_kategori', $request->category);
        }

        $laporans = $query->latest()->get();
        $kategoris = Kategori::all();

        return view('admin.index', [
            'laporans' => $laporans,
            'kategoris' => $kategoris
        ]);
    }

    public function edit($id)
    {
        $aspirasi = Aspirasi::with(['inputAspirasi', 'kategori'])->where('id_pelaporan', $id)->firstOrFail();
        return view('admin.edit', ['aspirasi' => $aspirasi]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Proses,Selesai',
            'feedback' => 'nullable|string',
        ]);

        $aspirasi = Aspirasi::where('id_pelaporan', $id)->firstOrFail();

        $aspirasi->update([
            'status' => $request->status,
            'feedback' => $request->feedback,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Status updated successfully');
    }
}
