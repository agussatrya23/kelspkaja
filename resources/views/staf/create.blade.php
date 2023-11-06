@extends('layouts.menu')

@section('title-head', 'Aparatur')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Tambah Aparatur</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Aparatur
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
                        <form id='jquery-val-form' class="forms-sample" action="{{ route('staf.store') }}" method="post" enctype="multipart/form-data" id="formstaf">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="col-sm-12">
                                      <h4 class="mb-2 text-lg-left text-center text-primary"><b>Data Aparatur</b></h4>
                                      <div class="dropdown-divider"></div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>NIP</b></label>
                                    <div class="col-sm-12">
                                        <input type="text"  id="nip" name="nip" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>Jabatan</b></label>
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick ms select2" id="idjabatan" name="idjabatan" data-placeholder="Pilih" required>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="col-sm-4 col-form-label"><b>Nama</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" name="nama" class="form-control" id="nama" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>Tempat Lahir</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" name="tempatlahir" class="form-control"
                                            id="tempatlahir">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>Tanggal Lahir</b></label>
                                    <div class="col-sm-12">
                                      <input type="text" class="form-control flatpickr-basic" name="tgllahir" placeholder="Pilih" style="background-color: white">
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
                                <div class="form-group col-md-6">
                                    <label class="col-sm-4 col-form-label"><b>Agama</b></label>
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick ms select2" name="agama" data-placeholder="Pilih">
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
                                    <label class="col-sm-12 col-form-label"><b>Email</b></label>
                                    <div class="col-sm-12">
                                        <input type="email" name="email" class="form-control"
                                            id="email">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>No Telepon</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" name="telepon" class="form-control"
                                            id="telepon" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>Alamat Tinggal</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" name="alamat" class="form-control" id="alamat" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-12 col-form-label"><b>Status Perkawinan</b></label>
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick ms select2" name="statuskawin" data-placeholder="Pilih">
                                            <option value=""></option>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="col-sm-4 col-form-label"><b>Pas Photo</b></label>
                                    <div class="col-sm-12">
                                    <div class="body">
                                        <input type="file" class="dropify" name="photo" data-allowed-file-extensions="jpg jpeg" data-max-file-size="1M">
                                    </div>
                                    <label class="col-form-label"><small>* format file <b>.jpg</b> atau <b>.jpeg</b>, rasio <b>3x4</b> ukuran maksimal 1MB</small></label>
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
        $("#idjabatan").select2({
        placeholder: "Pilih",
        ajax: {
            url: '{!!route("s2.jabatan")!!}',
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
