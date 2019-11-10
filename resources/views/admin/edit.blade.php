@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1>Edit Aset</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-xs-12">

                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Edit Barang/Aset</h3>
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

                            <input type="text" class="form-control" name="jumlah">
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Toko</label>

                            <input type="text" class="form-control" name="toko">
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Harga</label>

                            <input type="text" class="form-control" name="harga">
                        </div>
                        <div class="form-group">
                            <label>Pecahan/Satuan</label>

                            <input type="text" class="form-control" name="satuan">
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Spek</label>

                            <input type="text" class="form-control" name="spek">
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Tanggal</label>

                            <input type="text" class="form-control" name="tanggal">
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Kegiatan</label>

                            <select name="kegiatan" class="form-control">
                                <option value="" selected>Pilih Kegiatan</option>
                                @foreach($kegiatan as $row)
                                <option value="{{ $row->id_kegiatan }}">{{ $row->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Jenis Barang</label>
                        <!-- /.LIST GUDANG ADA BANYAK, KALO DICENTANG MUNCUL TEXTBOX, KALAU TIDAK BARANG 
                        TERMASUK ASET-->
                            <select name="jenis" class="form-control">
                                <option value="" selected>Pilih Jenis Barang</option>
                                @foreach($jenis as $row)
                                <option value="{{ $row->id_jenis }}">{{ $row->nama }}</option>
                                @endforeach]
                            </select>
                        </div>
                        <div class="form-group" id="input-gudang" style="display:none;">
                            <label>Gudang</label>
                        <!-- /.LIST GUDANG ADA BANYAK, KALO DICENTANG MUNCUL TEXTBOX, KALAU TIDAK BARANG 
                        TERMASUK ASET-->
                            <select name="gudang" class="form-control">
                                <option value="">Pilih Gudang</option>
                                @foreach($gudang as $row)
                                <option value="{{ $row->id_gudang }}">{{ $row->nama }}</option>
                                @endforeach
                            </select>
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
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/jquery.number.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function(){
            $("#form-tambah-asset").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: "{{ route('tambah.save') }}",
                    data: $('#form-tambah-asset').serialize(),
                    type: "POST",
                    dataType: "JSON",
                    success: function(data){
                        if(data.status){
                            window.location.href = "{{ route('index') }}";
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

            $("[name='tanggal']").datetimepicker({
                format: 'YYYY-MM-DD',
            });

            $("[name='jenis']").change(function(){
                var jenis = $(this).val();
                 if(jenis == 2){
                    $("#input-gudang").show();
                 }else{
                    $("[name='gudang']").val("");
                    console.log( $("[name='gudang']").val());
                    $("#input-gudang").hide();
                 }
            });

            $('[name="harga"]').number(true);
        });
    </script>
@stop