<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporans = Laporan::latest()->paginate(10);

        return view('warga.Laporan.index', compact('laporans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('warga.Laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaLaporan' => 'required',
            'namaPelapor' => 'required',
            'isiLaporan' => 'required',
        ]);

        Laporan::create([
            'namaLaporan' => $request->namaLaporan,
            'namaPelapor' => $request->namaPelapor,
            'isiLaporan' => $request->isiLaporan,
        ]);

        return redirect()->route('laporan.index')
            ->with('success','Laporan sukses dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        return view('warga.Laporan.show',compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        return view('warga.Laporan.edit',compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'namaLaporan' => 'required',
            'namaPelapor' => 'required',
            'isiLaporan' => 'required',
        ]);
        $laporan->update([
            'namaLaporan' => $request->namaLaporan,
            'namaPelapor' => $request->namaPelapor,
            'isiLaporan' => $request->isiLaporan,
        ]);

        return redirect()->route('laporan.index')
            ->with('success','Laporan sukses diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        $laporan->delete();
        return redirect()->route('laporan.index')
            ->with('success','Laporan sukses dihapus');
    }
}
