@extends('layouts.masterweb')

@section('title-head', 'Form Pengajuan')

@section('css-plus')
    <link href="{{ asset('assets/css/nice-select.css') }}" rel="stylesheet">
@endsection

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

    <section class="contact-page-section">
        <div class="auto-container">
            <div class="contact-form-inner">
                <div class="sec-title bg-color centred">
                    <h2>Form Pengajuan Surat Keterangan</h2>
                    <span>Silakan melengkapi isian pada form berikut ini untuk melanjutkan proses pengajuan surat keterangan.</span>
                    <div class="dotted-box">
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                        <span class="dotted"></span>
                    </div>
                </div>
                <div class="form-inner">
                    <form method="post" action="http://azim.commonsupport.com/Visarzo/assets/inc/sendemail.php" id="contact-form" class="default-form">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <input type="text" name="username" placeholder="Your Name " required="">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Email address" required="">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <input type="text" name="phone" required="" placeholder="Phone No.">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="subject" required="" placeholder="Subject">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <div class="select-box">
                                    <select class="wide">
                                    <option data-display="Select">Service Required</option>
                                    <option value="1">Working Visas</option>
                                    <option value="2">Study Visas</option>
                                    <option value="3">Business Visas</option>
                                    <option value="4">Tourist Visas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <textarea name="message" placeholder="Message"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                                <button class="theme-btn-two" type="submit" name="submit-form"><i class="flaticon-send"></i>Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
