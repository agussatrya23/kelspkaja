<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Semarapura Kaja - @yield('title-head')</title>

    <link rel="icon" href="{{ asset('Lambang_Kabupaten_Klungkung.ico') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600;1,700;1,800&amp;display=swap" rel="stylesheet">

    <link href="{{ asset('assets/css/font-awesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/switcher-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/pnotify/pnotify.custom.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">

    @yield('css-plus')
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

</head>

<body>

    <div class="boxed_wrapper">
        <div class="loader-wrap">
            <div class="preloader"></div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            {{-- <div class="layer layer-two"><span class="overlay"></span></div>
            <div class="layer layer-three"><span class="overlay"></span></div> --}}
        </div>

        <div id="search-popup" class="search-popup">
            <div class="close-search"><span><i class="fas fa-times"></i></span></div>
            <div class="popup-inner">
                <div class="overlay-layer"></div>
                <div class="search-form">
                    <form method="GET" action="{{ route('berita') }}">
                        <div class="form-group">
                            <fieldset>
                                <input type="search" class="form-control" name="pencarian" value="{{ request()->input('pencarian') }}"
                                    placeholder="Pencarian Informasi" required>
                                <input type="submit" value="Cari" class="theme-btn style-four">
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <header class="main-header style-two">
            <div class="header-top">
                <div class="auto-container">
                    <div class="top-inner clearfix">
                        <div class="top-left pull-left">
                            <ul class="info clearfix">
                                <li><i class="flaticon-call"></i><a href="tel:036622851">(0366) 22851</a></li>
                                <li class="d-sm-inline d-none"><i class="flaticon-open-email-message"></i><a href="mailto:info@semarapurakaja.desa.id">info@semarapurakaja.desa.id</a></li>
                            </ul>
                        </div>
                        <div class="top-right pull-right">
                            <ul class="social-links clearfix">
                                <li><a href="{{  route('login') }}"><i class="far fa-user"></i>Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-upper">
                <div class="auto-container">
                    <div class="outer-box clearfix">
                        <div class="logo-box pull-left">
                            <figure class="logo">
                                <a href="{{ Request::is('/') ? '#' : route('welcome') }}">
                                    <img src="{{ asset('assets/images/Lambang_Kabupaten_Klungkung.png') }}" alt="">
                                    <h3>
                                        KELURAHAN SEMARAPURA KAJA
                                        <span>
                                            KABUPATEN KLUNGKUNG
                                        </span>
                                    </h3>
                                </a>
                            </figure>
                        </div>
                        <div class="menu-area pull-right">
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="current {{ Request::is('/') ? 'active' : '' }}">
                                            <a href="{{ Request::is('/') ? '#' : route('welcome') }}">Beranda</a>
                                        </li>
                                        <li class="dropdown {{ Request::is('tentang-kami*') ? 'active' : '' }}">
                                            <a href="#" onclick="return false">Tentang Kami</a>
                                            <ul>
                                                <li class="{{ Request::is('tentang-kami/profil*') ? 'active' : '' }}">
                                                    <a href="{{ Request::is('tentang-kami/profil') ? '#' : route('profil') }}">Profil</a>
                                                </li>
                                                <li class="{{ Request::is('tentang-kami/visi-misi*') ? 'active' : '' }}">
                                                    <a href="{{ Request::is('tentang-kami/visi-misi') ? '#' : route('visimisi') }}">Visi & Misi</a>
                                                </li>
                                                <li class="{{ Request::is('tentang-kami/struktur-organisasi*') ? 'active' : '' }}">
                                                    <a href="{{ Request::is('tentang-kami/struktur-organisasi') ? '#' : route('struktur') }}">Struktur Organisasi</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown {{ Request::is('pelayanan*') ? 'active' : '' }}">
                                            <a href="#" onclick="return false">Pelayanan</a>
                                            <ul>
                                                <li class="{{ Request::is('pelayanan/surat-keterangan*') ? 'active' : '' }}">
                                                    <a href="{{ Request::is('pelayanan/surat-keterangan') ? '#' : route('cari-nik') }}">Surat Keterangan</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="{{ Request::is('informasi*') ? 'active' : '' }}"><a href="{{ Request::is('informasi') ? '#' : route('berita') }}">Informasi</a></li>
                                        <li class="{{ Request::is('kontak-kami*') ? 'active' : '' }}"><a href="{{ Request::is('kontak-kami') ? '#' : route('kontak') }}">Kontak</a></li>
                                        <div class="menu-right-content clearfix pull-left">
                                            <div class="btn-box search-box-nav">
                                                <button type="button" class="search-toggler">
                                                    <i class="flaticon-search-1"></i></button>
                                                <!-- <a href="index-2.html" class="theme-btn-two">Daftar Online<i class="flaticon-send"></i></a> -->
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sticky-header">
                <div class="auto-container">
                    <div class="outer-box clearfix">
                        <div class="logo-box pull-left">
                            <figure class="logo">
                                <a href="#">
                                    <img src="{{ asset('assets/images/Lambang_Kabupaten_Klungkung.png') }}" alt="">
                                    <h3>
                                        KELURAHAN SEMARAPURA KAJA
                                        <span>
                                            KABUPATEN KLUNGKUNG
                                        </span>
                                    </h3>
                                </a>
                            </figure>
                        </div>
                        <div class="menu-area pull-right">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="menu-area pull-right">
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            <nav class="menu-box">
                <div class="nav-logo">
                    <a href="#">
                        <img src="{{ asset('assets/images/Lambang_Kabupaten_Klungkung.png') }}" alt="" title="">
                        <h3>
                            KELURAHAN SEMARAPURA KAJA
                            <span>
                                KABUPATEN KLUNGKUNG
                            </span>
                        </h3>
                    </a>
                </div>
                <div class="sidebar-search">
                    <form action="{{ route('berita') }}" method="GET" class="search-form">
                        <div class="form-group">
                            <input type="search" name="pencarian" value="{{ request()->input('pencarian') }}" placeholder="Pencarian Informasi" required="">
                            <button type="submit"><i class="flaticon-search-1"></i></button>
                        </div>
                    </form>
                </div>
                <div class="menu-outer">
                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                </div>
            </nav>
        </div>

        @yield('content')

        <footer class="main-footer">
            <div class="auto-container">
                <div class="footer-top">
                    <div class="widget-section">
                        <div class="row clearfix">
                            <div class="col-lg-7 col-md-12 col-sm-12 footer-column">
                                <div class="footer-widget logo-widget">
                                    <figure class="footer-logo">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/Lambang_Kabupaten_Klungkung.png') }}" alt="">
                                            <h3>
                                                KELURAHAN SEMARAPURA KAJA
                                                <span>
                                                    KABUPATEN KLUNGKUNG
                                                </span>
                                            </h3>
                                        </a>
                                    </figure>
                                    <div class="text">
                                        <p>Kelurahan Semarapura Kaja merupakan salah satu kelurahan yang terletak di Kecamatan Klungkung, Kabupaten Klungkung, Bali.
                                        </p>
                                    </div>
                                    <ul class="social-links clearfix">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget links-widget">
                                    <div class="widget-title">
                                        <h3>Kontak Kami</h3>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="list clearfix">
                                            <li><a class="telp" href="tel:036622851">(0366) 22851</a></li>
                                            <li><a class="email" href="mailto:info@semarapurakaja.desa.id">info@semarapurakaja.desa.id</a></li>
                                            <li><a class="location" href="https://goo.gl/maps/2MiPduk8FNA2sEi36" target="_blank">Jl. Ahmad Yani, No. 36 Semarapura</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom clearfix">
                <div class="copyright centred">
                    <p>Kelurahan Semarapura Kaja &copy; 2022</p>
                </div>
            </div>
        </footer>

        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-long-arrow-alt-up"></i>
        </button>
    </div>

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/validation.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('assets/js/appear.js') }}"></script>
    <script src="{{ asset('assets/js/scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jQuery.style.switcher.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{ asset('assets/js/pages/forms/dropify.js')}}"></script>
    <script src="{{ asset('assets/pnotify/pnotify.custom.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script>
        function notifikasi(notif) {
            new PNotify({
                title: notif.title,
                text: notif.text,
                type: notif.type,
                desktop: {
                    desktop: true
                }
            }).get().click(function(e) {
                if ($('.ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *').is(e.target)) return;
            });
        }

        if ({{ session()->has('notif') ? 1 : 0 }} === 1) {
            notifikasi({!! session('notif') !!});
        }
    </script>

    @yield('script-plus')
</body>

</html>
