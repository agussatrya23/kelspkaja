@extends('layouts.menu')

@section('title-head', 'Aparatur')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Aparatur</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">SPKAJA</a>
                            </li>
                            <li class="breadcrumb-item active">Aparatur
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
                    @if(Auth::user()->can('kaling') == false)
                        <div class="card-header border-bottom">
                            <div class="dt-action-buttons">
                                <div class="dt-buttons d-flex-row">
                                    <a href="{{route('staf.create')}}" class="btn btn-primary"><i data-feather="plus"></i> Tambah Aparatur</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <table id="tabelstaf" class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th></th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
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
<div class="modal fade text-left" id="modal-user" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titleuser">BUAT USER</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="jquery-val-form" class="formuser" action="#" method="post">
                <input type="hidden" id="link" name="link" class="form-control">
                <input type="hidden" id="iduser" name="iduser" class="form-control">
                <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-sm-12 col-form-label"><b>Nama</b></label>
                        <div class="col-sm-12">
                            <input type="text" id="nama" name="nama" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-sm-12 col-form-label"><b>Jabatan</b></label>
                        <div class="col-sm-12">
                            <input type="text" id="idjabatan" name="idjabatan" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-sm-12 col-form-label"><b>Role</b></label>
                        <div class="col-sm-12">
                            <select class="form-control show-tick ms select2" id="role" name="role" data-placeholder="Pilih" required>
                                <option value=""></option>
                                <option id="lurah" value="1">Lurah</option>
                                <option id="admin" value="2">Petugas Administrasi</option>
                                <option id="kaling" value="3">Kepala Lingkungan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mail-add">
                        <label class="col-sm-12 col-form-label"><b>Username</b></label>
                        <div class="col-sm-12">
                            <input type="text" id="email" name="email" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group col-md-6 pass">
                        <label class="col-sm-12 col-form-label"><b>Password</b></label>
                        <div class="col-sm-12">
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" class="form-control form-control-merge" id="password" name="password" aria-describedby="password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>
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
        var table = $('#tabelstaf').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            "drawCallback": function( settings ) {
                feather.replace();
            },
            dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbar">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
            ajax: '{!! route('staf.dt') !!}',
            lengthMenu: [
                [ 10, 25, 50 ],
                [ '10', '25', '50' ]
            ],
            columns: [
                { data: 'idjabatan', name: 'idjabatan'},
                { data: 'nama', name:'nama'},
                { data: 'jabatan.nama', name: 'jabatan.nama'},
                { data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
            ],
            order: [[ 0, "asc" ]],
            columnDefs: [
                {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false,
                "orderable": true
                },
            ]
        });

        $.fn.DataTable.ext.pager.numbers_length = 5;

        $('#tabelstaf tbody').on('click', '#btnuser', function(data){
            // validate.resetForm()
            // $('.validate-jquery-form-class').find('.error').removeClass('error')
            id = $(this).val()
            $('#link').val(id)
            // $('#titleuser').text('BUAT USER')
            // $('.pass').show()
            // $('.mail-add').show()
            // $("#role").select2("val", false);

            $('.formuser').attr('action','{{route("user.store")}}')
            $.get('/staf/get/'+id, function(data){
                $('.formuser #nama').val(data.nama)
                $('.formuser #idjabatan').val(data.jabatan.nama)
            })
        })

        // $('#tabelstaf tbody').on('click', '#edituser', function(data){
        //     // validate.resetForm()
        //     // $('.validate-jquery-form-class').find('.error').removeClass('error')
        //     id = $(this).val()
        //     $('#link').val(id)
        //     $('#titleuser').text('UBAH USER')
        //     $('.pass').hide()
        //     $('.mail-add').hide()

        //     $('#formuser').attr('action','{{route("user.update")}}')
        //     $.get('/staf/get/'+id, function(data){
        //         $('#formuser #iduser').val(data.user.id)
        //         $('#formuser #nama').val(data.nama)
        //         $('#formuser #idjabatan').val(data.jabatan.nama)
        //         $("#role").select2("val", data.user.role);
        //         $('#formuser #role').val(data.user.role)
        //         if (data.user.role == 1){
        //             $('#lurah').prop("selected", true)
        //         } else if (data.user.role == 2) {
        //             $('#admin').prop("selected", true)
        //         } else if (data.user.role == 3) {
        //             $('#kaling').prop("selected", true)
        //         }
        //         $('#formuser #email').val(data.user.email)
        //     })
        // })

        $('#tabelstaf tbody').on('click','.btnhapus', function(){
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data()
            if( !confirm('Lanjutkan proses hapus user a/n "'+data.nama+'"?')){
                event.preventDefault();
            }
        })

    });
</script>
@endsection


