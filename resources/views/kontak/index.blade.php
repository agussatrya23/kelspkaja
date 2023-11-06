@extends('layouts.masterweb')

@section('title-head', 'Kontak')

@section('content')

    <section class="page-title" style="background-image: url({{ asset('assets/images/slider/page-banner.jpg') }});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title-box">
                    <h1>Kontak</h1>
                    <div class="dotted-box">
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                    </div>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="{{ route('welcome') }}">Beranda</a></li>
                    <li>Kontak</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="contact-page-section pb-0">
        <div class="auto-container">
            <div class="sec-title bg-color centred">
                <h2>Hubungi Kami</h2>
                <span>Segala keperluan dapat dilakukan melalui media berikut :</span>
                <div class="dotted-box">
                    <span class="dotted"></span>
                    <span class="dotted"></span>
                    <span class="dotted"></span>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-xl-10 col-lg-12 col-md-12 offset-xl-1 big-column">
                    <div class="row clearfix justify-content-center">
                        <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                            <div class="service-block-one">
                                <div class="inner-box kontak">
                                    <div class="icon-box"><i class="fa fa-map-marker-alt"></i></div>
                                    <h3><a href="service-details.html">Lokasi</a></h3>
                                    <div class="inner-content d-flex">
                                        <a href="https://goo.gl/maps/2MiPduk8FNA2sEi36" target="_blank">Jl. Ahmad Yani, No. 36 Semarapura</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                            <div class="service-block-one">
                                <div class="inner-box kontak">
                                    <div class="icon-box"><i class="flaticon-call"></i></div>
                                    <h3><a href="service-details.html">Telepon</a></h3>
                                    <div class="inner-content d-flex">
                                        <a href="tel:036622851">(0366) 22851</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                            <div class="service-block-one">
                                <div class="inner-box kontak">
                                    <div class="icon-box"><i class="flaticon-envelope"></i></div>
                                    <h3><a href="service-details.html">Email</a></h3>
                                    <div class="inner-content d-flex">
                                        <a href="mailto:info@semarapurakaja.desa.id">info@semarapurakaja.desa.id</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d986.4355716792594!2d115.39743762936092!3d-8.524382799999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd211bed351530d%3A0xe0cbc8b93c88d35c!2sKantor%20Kelurahan%20Semarapura%20Kaja!5e0!3m2!1sid!2sid!4v1652421181078!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

@endsection
