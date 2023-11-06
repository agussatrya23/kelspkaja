@extends('layouts.masterweb')

@section('title-head', 'Visi & Misi')

@section('content')

    <section class="page-title" style="background-image: url({{ asset('assets/images/slider/page-banner.jpg') }});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title-box">
                    <h1>Visi & Misi</h1>
                    <div class="dotted-box">
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                    </div>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="{{ route('welcome') }}">Beranda</a></li>
                    <li>Tentang Kami</li>
                    <li>Visi & Misi</li>
                </ul>
            </div>
        </div>
    </section>

    <div class="sidebar-page-container blog-details">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="coaching-details-content service-details-content h-100">
                        <div class="content-style-one h-100">
                            <div class="group-title">
                                <h2>Visi dan Misi</h2>
                                <div class="dotted-box">
                                    <span class="dotted"></span>
                                    <span class="dotted"></span>
                                    <span class="dotted"></span>
                                </div>
                            </div>
                            <div class="text">
                                <p>
                                    Visi dan Misi Kelurahan Semarapura Kaja dalam Rangka meningkatkan kesejahteraan masyarakat untuk  mencapai tujuan maka Pemerintah Kelurahan Semarapura Kaja menetapkan Visi yang merupakan pandangan/tujuan kedepan yang ingin dicapai. Untuk mewujudkan Visi dimaksud Pemerintah menetapkan Misi yang merupakan rencana untuk mencapai tujuan yang telah ditetapkan.
                                </p>
                            </div>
                            <h3 class="title">
                                Visi
                            </h3>
                            <h3 class="text-justify">"Kelurahan Semarapura Kaja Yang Unggul Dan Sejahtera Melalui Peningkatan Pertisipasi Masyarakat Dalam Pembangunan"</h3>
                            <h3 class="title">
                                Misi
                            </h3>
                            <ul class="list clearfix">
                                <li>Meningkatkan aksesibilitas dan kualitas pelayanan kepada masyarakat</li>
                                <li>Mendorong partisipasi masyarakat dalam pembangunan melalui pemberdayaan  masyarakat</li>
                                <li>Meningkatkan kesejahteraan melalui pemberdayaan ekonomi masyarakat</li>
                                <li>Meningkatkan keamanan dan ketertiban umum dalam kehidupan masyarakat</li>
                            </ul>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="sidebar blog-sidebar">
                        @include('layouts.info-terkini')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
