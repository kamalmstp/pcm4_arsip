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

                        <form action="#" id="form-perawatan">
                            <input type="hidden" name="id_perawatan" value="{{ $perawatan->id_perawatan }}">
                            <div class="form-group">
                                <label>Nama Barang</label>

                                <select name="barang" class="form-control">
                                    <option value="">Pilih Barang</option>
                                    @foreach($barang as $row)
                                    <option value="{{ $row->id_barang }}" @if($perawatan->id_barang == $row->id_barang) selected @endif >{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Jadwal</label><!--/.Datepicker-->
                                <input type="text" class="form-control" name="jadwal" value="{{ $perawatan->jadwal }}">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea type="text" class="form-control" name="keterangan">{{ $perawatan->keterangan }}</textarea>
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Simpan</button>
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function(){
            $("#form-perawatan").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: "{{ route('perawatan.edit.save') }}",
                    data: $('#form-perawatan').serialize(),
                    type: "POST",
                    dataType: "JSON",
                    success: function(data){
                        if(data.status){
                            window.location.href = "{{ route('perawatan') }}";
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

            
            $("[name='jadwal']").datetimepicker({
                format: 'YYYY-MM-DD',
            });
        });
    </script>
@stop