@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-xs-12">

                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Input masks</h3>
                    </div>
                    <div class="box-body">

                        <div class="form-group">
                            <label>Nama</label>

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
                            <label>Status</label>

                            <input type="text" class="form-control" name="status">
                        </div>
                        <div class="form-group">
                                <button type="button" class="btn btn-success">Simpan</button>
                                <button type="button" class="btn btn-warning">Batalkan</button>
                            </div>
                        <!-- /.form group -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->



            </div>
        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop