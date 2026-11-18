<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\JadwalDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JadwalController extends Controller
{
    // ==========================================
    // 1. MENAMPILKAN HALAMAN JADWAL
    // ==========================================

    public function index(Request $request)
    {
        $bulan = (int) $request->input('bulan', date('m'));
        $tahun = (int) $request->input('tahun', date('Y'));

        // Mengambil jumlah warga terdaftar
        $jumlahWarga = User::where('role', 'warga')
            ->count();

        // Mengambil jadwal berdasarkan bulan dan tahun
        $jadwal = Jadwal::where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->first();

        // Mengambil detail jadwal beserta data warga
        $details = collect();

        if ($jadwal) {
            $details = JadwalDetail::with('warga')
                ->where('id_jadwal', $jadwal->id_jadwal)
                ->orderBy('tanggal')
                ->get();
        }

        return view('jadwal.index', compact(
            'bulan',
            'tahun',
            'jumlahWarga',
            'jadwal',
            'details'
        ));
    }


    // ==========================================
    // 2. PROSES ACAK JADWAL ROUND ROBIN
    // ==========================================

    public function acak(Request $request)
    {
        $request->validate([
            'bulan' => 'required|integer|between:1,12',
            'tahun' => 'required|integer|min:2020|max:2100',
        ]);

        $bulan = (int) $request->bulan;
        $tahun = (int) $request->tahun;

        // Mengambil seluruh warga
        $wargas = User::where('role', 'warga')
            ->orderBy('id_warga')
            ->get();

        // Memastikan terdapat warga
        if ($wargas->isEmpty()) {
            return redirect()
                ->route('jadwal.index', [
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                ])
                ->with('error', 'Belum ada warga yang terdaftar.');
        }

        // Membuat daftar tanggal pelaksanaan
        $jumlahHari = Carbon::create($tahun, $bulan, 1)
            ->daysInMonth;

        $tanggalJaga = [];

        // Tanggal 3 sampai 30 dengan interval 3 hari
        for ($tanggal = 3; $tanggal <= 30; $tanggal += 3) {

            if ($tanggal <= $jumlahHari) {
                $tanggalJaga[] = $tanggal;
            }
        }

        // Jumlah kelompok tanggal
        $jumlahKelompok = count($tanggalJaga);

        // Memproses pembagian dalam database transaction
        DB::transaction(function () use (
            $wargas,
            $bulan,
            $tahun,
            $tanggalJaga,
            $jumlahKelompok
        ) {

            // Membuat atau mengambil jadwal berdasarkan periode
            $jadwal = Jadwal::firstOrCreate([
                'bulan' => $bulan,
                'tahun' => $tahun,
            ]);

            // Menghapus pembagian sebelumnya
            JadwalDetail::where(
                'id_jadwal',
                $jadwal->id_jadwal
            )->delete();

            // Mengacak urutan warga
            $wargas = $wargas->shuffle()->values();

            // Membuat data untuk disimpan
            $dataJadwal = [];

            // Implementasi algoritma Round Robin
            foreach ($wargas as $index => $warga) {

                // Menentukan kelompok berdasarkan modulo
                $kelompok = $index % $jumlahKelompok;

                // Mengambil tanggal berdasarkan kelompok
                $tanggal = $tanggalJaga[$kelompok];

                // Mengubah menjadi format tanggal lengkap
                $tanggalLengkap = Carbon::create(
                    $tahun,
                    $bulan,
                    $tanggal
                )->format('Y-m-d');

                $dataJadwal[] = [
                    'id_jadwal' => $jadwal->id_jadwal,
                    'id_warga' => $warga->id_warga,
                    'tanggal' => $tanggalLengkap,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Menyimpan seluruh hasil pembagian
            JadwalDetail::insert($dataJadwal);
        });

        return redirect()
            ->route('jadwal.index', [
                'bulan' => $bulan,
                'tahun' => $tahun,
            ])
            ->with(
                'success',
                'Jadwal berhasil dibuat menggunakan algoritma Round Robin!'
            );
    }


    // ==========================================
    // 3. MENGHAPUS JADWAL
    // ==========================================

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}
