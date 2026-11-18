
@extends('layouts.app')

@section('title', 'Dashboard Warga')

@section('page-title', 'Dashboard Warga')

@section('sidebar-menu')

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('warga.viewwarga') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Diagram riwayat checkpoint</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-plus-circle"></i>
            <span>Buat Laporan</span>
        </a>
    </li>

@endsection

@section('content')

    <p class="text-gray-600">
        Selamat datang, {{ Auth::user()->nama }}!
    </p>

    <div class="row">

        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card border-left-primary shadow py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary mb-1">
                        Buat Laporan
                    </div>
                    <div class="h5 font-weight-bold text-gray-800">
                        0
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card border-left-success shadow py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success mb-1">
                        Checkpoint invalid
                    </div>
                    <div class="h5 font-weight-bold text-gray-800">
                        0
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
