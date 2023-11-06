@extends('layouts.menu')

@section('title-head', 'Penduduk')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Penduduk</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Kependudukan</a>
                            </li>
                            <li class="breadcrumb-item active">Penduduk
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
                    @if(Auth::user()->can('lurah') == false)
                        <div class="card-header border-bottom">
                            <div class="dt-action-buttons">
                                <div class="dt-buttons d-flex-row">
                                    <a href="{{route('penduduk.create')}}" class="btn btn-primary"><i data-feather="plus"></i> Tambah Penduduk</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <table id="tabelpenduduk" class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th></th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Lingkungan</th>
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

@section('jspage')
<script>
    $(document).ready(function(){
        var table = $('#tabelpenduduk').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            "drawCallback": function( settings ) {
                feather.replace();
            },
            dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbar">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
            ajax: '{!! route('penduduk.dt') !!}',
            lengthMenu: [
                [ 10, 25, 50 ],
                [ '10', '25', '50' ]
            ],
            columns: [
                { data: 'created_at', name: 'created_at'},
                { data: 'nik', name:'nik'},
                { data: 'nama', name: 'nama'},
                { data: 'lingkungan', name: 'lingkungan'},
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
    });
</script>
@endsection
