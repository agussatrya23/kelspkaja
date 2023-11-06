@extends('layouts.menu')

@section('title-head', 'Penduduk')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Detail Penduduk</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Penduduk</a>
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
                                    <div class="col-lg-8 col-6">
                                        <h4 class="mb-0 text-primary"><b>Data Penduduk</b></h4>
                                    </div>
                                    @if(Auth::user()->can('lurah') == false)
                                        <div class="col-lg-4 col-6 text-right">
                                            <button class="btn btn-md btn-gradient-danger" type="button" data-toggle="modal" data-target="#modal-penduduk" data-backdrop="static" data-keyboard="false"><i data-feather="edit"></i> Ubah Biodata</button>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="table-responsive-lg">
                                    <table class="table table-striped">
                                    <tr>
                                        <td colspan="2"><h2 class="mb-0">{{$data->nama}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">No KK</td>
                                        <th>{{$data->idkk == null ? '' : $data->kartukeluarga->nokk}}</th>
                                    </tr>
                                    <tr>
                                        <td width="30%">NIK</td>
                                        <th>{{$data->nik == null ? '' : $data->nik}}</th>
                                    </tr>
                                    <tr>
                                        <td width="30%">Lingkungan</td>
                                        <th>Lingkungan {{(new \App\Helper)->lingkungan($data->lingkungan)}}</th>
                                    </tr>
                                    {{-- <tr>
                                        <td width="30%">Kewarganegaraan</td>
                                        @if ($data->wn == 1)
                                            <th>Warga Negara Indonesia</th>
                                        @elseif ($data->wn == 2)
                                            <th>Warga Negara Asing</th>
                                        @else
                                            <th></th>
                                        @endif
                                    </tr> --}}
                                    <tr>
                                        <td width="30%">Jenis Kelamin</td>
                                        @php
                                            $jk = $data->jk;
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
                                        <th>{{$data->agama == null ? '' : $data->agama}}</th>
                                    </tr>
                                    <tr>
                                        <td width="30%">Tempat, Tanggal Lahir</td>
                                        <th>{{ $data->tempatlahir }}, {{(new \App\Helper)->tanggal($data->tgllahir)}}</th>
                                    </tr>
                                    <tr>
                                        <td width="30%">Status Penduduk</td>
                                        <th>
                                            @if ($data->statuspenduduk == 1)
                                                <div class="badge badge-light-success">Aktif</div>
                                            @elseif ($data->statuspenduduk == 2)
                                                <div class="badge badge-light-primary">Pendatang</div>
                                            @elseif ($data->statuspenduduk  == 3)
                                                <div class="badge badge-light-warning">Pindah</div>
                                            @elseif ($data->statuspenduduk == 4)
                                                <div class="badge badge-light-danger">Meninggal</div>
                                            @endif
                                        </th>
                                        </tr>
                                    <tr>
                                    <tr>
                                        <td width="30%">Status Kawin</td>
                                        <th>{{$data->statuskawin}}</th>
                                    </tr>
                                    <tr>
                                        <td width="30%">Pekerjaan</td>
                                        <th>{{$data->pekerjaan}}</th>
                                    </tr>
                                    <tr>
                                        <td width="30%">Alamat</td>
                                        <th>{{$data->alamat}}</th>
                                    </tr>

                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12 mb-1">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h4 class="text-primary"><b>Data Keluarga</b></h4>
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
                                        @if ($data->idkk == null || $data->idkk == '')
                                            <tr>
                                                <td colspan="4" class="text-center my-1">Data Keluarga Tidak Ditemukan</td>
                                            </tr>
                                        @else
                                            @foreach ($keluarga as $k)
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
                                            @endforeach
                                        @endif
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

@section('modal')
<div class="modal fade text-left" id="modal-penduduk" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">UBAH DATA PENDUDUK</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="jquery-val-form" action="{{ route('penduduk.update') }}" enctype="multipart/form-data" method="post">
          <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
          <div class="modal-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>No KK</b></label>
                    <div class="col-sm-12">
                        <select class="form-control show-tick ms select2" id="nokk" name="idkk" required style="width:100%" data-placeholder="Pilih">
                            <option value=""></option>
                            @foreach($kk as $no)
                            <option {{$no->id == $data->idkk ? 'selected':''}} value="{{$no->id}}">{{$no->nokk}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <input type="hidden"  id="nik" name="niklama" value="{{ $data->nik }}" class="form-control">
                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>NIK</b></label>
                    <div class="col-sm-12">
                        <input type="text"  id="nik" name="nik" value="{{ $data->nik }}" class="form-control" required>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label class="col-sm-4 col-form-label"><b>Nama Lengkap</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="nama" class="form-control" autocomplete="off" id="nama" value="{{ $data->nama }}" required>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Tempat Lahir</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="tempatlahir" autocomplete="off" class="form-control"
                            id="tempatlahir" value="{{ $data->tempatlahir }}" required>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Tanggal Lahir</b></label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control flatpickr-basic" name="tgllahir" value="{{ $data->tgllahir }}" placeholder="Pilih" style="background-color: white" required>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Jenis Kelamin</b></label>
                    <div class="col-sm-12">
                        <div class="row mx-0" style="margin-top:8px;">
                            <div class="custom-control custom-control-primary custom-radio mr-4">
                                <input type="radio" id="jk" name="jk" value="1" class="custom-control-input" {{$data->jk == 1 ? 'checked':''}}>
                                <label class="custom-control-label" for="jk">Laki-laki</label>
                            </div>
                            <div class="custom-control custom-control-primary custom-radio">
                                <input type="radio" id="jka" name="jk" value="2" class="custom-control-input"  {{$data->jk == 2 ? 'checked':''}}>
                                <label class="custom-control-label" for="jka">Perempuan</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Kewarganegaraan</b></label>
                    <div class="col-sm-12">
                        <div class="row mx-0" style="margin-top:8px;">
                            <div class="custom-control custom-control-primary custom-radio mr-4">
                                <input type="radio" id="wn" name="wn" value="1" class="custom-control-input" {{$data->wn == 1 ? 'checked':''}}>
                                <label class="custom-control-label" for="wn">WNI</label>
                            </div>
                            <div class="custom-control custom-control-primary custom-radio">
                                <input type="radio" id="wna" name="wn" value="2" class="custom-control-input" {{$data->wn == 2 ? 'checked':''}}>
                                <label class="custom-control-label" for="wna">WNA</label>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="form-group col-md-6">
                    <label class="col-sm-4 col-form-label"><b>Agama</b></label>
                    <div class="col-sm-12">
                        <select class="form-control show-tick ms select2" name="agama" data-placeholder="Pilih">
                            <option value=""></option>
                            <option value="Islam" {{$data->agama == 'Islam' ? 'selected':''}}>Islam</option>
                            <option value="Hindu" {{$data->agama == 'Hindu' ? 'selected':''}}>Hindu</option>
                            <option value="Katolik" {{$data->agama == 'Katolik' ? 'selected':''}}>Katolik</option>
                            <option value="Protestan" {{$data->agama == 'Prostestan' ? 'selected':''}}>Protestan</option>
                            <option value="Budha" {{$data->agama == 'Budha' ? 'selected':''}}>Budha</option>
                            <option value="Konghucu" {{$data->agama == 'Konghucu' ? 'selected':''}}>Konghucu</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Lingkungan</b></label>
                    <div class="col-sm-12">
                        <select class="form-control show-tick ms select2" name="lingkungan" data-placeholder="Pilih" required>
                            <option value=""></option>
                            @if (Auth::user()->staf->idjabatan == 3)
                               <option value="1" {{$data->lingkungan == 1 ? 'selected':''}}>Lingkungan Besang Kawan</option>
                            @elseif (Auth::user()->staf->idjabatan == 4)
                                <option value="2" {{$data->lingkungan == 2 ? 'selected':''}}>Lingkungan Besang Tengah</option>
                            @elseif (Auth::user()->staf->idjabatan == 5)
                                <option value="3" {{$data->lingkungan == 3 ? 'selected':''}}>Lingkungan Besang Kangin</option>
                            @else
                                <option value="1" {{$data->lingkungan == 1 ? 'selected':''}}>Lingkungan Besang Kawan</option>
                                <option value="2" {{$data->lingkungan == 2 ? 'selected':''}}>Lingkungan Besang Tengah</option>
                                <option value="3" {{$data->lingkungan == 3 ? 'selected':''}}>Lingkungan Besang Kangin</option>
                            @endif

                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Alamat Tinggal</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="alamat" class="form-control" autocomplete="off" id="alamat" value="{{ $data->alamat }}" required>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Pekerjaan</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="pekerjaan" class="form-control" autocomplete="off" id="pekerjaan" value="{{ $data->pekerjaan }}" required>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Status Penduduk</b></label>
                    <div class="col-sm-12">
                        <select class="form-control show-tick ms select2" name="statuspenduduk" data-placeholder="Pilih" required>
                            <option value=""></option>
                            <option value="1" {{$data->statuspenduduk == '1' ? 'selected':''}}>Aktif</option>
                            <option value="2" {{$data->statuspenduduk == '2' ? 'selected':''}}>Pendatang</option>
                            <option value="3" {{$data->statuspenduduk == '3' ? 'selected':''}}>Pindah</option>
                            <option value="4" {{$data->statuspenduduk == '4' ? 'selected':''}}>Meninggal</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Status Perkawinan</b></label>
                    <div class="col-sm-12">
                        <select class="form-control show-tick ms select2" name="statuskawin" data-placeholder="Pilih">
                            <option value=""></option>
                            <option value="Belum Kawin" {{$data->statuskawin == 'Belum Kawin' ? 'selected':''}}>Belum Kawin</option>
                            <option value="Kawin" {{$data->statuskawin == 'Kawin' ? 'selected':''}}>Kawin</option>
                            <option value="Cerai Hidup" {{$data->statuskawin == 'Cerai Hidup' ? 'selected':''}}>Cerai Hidup</option>
                            <option value="Cerai Mati" {{$data->statuskawin == 'Cerai Mati' ? 'selected':''}}>Cerai Mati</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Status Keluarga</b></label>
                    <div class="col-sm-12">
                        <select class="form-control show-tick ms select2" id="statuskeluarga" name="idstatuskeluarga" required style="width:100%" data-placeholder="Pilih">
                            <option value=""></option>
                            @foreach($status as $s)
                            <option {{$s->id == $data->idstatuskeluarga ? 'selected':''}} value="{{$s->id}}">{{$s->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
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
