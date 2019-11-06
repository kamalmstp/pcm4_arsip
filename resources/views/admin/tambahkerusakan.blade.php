@extends('adminlte::page')

@section('title', 'Add')

@section('content_header')
    <h1>Tambah Kerusakan Aset</h1>
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

                        <form action="#" id="form-kerusakan">
                            <div class="form-group">
                                <label>Nama Aset</label>
                                <select name="barang" class="form-control">
                                    <option value="">Pilih Asset</option>
                                    @foreach($barang as $row)
                                    <option value="{{ $row->id_barang }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Kegiatan</label>

                                <select name="kegiatan" class="form-control">
                                    <option value="">Pilih Kegiatan</option>
                                    @foreach($kegiatan as $row)
                                    <option value="{{ $row->id_kegiatan }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Keterangan</label>

                                <textarea name="keterangan" name="keterangan" class="form-control"></textarea>
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Tanggal</label><!-- /.datepicker -->

                                <input type="text" class="form-control" name="tanggal">
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function(){
            $("#form-kerusakan").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: "{{ route('kerusakan.save') }}",
                    data: $('#form-kerusakan').serialize(),
                    type: "POST",
                    dataType: "JSON",
                    success: function(data){
                        if(data.status){
                            window.location.href = "{{ route('kerusakan') }}";
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
        });
    </script>
@stop