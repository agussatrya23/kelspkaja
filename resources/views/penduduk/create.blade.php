@extends('layouts.menu')

@section('title-head', 'Penduduk')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Tambah Penduduk</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Penduduk
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
                        <form id='jquery-val-form' class="forms-sample" action="{{ route('penduduk.store') }}" method="post" id="formpenduduk">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="col-sm-12">
                                      <h4 class="mb-2 text-lg-left text-center text-primary"><b>Data Penduduk</b></h4>
                                      <div class="dropdown-divider"></div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>No KK</b></label>
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick ms select2" id="nokk" name="idkk" data-placeholder="Pilih" required>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>NIK</b></label>
                                    <div class="col-sm-12">
                                        <input type="text"  id="nik" name="nik" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="col-sm-4 col-form-label"><b>Nama Lengkap</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" name="nama" class="form-control" autocomplete="off" id="nama" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>Tempat Lahir</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" name="tempatlahir" autocomplete="off" class="form-control"
                                            id="tempatlahir" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>Tanggal Lahir</b></label>
                                    <div class="col-sm-12">
                                      <input type="text" class="form-control flatpickr-basic" name="tgllahir" placeholder="Pilih" style="background-color: white" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>Jenis Kelamin</b></label>
                                    <div class="col-sm-12">
                                        <div class="row mx-0" style="margin-top:8px;">
                                            <div class="custom-control custom-control-primary custom-radio mr-4">
                                                <input type="radio" id="jk" name="jk" value="1" class="custom-control-input" checked>
                                                <label class="custom-control-label" for="jk">Laki-laki</label>
                                            </div>
                                            <div class="custom-control custom-control-primary custom-radio">
                                                <input type="radio" id="jka" name="jk" value="2" class="custom-control-input">
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
                                                <input type="radio" id="wn" name="wn" value="1" class="custom-control-input" checked>
                                                <label class="custom-control-label" for="wn">WNI</label>
                                            </div>
                                            <div class="custom-control custom-control-primary custom-radio">
                                                <input type="radio" id="wna" name="wn" value="2" class="custom-control-input">
                                                <label class="custom-control-label" for="wna">WNA</label>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="form-group col-md-6">
                                    <label class="col-sm-4 col-form-label"><b>Agama</b></label>
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick ms select2" name="agama" data-placeholder="Pilih" required>
                                            <option value=""></option>
                                            <option value="Islam">Islam</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>Lingkungan</b></label>
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick ms select2" name="lingkungan" data-placeholder="Pilih" required>
                                            <option value=""></option>
                                            @if (Auth::user()->staf->idjabatan == 3)
                                               <option value="1">Lingkungan Besang Kawan</option>
                                            @elseif (Auth::user()->staf->idjabatan == 4)
                                                <option value="2">Lingkungan Besang Tengah</option>
                                            @elseif (Auth::user()->staf->idjabatan == 5)
                                                <option value="3">Lingkungan Besang Kangin</option>
                                            @else
                                                <option value="1">Lingkungan Besang Kawan</option>
                                                <option value="2">Lingkungan Besang Tengah</option>
                                                <option value="3">Lingkungan Besang Kangin</option>
                                            @endif

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>Alamat Tinggal</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" name="alamat" class="form-control" autocomplete="off" id="alamat" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>Pekerjaan</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" name="pekerjaan" class="form-control" autocomplete="off" id="pekerjaan" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>Status Penduduk</b></label>
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick ms select2" name="statuspenduduk" data-placeholder="Pilih" required>
                                            <option value=""></option>
                                            <option value="1">Aktif</option>
                                            <option value="2">Pendatang</option>
                                            <option value="3">Pindah</option>
                                            <option value="4">Meninggal</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>Status Perkawinan</b></label>
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick ms select2" name="statuskawin" data-placeholder="Pilih" required>
                                            <option value=""></option>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>Status Keluarga</b></label>
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick ms select2" id="statuskeluarga" name="idstatuskeluarga" data-placeholder="Pilih" required>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <div class="col-sm-12">
                                      <div class="dropdown-divider my-2"></div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-icon btn-lg btn-block btn-primary mb-2"><i data-feather="save"></i> Simpan</button>
                            </div>

                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('jspage')
<script>
     $(document).ready(function(){
        $("#nokk").select2({
        placeholder: "Pilih",
        ajax: {
            url: '{!!route("s2.nokk")!!}',
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        });

        $("#statuskeluarga").select2({
        placeholder: "Pilih",
        ajax: {
            url: '{!!route("s2.statuskeluarga")!!}',
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        });
     });
</script>
@endsection
