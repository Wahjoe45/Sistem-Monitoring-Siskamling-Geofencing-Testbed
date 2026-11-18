
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jadwal Jaga</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-primary text-white py-3">
            <h5 class="mb-0">Manajemen Jadwal Jaga</h5>
        </div>

        <div class="card-body">

            {{-- Notifikasi berhasil --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Notifikasi gagal --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Validasi --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            {{-- Informasi jumlah warga --}}
            <div class="row mb-4">

                <div class="col-md-4">

                    <div class="card bg-light border">
                        <div class="card-body">

                            <small class="text-muted">
                                Jumlah Warga Terdaftar
                            </small>

                            <h3 class="mb-0">
                                {{ $jumlahWarga }}
                            </h3>

                        </div>
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card bg-light border">
                        <div class="card-body">

                            <small class="text-muted">
                                Jumlah Data Jadwal
                            </small>

                            <h3 class="mb-0">
                                {{ $details->count() }}
                            </h3>

                        </div>
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card bg-light border">
                        <div class="card-body">

                            <small class="text-muted">
                                Periode Jadwal
                            </small>

                            <h5 class="mb-0">
                                {{ \Carbon\Carbon::create($tahun, $bulan, 1)->translatedFormat('F Y') }}
                            </h5>

                        </div>
                    </div>

                </div>

            </div>


            {{-- Filter bulan dan tahun --}}
            <form action="{{ route('jadwal.index') }}"
                method="GET"
                class="row g-3 mb-4">

                <div class="col-md-4">

                    <label class="form-label">
                        Bulan
                    </label>

                    <select name="bulan" class="form-select">

                        @for($i = 1; $i <= 12; $i++)

                            <option value="{{ $i }}"
                                {{ $bulan == $i ? 'selected' : '' }}>

                                {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}

                            </option>

                        @endfor

                    </select>

                </div>

                <div class="col-md-4">

                    <label class="form-label">
                        Tahun
                    </label>

                    <select name="tahun" class="form-select">

                        @for($i = date('Y') - 1; $i <= date('Y') + 2; $i++)

                            <option value="{{ $i }}"
                                {{ $tahun == $i ? 'selected' : '' }}>

                                {{ $i }}

                            </option>

                        @endfor

                    </select>

                </div>

                <div class="col-md-4 d-flex align-items-end">

                    <button type="submit" class="btn btn-secondary w-100">
                        Tampilkan
                    </button>

                </div>

            </form>


            {{-- Tombol acak jadwal --}}
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">

                <h5 class="mb-0">
                    Daftar Jadwal Jaga
                </h5>

                <form action="{{ route('jadwal.acak') }}"
                    method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin mengacak ulang jadwal? Jadwal sebelumnya pada periode ini akan diganti.')">

                    @csrf

                    <input type="hidden" name="bulan" value="{{ $bulan }}">

                    <input type="hidden" name="tahun" value="{{ $tahun }}">

                    <button type="submit" class="btn btn-primary"
                        {{ $jumlahWarga == 0 ? 'disabled' : '' }}>

                        <i class="bi bi-shuffle"></i>
                        Acak Jadwal

                    </button>

                </form>

            </div>


            {{-- Tabel jadwal --}}
            <div class="table-responsive">


            <table class="table table-bordered table-striped align-middle">

                <thead class="table-primary text-center">
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Tanggal</th>
                        <th>Nama Warga</th>
                        <th>Blok</th>
                    </tr>
                </thead>

                <tbody>

                    @php
                        $jumlahHari = \Carbon\Carbon::create($tahun, $bulan, 1)
                            ->daysInMonth;

                        $nomor = 1;
                    @endphp

                    @for($tanggal = 3; $tanggal <= 30; $tanggal += 3)

                        @if($tanggal <= $jumlahHari)

                            @php
                                $tanggalLengkap = \Carbon\Carbon::create(
                                    $tahun,
                                    $bulan,
                                    $tanggal
                                )->format('Y-m-d');

                                $daftarWarga = $details->where(
                                    'tanggal',
                                    $tanggalLengkap
                                );
                            @endphp

                            <tr>

                                {{-- Nomor tetap 1 sampai 10 --}}
                                <td class="text-center">
                                    {{ $nomor++ }}
                                </td>

                                {{-- Tanggal pelaksanaan --}}
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($tanggalLengkap)->translatedFormat('d F Y') }}
                                </td>

                                {{-- Nama warga --}}
                                <td>
                                    @forelse($daftarWarga as $detail)
                                        <div class="py-1">
                                            {{ $detail->warga->nama ?? 'Warga tidak ditemukan' }}
                                        </div>
                                    @empty
                                        <span class="text-muted">Belum ada jadwal</span>
                                    @endforelse
                                </td>

                                {{-- Blok warga --}}
                                <td class="text-center">
                                    @forelse($daftarWarga as $detail)
                                        <div class="py-1">
                                            {{ $detail->warga->blok ?? '-' }}
                                        </div>
                                    @empty
                                        -
                                    @endforelse
                                </td>

                            </tr>

                        @endif

                    @endfor

                </tbody>

            </table>



            {{-- Tombol hapus jadwal --}}
            @if($jadwal)

                <div class="mt-3">

                    <form action="{{ route('jadwal.destroy', $jadwal->id_jadwal) }}"
                        method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus seluruh jadwal periode ini?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                            Hapus Jadwal Periode Ini
                        </button>

                    </form>

                </div>

            @endif

        </div>

    </div>

</div>

</body>
</html>
