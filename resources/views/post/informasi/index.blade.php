@extends('layouts.menu')

@section('title-head', 'Informasi')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Informasi</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Konten Web</a>
                            </li>
                            <li class="breadcrumb-item active">Informasi
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
                    <div class="card-header border-bottom">
                        <div class="dt-action-buttons">
                            <div class="dt-buttons d-flex-row">
                                <a href="{{route('informasi.create')}}" class="btn btn-primary"><i data-feather="plus"></i> Tambah Informasi</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="tabelinformasi">
                            <thead class="text-center">
                                <th>Tanggal</th>
                                <th>Judul</th>
                                <th>Jenis</th>
                                <th>Status</th>
                                <th>Aksi</th>
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

@section('jspage')
    <script>
        $(document).ready(function(){
            var table = $('#tabelinformasi').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                "drawCallback": function( settings ) {
                    feather.replace();
                },
                dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbar">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
                ajax: '{!! route('informasi.dt') !!}',
                lengthMenu: [
                    [ 10, 25, 50 ],
                    [ '10', '25', '50' ]
                ],
                columns: [
                    { data: 'tanggal', name:'tanggal'},
                    { data: 'judul', name: 'judul'},
                    { data: 'jenis', name: 'jenis', 'render': function(data, type, row){
                        if (data == 2) {
                            return 'Berita';
                        }else if (data == 3) {
                            return 'Pengumuman';
                        }else if (data == 4) {
                            return 'Agenda';
                        }
                    }},
                    { data: 'status', name: 'status', class: 'text-center', 'render': function(data, type, row){
                        if (data == 1) {
                            return '<div class="badge badge-light-success">Publish</div>';
                        }else if (data == 2) {
                            return '<div class="badge badge-light-warning">Draft</div>';
                        }
                    }},
                    { data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
                ],
                order: [[ 0, "desc" ]],
                columnDefs: [
                    {
                    "targets": [ 0 ],
                    "orderable": true
                    },
                ],
            });

            $('#tabelinformasi tbody').on('click','.btnhapus', function(){
                var tr = $(this).closest('tr');
                var row = table.row(tr);
                var data = row.data()
                if( !confirm('Lanjutkan proses hapus data informasi "'+data.judul+'"?')){
                    event.preventDefault();
                }
            })

            $.fn.DataTable.ext.pager.numbers_length = 5;
        });
    </script>
@endsection

