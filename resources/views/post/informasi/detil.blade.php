@extends('layouts.menu')

@section('title-head', 'Informasi')

@section('csspage')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-quill-editor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/page-blog.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    {{-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> --}}
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Detail Informasi</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Informasi</a>
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
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-lg-8 col-6">
                                        <h4 class="mb-0 text-primary"><b>Data Informasi</b></h4>
                                    </div>
                                    <div class="col-lg-4 col-6 text-right">
                                        <button class="btn btn-md btn-gradient-danger" type="button" data-toggle="modal" data-target="#modal-informasi" data-backdrop="static" data-keyboard="false"><i data-feather="edit"></i> Ubah Informasi</button>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                            </div>

                            <div class="col-md-5">
                                <img class="img-fluid" src="{{ asset('upload/'.$data->gambar) }}" alt="">
                                <div class="media mt-1">
                                    <div class="media-body">
                                        @php
                                            $dataJenis = ['Berita','Pengumuman','Agenda'];
                                            $jenisinfo = $dataJenis[$data->jenis - 2];
                                        @endphp
                                        <span class="text-body"><i class="text-primary" data-feather="info"></i> {{ $jenisinfo }}</span>
                                        <span class="text-muted ml-50 mr-25">|</span>
                                        <span class="text-body"><i class="text-primary" data-feather="user"></i> By Admin</span>
                                        <span class="text-muted ml-50 mr-25">|</span>
                                        <span class="text-body"><i class="text-primary" data-feather="calendar"></i> {{ (new \App\Helper)->tanggal($data->tanggal) }}</span>
                                    </div>
                                </div>

                                <h3 class="mt-1 card-title">
                                    {{ $data->judul }}
                                    @if ($data->status == 1)
                                        <div class="badge badge-pill badge-light-success ml-50">Publish</div>
                                    @else
                                        <div class="badge badge-pill badge-light-warning ml-50">Draft</div>
                                    @endif
                                </h3>
                            </div>

                            <div class="col-md-7">
                                <h5>Deskripsi :</h5>
                                <div class="card-text">
                                    {!! $data->isi !!}
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
    <div class="modal fade" id="modal-informasi" tabindex="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaltitle">UBAH DATA INFORMASI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="jquery-val-form" class="forms-sample" action="{{ route('informasi.update') }}" method="post" enctype="multipart/form-data" id="forminformasi">
                        <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="col-sm-4 col-form-label"><b>Jenis</b></label>
                                <div class="col-sm-12">
                                    <select class="form-control show-tick ms select2" name="jenis" data-placeholder="Pilih" required>
                                        <option value=""></option>
                                        <option {{$data->jenis == '2' ? 'selected':''}} value="2">Berita</option>
                                        <option {{$data->jenis == '3' ? 'selected':''}} value="3">Pengumuman</option>
                                        <option {{$data->jenis == '4' ? 'selected':''}} value="4">Agenda</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="col-sm-4 col-form-label"><b>Status</b></label>
                                <div class="col-sm-12">
                                    <select class="form-control show-tick ms select2" name="status" data-placeholder="Pilih" required>
                                        <option value=""></option>
                                        <option {{$data->status == '1' ? 'selected':''}} value="1">Publish</option>
                                        <option {{$data->status == '2' ? 'selected':''}} value="2">Draft</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="col-sm-12 col-form-label"><b>Tanggal</b></label>
                                <div class="col-sm-12">
                                  <input type="text" class="form-control flatpickr-basic" name="tanggal" placeholder="Pilih" value="{{ $data->tanggal }}" style="background-color: white" required>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="col-sm-12 col-form-label"><b>Judul</b></label>
                                <div class="col-sm-12">
                                    <input type="text"  id="judul" name="judul" value="{{ $data->judul }}" class="form-control" required>
                                    {{-- <input type="hidden" class="form-control" name="slug" value="{{$data->slug}}"> --}}
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="col-sm-12 col-form-label"><b>Isi</b></label>
                                <div class="col-12">
                                    <div id="content">
                                        {!! $data->isi !!}
                                    </div>
                                    <textarea name="isi" id="content-textarea" type="textarea" style="display: none">{{ $data->isi }}</textarea>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="col-sm-4 col-form-label"><b>Foto</b></label>
                                <div class="col-sm-12">
                                <div class="body">
                                    @if($data->gambar == null)
                                        <input type="file" class="dropify" name="gambar" id="gambar"  data-allowed-file-extensions="jpg jpeg" data-max-file-size="1M" required>
                                    @else
                                        <input type="file" class="dropify" data-default-file="{{ asset('upload/'.$data->gambar) }}" name="gambar" id="gambar" data-allowed-file-extensions="jpg jpeg" data-max-file-size="1M">
                                    @endif
                                </div>
                                <label class="col-form-label"><small>* format file <b>.jpg</b> atau <b>.jpeg</b>, rasio <b>7x5</b> ukuran maksimal 1MB</small></label>
                                </div>
                            </div>

                        </div>

                        {{ csrf_field() }}
                </div>
                <div class="modal-footer btn-sm">
                    <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Simpan</button>
                    <button class="btn btn-danger waves-effect waves-float waves-light" data-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{-- <script src="{{ asset('app-assets/js/scripts/pages/page-blog-edit.js') }}"></script> --}}
    <script src="{{asset('app-assets/vendors/js/editors/quill/quill.js')}}"></script>
    {{-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> --}}
@endsection

@section('jspage')
<script>
    $(document).ready(function(){
        var quill = new Quill('#content', {
          theme: 'snow'
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            $('#content-textarea').text($(".ql-editor").html());
        });
    });
  </script>
@endsection


