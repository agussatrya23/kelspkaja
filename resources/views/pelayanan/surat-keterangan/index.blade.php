@extends('layouts.masterweb')

@section('title-head', 'Surat Keterangan')

@section('content')

    <section class="page-title" style="background-image: url({{ asset('assets/images/background/page-title-6.jpg') }});">
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

    <section class="feature-style-two sec-pad-2">
        <div class="auto-container">
            <div class="sec-title centred bg-color">
                <p>Pengajuan Surat Keterangan</p>
                <h2>Pilih Surat Keterangan</h2>
                <div class="dotted-box">
                    <span class="dotted"></span>
                    <span class="dotted"></span>
                    <span class="dotted"></span>
                </div>
            </div>
            <div class="row clearfix mt-5">
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="title-inner">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/images/icons/surket-usaha.png') }}" alt="">
                                </div>
                                <h3>Surat Keterangan Usaha</h3>
                            </div>
                            <div class="text">
                                <p>Nunc quam arcpretim quis lobortis sem consequat cons newtetur diam ...</p>
                            </div>
                            <div class="link"><a href="{{  route('cari-nik') }}"><span>Ajukan Sekarang</span><i class="flaticon-send"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="title-inner">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/images/icons/surket-tempatusaha.png') }}" alt="">
                                </div>
                                <h3>Surat Keterangan Tempat Usaha</h3>
                            </div>
                            <div class="text">
                                <p>Nunc quam arcpretim quis lobortis sem consequat cons newtetur diam ...</p>
                            </div>
                            <div class="link"><a href="index-2.html"><span>Ajukan Sekarang</span><i class="flaticon-send"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="title-inner">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/images/icons/surket-menikah.png') }}" alt="">
                                </div>
                                <h3>Surat Keterngan Menikah</h3>
                            </div>
                            <div class="text">
                                <p>Nunc quam arcpretim quis lobortis sem consequat cons newtetur diam ...</p>
                            </div>
                            <div class="link"><a href="index-2.html"><span>Ajukan Sekarang</span><i class="flaticon-send"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="title-inner">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/images/icons/surket-kematian.png') }}" alt="">
                                </div>
                                <h3>Surat Keterangan Kematian</h3>
                            </div>
                            <div class="text">
                                <p>Nunc quam arcpretim quis lobortis sem consequat cons newtetur diam ...</p>
                            </div>
                            <div class="link"><a href="index-2.html"><span>Ajukan Sekarang</span><i class="flaticon-send"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="title-inner">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/images/icons/surket-kurangmampu.png') }}" alt="">
                                </div>
                                <h3>Surat Keterangan Kurang Mampu</h3>
                            </div>
                            <div class="text">
                                <p>Nunc quam arcpretim quis lobortis sem consequat cons newtetur diam ...</p>
                            </div>
                            <div class="link"><a href="index-2.html"><span>Ajukan Sekarang</span><i class="flaticon-send"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="title-inner">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/images/icons/surket-tempattinggal.png') }}" alt="">
                                </div>
                                <h3>Surat Keterangan Tempat Tinggal</h3>
                            </div>
                            <div class="text">
                                <p>Nunc quam arcpretim quis lobortis sem consequat cons newtetur diam ...</p>
                            </div>
                            <div class="link"><a href="index-2.html"><span>Ajukan Sekarang</span><i class="flaticon-send"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
