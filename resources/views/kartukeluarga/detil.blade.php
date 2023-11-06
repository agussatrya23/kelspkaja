@extends('layouts.menu')

@section('title-head', 'Kartu Keluarga')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Detail Kartu Keluarga</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Kartu Keluarga</a>
                            </li>
                            <li class="breadcrumb-item active">Detail
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
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12 mb-1">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h4 class="text-primary"><b>Data Kartu Keluarga "{{$data->nokk}}"</b></h4>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                            </div>

                            <div class="col-md-12 table-responsive-md">
                                <table id="tabelpenduduk" class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($keluarga as $k)
                                        <tr>
                                            <td>{{ $k->nik }}</td>
                                            <td>{{ $k->nama }}</td>
                                            <td class="text-center">
                                                @if ($k->idstatuskeluarga == 1)
                                                    <div class="badge badge-light-primary">{{ $k->statuskeluarga->nama }}</div>
                                                @elseif ($k->idstatuskeluarga == 2)
                                                    <div class="badge badge-light-warning">{{ $k->statuskeluarga->nama }}</div>
                                                @elseif ($k->idstatuskeluarga == 3)
                                                    <div class="badge badge-light-info">{{ $k->statuskeluarga->nama }}</div>
                                                @elseif ($k->idstatuskeluarga == 4)
                                                    <div class="badge badge-light-danger">{{ $k->statuskeluarga->nama }}</div>
                                                @elseif ($k->idstatuskeluarga == 5)
                                                    <div class="badge badge-light-success">{{ $k->statuskeluarga->nama }}</div>
                                                @elseif ($k->idstatuskeluarga == 6)
                                                    <div class="badge badge-light-primary">{{ $k->statuskeluarga->nama }}</div>
                                                @elseif ($k->idstatuskeluarga == 7)
                                                    <div class="badge badge-light-warning">{{ $k->statuskeluarga->nama }}</div>
                                                @elseif ($k->idstatuskeluarga == 8)
                                                    <div class="badge badge-light-info">{{ $k->statuskeluarga->nama }}</div>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="row mx-0 justify-content-center">
                                                    <a class="btn btn-sm btn-outline-primary waves-effect waves-float waves-light" href="{{ route('penduduk.detil', $k->id) }}"  title="Detail Penduduk"><i data-feather="info"></i> Detail</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="text-center">
                                            <td colspan="4">Tidak Ada Penduduk yang Menggunakan No KK {{ $data->nokk }}</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
