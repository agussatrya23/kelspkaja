@extends('layouts.menu')

@section('title-head', 'Pengajuan')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Detail Pengajuan</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Surat Keterangan</a>
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
                                    <div class="col-md-6 col-12 text-md-left text-center mb-md-0 mb-1">
                                        <h4 class="mb-0 text-primary"><b>Data Pengajuan</b></h4>
                                    </div>
                                    @can('kaling')
                                    <div class="col-md-6 col-12">
                                        <div class="d-sm-flex justify-content-md-end text-center">
                                            @if ($data->status == 0)
                                                <a class="btn btn-md btn-gradient-success" href="https://wa.me/{{ $data->nohp }}?text=Konfirmasi%20Pengajuan%20{{ $data->surat->nama }}%20atas%20nama%20{{ $data->penduduk->nama }}%20untuk%20keperluan%20{{ $data->maksud }}" target="_blank"><i data-feather="phone"></i> Konfirmasi</a>
                                            @endif
                                            @if ($data->status > 2 && $data->status < 5)
                                                 <a class="btn btn-md btn-gradient-success waves-effect waves-float waves-light" href="https://wa.me/{{ $data->nohp }}?text=Pengajuan%20{{ $data->surat->nama }}%20atas%20nama%20{{ $data->penduduk->nama }}%0aBerikut%20link%20Surat%20Keterangan%20:%20http://spkaja.test/surat-keterangan/{{ $data->id }}%0aTerimkasih" title="Kirim Surat" target="_blank"><i data-feather="send"></i> Kirim Surat</a>
                                            @endif
                                            @if ($data->status < 4)
                                                <button class="btn btn-md btn-gradient-warning" type="button" data-toggle="modal" data-target="#edit-pengajuan" data-backdrop="static" data-keyboard="false"><i data-feather="edit"></i> Ubah Pengajuan</button>
                                            @endif
                                            @if ($data->status == 0)
                                                <form class="form-tolak" action="{{ route('pengajuan.validasi') }}" method="post">
                                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                                <input type="hidden" name="status" value="5">
                                                <button type="submit" class="btn btn-tolak btn-gradient-danger btn-md waves-effect waves-float waves-light mx-25" name="button" id="btnvalidasi" data-backdrop="static" data-keyboard="false"><i data-feather="x-circle"></i> Tolak Pengajuan</button>
                                                @csrf
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                    @endcan
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="table-responsive-lg">
                                    <table class="table table-striped">
                                    <tr>
                                        <td width="30%">Jenis Surat</td>
                                        <th>{{$data->surat->nama}}</th>
                                    </tr>
                                    @if ($data->idsurat != 4)
                                    <tr>
                                        <td width="30%">Keterangan</td>
                                        <th>{{$data->keterangan}}</th>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td width="30%">Maksud/Keperluan</td>
                                        <th>{{$data->maksud}}</th>
                                    </tr>
                                    <tr>
                                        <td width="30%">Tanggal Pengajuan</td>
                                        <th>{{(new \App\Helper)->tanggal($data->tanggal)}}</th>
                                    </tr>
                                    <tr>
                                        <td width="30%">No HP/WhatsApp</td>
                                        <th>+{{$data->nohp}}</th>
                                    </tr>
                                    {{-- <tr>
                                        <td width="30%">Email</td>
                                        <th>{{$data->email}}</th>
                                    </tr> --}}

                                    {{-- <tr>
                                        <td width="30%">Dokumen</td>
                                        <th>
                                            @if ($data->status == 0 || $data->status == 5)
                                                <a class="btn btn-outline-warning btn-sm waves-effect waves-float waves-light mx-25" href="{{ route('pengajuan.pernyataan', $data->id) }}" title="Surat Pernyataan" target="_blank">Surat Pernyataan</a>
                                            @elseif ($data->status == 1)
                                                <a class="btn btn-outline-warning btn-sm waves-effect waves-float waves-light mx-25" href="{{ route('pengajuan.pernyataan', $data->id) }}" title="Surat Pernyataan" target="_blank">Surat Pernyataan</a><a class="btn btn-outline-info btn-sm waves-effect waves-float waves-light mx-25" href="{{ route('pengajuan.pengantar', $data->id) }}" title="Surat Pengantar Kaling" target="_blank">Surat Pengantar Kaling</a>
                                            @elseif ($data->status == 2 || $data->status == 3 || $data->status == 4)
                                                <a class="btn btn-outline-warning btn-sm waves-effect waves-float waves-light mx-25" href="{{ route('pengajuan.pernyataan', $data->id) }}" title="Surat Pernyataan" target="_blank">Surat Pernyataan</a><a class="btn btn-outline-info btn-sm waves-effect waves-float waves-light mx-25" href="{{ route('pengajuan.pengantar', $data->id) }}" title="Surat Pengantar Kaling" target="_blank">Surat Pengantar Kaling</a><a class="btn btn-outline-success btn-sm waves-effect waves-float waves-light mx-25" href="{{ route('pengajuan.keterangan', $data->id) }}" title="Surat Keterangan" target="_blank">Surat Keterangan</a>

                                            @endif
                                        </th>
                                    </tr> --}}

                                    @if ($data->status > 0 && $data->status < 5)
                                        <tr>
                                            <td width="30%">Dokumen</td>
                                            <th>
                                                @if ($data->status == 1)
                                                    <a class="btn btn-outline-info btn-sm waves-effect waves-float waves-light mx-25" href="{{ route('pengajuan.pengantar', $data->id) }}" title="Surat Pengantar Kaling" target="_blank">Surat Pengantar Kaling</a>
                                                @elseif ($data->status == 2 || $data->status == 3 || $data->status == 4)
                                                    <a class="btn btn-outline-info btn-sm waves-effect waves-float waves-light mx-25" href="{{ route('pengajuan.pengantar', $data->id) }}" title="Surat Pengantar Kaling" target="_blank">Surat Pengantar Kaling</a><a class="btn btn-outline-success btn-sm waves-effect waves-float waves-light mx-25" href="{{ route('pengajuan.keterangan', $data->id) }}" title="Surat Keterangan" target="_blank">Surat Keterangan</a>
                                                @endif
                                            </th>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td width="30%">Photo KTP</td>
                                        <th>
                                            <a class="btn btn-outline-primary btn-sm waves-effect waves-float waves-light mx-25 lightbox-image" data-fancybox="ktp-photo"  data-caption="Photo KK/KTP" href="{{ asset('upload/'.$data->ktp) }}">Lihat Photo
                                            </a>
                                            <a class="btn btn-outline-primary btn-sm waves-effect waves-float waves-light mx-25 lightbox-image d-none" data-fancybox="ktp-photo" data-caption="Photo Selfi menunjukan KTP"  href="{{ asset('upload/'.$data->photo) }}">Photo KTP
                                            </a>
                                        </th>
                                    </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                @if ($data->idsurat == 4)
                <ul class="nav nav-pills">
                    <li class="nav-item">
                      <a class="nav-link active" id="dd-tab" data-toggle="pill" href="#dd" aria-expanded="true">Data Pelapor</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="kepegawaian-tab" data-toggle="pill" href="#kepegawaian" aria-expanded="true">Data Penduduk Meninggal</a>
                    </li>
                </ul>
                @endif
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="dd" aria-labelledby="dd-tab" aria-expanded="true">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-12 mb-1">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12 col-12">
                                                @if ($data->idsurat == 4)
                                                <h4 class="mb-0 text-primary"><b>Data Pelapor</b></h4>
                                                @else
                                                <h4 class="mb-0 text-primary"><b>Data Penduduk</b></h4>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="table-responsive-lg">
                                            <table class="table table-striped">
                                            <tr>
                                                <td width="30%">Nama</td>
                                                <th>{{$data->penduduk->nama}}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">No KK</td>
                                                <th>{{$data->penduduk->idkk == null ? '' : $data->penduduk->kartukeluarga->nokk}}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">NIK</td>
                                                <th>{{$data->penduduk->nik == null ? '' : $data->penduduk->nik}}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">Lingkungan</td>
                                                <th>Lingkungan {{(new \App\Helper)->lingkungan($data->penduduk->lingkungan)}}</th>
                                            </tr>
                                            {{-- <tr>
                                                <td width="30%">Kewarganegaraan</td>
                                                @if ($data->penduduk->wn == 1)
                                                    <th>Warga Negara Indonesia</th>
                                                @elseif ($data->penduduk->wn == 2)
                                                    <th>Warga Negara Asing</th>
                                                @else
                                                    <th></th>
                                                @endif
                                            </tr> --}}
                                            <tr>
                                                <td width="30%">Jenis Kelamin</td>
                                                @php
                                                    $jk = $data->penduduk->jk;
                                                    if ($jk == 1) {
                                                        $jk='Laki-Laki';
                                                    }else if ($jk == 2) {
                                                        $jk='Perempuan';
                                                    }else{
                                                        $jk='';
                                                    }
                                                @endphp
                                                <th>{{$jk}}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">Agama</td>
                                                <th>{{$data->penduduk->agama == null ? '' : $data->penduduk->agama}}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">Tempat, Tanggal Lahir</td>
                                                <th>{{ $data->penduduk->tempatlahir }}, {{(new \App\Helper)->tanggal($data->penduduk->tgllahir)}}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">Status Kawin</td>
                                                <th>{{$data->penduduk->statuskawin}}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">Pekerjaan</td>
                                                <th>{{$data->penduduk->pekerjaan}}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">Alamat</td>
                                                <th>{{$data->penduduk->alamat}}</th>
                                            </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($data->idsurat == 4)
                    <div role="tabpanel" class="tab-pane" id="kepegawaian" aria-labelledby="kepegawaian-tab" aria-expanded="true">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-12 mb-1">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12 col-12">
                                                <h4 class="mb-0 text-primary"><b>Data Penduduk Meninggal</b></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="table-responsive-lg">
                                            <table class="table table-striped">
                                            <tr>
                                                <td width="30%">Nama</td>
                                                <th>{{ $detil->nama }}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">NIK</td>
                                                <th>{{ $detil->nik }}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">Tempat, Tanggal Lahir</td>
                                                <th>{{ $detil->tempatlahir }}, {{(new \App\Helper)->tanggal($detil->tgllahir)}}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">Jenis Kelamin</td>
                                                @php
                                                    $jk = $detil->jk;
                                                    if ($jk == 1) {
                                                        $jk='Laki-Laki';
                                                    }else if ($jk == 2) {
                                                        $jk='Perempuan';
                                                    }else{
                                                        $jk='';
                                                    }
                                                @endphp
                                                <th>{{ $jk }}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">Alamat</td>
                                                <th>{{ $detil->alamat }}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">Agama</td>
                                                <th>{{ $detil->agama }}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">Tanggal Meninggal</td>
                                                <th>{{(new \App\Helper)->tanggal($detil->tglmeninggal)}}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">Bertempat di</td>
                                                <th>{{ $detil->tempatmeninggal }}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">Penyebab Meninggal</td>
                                                <th>{{ $detil->penyebab }}</th>
                                            </tr>
                                            <tr>
                                                <td width="30%">Hubungan dengan pelapor</td>
                                                <th>{{ $detil->hubungan }}</th>
                                            </tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

</div>
@endsection

@section('modal')
<div class="modal fade text-left" id="edit-pengajuan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">UBAH DATA PENGAJUAN</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="jquery-val-form" action="{{ route('pengajuan.update') }}" enctype="multipart/form-data" method="post">
          <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
          <div class="modal-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>No KK</b></label>
                    <div class="col-sm-12">
                        <input type="text"  id="nokk" name="nokk" value="{{ $data->penduduk->kartukeluarga->nokk }}" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>NIK</b></label>
                    <div class="col-sm-12">
                        <input type="text"  id="nik" name="nik" value="{{ $data->penduduk->nik }}" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label class="col-sm-4 col-form-label"><b>Nama Lengkap</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="nama" class="form-control" autocomplete="off" id="nama" value="{{ $data->penduduk->nama }}" readonly>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Tempat Lahir</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="tempatlahir" autocomplete="off" class="form-control"
                            id="tempatlahir" value="{{ $data->penduduk->tempatlahir }}" readonly>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Tanggal Lahir</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="tempatlahir" autocomplete="off" class="form-control"
                            id="tempatlahir" value="{{(new \App\Helper)->tanggal($data->penduduk->tgllahir)}}" readonly>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Jenis Kelamin</b></label>
                    <div class="col-sm-12">
                        <div class="row mx-0" style="margin-top:8px;">
                            <div class="custom-control custom-control-primary custom-radio mr-4">
                                <input type="radio" id="jk" name="jk" value="1" class="custom-control-input" {{$data->penduduk->jk == 1 ? 'checked':'disabled'}}>
                                <label class="custom-control-label" for="jk">Laki-laki</label>
                            </div>
                            <div class="custom-control custom-control-primary custom-radio">
                                <input type="radio" id="jka" name="jk" value="2" class="custom-control-input"  {{$data->penduduk->jk == 2 ? 'checked':'disabled'}}>
                                <label class="custom-control-label" for="jka">Perempuan</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Agama</b></label>
                    <div class="col-sm-12">
                        <input type="text"  id="nik" name="nik" value="{{ $data->penduduk->agama }}" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Lingkungan</b></label>
                    <div class="col-sm-12">
                        <input type="text"  id="nik" name="nik" value="Lingkungan {{(new \App\Helper)->lingkungan($data->lingkungan)}}" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Alamat Tinggal</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="alamat" class="form-control" autocomplete="off" id="alamat" value="{{ $data->penduduk->alamat }}" readonly>
                    </div>
                </div>

                {{-- <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Status Penduduk</b></label>
                    <div class="col-sm-12">
                        @php
                            $sp = $data->penduduk->statuspenduduk;
                            if ($sp == 1) {
                                $status = 'Aktif';
                            } elseif ($sp == 2) {
                                $status = 'Pendatang';
                            } elseif ($sp == 3) {
                                $status = 'Pindah';
                            } elseif ($sp == 4){
                                $status = 'Meniggal';
                            } else {
                                $status = '';
                            }
                        @endphp
                        <input type="text"  id="nik" name="nik" value="{{ $status }}" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Status Keluarga</b></label>
                    <div class="col-sm-12">
                        <input type="text"  id="nik" name="nik" value="{{ $data->penduduk->statuskeluarga->nama }}" class="form-control" readonly>
                    </div>
                </div> --}}

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Status Perkawinan</b></label>
                    <div class="col-sm-12">
                        <input type="text"  id="nik" name="nik" value="{{ $data->penduduk->statuskawin }}" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Pekerjaan</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="pekerjaan" class="form-control" autocomplete="off" id="pekerjaan" value="{{ $data->penduduk->pekerjaan }}" readonly>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>No HP/WhatsApp</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="nohp" class="form-control" autocomplete="off" id="nohp" value="{{ $data->nohp }}" readonly>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Jenis Surat</b></label>
                    <div class="col-sm-12">
                        <input type="hidden" name="idsurat" class="form-control" value="{{ $data->idsurat }}" readonly>
                        <input type="text" name="surat" class="form-control" autocomplete="off" id="surat" value="{{ $data->surat->nama }}" readonly>
                    </div>
                </div>

                {{-- <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Email</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="email" class="form-control" autocomplete="off" id="email" value="{{ $data->email }}" readonly>
                    </div>
                </div> --}}

                @if ($data->idsurat == 4)
                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Nama</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="namameninggal" class="form-control" autocomplete="off" value="{{ $detil->nama }}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>NIK</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="nikmeninggal" class="form-control" autocomplete="off" value="{{ $detil->nik }}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Tempat Lahir</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="tempatlahirmeninggal" class="form-control" autocomplete="off" value="{{ $detil->tempatlahir }}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Tanggal Lahir</b></label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control flatpickr-basic" name="tgllahirmeninggal" value="{{ $detil->tgllahir }}" placeholder="Pilih" style="background-color: white" required>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Jenis Kelamin</b></label>
                    <div class="col-sm-12">
                        <div class="row mx-0" style="margin-top:8px;">
                            <div class="custom-control custom-control-primary custom-radio mr-4">
                                <input type="radio" id="jkm" name="jkmeninggal" value="1" class="custom-control-input" {{$detil->jk == 1 ? 'checked':''}}>
                                <label class="custom-control-label" for="jkm">Laki-laki</label>
                            </div>
                            <div class="custom-control custom-control-primary custom-radio">
                                <input type="radio" id="jkma" name="jkmeninggal" value="2" class="custom-control-input"  {{$detil->jk == 2 ? 'checked':''}}>
                                <label class="custom-control-label" for="jkma">Perempuan</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-sm-4 col-form-label"><b>Agama</b></label>
                    <div class="col-sm-12">
                        <select class="form-control show-tick ms select2" name="agamameninggal" data-placeholder="Pilih">
                            <option value=""></option>
                            <option value="Islam" {{$detil->agama == 'Islam' ? 'selected':''}}>Islam</option>
                            <option value="Hindu" {{$detil->agama == 'Hindu' ? 'selected':''}}>Hindu</option>
                            <option value="Katolik" {{$detil->agama == 'Katolik' ? 'selected':''}}>Katolik</option>
                            <option value="Protestan" {{$detil->agama == 'Prostestan' ? 'selected':''}}>Protestan</option>
                            <option value="Budha" {{$detil->agama == 'Budha' ? 'selected':''}}>Budha</option>
                            <option value="Konghucu" {{$detil->agama == 'Konghucu' ? 'selected':''}}>Konghucu</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-sm-12 col-form-label"><b>Alamat</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="alamatmeninggal" class="form-control" autocomplete="off" value="{{ $detil->alamat }}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Tempat Meninggal</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="tempatmeninggal" class="form-control" autocomplete="off" value="{{ $detil->tempatmeninggal }}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Tanggal Meniggal</b></label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control flatpickr-basic" name="tglmeninggal" value="{{ $detil->tglmeninggal }}" placeholder="Pilih" style="background-color: white" required>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Penyebab Meninggal</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="penyebabmeninggal" class="form-control" autocomplete="off" value="{{ $detil->penyebab }}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Hubungan dengan pelapor</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="hubungan" class="form-control" autocomplete="off" value="{{ $detil->hubungan }}">
                    </div>
                </div>
                @endif

                <div class="form-group col-md-12">
                    <label class="col-sm-12 col-form-label"><b>Keterangan</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="keterangan" class="form-control" autocomplete="off" id="keterangan" value="{{ $data->keterangan }}" required>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label class="col-sm-12 col-form-label"><b>Maksud/Keperluan</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="maksud" class="form-control" autocomplete="off" id="maksud" value="{{ $data->maksud }}" required>
                    </div>
                </div>

                {{-- <div class="form-group col-md-12">
                    <label class="col-sm-4 col-form-label"><b>Photo KTP</b></label>
                    <div class="col-sm-12">
                        <div class="body">
                            @if($data->ktp == null)
                                <input type="file" class="dropify" name="photo" id="photo"  data-allowed-file-extensions="jpg jpeg" data-max-file-size="1M">
                            @else
                                <input type="file" class="dropify" data-default-file="{{ asset('storage/'.$data->ktp) }}" name="photo" id="photo" data-allowed-file-extensions="jpg jpeg" data-max-file-size="1M" readonly>
                            @endif
                        </div>
                        <label class="col-form-label"><small>* format file <b>.jpg</b> atau <b>.jpeg</b>, ukuran maksimal 1MB</small></label>
                    </div>
                </div> --}}


            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
          </div>
          @csrf
        </form>
      </div>
    </div>
  </div>
@endsection

@section('jspage')
<script>
    $(document).ready(function(){
        $('.form-tolak').on('click','.btn-tolak', function(){
            if( !confirm('Tolak Pengajuan {{ $data->surat->nama }} a/n {{ $data->penduduk->nama }}?')){
                event.preventDefault();
            }
        })
    });
</script>
@endsection
