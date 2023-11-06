@extends('layouts.masterweb')

@section('title-head', 'Form Pengajuan')

@section('css-plus')
    <link href="{{ asset('assets/css/nice-select.css') }}" rel="stylesheet">
@endsection

@section('content')

    <section class="page-title" style="background-image: url({{ asset('assets/images/slider/page-banner-1.jpg') }});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title-box">
                    <h1>Surat Keterangan</h1>
                    <div class="dotted-box">
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                    </div>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="{{ route('welcome') }}">Beranda</a></li>
                    <li>Pelayanan</li>
                    <li>Surat Keterangan</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="contact-page-section cari-nik">
        <div class="auto-container">
            <div class="contact-form-inner">
                <div class="sec-title bg-color centred">
                    <h2>Pencarian NIK (Nomor Induk Kependudukan)</h2>
                    <span>Silakan masukkan NIK (Nomor Induk Kependudukan) untuk melanjutkan proses pengajuan surat keterangan.</span>
                    <div class="dotted-box">
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                    </div>
                </div>
                <div class="form-inner">
                    <form method="get" action="{{ route('pengajuan') }}" id="contact-form" class="default-form">
                        @if (session('status'))
                        <div class="row clearfix justify-content-center">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group text-center">
                                {{-- <span class="text-danger">NIK <b>{{ session('status') }}</b> Tidak Ditemukan dan Pastikan NIK telah terdaftar di Kelurahan Semarapura Kaja</span> --}}
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <h4 class="alert-heading">Pencarian NIK</h4>
                                    <hr>
                                    <p>NIK <b>{{ session('status') }}</b> Tidak Ditemukan dan Pastikan NIK telah terdaftar di Kelurahan Semarapura Kaja</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row clearfix justify-content-center">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group text-center">
                                <input type="text" name="carinik" class='text-center' value="{{ request()->input('carinik') }}" placeholder="Masukkan NIK..." required="" autofocus>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                                <button class="theme-btn-two" type="submit"><i class="flaticon-search"></i>Cari NIK</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="service-section p-0 bg-color-3">
        <div class="more-text centred mt-0">
            <div class="auto-container">
                <div class="inner">
                    <h3>Telusuri pengajuan jika sudah melakukan pengajuan. <a href="{{ route('indexcekpengajuan') }}"><span>Telusuri Pengajuan</span><i class="flaticon-send"></i></a></h3>
                </div>
            </div>
        </div>
    </section>

@endsection
