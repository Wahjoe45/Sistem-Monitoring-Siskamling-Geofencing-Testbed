<?php

namespace App\Http\Controllers;

use App\Models\Posjaga;
use Illuminate\Http\Request;

class PosjagaController extends Controller
{
    /**
     * Menampilkan daftar pos jaga
     */
    public function index()
    {
        $posjagas = Posjaga::latest()->paginate(10);

        return view('pengurus.Posjaga.index', compact('posjagas'));
    }

    /**
     * Menampilkan form tambah pos jaga
     */
    public function create()
    {
        return view('pengurus.Posjaga.create');
    }

    /**
     * Mengonversi koordinat DMS ke Decimal Degrees
     */
    private function convertDmsToDecimal($coordinate)
    {
        preg_match(
            '/^\s*(\d+)°(\d+)\'(\d+(?:\.\d+)?)["″]?([NSEW])\s*$/i',
            $coordinate,
            $matches
        );

        $degree = (float) $matches[1];
        $minute = (float) $matches[2];
        $second = (float) $matches[3];
        $direction = strtoupper($matches[4]);

        $decimal = $degree + ($minute / 60) + ($second / 3600);

        if (in_array($direction, ['S', 'W'])) {
            $decimal *= -1;
        }

        return round($decimal, 8);
    }

    /**
     * Menyimpan data pos jaga
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'namaPos' => 'required|string|max:255',
            'deskripsiPos' => 'required|string',

            'latitude' => [
                'required',
                'regex:/^\s*\d{1,2}°\d{1,2}\'\d{1,2}(?:\.\d+)?["″]?[NS]\s*$/i'
            ],

            'longitude' => [
                'required',
                'regex:/^\s*\d{1,3}°\d{1,2}\'\d{1,2}(?:\.\d+)?["″]?[EW]\s*$/i'
            ],
        ]);

        // Konversi koordinat DMS menjadi Decimal Degrees
        $latitude = $this->convertDmsToDecimal(
            $validated['latitude']
        );

        $longitude = $this->convertDmsToDecimal(
            $validated['longitude']
        );

        // Validasi batas koordinat
        if (abs($latitude) > 90 || abs($longitude) > 180) {
            return back()
                ->withInput()
                ->withErrors([
                    'latitude' => 'Koordinat latitude atau longitude tidak valid.'
                ]);
        }

        // Simpan data ke database
        Posjaga::create([
            'namaPos' => $validated['namaPos'],
            'deskripsiPos' => $validated['deskripsiPos'],
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);

        return redirect()->route('posjaga.index')
            ->with('success', 'Pos jaga berhasil dibuat.');
    }

    /**
     * Menampilkan detail pos jaga
     */
    public function show(Posjaga $posjaga)
    {
        return view('pengurus.Posjaga.show', compact('posjaga'));
    }

    /**
     * Menampilkan form edit pos jaga
     */
    public function edit(Posjaga $posjaga)
    {
        return view('pengurus.Posjaga.edit',compact('posjaga'));
    }

    /**
     * Memperbarui data pos jaga
     */
    public function update(Request $request, Posjaga $posjaga)
    {
        $validated = $request->validate([
            'namaPos' => 'required|string|max:255',
            'deskripsiPos' => 'required|string',

            'latitude' => [
                'required',
                'regex:/^\s*\d{1,2}°\d{1,2}\'\d{1,2}(?:\.\d+)?["″]?[NS]\s*$/i'
            ],

            'longitude' => [
                'required',
                'regex:/^\s*\d{1,3}°\d{1,2}\'\d{1,2}(?:\.\d+)?["″]?[EW]\s*$/i'
            ],
        ]);

        $latitude = $this->convertDmsToDecimal(
            $validated['latitude']
        );

        $longitude = $this->convertDmsToDecimal(
            $validated['longitude']
        );

        if (abs($latitude) > 90 || abs($longitude) > 180) {
            return back()
                ->withInput()
                ->withErrors([
                    'latitude' => 'Koordinat latitude atau longitude tidak valid.'
                ]);
        }

        $posjaga->update([
            'namaPos' => $validated['namaPos'],
            'deskripsiPos' => $validated['deskripsiPos'],
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);

        return redirect()->route('posjaga.index')
            ->with('success', 'Pos jaga berhasil diperbarui.');
    }

    /**
     * Menghapus data pos jaga
     */
    public function destroy(Posjaga $posjaga)
    {
        $posjaga->delete();

        return redirect()->route('posjaga.index')
            ->with('success', 'Pos jaga berhasil dihapus.');
    }
}
