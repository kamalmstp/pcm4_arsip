@extends('adminlte::page')

@section('title', 'Tambah User')

@section('content_header')
    <h1>Tambah User</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-xs-12">

                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Tambah User</h3>
                    </div>
                    <div class="box-body">

                        <form action="#" id="form-user">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" class="form-control" name="jabatan">
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" class="form-control" name="nip">
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="text" class="form-control" name="password_confirmation">
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Role User</label>
                                <select name="roles" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="kegiatan">Kegiatan</option>
                                    <option value="gudang">Gudang</option>
                                    <option value="bidang">Bidang</option>
                                </select>
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Status</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Non-Aktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="Submit" class="btn btn-success">Tambah</button>
                                <a href="{{ route('user') }}" class="btn btn-warning">Batalkan</a>
                            </div>
                            <!-- /.form group -->
                        </form>
                        
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->



            </div>
        </div>
    </section>
@stop

@section('css')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function(){
            $("#form-user").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: "{{ route('user.save') }}",
                    data: $('#form-user').serialize(),
                    type: "POST",
                    dataType: "JSON",
                    success: function(data){
                        if(data.status){
                            window.location.href = "{{ route('user') }}";
                        }else{
                            var error = data.error;
                            $.each(error,function(key, row){
                                $('[name="'+key+'"]').parent().removeClass("has-error");
                                $('[name="'+key+'"]').parent().addClass("has-error");
                                $('[name="'+key+'"]').parent().children("span.help-block").remove();
                                $('[name="'+key+'"]').parent().append($('<span class="help-block">'+row+'</span>'));
                            });
                        }
                    }
                });
            });
        });
    </script>
@stop