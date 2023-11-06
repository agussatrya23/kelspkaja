@extends('layouts.menu')

@section('title-head', 'Dashboard')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Dashboard</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">SPKAJA</a>
                                </li>
                                <li class="breadcrumb-item active">Dashboard
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="row match-height">
                        @include('layouts.statistik')
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card mb-1">
                                <div class="card-body p-1">
                                    <div class="media">
                                        <div class="media-body my-auto d-flex align-items-center">
                                            <div class="avatar bg-light-warning mr-1">
                                                <div class="avatar-content text-warning font-medium-4">{{ $kaling }}</div>
                                            </div>
                                            <p class="card-text font-small-3 mb-0">Proses Verifikasi Kaling</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-1">
                                <div class="card-body p-1">
                                    <div class="media">
                                        <div class="media-body my-auto d-flex align-items-center">
                                            <div class="avatar bg-light-info mr-1">
                                                <div class="avatar-content text-info font-medium-4">{{ $admin }}</div>
                                            </div>
                                            <p class="card-text font-small-3 mb-0">Proses Penomoran Surat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-1">
                                <div class="card-body p-1">
                                    <div class="media">
                                        <div class="media-body my-auto d-flex align-items-center">
                                            <div class="avatar bg-light-success mr-1">
                                                <div class="avatar-content text-success font-medium-4">{{ $lurah }}</div>
                                            </div>
                                            <p class="card-text font-small-3 mb-0">Proses Validasi Lurah</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-1">
                                <div class="card-body p-1">
                                    <div class="media">
                                        <div class="media-body my-auto d-flex align-items-center">
                                            <div class="avatar bg-light-danger mr-1">
                                                <div class="avatar-content text-danger font-medium-4">{{ $email }}</div>
                                            </div>
                                            <p class="card-text font-small-3 mb-0">Proses Kirim Email</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-1">
                                <div class="card-body p-1">
                                    <div class="media">
                                        <div class="media-body my-auto d-flex align-items-center">
                                            <div class="avatar bg-light-success mr-1">
                                                <div class="avatar-content text-success font-medium-4">{{ $selesai }}</div>
                                            </div>
                                            <p class="card-text font-small-3 mb-0">Selesai</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body p-1">
                                    <div class="media">
                                        <div class="media-body my-auto d-flex align-items-center">
                                            <div class="avatar bg-light-dark mr-1">
                                                <div class="avatar-content text-dark font-medium-4">{{ $tolak }}</div>
                                            </div>
                                            <p class="card-text font-small-3 mb-0">Pengajuan Ditolak</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <a href="{{ route('informasi') }}" style="color: inherit" class="card">
                                <div class="card-body text-center">
                                    <div class="avatar bg-light-info p-50 mb-1">
                                    <div class="avatar-content">
                                        <i data-feather="info" class="font-medium-5"></i>
                                    </div>
                                    </div>
                                    <p class="card-text mb-50">Informasi Website</p>
                                    <h2 class="font-weight-bolder text-info mt-25">{{ $totalinfo }}</h2>
                                </div>
                            </a>
                            <a href="{{ route('galeri') }}" style="color: inherit" class="card">
                                <div class="card-body text-center">
                                    <div class="avatar bg-light-warning p-50 mb-1">
                                    <div class="avatar-content">
                                        <i data-feather="image" class="font-medium-5"></i>
                                    </div>
                                    </div>
                                    <p class="card-text mb-50">Galeri Website</p>
                                    <h2 class="font-weight-bolder text-warning mt-25">{{ $totalgaleri }}</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
