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
                        <div class="col-lg-3 col-md-6 col-12">
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
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card">
                              <div class="card-body">
                                <h4 class="mb-1">Pengajuan Terbaru</h4>
                                @forelse ($terbaru as $new)
                                <div class="dropdown-divider"></div>
                                <div class="d-flex align-items-center my-1">
                                 <span class="col px-0" style="font-size: 1rem">
                                    {{ $new->penduduk->nama }}
                                    <br>
                                    <span class="text-muted" style="font-size: 0.8rem">{{ $new->surat->nama }}</span>
                                  </span>
                                  <a class="btn btn-icon btn-outline-primary waves-effect waves-float waves-light" href="{{ route('pengajuan.detil', $new->id) }}"><i data-feather="external-link"></i></a>
                                </div>
                                @empty
                                <div class="dropdown-divider"></div>
                                <div class="d-flex align-items-center my-2">
                                    <span class="col pl-75 text-center" style="font-size: 1rem">
                                        Belum Ada Pengajuan
                                    </span>
                                </div>
                                @endforelse
                                <div class="dropdown-divider"></div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
