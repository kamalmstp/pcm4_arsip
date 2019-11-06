@extends('adminlte::page')

@section('title', 'Add')

@section('content_header')
    <h1>Tambah Aset</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-xs-12">

                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Tambah Barang/Aset</h3>
                    </div>
                    <div class="box-body">

                    <form action="#" enctype="multipart/form-data" id="form-tambah-asset">
                        <div class="form-group">
                            <label>Nama Barang</label>

                            <input type="text" class="form-control" name="nama">
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Jumlah</label>

                            <input type="text" class="form-control" name="jabatan">
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Toko</label>

                            <input type="text" class="form-control" name="nip">
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Harga</label>

                            <input type="text" class="form-control" name="status">
                        </div>
                        <div class="form-group">
                            <label>Pecahan/Satuan</label>

                            <input type="text" class="form-control" name="nama">
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Spek</label>

                            <input type="text" class="form-control" name="jabatan">
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Kegiatan</label>

                            <input type="text" class="form-control" name="nip">
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Gudang</label>
                        <!-- /.LIST GUDANG ADA BANYAK, KALO DICENTANG MUNCUL TEXTBOX, KALAU TIDAK BARANG 
                        TERMASUK ASET-->
                            <input type="text" class="form-control" name="status">
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-success">Tambah</button>
                                <button type="button" class="btn btn-warning">Batalkan</button>
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
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
    <script>
        $("#form-tambah-asset").submit(function(e){
            e.preventDefault();
            
        });
    </script>
@stop