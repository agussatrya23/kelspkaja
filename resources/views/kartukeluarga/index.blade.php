@extends('layouts.menu')

@section('title-head', 'Kartu Keluarga')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Kartu Keluarga</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Kependudukan</a>
                            </li>
                            <li class="breadcrumb-item active">Kartu Keluarga
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
                                    <button id="tambahkk" class="btn btn-primary" data-toggle="modal" data-target="#modal-kk"><i data-feather="plus"></i> Tambah Kartu Keluarga</button>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <table id="tabelkk" class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th></th>
                                    <th>No KK</th>
                                    <th>Lingkungan</th>
                                    <th>Jumlah</th>
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
<div class="modal fade text-left" id="modal-kk" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tittlekk"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formkk" action="#" enctype="multipart/form-data" method="post">
                <input type="hidden" id="idkk" name="idkk" value="">
                <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="col-sm-12 col-form-label"><b>No KK</b></label>
                        <div class="col-sm-12">
                            <input type="hidden" id="nokklama" name="nokklama">
                            <input type="number" id="nokk" name="nokk" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-sm-12 col-form-label"><b>Lingkungan</b></label>
                        <div class="col-sm-12">
                            <select class="form-control show-tick ms select2" id="lingkungan" name="lingkungan" data-placeholder="Pilih" required>
                                <option value=""></option>
                                @if (Auth::user()->staf->idjabatan == 3)
                                   <option id="kawan" value="1">Lingkungan Besang Kawan</option>
                                @elseif (Auth::user()->staf->idjabatan == 4)
                                    <option id="tengah" value="2">Lingkungan Besang Tengah</option>
                                @elseif (Auth::user()->staf->idjabatan == 5)
                                    <option value="3">Lingkungan Besang Kangin</option>
                                @else
                                    <option id="kawan" value="1">Lingkungan Besang Kawan</option>
                                    <option id="tengah" value="2">Lingkungan Besang Tengah</option>
                                    <option id="kangin" value="3">Lingkungan Besang Kangin</option>
                                @endif

                            </select>
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
        var table = $('#tabelkk').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            "drawCallback": function( settings ) {
                feather.replace();
            },
            dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbar">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
            ajax: '{!! route('kk.dt') !!}',
            lengthMenu: [
                [ 10, 25, 50 ],
                [ '10', '25', '50' ]
            ],
            columns: [
                { data: 'created_at', name: 'created_at'},
                { data: 'nokk', name:'nokk'},
                { data: 'lingkungan', name: 'lingkungan'},
                { data: 'jumlah', name: 'jumlah'},
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

        $('#tambahkk').click(function(){
            // validate.resetForm()
            // $('.validate-jquery-form-class').find('.error').removeClass('error')
            $('#formkk').attr('action','{{ route("kk.store") }}')
            $('#tittlekk').text('TAMBAH KARTU KELUARGA')
            $('#nokk').val('')
            $("#lingkungan").select2("val", false);
        });

        $('#tabelkk tbody').on('click', '#editkk', function(data){
            // validate.resetForm()
            // $('.validate-jquery-form-class').find('.error').removeClass('error')
            id = $(this).val()
            $('#formkk #idkk').val(id)
            $('#tittlekk').text('UBAH KARTU KELUARGA')

            $('#formkk').attr('action','{{ route("kk.update") }}')
            $.get('/kependudukan/kartu-keluarga/get/'+id, function(data){
                $('#formkk #nokklama').val(data.nokk)
                $('#formkk #nokk').val(data.nokk)
                $("#lingkungan").select2("val", data.lingkungan);
                $('#formkk #lingkungan').val(data.lingkungan)
                if (data.lingkungan == 1){
                    $('#kawan').prop("selected", true)
                } else if (data.lingkungan == 2) {
                    $('#tengah').prop("selected", true)
                } else if (data.lingkungan == 3) {
                    $('#kangin').prop("selected", true)
                }
            })
        })
    });
</script>
@endsection
