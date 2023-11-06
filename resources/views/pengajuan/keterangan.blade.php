<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>{{ $data->surat->nama }} - {{$data->penduduk->nama}}</title>
<style media="screen">
  table {
    font-size: 15px;
    border-collapse: collapse;
    width: 100%;
    font-family: "Times New Roman", Times, serif;
    /* margin-top: 25px; */
  }
  td{
    text-align:left;
    padding: 3px;
    vertical-align: top;
    line-height: 17px !important;
  }
  th{
    padding: 5px 1px !important;
    text-align:center;
  }
  ul {
    margin: 0px;
    padding-left: 8px;
    list-style-type: none;
  }
  li {
    margin-bottom: 3px;
  }
  hr.noteline {
    border: 1px solid rgb(165, 165, 165) !important;
    margin-top: 0;
  }
  .note {
    color: rgb(125, 125, 125);
    font-size: 12px;
  }
  .header{
    margin-left: 30px;
    margin-right: 20px;
    margin-top: -160px !important;
    position: center;
  }
  main {
    font-size: 13px;
    margin-left: 30px;
    margin-right: 20px;
    margin-bottom: 15px;
  }
  footer {
    position: fixed;
    width: 100%;
    bottom: -20px; left: -70px;
    margin-top: 20px;
  }
  .page_break {
    page-break-after: always;
  }
  @page {
    margin-top: 190px;
  }
</style>

<div class="header">
  <img src="{{asset('assets/images/Lambang_Kabupaten_Klungkung.png')}}" width="100" style="position:absolute; left:15; top:-110">
  <div style="margin-bottom: -10px; text-align:center">
    <p style="font-weight: bold; font-size:19px !important; margin-bottom:10px">PEMERINTAH KABUPATEN KLUNGKUNG</p>
    <p style="font-size:19px; margin-top:-10px; font-weight: bold;">KECAMATAN KLUNGKUNG</p>
    <p style="font-weight: bold; font-size:22px !important; margin-top:-18px;">KELURAHAN SEMARAPURA KAJA</p>
    <p style="font-size:15px; margin-top:-15px; font-style:italic;">Jl. Ahmad Yani, No. 36 Semarapura, Telp. (0366) 22851</p>
  </div>
  <hr style="height: 2px; background-color: #000;" >
  <hr style="margin-top:-5px; background-color: #000;">
</div>

<main>
    <center>
        <h3 style="margin-top: -10px; margin-bottom: 0px; font-size: 18px; font-weight: 400; text-decoration:underline; text-transform: uppercase;">{{ $data->surat->nama }}</h3>
        <h4 style="margin-top: 3px; margin-bottom: 15px; font-size: 14px; font-weight: 400;">NOMOR : {{ $data->nosurat }}</h4>
    </center>

    <table>
        <tr>
            <td style="width: 20px;">1.</td>
            <td colspan="4">Yang bertanda tangan dibawah ini :</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">a.</td>
            <td style="width: 190px;">Nama</td>
            <td style="width: 20px;">:</td>
            <td>{{ $lurah->nama }}</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">b.</td>
            <td style="width: 190px;">Jabatan</td>
            <td style="width: 20px;">:</td>
            <td>{{ $lurah->jabatan->nama }}</td>
        </tr>
        <tr>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td colspan="4">Dengan ini menyatakan bahwa :</td>
        </tr>
        @if ($data->idsurat == 4)
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">a.</td>
            <td style="width: 190px;">Nama Lengkap</td>
            <td style="width: 20px;">:</td>
            <td style="text-transform: capitalize;">{{ $detil->nama }}</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">b.</td>
            <td style="width: 190px;">NIK</td>
            <td style="width: 20px;">:</td>
            <td>{{ $detil->nik }}</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">c.</td>
            <td style="width: 190px;">Tempat/Tgl.lahir</td>
            <td style="width: 20px;">:</td>
            <td>{{ $detil->tempatlahir }}, {{(new \App\Helper)->tanggal($detil->tgllahir)}}</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">d.</td>
            <td style="width: 190px;">Jenis Kelamin</td>
            <td style="width: 20px;">:</td>
            @php
                if ($detil->jk == 1) {
                    $jk = 'Laki-laki';
                } elseif ($detil->jk == 2) {
                    $jk = 'Perempuan';
                } else {
                    $jk = '';
                }
            @endphp
            <td>{{ $jk }}</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">e.</td>
            <td style="width: 190px;">Agama</td>
            <td style="width: 20px;">:</td>
            <td>{{ $detil->agama }}</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">f.</td>
            <td style="width: 190px;">Alamat</td>
            <td style="width: 20px;">:</td>
            <td style="text-transform: capitalize;">{{ $detil->alamat }}</td>
        </tr>
        <tr>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td colspan="4">Telah meninggal dunia pada :</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">a.</td>
            <td style="width: 190px;">Tanggal</td>
            <td style="width: 20px;">:</td>
            <td>{{(new \App\Helper)->tanggal($detil->tglmeninggal)}}</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">b.</td>
            <td style="width: 190px;">Bertempat di</td>
            <td style="width: 20px;">:</td>
            <td style="text-transform: capitalize;">{{ $detil->tempatmeninggal }}</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">c.</td>
            <td style="width: 190px;">Penyebab kematian</td>
            <td style="width: 20px;">:</td>
            <td style="text-transform: capitalize;">{{ $detil->penyebab }}</td>
        </tr>
        <tr>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td colspan="4">Surat keterangan ini dibuat berdasarkan keterangan pelapor :</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">a.</td>
            <td style="width: 190px;">Nama</td>
            <td style="width: 20px;">:</td>
            <td>{{ $data->penduduk->nama }}</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">b.</td>
            <td style="width: 190px;">NIK</td>
            <td style="width: 20px;">:</td>
            <td>{{ $data->penduduk->nik }}</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">c.</td>
            <td style="width: 190px;">Pekerjaan</td>
            <td style="width: 20px;">:</td>
            <td style="text-transform: capitalize;">{{ $data->penduduk->pekerjaan }}</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">d.</td>
            <td style="width: 190px;">Alamat</td>
            <td style="width: 20px;">:</td>
            <td style="text-align: justify;">Lingkungan {{(new \App\Helper)->lingkungan($data->penduduk->lingkungan)}}, Kelurahan Semarapura Kaja, Kecamatan Klungkung, Kabupaten Klungkung</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">e.</td>
            <td style="width: 190px;">Hubungan pelapor dengan yang meninggal</td>
            <td style="width: 20px;">:</td>
            <td style="text-transform: capitalize;">{{ $detil->hubungan }}</td>
        </tr>
        <tr>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td style="width: 20px;">2.</td>
            <td colspan="4" style="text-align:justify;">Surat  keterangan  ini  dibuat untuk  keperluan : {{ $data->maksud }}</td>
        </tr>
        <tr>
            <td style="width: 20px;">3.</td>
            <td colspan="4" style="text-align:justify;">Berhubung maksud yang bersangkutan, diminta agar yang berwenang memberikan bantuan serta fasilitas seperlunya.</td>
        </tr>
        <tr>
            <td style="width: 20px;">4.</td>
            <td colspan="4" style="text-align:justify;">Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</td>
        </tr>
        @else
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">a.</td>
            <td style="width: 190px;">Nama</td>
            <td style="width: 20px;">:</td>
            <td>{{ $data->penduduk->nama }}</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">b.</td>
            <td style="width: 190px;">Tempat/Tgl. Lahir</td>
            <td style="width: 20px;">:</td>
            <td>{{ $data->penduduk->tempatlahir }}, {{(new \App\Helper)->tanggal($data->penduduk->tgllahir)}}</td>
        </tr>
        {{-- <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">c.</td>
            <td style="width: 190px;">Kebangsaan</td>
            <td style="width: 20px;">:</td>
            @php
                if ($data->penduduk->wn == 1) {
                    $wn = 'Indonesia';
                } elseif ($data->penduduk->wn == 2) {
                    $wn = 'Asing';
                } else {
                    $wn = '';
                }
            @endphp
            <td>{{ $wn }}</td>
        </tr> --}}
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">c.</td>
            <td style="width: 190px;">Agama</td>
            <td style="width: 20px;">:</td>
            <td>{{ $data->penduduk->agama }}</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">d.</td>
            <td style="width: 190px;">Pekerjaan</td>
            <td style="width: 20px;">:</td>
            <td style="text-transform: capitalize;">{{ $data->penduduk->pekerjaan }}</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">e.</td>
            <td style="width: 190px;">No. Kartu Keluarga (KK)</td>
            <td style="width: 20px;">:</td>
            <td>{{ $data->penduduk->kartukeluarga->nokk }}</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">f.</td>
            <td style="width: 190px;">No. KTP/NIK</td>
            <td style="width: 20px;">:</td>
            <td>{{ $data->penduduk->nik }}</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">g.</td>
            <td style="width: 190px;">Alamat</td>
            <td style="width: 20px;">:</td>
            <td style="text-align: justify;">Lingkungan {{(new \App\Helper)->lingkungan($data->penduduk->lingkungan)}}, Kelurahan Semarapura Kaja, Kecamatan Klungkung, Kabupaten Klungkung</td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">h.</td>
            <td style="width: 190px;">Menerangkan</td>
            <td style="width: 20px;">:</td>
            <td style="text-align:justify;">Memang benar orang tersebut di atas <span style="font-weight: bold; font-style:italic;">{{ $data->keterangan }}</span></td>
        </tr>
        <tr>
            <td style="width: 20px;"></td>
            <td style="width: 20px;">i.</td>
            <td style="width: 190px;">Menerangkan</td>
            <td style="width: 20px;">:</td>
            <td style="text-align:justify;">Surat Keterangan ini dibuat untuk <span style="font-weight: bold; font-style:italic;">{{ $data->maksud }}</span></td>
        </tr>
        <tr>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td style="width: 20px;">2.</td>
            <td colspan="4" style="text-align:justify;">Berhubung maksud yang bersangkutan, diminta agar yang berwenang memberikan bantuan serta fasilitas seperlunya.</td>
        </tr>
        <tr>
            <td style="width: 20px;">3.</td>
            <td colspan="4" style="text-align:justify;">Demikian surat keterangan ini dibuat untuk dapat dipergunakan seperlunya.</td>
        </tr>
        @endif
    </table>
    <br>
    <table style="margin-top:10px">
        <td style="width: 55%"></td>
        {{-- <td style="text-align: center; line-height:23px;">
          Semarapura, {{ (new \App\Helper)->tanggal($data->tglvalidasi) }}<br>
          {{ $lurah->jabatan->nama }},
            <br><br><br><br>
          <span style="font-weight: bold; text-decoration:underline;">{{$lurah->nama}}</span><br>
          NIP.{{ $lurah->nip }}
        </td> --}}
        @if ($data->status > 2)
            <td style="text-align: center;">
                <table style="border: 1px solid #000;">
                    <td style="text-align: center; vertical-align: middle;">
                        <img src="{{ asset('assets/images/Lambang_Kabupaten_Klungkung.png') }}" width="60" alt="">
                    </td>
                    <td>
                        <p style="font-size: 11px; line-height: 5px;">Telah ditandatangani secara elektronik oleh:</p>
                        <p style="font-size: 13px; text-transform: uppercase; line-height: 5px;">Lurah Semarapura Kaja</p>
                        <p style="font-size: 13px; font-weight: bold; line-height: 5px;">{{$lurah->nama}}</p>
                        <p style="font-size: 13px; line-height: 5px;">NIP. {{$lurah->nip}}</p>
                    </td>
                </table>
            </td>
        @endif

    </table>
    @if ($data->status > 2)
        <footer>
            <table>
                <tr>
                    <td>
                        <div class="barcode" style="margin: 10px; margin-left: 95px;">
                            <?php
                                $id = $data->id;
                                $idsurat = "http://spkaja.test/surat-keterangan/".(string)$id;
                                echo DNS2D::getBarcodeHTML($idsurat, 'QRCODE',2,2);
                            ?>
                        </div>
                    </td>
                    <td style="width:100%;">
                        <div style="border-top: 1px solid #808080; width:100%; margin-top:10px; padding-top: 5px;">
                            <p style="line-height: 4px; font-size: 13px; color: #808080;">Dokumen dicetak secara terkomputerisasi dan telah divalidasi melalui sistem informasi pengajuan.</p>
                            <p style="line-height: 4px; font-size: 13px; color: #808080;">Scan barcode untuk menampilkan halaman original.</p>
                            <p style="line-height: 4px; font-size: 13px; color: #808080;">© Kelurahan Semarapura Kaja</p>
                        </div>
                    </td>
                </tr>
            </table>
        </footer>
    @else
    @endif
</main>
