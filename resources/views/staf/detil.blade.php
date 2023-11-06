@extends('layouts.menu')

@section('title-head', 'Aparatur')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">
              Detail Aparatur
          </h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Aparatur</a></li>
              <li class="breadcrumb-item active">Detail</li>
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
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body text-center row mx-0 align-items-start justify-content-center">
                <img src="{{$data->photo == null ? asset('user-default.jpg') : asset('upload/'.$data->photo)}}" class="rounded" width="100%" alt="">
                @if(Auth::user()->can('kaling') == false)
                    <button class="btn btn-sm btn-outline-danger mt-75" data-toggle="modal" data-target="#modal-staf"><i data-feather="edit"></i> Ubah Biodata</button>
                @endif
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive-lg">
                  <table class="table table-striped">
                    <tr>
                      <td colspan="2"><h2 class="mb-0">{{$data->nama}}</h2></td>
                    </tr>
                    <tr>
                      <td width="30%">Jabatan</td>
                      <th>
                        {{ $data->jabatan->nama }}
                      </th>
                    </tr>
                    <tr>
                      <td width="30%">NIP</td>
                      <th>{{$data->nip == null ? '' : $data->nip}}</th>
                    </tr>
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
                    <tr>
                        <td width="30%">Agama</td>
                        <th>{{$data->agama == null ? '' : $data->agama}}</th>
                      </tr>
                    <tr>
                        <td width="30%">Tempat, Tanggal Lahir</td>
                        <th>{{ $data->tempatlahir }}, {{(new \App\Helper)->tanggal($data->tgllahir)}}</th>
                    </tr>
                    <tr>
                        <td width="30%">Status Kawin</td>
                        <th>{{$data->statuskawin}}</th>
                      </tr>
                    <tr>
                      <td width="30%">Email</td>
                      <th>{{$data->email}}</th>
                    </tr>
                    <tr>
                      <td width="30%">Telepon</td>
                      <th>{{$data->telepon}}</th>
                    </tr>
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
    </div>
  </div>
</div>
@endsection

@section('modal')
<div class="modal fade text-left" id="modal-staf" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">UBAH DATA APARATUR</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="jquery-val-form" action="{{ route('staf.update') }}" enctype="multipart/form-data" method="post">
          <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
          <input type="hidden" class="form-control" name="niplama" value="{{$data->nip}}">
          <div class="modal-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>NIP</b></label>
                    <div class="col-sm-12">
                        <input type="text"  id="nip" name="nip" value="{{ $data->nip }}" class="form-control" required>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Jabatan</b></label>
                    <div class="col-sm-12">
                        <select class="form-control show-tick ms select2" id="idjabatan" name="idjabatan" required style="width:100%" data-placeholder="Pilih">
                            <option value=""></option>
                            @foreach($jabatan as $j)
                            <option {{$j->id == $data->idjabatan ? 'selected':''}} value="{{$j->id}}">{{$j->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label class="col-sm-4 col-form-label"><b>Nama</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $data->nama }}" required>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Tempat Lahir</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="tempatlahir" class="form-control"
                            id="tempatlahir" value="{{ $data->tempatlahir }}">
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Tanggal Lahir</b></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control flatpickr-basic" name="tgllahir" value="{{ $data->tgllahir }}" placeholder="Pilih" style="background-color: white">
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
                    <label class="col-sm-12 col-form-label"><b>Email</b></label>
                    <div class="col-sm-12">
                        <input type="email" name="email" value="{{ $data->email }}" class="form-control"
                            id="email">
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>No Telepon</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="telepon" value="{{ $data->telepon }}" class="form-control"
                            id="telepon" required>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Alamat Tinggal</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="alamat" class="form-control" id="alamat"  value="{{ $data->alamat }}" required>
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

                <div class="form-group col-md-12">
                    <label class="col-sm-4 col-form-label"><b>Pas Photo</b></label>
                    <div class="col-sm-12">
                        <div class="body">
                            @if($data->photo == null)
                                <input type="file" class="dropify" name="photo" id="photo"  data-allowed-file-extensions="jpg jpeg" data-max-file-size="1M">
                            @else
                                <input type="file" class="dropify" data-default-file="{{ asset('upload/'.$data->photo) }}" name="photo" id="photo" data-allowed-file-extensions="jpg jpeg" data-max-file-size="1M">
                            @endif
                        </div>
                        <label class="col-form-label"><small>* format file <b>.jpg</b> atau <b>.jpeg</b>, rasio <b>3x4</b> ukuran maksimal 1MB</small></label>
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

@section('jspage')
<script>
$(document).ready(function() {

});
</script>
@stop
