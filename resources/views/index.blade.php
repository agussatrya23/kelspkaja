@extends('layouts.masterweb')

@section('title-head', 'Beranda')

@section('content')
    <section class="banner-section style-two">
        <div class="banner-carousel owl-theme owl-carousel">
            <div class="slide-item">
                <div class="image-layer" style="background-image:url({{asset('assets/images/slider/slider-1.jpg')}})"></div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-7 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <div class="title-text">
                                    <h1>
                                        <span>Selamat Datang di</span>
                                        <br>
                                        Kelurahan Semarapura Kaja
                                    </h1>
                                    <div class="dotted-box">
                                        <span class="dotted"></span>
                                        <span class="dotted"></span>
                                        <span class="dotted"></span>
                                    </div>
                                </div>
                                <p>Kelurahan Semarapura Kaja merupakan salah satu kelurahan yang terletak di Kecamatan Klungkung, Kabupaten Klungkung, Bali.</p>
                                <div class="btn-box">
                                    <a href="{{ route('profil') }}" class="theme-btn-one"><i class="flaticon-send"></i>Lihat Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <div class="image-layer" style="background-image:url({{asset('assets/images/slider/slider-3.jpg')}})"></div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-6 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <span class="top-text">Pelayanan Administrasi</span>
                                <div class="title-text">
                                    <h1>Pengajuan Administrasi Surat Keterangan</h1>
                                    <div class="dotted-box">
                                        <span class="dotted"></span>
                                        <span class="dotted"></span>
                                        <span class="dotted"></span>
                                    </div>
                                </div>
                                <p>Pengajuan Surat Keterangan dapat dilakukan secara online pada website ini.</p>
                                <div class="btn-box">
                                    <a href="{{ route('cari-nik') }}" class="theme-btn-one"><i class="flaticon-send"></i>Ajukan Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <div class="image-layer" style="background-image:url({{asset('assets/images/slider/slider-2.jpg')}})"></div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-7 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <span class="top-text">Informasi Kelurahan</span>
                                <div class="title-text">
                                    <h1>Berita, Pengumuman & Agenda Kelurahan</h1>
                                    <div class="dotted-box">
                                        <span class="dotted"></span>
                                        <span class="dotted"></span>
                                        <span class="dotted"></span>
                                    </div>
                                </div>
                                <p>Kunjungi halaman untuk mengetahui informasi terkini Kelurahan Semarapura Kaja</p>
                                <div class="btn-box">
                                    <a href="{{ route('berita') }}" class="theme-btn-one"><i class="flaticon-send"></i>Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news-section sec-pad-2">
        <div class="auto-container">
            <div class="sec-title centred bg-color">
                <p>Tentang Kelurahan</p>
                <h2>Informasi Terkini</h2>
                <div class="dotted-box">
                    <span class="dotted"></span>
                    <span class="dotted"></span>
                    <span class="dotted"></span>
                </div>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme owl-nav-none">
                @foreach ($info as $item)
                    <div class="news-block-one mb-30">
                        <div class="inner-box">
                            <figure class="image-box"><a href="{{ route('detil.berita', $item->slug) }}"><img src="{{ asset('upload/'.$item->gambar) }}" alt=""></a></figure>
                            <div class="lower-content">
                                @php
                                    $dataJenis = ['Berita','Pengumuman','Agenda'];
                                    $jenisinfo = $dataJenis[$item->jenis - 2];
                                @endphp
                                <div class="post-date"><h5>{{ $jenisinfo }}</h5></div>
                                @php
                                    $stritem = Str::length($item->judul);
                                    if ($stritem > 55) {
                                        $judul_cut = substr($item->judul, 0, 55);
                                        if ($judul_cut[54] != ' ') {
                                            $new_pos = strrpos($judul_cut, ' ');
                                            $judul_cut = substr($item->judul, 0, $new_pos);
                                            $judul_cut = $judul_cut.'...';
                                        } else {
                                            $judul_cut = substr($item->judul, 0, 54);
                                            $judul_cut = $judul_cut.'...';
                                        }
                                    } else {
                                        $judul_cut = $item->judul;
                                    }
                                @endphp
                                <h3>
                                    <a href="{{ route('detil.berita', $item->slug) }}">{{ $judul_cut }}</a>
                                </h3>
                                <ul class="post-info clearfix">
                                    <li><span class="fa fa-user"></span>By Admin</li>
                                    <li><span class="fa fa-calendar-alt"></span>{{ (new \App\Helper)->tanggal($item->tanggal) }}</li>
                                </ul>
                                @php
                                    $item->isi = strip_tags($item->isi);
                                    $strisi = Str::length($item->isi);
                                    if ($strisi > 110) {
                                        $isi_cut = substr($item->isi, 0, 110);
                                        if ($isi_cut[109] != ' ') {
                                            $new_pos = strrpos($isi_cut, ' ');
                                            $isi_cut = substr($item->isi, 0, $new_pos);
                                            $isi_cut = $isi_cut.'...';
                                        } else {
                                            $isi_cut = substr($item->isi, 0, 109);
                                            $isi_cut = $isi_cut.'...';
                                        }
                                    } else {
                                        $isi_cut = $item->isi;
                                    }
                                    $rpc_isi = strip_tags($isi_cut, '<p>');
                                @endphp
                                <p>
                                    {!! $rpc_isi !!}
                                </p>
                                <div class="link"><a href="{{ route('detil.berita', $item->slug) }}">Selengkapnya<i class="flaticon-send"></i></a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="about-section bg-color-2">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/pattern-1.png);"></div>
        <div class="auto-container">
            <div class="row align-items-center justify-content-center clearfix">
                <div class="col-lg-5 col-md-6 col-sm-12 image-column">
                    <div id="image_block_1">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></figure>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 content-column">
                    <div id="content_block_1">
                        <div class="content-box">
                            <div class="sec-title bg-color">
                                <h2>Sambutan Lurah</h2>
                                <h2>Kelurahan Semarapura Kaja</h2>
                                <div class="dotted-box">
                                    <span class="dotted"></span>
                                    <span class="dotted"></span>
                                    <span class="dotted"></span>
                                </div>
                            </div>
                            <div class="text sambutan">
                                <b>Om Swastyastu</b>
                                <p>Puji syukur Kami haturkan kehadirat Tuhan Yang Maha Esa karena hanya dengan rahmatnya lah pembuatan website Kelurahan Semarapura Kaja dapat terlaksana dengan baik.</p>
                                <p>Website ini dihadirkan untuk mengikuti perkembangan dunia Teknologi Informasi yang kian pesat. Dibuatnya Website Kelurahan ini bertujuan untuk memudahkan pelayanan dan penyampaian informasi kelurahan kepada masyarakat luas, sehingga pelayanan, berita, kegiatan, dan profil kelurahan dapat diakses oleh penduduk secara langsung dan cepat. Kami berupaya agar informasi tentang Kelurahan Semarapura Kaja menjadi lebih terbuka dan interaktif.</p>
                                <p>Semoga dengan adanya Website Kelurahan Semarapura Kaja ini dapat bermanfaat dan menjadi salah satu upaya peningkatan pelayanan kelurahan. Namun kami sadari website ini masih jauh dari kesempurnaan. Untuk itu, kritik dan saran sangat kami harapkan demi penyempurnaan website ini.</p>
                                <b>Om Shanti, Shanti, Shanti, Om</b>
                            </div>
                            <div class="bold-text">
                                <span>Lurah Semarapura Kaja</span>
                                <p>I Wayan Astawa,S.E.M.M</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="funfact-style-two">
        <div class="auto-container">
            <div class="inner-container wow fadeInLeft animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                        <div class="counter-block-two">
                            <div class="inner-box">
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="1500" data-stop="{{ $totalkk }}">0</span>
                                </div>
                                <h4>Jumlah<br>Kartu Keluarga</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                        <div class="counter-block-two">
                            <div class="inner-box">
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="1500" data-stop="{{ $totalpenduduk }}">0</span>
                                </div>
                                <h4>Jumlah<br>Total Penduduk</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                        <div class="counter-block-two">
                            <div class="inner-box">
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="1500" data-stop="{{ $totallaki }}">0</span>
                                </div>
                                <h4>Jumlah<br>Penduduk Laki-laki</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                        <div class="counter-block-two">
                            <div class="inner-box">
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="1500" data-stop="{{ $totalperempuan }}">0</span>
                                </div>
                                <h4>Jumlah<br>Penduduk Perempuan</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="service-section bg-color-3">
        <div class="auto-container">
            <div class="sec-title centred bg-color">
                <p>Pelayanan Administrasi</p>
                <h2>Pengajuan Surat Keterangan</h2>
                <div class="dotted-box">
                    <span class="dotted"></span>
                    <span class="dotted"></span>
                    <span class="dotted"></span>
                </div>
            </div>
            <div class="four-item-carousel owl-carousel owl-theme owl-nav-none">
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/surket-usaha.png') }}" alt="">
                        </div>
                        <span>surat keterangan</span>
                        <h3>Usaha</h3>
                        <p>Digunakan penduduk untuk menerangkan diri memiliki suatu usaha</p>
                    </div>
                </div>
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/surket-tempatusaha.png') }}" alt="">
                        </div>
                        <span>surat keterangan</span>
                        <h3>Tempat Usaha</h3>
                        <p>Digunakan penduduk untuk menerangkan usaha berlokasi di Kelurahan Semarapura Kaja</p>
                    </div>
                </div>
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/surket-menikah.png') }}" alt="">
                        </div>
                        <span>surat keterangan</span>
                        <h3>Menikah</h3>
                        <p>Digunakan penduduk untuk menerangkan diri berstatus sudah/belum menikah</p>
                    </div>
                </div>
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/surket-kematian.png') }}" alt="">
                        </div>
                        <span>surat keterangan</span>
                        <h3>Kematian</h3>
                        <p>Digunakan penduduk untuk menerangkan seseorang yang sudah meninggal</p>
                    </div>
                </div>
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/surket-kurangmampu.png') }}" alt="">
                        </div>
                        <span>surat keterangan</span>
                        <h3>Kurang Mampu</h3>
                        <p>Digunakan penduduk untuk menerangkan diri dengan kondisi ekonomi kurang mampu</p>
                    </div>
                </div>
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/surket-tempattinggal.png') }}" alt="">
                        </div>
                        <span>surat keterangan</span>
                        <h3>Tempat Tinggal</h3>
                        <p>Digunakan penduduk untuk menerangkan diri tinggal di Kelurahan Semarapura Kaja</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="more-text centred">
            <div class="auto-container">
                <div class="inner">
                    <h3>Pengajuan Surat Keterangan dapat dilakukan secara online pada website ini. <a href="{{ route('cari-nik') }}"><span>Ajukan Sekarang</span><i class="flaticon-send"></i></a></h3>
                </div>
            </div>
        </div>
    </section>

    <section class="apply-style-two">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/pattern-2.png);"></div>
        <div class="auto-container">
            <div class="sec-title centred light white">
                <p>Pelayanan Administrasi</p>
                <h2>Langkah Pengajuan Surat Keterangan</h2>
                <div class="dotted-box">
                    <span class="dotted"></span>
                    <span class="dotted"></span>
                    <span class="dotted"></span>
                </div>
            </div>
            <div class="row clearfix justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                    <div class="single-item wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <h6>Langkah 1</h6>
                            <div class="icon-box">
                                <div class="arrow" style="background-image: url(assets/images/icons/arrow-1.png);"></div>
                                <i class="flaticon-document"></i>
                            </div>
                            <h3>Pilih dan Lengkapi<br /> Form Pengajuan</h3>
                            <p>Pilih surat keterangan dan lengkapi form pengajuan surat keterangan yang diperlukan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                    <div class="single-item wow fadeInUp animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <h6>Langkah 2</h6>
                            <div class="icon-box">
                                <div class="arrow" style="background-image: url(assets/images/icons/arrow-1.png);"></div>
                                <i class="flaticon-accept"></i>
                            </div>
                            <h3>Verifikasi dan<br />Validasi Pengajuan</h3>
                            <p>Setelah pengajuan disubmit harap menunggu Verifikasi dan Validasi pengajuan dari kelurahan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                    <div class="single-item wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <h6>Langkah 3</h6>
                            <div class="icon-box"><i class="flaticon-email"></i></div>
                            <h3>Terima Pesan<br />Link Surat Keterangan</h3>
                            <p>Jika data pengajuan yang sudah valid, surat keterangan akan dikirimkan melalui Whatsapp</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="training-section">
        {{-- <div class="pattern-layer" style="background-image: url(assets/images/shape/pattern-1.png);"></div> --}}
        <div class="auto-container">
            <div class="sec-title bg-color">
                <p>Tentang Kelurahan</p>
                <h2>Galeri Kegiatan</h2>
                <div class="dotted-box">
                    <span class="dotted"></span>
                    <span class="dotted"></span>
                    <span class="dotted"></span>
                </div>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme owl-dots-none">
                @foreach ($galeri as $dt)
                    <div class="training-block-one">
                        <div class="inner-box">
                            <div class="content-box">
                                <figure class="image-box"><img src="{{ asset('upload/'.$dt->gambar) }}" alt=""></figure>
                                @php
                                    $stritem = Str::length($dt->judul);
                                    if ($stritem > 45) {
                                        $judul_cut = substr($dt->judul, 0, 45);
                                        if ($judul_cut[44] != ' ') {
                                            $new_pos = strrpos($judul_cut, ' ');
                                            $judul_cut = substr($dt->judul, 0, $new_pos);
                                            $judul_cut = $judul_cut.'...';
                                        } else {
                                            $judul_cut = substr($dt->judul, 0, 44);
                                            $judul_cut = $judul_cut.'...';
                                        }
                                    } else {
                                        $judul_cut = $dt->judul;
                                    }
                                @endphp
                                <div class="text"><h4>{{ $judul_cut }}</h4></div>
                            </div>
                            <div class="overlay-box">
                                <div class="text">
                                    <a class="lightbox-image" data-fancybox="images" data-caption="{{ $dt->judul }}" href="{{ asset('upload/'.$dt->gambar) }}"><i class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('script-plus')

@endsection
