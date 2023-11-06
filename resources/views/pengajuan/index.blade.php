@extends('layouts.menu')

@section('title-head', 'Pengajuan')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Pengajuan</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Pengajuan</a>
                            </li>
                            <li class="breadcrumb-item active">Surat Keterangan
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="tabelpengajuan" class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th></th>
                                    <th class="d-none">id</th>
                                    <th>Nama</th>
                                    <th>Jenis Surat</th>
                                    {{-- <th>Dokumen</th> --}}
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade text-left" id="nomor-surat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tittle-modal"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formnomor" action="#" enctype="multipart/form-data" method="post">
                <input type="hidden" id="id" name="id">
                <input type="hidden" id="status" name="status">
                <input type="hidden" id="tglverifikasi" name="tglverifikasi">
                <div class="modal-body">
                <div class="row">
                    <div class="form-group col-12">
                        <label class="col-sm-12 col-form-label"><b>Nama Penduduk</b></label>
                        <div class="col-sm-12">
                            <input type="text" id="nama" name="nama" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-sm-12 col-form-label"><b>Surat Keterangan</b></label>
                        <div class="col-sm-12">
                            <input type="text" id="namasurat" name="namasurat" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md-6 no-surat">
                        <label class="col-sm-12 col-form-label px-0"><b>Nomor Surat</b></label>
                        <div class="row px-50">
                            <div class="col-2 px-25">
                                <input type="text" id="nojenis" name="nojenis" class="form-control p-50">
                            </div>
                            <div class="col-2 px-25">
                                <input type="text" id="nosurat" name="nosurat" class="form-control p-50">
                            </div>
                            <div class="col-2 px-25">
                                <input type="text" id="romawi" name="romawi" class="form-control p-50" readonly>
                            </div>
                            <div class="col-3 px-25">
                                <input type="text" id="kelurahan" name="kelurahan" class="form-control p-50" readonly>
                            </div>
                            <div class="col-3 px-25">
                                <input type="text" id="tahun" name="tahun" class="form-control p-50" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 no-pengantar">
                        <label class="col-sm-12 col-form-label px-0"><b>Nomor Surat</b></label>
                        <div class="row px-50">
                            <div class="col-2 px-25">
                                <input type="text" id="nopengantar" name="nopengantar" class="form-control p-50">
                            </div>
                            <div class="col-2 px-25">
                                <input type="text" id="jenissurat" name="jenissurat" class="form-control p-50" readonly>
                            </div>
                            <div class="col-2 px-25">
                                <input type="text" id="lingk" name="lingk" class="form-control p-50">
                            </div>
                            <div class="col-3 px-25">
                                <input type="text" id="kelurahan" name="kelurahan" class="form-control p-50" readonly>
                            </div>
                            <div class="col-3 px-25">
                                <input type="text" id="tahun" name="tahun" class="form-control p-50" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection

@section('jspage')
<script>
    $(document).ready(function(){
        var table = $('#tabelpengajuan').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            "drawCallback": function( settings ) {
                feather.replace();
            },
            dom: '<"box-body"<"row"<"col-lg-3 col-md-3 col-sm-4"l><"col-lg-5 col-md-9 col-sm-8"<"toolbarsurat">><"col-lg-4 col-md-12 col-sm-12"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
            ajax: '{!! route('pengajuan.dt',0) !!}',
            lengthMenu: [
                [ 10, 25, 50 ],
                [ '10', '25', '50' ]
            ],
            columns: [
                { data: 'updated_at', name: 'updated_at'},
                { data: 'id', name:'id', class: 'd-none'},
                { data: 'penduduk.nama', name:'penduduk.nama'},
                { data: 'surat.nama', name: 'surat.nama'},
                // { data: 'dokumen', name: 'dokumen',  orderable: false, searchable: false, class: 'text-center', 'render': function(data, type, row){
                //     if (data == 0){
                //         var row = table.row(data);
                //         var data = row.data()
                //         var idsurat = data.id;
                //         console.log(idsurat);
                //         return '<div class="text-center"><div class="btn-group"><button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle my-25 my-lg-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Surat <span class="badge badge-light-primary">1</span></button><div class="dropdown-menu p-0"><a class="dropdown-item my-0" href="{{ route('pengajuan.pernyataan', "idsurat") }}" title="Surat Pernyataan">Surat Pernyataan</a></div></div></div>'
                //     }else if (data == 1){
                //         return '<div class="text-center"><div class="btn-group"><button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle my-25 my-lg-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Surat <span class="badge badge-light-primary">2</span></button><div class="dropdown-menu p-0"><a class="dropdown-item" href="#" title="Surat Pernyataan">Surat Pernyataan</a><div class="dropdown-divider m-0"></div><a class="dropdown-item" href="#"  title="Surat Pernyataan Kaling">Surat Pengantar Kaling</a></div></div></div>'
                //     }else if (data == 2 || data == 3 || data == 4){
                //         return '<div class="text-center"><div class="btn-group"><button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle my-25 my-lg-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Surat <span class="badge badge-light-primary">3</span></button><div class="dropdown-menu"><a class="dropdown-item" href="#" title="Surat Pernyataan">Surat Pernyataan</a><div class="dropdown-divider m-0"></div><a class="dropdown-item" href="#"  title="Surat Pernyataan Kaling">Surat Pengantar Kaling</a><div class="dropdown-divider m-0"></div><a class="dropdown-item" href="#" title="Surat Keterangan">Surat Keterangan</a></div></div></div>'
                //     }
                // }},
                { data: 'status', name: 'status', orderable: false, searchable: false, class: 'text-center', 'render': function(data, type, row){
                    if (data == 0){
                        return '<div class="badge badge-light-warning">Menunggu Verifikasi Kaling</div>'
                    } else if (data == 1){
                        return '<div class="badge badge-light-info">Menunggu Nomor Surat</div>'
                    } else if (data == 2){
                        return '<div class="badge badge-light-success">Menunggu Validasi Lurah </div>'
                    } else if (data == 3){
                        return '<div class="badge badge-light-danger">Segera Kirimkan Surat!</div>'
                    } else if (data == 4){
                        return '<div class="badge badge-light-success">Selesai</div>'
                    } else if (data == 5){
                        return '<div class="badge badge-light-dark">Pengajuan Ditolak</div>'
                    }
                }},
                { data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
            ],
            order: [[ 0, "desc" ]],
            columnDefs: [
                {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false,
                "orderable": true
                },
            ],
        });

        $.fn.DataTable.ext.pager.numbers_length = 5;

        $('div.toolbarsurat').html('<div class="text-center mt-25 mt-lg-1"><select class="form-control show-tick ms select2" id="idsurat" name="idsurat"></select></div>')

        $("#idsurat").select2({
            placeholder: "Semua Surat Keterangan",
            ajax: {
                url: '{!!route("s2.surat")!!}',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
        });

        $('#idsurat').on('change', function(){
            var idsurat = $(this).val()
            table.ajax.url('/pengajuan/surat-keterangan/dt/'+idsurat).load();
        })


        $('#tabelpengajuan tbody').on('click', '#btn-nomor', function(data){
            // validate.resetForm()
            // $('.validate-jquery-form-class').find('.error').removeClass('error')
            id = $(this).val()
            $('#formnomor #id').val(id)
            $('#tittle-modal').text('TAMBAH NOMOR SURAT')
            $('.no-pengantar').hide()

            var now = new Date();
            var tahun = now.getFullYear() ;
            const rombulan = ["I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII"];
            var bulan = rombulan[now.getMonth()];
            $('#formnomor').attr('action','{{ route("pengajuan.validasi") }}')
            $.get('/pengajuan/surat-keterangan/get/'+id, function(data){
                $('#formnomor #nama').val(data.penduduk.nama)
                $('#formnomor #namasurat').val(data.surat.nama)
                $('#formnomor #status').val(2)
                $('#formnomor #nojenis').val(data.surat.nomor).attr("readonly", true)
                $('#formnomor #nosurat').attr("required", true)
                $('#formnomor #romawi').val(bulan)
                $('#formnomor #kelurahan').val('Sp Kaja')
                $('#formnomor #tahun').val(tahun)
                $('#formnomor #tglverifikasi').val(data.tglverifikasi)
            })
        })

        $('#tabelpengajuan tbody').on('click', '#btn-verifikasi', function(data){
            // validate.resetForm()
            // $('.validate-jquery-form-class').find('.error').removeClass('error')
            id = $(this).val()
            $('#formnomor #id').val(id)
            $('#tittle-modal').text('TAMBAH NOMOR SURAT PENGANTAR KALING')
            $('#formnomor').attr('action','{{ route("pengajuan.validasi") }}')
            $('.no-surat').hide()

            var now = new Date();
            var tahun = now.getFullYear() ;
            const rombulan = ["I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII"];
            var bulan = rombulan[now.getMonth()];
            $.get('/pengajuan/surat-keterangan/get/'+id, function(data){
                $('#formnomor #nama').val(data.penduduk.nama)
                $('#formnomor #namasurat').val(data.surat.nama)
                $('#formnomor #nopengantar').attr("required", true)
                $('#formnomor #jenissurat').val(bulan)
                $('#formnomor #status').val(1)
                if (data.lingkungan == 1){
                    $('#formnomor #lingk').val('LKW')
                    $('#formnomor #lingk').attr("readonly", true)
                } else if (data.lingkungan == 2) {
                    $('#formnomor #lingk').val('LTG')
                    $('#formnomor #lingk').attr("readonly", true)
                } else if (data.lingkungan == 3) {
                    $('#formnomor #lingk').val('LKG')
                    $('#formnomor #lingk').attr("readonly", true)
                }
                $('#formnomor #kelurahan').val('Sp Kaja')
                $('#formnomor #tahun').val(tahun)
                $('#formnomor #tglverifikasi').val(data.tglverifikasi)
            })
        })
    });
</script>
@endsection
