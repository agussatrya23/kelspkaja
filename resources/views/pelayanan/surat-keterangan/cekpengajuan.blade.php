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
                    <h2>Telusuri Pengajuan Surat Keterangan</h2>
                    <span>Silakan masukkan NIK (Nomor Induk Kependudukan) dan jenis surat keterangan <br> yang telah diajukan untuk menelusuri pengajuan surat keterangan.</span>
                    <div class="dotted-box">
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                    </div>
                </div>
                <div class="form-inner">
                    <form method="get" action="{{ route('cekpengajuan') }}" id="contact-form" class="default-form">
                        <div class="row clearfix justify-content-center">
                            <div class="col-lg-8 col-md-12 col-sm-12 form-group text-center">
                                @if (session('status'))
                                    {{-- <span class="text-danger">{{ session('status') }}</span> --}}
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <h4 class="alert-heading">Telusuri Pengajuan</h4>
                                        <hr>
                                        <p>{{ session('status') }}</p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @elseif (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <h4 class="alert-heading">Telusuri Pengajuan</h4>
                                    <hr>
                                    <p>{{ session('error') }}</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row clearfix justify-content-center">
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <input type="text" name="carinik" value="" placeholder="Masukkan NIK..." required autofocus>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <div class="select-box">
                                    <select class="wide" id="idsurat" name="idsurat">
                                        <option data-display="Pilih Surat Keterangan">Pilih Surat Keterangan</option>
                                        <option value="1">Surat Keterangan Usaha</option>
                                        <option value="2">Surat Keterangan Tempat Usaha</option>
                                        <option value="3">Surat Keterangan Kawin</option>
                                        <option value="4">Surat Keterangan Kematian</option>
                                        <option value="5">Surat Keterangan Kurang Mampu</option>
                                        <option value="6">Surat Keterangan Tempat Tinggal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                                <button class="theme-btn-two" type="submit"><i class="flaticon-search"></i>Telusuri Pengajuan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
