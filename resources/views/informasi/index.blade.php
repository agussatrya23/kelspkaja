@extends('layouts.masterweb')

@section('title-head', 'Informasi')

@section('content')

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

    <div class="sidebar-page-container blog-list">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="row clearfix">
                        @forelse ($datainfo as $data)
                            <div class="col-lg-6 col-md-6 col-sm-12 news-block">
                                <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <figure class="image-box"><a href="{{ route('detil.berita', $data->slug) }}"><img src="{{ asset('upload/'.$data->gambar) }}" alt=""></a></figure>
                                        <div class="lower-content">
                                            @php
                                                $dataJenis = ['Berita','Pengumuman','Agenda'];
                                                $jenisinfo = $dataJenis[$data->jenis - 2];
                                            @endphp
                                            <div class="post-date"><h5>{{ $jenisinfo }}</h5></div>
                                            @php
                                                $strjudul = Str::length($data->judul);
                                                if ($strjudul > 55) {
                                                    $judul_cut = substr($data->judul, 0, 55);
                                                    if ($judul_cut[54] != ' ') {
                                                        $new_pos = strrpos($judul_cut, ' ');
                                                        $judul_cut = substr($data->judul, 0, $new_pos);
                                                        $judul_cut = $judul_cut.'...';
                                                    } else {
                                                        $judul_cut = substr($data->judul, 0, 54);
                                                        $judul_cut = $judul_cut.'...';
                                                    }
                                                } else {
                                                    $judul_cut = $data->judul;
                                                }
                                            @endphp
                                            <h3><a href="{{ route('detil.berita', $data->slug) }}">{{ $judul_cut }}</a></h3>
                                            <ul class="post-info clearfix">
                                                <li><span class="fa fa-user"></span>By Admin</li>
                                                <li><span class="fa fa-calendar-alt"></span>{{ (new \App\Helper)->tanggal($data->tanggal) }}</li>
                                            </ul>
                                            @php
                                                $data->isi = strip_tags($data->isi);
                                                $strisi = Str::length($data->isi);
                                                if ($strisi > 110) {
                                                    $isi_cut = substr($data->isi, 0, 110);
                                                    if ($isi_cut[109] != ' ') {
                                                        $new_pos = strrpos($isi_cut, ' ');
                                                        $isi_cut = substr($data->isi, 0, $new_pos);
                                                        $isi_cut = $isi_cut.'...';
                                                    } else {
                                                        $isi_cut = substr($data->isi, 0, 109);
                                                        $isi_cut = $isi_cut.'...';
                                                    }
                                                } else {
                                                    $isi_cut = $data->isi;
                                                }
                                                $rpc_isi = strip_tags($isi_cut, '<p>');
                                            @endphp
                                            <p>
                                                {!! $rpc_isi !!}
                                            </p>
                                            <div class="link"><a href="{{ route('detil.berita', $data->slug) }}">Selengkapnya<i class="flaticon-send"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <div class="col-12 text-center empty-info">
                            <i class="fa fa-info-circle"></i>
                            <h1>Informasi Tidak Ditemukan</h1>
                            <p>Silakan melakukan pencarian dengan kata kunci yang lain<br>atau kembali ke <a href="{{ route('welcome') }}">Beranda</a></p>
                        </div>
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            {{ $datainfo->appends(request()->input())->links('pagination::pagination') }}
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
@endsection
