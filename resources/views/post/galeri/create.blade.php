@extends('layouts.menu')

@section('title-head', 'Galeri')

@section('csspage')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-quill-editor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/page-blog.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Tambah Galeri</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Galeri</a>
                            </li>
                            <li class="breadcrumb-item active">Tambah
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
                        <form id="jquery-val-form" class="forms-sample" action="{{ route('galeri.store') }}" method="post" enctype="multipart/form-data" id="formgaleri">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="col-sm-12">
                                      <h4 class="mb-2 text-lg-left text-center text-primary"><b>Data Galeri</b></h4>
                                      <div class="dropdown-divider"></div>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-sm-4 col-form-label"><b>Jenis</b></label>
                                    <div class="col-sm-12">
                                        <input type="text"  id="jenis" name="jenis" class="form-control" value="Galeri" readonly>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-sm-4 col-form-label"><b>Status</b></label>
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick ms select2" name="status" data-placeholder="Pilih" required>
                                            <option value=""></option>
                                            <option value="1">Publish</option>
                                            <option value="2">Draft</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-sm-12 col-form-label"><b>Tanggal</b></label>
                                    <div class="col-sm-12">
                                      <input type="text" class="form-control flatpickr-basic" name="tanggal" placeholder="Pilih" style="background-color: white" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="col-sm-4 col-form-label"><b>Foto</b></label>
                                    <div class="col-sm-12">
                                    <div class="body">
                                        <input type="file" class="dropify" name="gambar" data-allowed-file-extensions="jpg jpeg" data-max-file-size="1M" required>
                                    </div>
                                    <label class="col-form-label"><small>* format file <b>.jpg</b> atau <b>.jpeg</b>, rasio <b>7x5</b> ukuran maksimal 1MB</small></label>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="col-sm-12 col-form-label"><b>Judul</b></label>
                                    <div class="col-sm-12">
                                        <input type="text"  id="judul" name="judul" class="form-control" required>
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
    <script src="{{ asset('app-assets/js/scripts/pages/page-blog-edit.js') }}"></script>
@endsection
