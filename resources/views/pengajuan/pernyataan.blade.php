<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Surat Penyataan - {{$data->penduduk->nama}}</title>
<style media="screen">
  table {
    border-collapse: collapse;
    width: 100%;
    font-family: "Times New Roman", Times, serif;
    margin-left: 40px;
  }
  td{
    text-align:left;
    padding: 3px;
    vertical-align: top;
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
  <div style="margin-bottom: -10px; text-align:center">
    <p style="font-weight: 700; font-size:25px !important; margin-top:10px; text-decoration:underline;">SURAT PERNYATAAN</p>
  </div>
</div>

<main>
    <p style="font-size: 16px; margin-top:-70px">Yang bertanda tangan dibawah ini,</p>
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
            <td style="width: 190px">Tempat/Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $data->penduduk->tempatlahir }}, {{(new \App\Helper)->tanggal($data->penduduk->tgllahir)}}</td>
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
        <tr>
            <td style="width: 190px">Pekerjaan</td>
            <td>:</td>
            <td style="text-transform: capitalize;">{{ $data->penduduk->pekerjaan }}</td>
        </tr>
        <tr>
            <td style="width: 190px">Alamat</td>
            <td>:</td>
            <td>Lingk.{{(new \App\Helper)->lingkungan($data->penduduk->lingkungan)}}, Kel. Semarapura Kaja</td>
        </tr>
    </table>
    <p style="text-indent: 40px; line-height: 27px; text-align: justify;">Dengan ini saya menyatakan memang benar saya warga yang tercatat di Lingkungan {{(new \App\Helper)->lingkungan($data->penduduk->lingkungan)}} Kel. Semarapura Kaja Klungkung dan memang benar saya <span style="font-weight: bold; font-style:italic;">{{ $data->keterangan }}</span>.</p>
    @if ($data->idsurat == 4)
        <table style="margin-bottom: 25px !important;">
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
    <p style="text-indent: 40px; line-height: 27px; text-align: justify; margin-top: -15px;">Demikian surat pernyataan ini saya buat dengan sebenarnya, surat pernyataan ini dibuat untuk {{ $data->maksud }}.</p>
    <br>
    <table style="margin-top:10px">
        <td style="width: 60%"></td>
        <td style="text-align: center; line-height:23px;">
          Semarapura, {{ (new \App\Helper)->tanggal($data->tanggal) }}<br>
          Yang Membuat Pernyataan
          <br><br>
          {{-- <div style="font-size: 14px; line-height:5px; margin-left:-20px; margin-top:5px; text-align:center; width:80px; border:1px solid #000;">
              <p>Materai</p>
              <p>10.000</p>
          </div> --}}
          <br><br>
          <b><u>{{$data->penduduk->nama}}</u></b>
        </td>
    </table>
    <br>
    <br>
</main>
{{-- <table style="margin-left: -10px !important;">
    <tr>
        <td style="width:50%; text-align: center;">
            <img src="{{ asset('upload/'.$data->ktp) }}" width="80%" alt="">
        </td>
        <td style="width:50%; text-align: center;">
            <img src="{{ asset('upload/'.$data->photo) }}" width="80%" alt="">
        </td>
    </tr>
    <tr>
        <td style="width:50%; text-align: center;">Photo KTP/KK</td>
        <td style="width:50%; text-align: center;">Photo Selfi Menunjukkan KTP</td>
    </tr>
</table> --}}
