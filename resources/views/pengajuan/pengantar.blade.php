<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Surat Pengantar Kaling - {{$kaling->nama}}</title>
<style media="screen">
  table {
    font-size: 15px;
    border-collapse: collapse;
    width: 100%;
    font-family: "Times New Roman", Times, serif;
    margin-left: 40px;
    margin-top: -10px;
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
    margin-right: 30px;
    margin-top: -160px !important;
    position: center;
  }
  main {
    font-size: 16px;
    margin-left: 30px;
    margin-right: 30px;
    margin-bottom: 15px;
  }
  footer {
    position: fixed;
    bottom: 40px; left: 25px; right: 25px;
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
    <p style="font-size:19px; margin-top:-10px; font-weight: bold;">KELURAHAN SEMARAPURA KAJA</p>
    @php
        $ling = $data->lingkungan;
        if ($ling == 1) {
            $title = 'LINGKUNGAN BESANG KAWAN';
        } elseif ($ling == 2) {
            $title = 'LINGKUNGAN BESANG TENGAH';
        } elseif ($ling == 3) {
            $title = 'LINGKUNGAN BESANG KANGIN';
        } else {
            $title = '';
        }
    @endphp
    <p style="font-weight: bold; font-size:22px !important; margin-top:-18px;">{{ $title }}</p>
    <p style="font-size:15px; margin-top:-15px; font-style:italic;">{{ $kaling->alamat }}, Telp. ({{ $kaling->telepon }})</p>
  </div>
  <hr style="height: 2px; background-color: #000;" >
  <hr style="margin-top:-5px; background-color: #000;">
</div>

<main>
    <center>
        <h3 style="margin-top: -10px; margin-bottom: 0px; font-size: 21px; font-weight: 700; text-decoration:underline; text-transform: uppercase;">SURAT PENGANTAR</h3>
        <h4 style="margin-top: 3px; margin-bottom: 15px; font-size: 15px; font-weight: 700; font-style: italic;">NOMOR : {{ $data->nopengantar }}</h4>
    </center>

    <p style="font-size: 15px; margin-top: 20px">Yang bertanda tangan dibawah ini :</p>
    <table>
        <tr>
            <td style="width: 190px">Nama</td>
            <td>:</td>
            <td>{{ $kaling->nama }}</td>
        </tr>
        <tr>
            <td style="width: 190px">Jabatan</td>
            <td>:</td>
            <td>{{ $kaling->jabatan->nama }}</td>
        </tr>
        <tr>
            <td style="width: 190px">Alamat</td>
            <td>:</td>
            <td>{{ $kaling->alamat }}</td>
        </tr>
    </table>

    <p style="font-size: 15px; margin-top: 5px">Dengan ini menerangkan bahwa,</p>
    <table>
        <tr>
            <td style="width: 190px">Nama</td>
            <td>:</td>
            <td>{{ $data->penduduk->nama }}</td>
        </tr>
        <tr>
            <td style="width: 190px">NIK</td>
            <td>:</td>
            <td>{{ $data->penduduk->nik }}</td>
        </tr>
        <tr>
            <td style="width: 190px">No Kartu Keluarga</td>
            <td>:</td>
            <td>{{ $data->penduduk->kartukeluarga->nokk }}</td>
        </tr>
        <tr>
            <td style="width: 190px">Jenis Kelamin</td>
            <td>:</td>
            @php
                if ($data->penduduk->jk == 1) {
                    $jk = 'Laki-laki';
                } elseif ($data->penduduk->jk == 2) {
                    $jk = 'Perempuan';
                } else {
                    $jk = '';
                }
            @endphp
            <td>{{ $jk }}</td>
        </tr>
        <tr>
            <td style="width: 190px">Agama</td>
            <td>:</td>
            <td>{{ $data->penduduk->agama }}</td>
        </tr>
        @if ($data->idsurat != 4)
        <tr>
            <td style="width: 190px">Pekerjaan</td>
            <td>:</td>
            <td style="text-transform: capitalize;">{{ $data->penduduk->pekerjaan }}</td>
        </tr>
        <tr>
            <td style="width: 190px">Status Kawin</td>
            <td>:</td>
            <td>{{ $data->penduduk->statuskawin }}</td>
        </tr>
        @endif
        <tr>
            <td style="width: 190px">Alamat</td>
            <td>:</td>
            <td>Lingk.{{(new \App\Helper)->lingkungan($data->penduduk->lingkungan)}}, Kel. Semarapura Kaja</td>
        </tr>
    </table>
    <p style="text-indent:40px; font-size: 15px; margin-top: 5px; text-align:justify; line-height: 21px; margin-bottom: 5px;">Berdasarkan Surat Pernyataan Orang tersebut diatas dan sepanjang pengetahuan kami bahwa memang benar orang tersebut diatas adalah penduduk yang tercatat di Lingk. {{(new \App\Helper)->lingkungan($data->penduduk->lingkungan)}}, Kel Semarapura Kaja serta memang benar orang tersebut diatas <span style="font-weight: bold; font-style:italic;">{{ $data->keterangan }}</span>.</p>
    @if ($data->idsurat == 4)
        <table style="margin-top: 5px !important;">
            <tr>
                <td style="width: 190px">Nama Lengkap</td>
                <td>:</td>
                <td>{{ $detil->nama }}</td>
            </tr>
            <tr>
                <td style="width: 190px">NIK</td>
                <td>:</td>
                <td>{{ $detil->nik}}</td>
            </tr>
            <tr>
                <td style="width: 190px">Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $detil->tempatlahir }}, {{(new \App\Helper)->tanggal($detil->tgllahir)}}</td>
            </tr>
            <tr>
                <td style="width: 190px">Jenis Kelamin</td>
                <td>:</td>
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
                <td style="width: 190px">Agama</td>
                <td>:</td>
                <td>{{ $detil->agama }}</td>
            </tr>
            <tr>
                <td style="width: 190px">Tempat, Tanggal Meninggal</td>
                <td>:</td>
                <td>{{ $detil->tempatmeninggal }}, {{(new \App\Helper)->tanggal($detil->tglmeninggal)}}</td>
            </tr>
            <tr>
                <td style="width: 190px">Penyebab Meninggal</td>
                <td>:</td>
                <td>{{ $detil->penyebab }}</td>
            </tr>
            <tr>
                <td style="width: 190px">Hubungan dengan pelapor</td>
                <td>:</td>
                <td>{{ $detil->hubungan }}</td>
            </tr>
        </table>
    @endif
    <p style="text-indent:40px; font-size: 15px; margin-top: 0px; margin-bottom: 5px; text-align:justify; line-height: 21px;">Surat pengantar ini dibuat untuk <span style="font-weight: bold; font-style:italic;">{{ $data->maksud }}</span>.</p>
    <p style="text-indent:40px; font-size: 15px; margin-top: 0px; text-align:justify; line-height: 21px;">Demikian surat pengantar ini dibuat sebagai dasar penerbitan <span style="font-weight: bold; font-style:italic;">{{ $data->surat->nama }}</span> dari Kelurahan.</p>
    <br>
    <table>
        <td style="width: 50%"></td>
        <td style="text-align: center; line-height:23px;">
          Semarapura, {{ (new \App\Helper)->tanggal($data->tglverifikasi) }}<br>
          {{ $kaling->jabatan->nama }}
          <div class="barcode" style="margin: 15px; margin-left: 125px;">
            <?php
                $id = $kaling->id;
                $idkaling = "http://spkaja.test/staf/detil/".(string)$id;
                echo DNS2D::getBarcodeHTML($idkaling, 'QRCODE',3,3);
            ?>
          </div>
          <span style="text-decoration: underline; text-transform:uppercase;">{{$kaling->nama}}</span>
        </td>
    </table>
</main>
