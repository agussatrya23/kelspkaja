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
                                <h4 class="mb-1">Agenda Kelurahan</h4>
                                <div class="dropdown-divider"></div>
                                @forelse ($agendaterkini as $item)
                                    <div class="d-flex align-items-center my-25">
                                        <img src="{{ asset('upload/'.$item->gambar) }}" width="50" class="rounded" alt="">
                                        @php
                                            $stritem = Str::length($item->judul);
                                            if ($stritem > 40) {
                                                $judul_cut = substr($item->judul, 0, 40);
                                                if ($judul_cut[39] != ' ') {
                                                    $new_pos = strrpos($judul_cut, ' ');
                                                    $judul_cut = substr($item->judul, 0, $new_pos);
                                                    $judul_cut = $judul_cut.'...';
                                                } else {
                                                    $judul_cut = substr($item->judul, 0, 39);
                                                    $judul_cut = $judul_cut.'...';
                                                }
                                            } else {
                                                $judul_cut = $item->judul;
                                            }
                                        @endphp
                                        <span class="col pl-75" style="font-size: 1rem">
                                            <a href="{{ route('detil.berita',$item->slug) }}" target="_blank">{{ $judul_cut }}</a>
                                            <span class="text-muted d-block" style="font-size: 0.8rem">{{ (new \App\Helper)->tanggal($item->tanggal) }}</span>
                                        </span>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                @empty
                                    <div class="d-flex align-items-center my-2">
                                        <span class="col pl-75 text-center" style="font-size: 1rem">
                                            Tidak Ada Agenda
                                        </span>
                                    </div>
                                @endforelse
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
