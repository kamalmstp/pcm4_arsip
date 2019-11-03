@extends('adminlte::page')

@section('title', 'Add')

@section('content_header')
    <h1>Tambah Aset Perawatan</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-xs-12">

                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Tambah Aset Perawatan</h3>
                    </div>
                    <div class="box-body">

                        <div class="form-group">
                            <label>Nama Barang</label>

                            <input type="text" class="form-control" name="nama">
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Jadwal</label><!--/.Datepicker-->

                            <input type="text" class="form-control" name="jabatan">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>

                            <input type="text" class="form-control" name="jabatan">
                        </div>
                        <!-- /.form group -->

                     
                        <div class="form-group">
                                <button type="button" class="btn btn-success">Tambah</button>
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