@extends('layouts.masterweb')

@section('title-head', 'Form Pengajuan')

@section('css-plus')
    <link href="{{ asset('assets/css/nice-select.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section class="page-title" style="background-image: url({{ asset('assets/images/slider/page-banner-1.jpg') }});">
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
                    <form action="{{ route('pengajuan.store') }}" method="post" id="form-pengajuan" enctype="multipart/form-data" class="default-form">
                        <input type="hidden" name="id">
                        <input type="hidden" name="idpenduduk" value="{{ $data->id }}">
                        <div class="row clearfix justify-content-center">
                            <div class="col-lg-10 col-md-12">
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                        <label for="">No. Kartu Keluarga</label>
                                        <input type="text" name="nokk" value="{{ $data->kartukeluarga->nokk }}" readonly>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                        <label for="">No. KTP/NIK</label>
                                        <input type="text" name="nik" value="{{ $data->nik }}" readonly>
                                    </div>
                                    <div class="col-lg-6 col-12 form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="nama" value="{{ $data->nama }}" readonly>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                        <label for="">Jenis Kelamin</label>
                                        @php
                                            $jk = $data->jk;
                                            if ($jk == 1) {
                                                $jk = 'Laki-laki';
                                            } elseif ($jk == 2) {
                                                $jk = 'Perempuan';
                                            }else{
                                                $jk = '';
                                            }
                                        @endphp
                                        <input type="text" name="jk" value="{{ $jk }}" readonly>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                        <label for="">Tempat/Tanggal Lahir</label>
                                        <input type="text" name="tempatlahir" value="{{ $data->tempatlahir }},{{ (new \App\Helper)->tanggal($data->tgllahir) }}" readonly>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                        <label for="">Agama</label>
                                        <input type="text" name="agama" value="{{ $data->agama }}" readonly>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 form-group">
                                        <label for="">Status Perkawinan</label>
                                        <input type="text" name="wn" value="{{ $data->statuskawin }}" readonly>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 form-group">
                                        <label for="">Pekerjaan</label>
                                        <input type="text" name="pekerjaan" value="{{ $data->pekerjaan }}" readonly>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="">Alamat</label>
                                        <input type="hidden" name="lingkungan" value="{{ $data->lingkungan }}">
                                        <input type="text" name="alamat" value="Lingk. {{ (new \App\Helper)->lingkungan($data->lingkungan) }}" readonly>
                                    </div>

                                    <div class="col-12 mt-4 mb-3">
                                        <span class="font-weight-bold">Masukkan No WhatsApp dan pilih Surat Keterangan terlebih dahulu untuk menampilkan form pengajuan.</span>
                                    </div>

                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label for="">No WhatsApp</label>
                                        <div class="row">
                                            <div class="col-2 pr-0">
                                                <div class="input-group-prepend d-block">
                                                    <span class="input-group-text justify-content-center">+62</span>
                                                </div>
                                            </div>
                                            <div class="col-10 pl-0">
                                                <input type="text" name="nohp" placeholder="81234567890" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label for="">Surat Keterangan</label>
                                        <div class="select-box">
                                            <select class="wide" id="idsurat" name="idsurat">
                                            <option data-display="Pilih Surat Keterangan">Pilih Surat Keterangan</option>
                                            <option value="1">Surat Keterangan Usaha</option>
                                            <option value="2">Surat Keterangan Tempat Usaha</option>
                                            <option value="3">Surat Keterangan Kawin</option>
                                            <option value="4">Surat Keterangan Kematian</option>
                                            <option value="5">Surat Keterangan Kurang Mampu</option>
                                            <option value="6">Surat Keterangan Tempat Tinggal</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                        <label for="">Email <small class="text-danger">(Pastikan email yang dimasukkan aktif)</small></label>
                                        <input type="email" name="email" placeholder="penduduk@gmail.com">
                                    </div> --}}

                                    <div class="col-12 formkematian">
                                        <div class="row">
                                            <div class="col-12 mt-1 mb-3">
                                                <span class="font-weight-bold">Lengkapi form dibawah dengan data penduduk yang sudah meninggal :</span>
                                            </div>

                                            <div class="col-lg-6 col-12 form-group">
                                                <label for="">NIK</label>
                                                <input id="nikmeninggal" type="text" name="nikmeniggal">
                                            </div>
                                            <div class="col-lg-6 col-12 form-group">
                                                <label for="">Nama Lengkap</label>
                                                <input id="namameninggal" type="text" name="namameninggal">
                                            </div>
                                            <div class="col-lg-6 col-12 form-group">
                                                <label for="">Tempat Lahir</label>
                                                <input id="tempatlahirmeninggal" type="text" name="tempatlahirmeninggal">
                                            </div>

                                            <div class="col-lg-6 col-12 form-group">
                                                <label for="">Tanggal Lahir</label>
                                                <input id="tgllahirmeninggal" type="text" class="flatpickr-basic" name="tgllahirmeninggal" placeholder="Pilih" style="background-color: white !important">
                                        </div>

                                            <div class="col-lg-3 col-md-6 col-12 form-group">
                                                <label for="">Jenis Kelamin</label>
                                                <div class="select-box">
                                                    <select class="wide" id="jkmeninggal" name="jkmeninggal">
                                                    <option data-display="Pilih Jenis Kelamin">Pilih Jenis Kelamin</option>
                                                    <option value="1">Laki-laki</option>
                                                    <option value="2">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12 form-group">
                                                <label for="">Agama</label>
                                                <div class="select-box">
                                                    <select class="wide" id="agamameninggal" name="agamameninggal">
                                                    <option data-display="Pilih Agama">Pilih Agama</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Protestan">Protestan</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 form-group">
                                                <label for="">Alamat</label>
                                                <input id="alamatmeninggal" type="text" name="alamatmeninggal">
                                            </div>
                                            <div class="col-lg-6 col-12 form-group">
                                                <label for="">Tanggal Meninggal</label>
                                                <input id="tglmeninggal" class="flatpickr-basic" type="text" placeholder="Pilih" name="tglmeninggal" style="background-color: white !important">
                                            </div>
                                            <div class="col-lg-6 col-12 form-group">
                                                <label for="">Tempat Meninggal</label>
                                                <input id="tempatmeninggal" type="text" name="tempatmeninggal">
                                            </div>
                                            <div class="col-lg-6 col-12 form-group">
                                                <label for="">Penyebab Kematian</label>
                                                <input id="penyebabmeninggal" type="text" name="penyebabmeninggal">
                                            </div>
                                            <div class="col-lg-6 col-12 form-group">
                                                <label for="">Hubungan pelapor dengan yang meninggal</label>
                                                <input id="hubungan" type="text" name="hubungan">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group keterangan">
                                        <label for="">Keterangan</label>
                                        <textarea id="formketerangan" name="keterangan" placeholder="Masukkan keterangan..." required></textarea>
                                        <small id="textketerangan" class="text-danger font-italic"></small>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group maksud">
                                        <label for="">Maksud / Keperluan</label>
                                        <textarea name="maksud" placeholder="Masukkan maksud/keperluan..." required></textarea>
                                        <small id="textmaksud" class="text-danger font-italic"></small>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group ktp">
                                        <label>Photo KK/KTP (Pelapor)</label>
                                        <div class="body">
                                            <input type="file" class="dropify" name="ktp" data-allowed-file-extensions="jpg jpeg" required data-max-file-size="1M">
                                        </div>
                                        <small>* format file <b>.jpg</b> atau <b>.jpeg</b>, ukuran maksimal 1MB</small>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group ktp">
                                        <label>Photo Selfi menunjukan KTP</label>
                                        <div class="body">
                                            <input type="file" class="dropify" name="photo" data-allowed-file-extensions="jpg jpeg" required data-max-file-size="2M">
                                        </div>
                                        <small>* format file <b>.jpg</b> atau <b>.jpeg</b>, ukuran maksimal 2MB.</small><a class="lightbox-image badge badge-warning ml-1" data-fancybox="images" data-caption="Ilustrasi Photo Selfi dengan menunjukkan KTP yang Benar" href="{{ asset('assets/images/contoh-foto.png') }}">Lihat Contoh Foto</a>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group valid">
                                        <div class="checkbox">
                                            <input type="checkbox" class="datavalid" id="datavalid" value="">
                                            <label for="datavalid">Dengan ini saya menyatakan bertanggung jawab terhadap data yang saya isi pada form ini!</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred simpan">
                                        <button class="theme-btn-two btn-submit" disabled type="submit" name="submit-form"><i class="flaticon-send"></i>Submit Pengajuan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script-plus')
<script>
    $('.dropify').dropify();
    $(document).ready(function() {
        $('#datavalid').click(function(){
            if($(this).is(':checked')){
            $('.btn-submit').prop('disabled',false)
            }else {
            $('.btn-submit').prop('disabled',true)
            }
        })
        $('.keterangan').hide();
        $('.maksud').hide();
        $('.valid').hide();
        $('.ktp').hide();
        $('.simpan').hide();
        $('.formkematian').hide();

        $('#idsurat').change(function(){
            jenis = $(this).val()
            if (jenis > 0) {
                $('.keterangan').show();
                $('#formketerangan').val(null);
                $('.maksud').show();
                $('.valid').show();
                $('.ktp').show();
                $('.simpan').show();
                if (jenis == 1) {
                    $('.formkematian').hide();
                    $('#textketerangan').text('Contoh : Memiliki Usaha Dagang bernama Warung Sukses Selalu');
                    $('#textmaksud').text('Contoh : Melengkapi Persyaratan Administrasi  Kredit Usaha Rakyat ( KUR ) di Bank.');
                }
                else if (jenis == 2) {
                    $('.formkematian').hide();
                    $('#textketerangan').text('Contoh : Memiliki Usaha Dagang bernama Warung Sukses Selalu berlokasi di Gang Kamboja No 1, Lingkungan Besang Tengah, Semarapura Kaja');
                    $('#textmaksud').text('Contoh : Melengkapi Persyaratan Administrasi Kredit Usaha Rakyat ( KUR )');
                }
                else if (jenis == 3) {
                    $('.formkematian').hide();
                    $('#textketerangan').text('Contoh : Berstatus belum/sudah kawin');
                    $('#textmaksud').text('Contoh : Melengkapi Persyaratan Administrasi');
                }
                else if (jenis == 4) {
                    $('.formkematian').show();
                    $('.formkematian #nikmeninggal').attr('required',true);
                    $('.formkematian #namameninggal').attr('required',true);
                    $('.formkematian #tempatlahirmeninggal').attr('required',true);
                    $('.formkematian #tgllahirmeninggal').attr('required',true);
                    $('.formkematian #alamatmeninggal').attr('required',true);
                    $('.formkematian #tglmeninggal').attr('required',true);
                    $('.formkematian #tempatmeninggal').attr('required',true);
                    $('.formkematian #penyebabmeninggal').attr('required',true);
                    $('.formkematian #hubungan').attr('required',true);
                    $('.keterangan').hide();
                    $('#formketerangan').val('Melaporkan meninggalnya :');
                    $('#textmaksud').text('Contoh : Melengkapi Persyaratan Administrasi Kredit Usaha Rakyat ( KUR )');
                }
                else if (jenis == 5) {
                    $('.formkematian').hide();
                    $('#textketerangan').text('Contoh : Penduduk kurang mampu');
                    $('#textmaksud').text('Contoh : Melengkapi Persyaratan Administrasi');
                }
                else if (jenis == 6) {
                    $('.formkematian').hide();
                    $('#textketerangan').text('Contoh : Bertempat tinggal di Lingkungan Besang Tengah, Semarapura Kaja');
                    $('#textmaksud').text('Contoh : Melengkapi Persyaratan Administrasi');
                }
                else {
                    $('.formkematian').hide();
                    $('#textketerangan').text('');
                    $('#textmaksud').text('');
                }
            }
            else {
                $('.keterangan').hide();
                $('.maksud').hide();
                $('.valid').hide();
                $('.ktp').hide();
                $('.simpan').hide();
            }
        })



    });
</script>
@endsection
