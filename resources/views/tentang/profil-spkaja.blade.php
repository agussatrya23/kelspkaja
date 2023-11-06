@extends('layouts.masterweb')

@section('title-head', 'Profil')

@section('content')

    <section class="page-title" style="background-image: url({{ asset('assets/images/slider/page-banner.jpg') }});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title-box">
                    <h1>Profil</h1>
                    <div class="dotted-box">
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                    </div>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="{{ route('welcome') }}">Beranda</a></li>
                    <li>Tentang Kami</li>
                    <li>Profil</li>
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
                                <h2>Profil Kelurahan</h2>
                                <div class="dotted-box">
                                    <span class="dotted"></span>
                                    <span class="dotted"></span>
                                    <span class="dotted"></span>
                                </div>
                            </div>
                            <div class="text">
                                <p>Kelurahan Semarapura Kaja merupakan salah satu kelurahan yang terletak di Kecamatan Klungkung, Kabupaten Klungkung, Bali. Kelurahan Semarapura Kaja terdiri dari dua Desa Adat yang memiliki adat yang masih kuat yaitu	Desa Adat Besang Kawan Tohjiwa dan Desa Adat Besang Kangin.</p>
                            </div>
                            <div class="text">
                                <p>Sebagai tindak lanjut dari otonomi daerah dimana pemerintah juga
                                    mengeluarkan Undang-undang Nomor 23 tahun 2014 tentang pemerintahan. Dan berdasarkan Peraturan Pemerintah Nomor 73 tahun 2005 tentang Kelurahan, maka Kelurahan Semarapura Kaja  mempunyai tugas menyelenggarakan Urusan Pemerintahan, Pembangunan dan Kemasyarakatan.untuk menjalankan semua urusan urusan kelurahan juga diatur dengan Peraturan Bupati Klungkung Nomor 35 Tahun 2016 tentang Kedudukan, susunan organisasi, tugas dan fungsi serta tata kerja perangkat Daerah Kabupaten Klungkung.</p>
                            </div>
                            <h3 class="title">
                                Pengelompokan Wilayah
                            </h3>
                            <div class="text">
                                <p>Dalam mendukung penyelenggaraan urusan pemerintahan, pembangunan dan Kemasyarakatan kelurahan Semarapura kaja membawahi tiga Lingkungan yaitu :</p>
                                <ol class="list list-group-numbered clearfix">
                                    <li>Lingkungan Besang Kawan</li>
                                    <li>Lingkungan Besang Tengah</li>
                                    <li>Lingkungan Besang Kangin</li>
                                </ol>
                            </div>
                            <h3 class="title">
                                Kondisi Geografis
                            </h3>
                            <div class="text">
                                <p>Kondisi Geografis Kelurahan Semarapura Kaja yang terletak pada pusat kota Semarapura dengan batas-batas wilayah sebagai berikut :</p>
                                <ol class="list list-group-numbered clearfix">
                                    <li>Sebelah Utara    : Desa Akah</li>
                                    <li>Sebelah timur    : Kelurahan Semarapura Tengah</li>
                                    <li>Sebelah Selatan  : Sebagian Kelurahan Semarapura Tengah, dan Sebagian Kelurahan Semarapura Kauh</li>
                                    <li>Sebelah Barat     : Desa Manduang</li>
                                </ol>
                            </div>
                            <div class="text">
                                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15782.975951121229!2d115.39761299999999!3d-8.524218000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2112372458e57%3A0x5030bfbca832160!2sSemarapura%20Kaja%2C%20Klungkung%2C%20Klungkung%20Regency%2C%20Bali!5e0!3m2!1sen!2sid!4v1646836050283!5m2!1sen!2sid&zoom=9" height="400" allowfullscreen="" loading="lazy"></iframe>
                            </div>
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
