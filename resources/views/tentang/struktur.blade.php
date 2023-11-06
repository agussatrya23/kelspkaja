@extends('layouts.masterweb')

@section('title-head', 'Struktur Organisasi')

@section('content')

    <section class="page-title" style="background-image: url({{ asset('assets/images/slider/page-banner.jpg') }});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title-box">
                    <h1>Struktur Organisasi</h1>
                    <div class="dotted-box">
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                    </div>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="{{ route('welcome') }}">Beranda</a></li>
                    <li>Tentang Kami</li>
                    <li>Struktur Organisasi</li>
                </ul>
            </div>
        </div>
    </section>

    <div class="sidebar-page-container blog-details">
        <div class="auto-container">
            <div class="row clearfix justify-content-center">
                <div class="col-lg-9 col-12">
                    <a class="lightbox-image" href="{{ asset('assets/images/struktur-organisasi.png') }}" data-caption="Struktur Organisasi Pemerintahan Kelurahan Semarapura Kaja">
                        <img src="{{ asset('assets/images/struktur-organisasi.png') }}" width="100%" alt="">
                        <a class="lightbox-image btn-lightbox" href="{{ asset('assets/images/struktur-organisasi.png') }}" data-caption="Struktur Organisasi Pemerintahan Kelurahan Semarapura Kaja">
                            <i class="fas fa-search-plus"></i>
                        </a>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
