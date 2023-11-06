@extends('layouts.masterweb')

@section('title-head', 'Informasi')

@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image: url({{ asset('assets/images/slider/page-banner.jpg') }});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title-box">
                    <h1>Informasi</h1>
                    <div class="dotted-box">
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                    </div>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="{{ route('welcome') }}">Beranda</a></li>
                    <li>Informasi</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- sidebar-page-container -->
    <div class="sidebar-page-container blog-details">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{ asset('upload/'.$detil->gambar) }}" alt="">
                                    <a class="lightbox-image btn-lightbox" href="{{ asset('upload/'.$detil->gambar) }}" data-caption="{{ $detil->judul }}">
                                        <i class="fas fa-search-plus"></i>
                                    </a>
                                </figure>
                                <div class="lower-content">
                                    @php
                                        $dataJenis = ['Berita','Pengumuman','Agenda'];
                                        $jenisinfo = $dataJenis[$detil->jenis - 2];
                                    @endphp
                                    <div class="post-date detil"><h5>{{ $jenisinfo }}</h5></div>
                                    <h2>{{ $detil->judul }}</h2>
                                    <ul class="post-info clearfix">
                                        <li><span class="fa fa-user"></span>By Admin</li>

                                        <li><span class="fa fa-calendar-alt"></span>{{ (new \App\Helper)->tanggal($detil->tanggal) }}</li>
                                        <li><span class="fa fa-eye"></span>{{ $detil->klik }}</li>
                                    </ul>
                                    <div class="text">
                                        {!! $detil->isi !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-share-option clearfix">
                            <ul class="social-links pull-right clearfix">
                                <li>Bagikan di social media</li>
                                <li><a href="https://twitter.com/intent/tweet?text={{$detil->judul}}+{{Request::url()}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com/share.php?u={{Request::url()}}&title={{$detil->judul}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://api.whatsapp.com/send?text={{Request::url()}}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="sidebar blog-sidebar">
                        @include('layouts.pencarian')
                        <div class="sidebar-widget sidebar-categories-2">
                            <div class="widget-title">
                                <h3>Kategori Informasi</h3>
                                <div class="dotted-box">
                                    <span class="dotted"></span>
                                    <span class="dotted"></span>
                                    <span class="dotted"></span>
                                </div>
                            </div>
                            <div class="widget-content">
                                <ul class="categories-list clearfix">
                                    <li class="{{ empty(request()->input('kategori')) || request()->input('kategori') == 'semua' ? 'active' : '' }}"><a href="{{ route('berita') }}?kategori=semua{{ !empty(request()->input('pencarian')) ? '&pencarian='.request()->input('pencarian') : '' }}">Semua <span>({{ $totalsemua }})</span></a></li>
                                    <li class="{{ request()->input('kategori') == 'berita' ? 'active' : '' }}"><a href="{{ route('berita') }}?kategori=berita{{ !empty(request()->input('pencarian')) ? '&pencarian='.request()->input('pencarian') : '' }}">Berita <span>({{ $totalberita }})</span></a></li>
                                    <li class="{{ request()->input('kategori') == 'pengumuman' ? 'active' : '' }}"><a href="{{ route('berita')}}?kategori=pengumuman{{ !empty(request()->input('pencarian')) ? '&pencarian='.request()->input('pencarian') : '' }}">Pengumuman <span>({{ $totalpengumuman }})</span></a></li>
                                    <li class="{{ request()->input('kategori') == 'agenda' ? 'active' : '' }}"><a href="{{ route('berita')}}?kategori=agenda{{ !empty(request()->input('pencarian')) ? '&pencarian='.request()->input('pencarian') : '' }}">Agenda <span>({{ $totalagenda }})</span></a></li>
                                </ul>
                            </div>
                        </div>
                        @include('layouts.info-terkini')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar-page-container end -->
@endsection
