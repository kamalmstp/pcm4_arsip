@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1>Edit Kegiatan</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-xs-12">

                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Edit Kegiatan</h3>
                    </div>
                    <div class="box-body">
                        <form action="#" id="form-kegiatan">
                            <input type="hidden" name="id_kegiatan" value="{{ $kegiatan->id_kegiatan }}">
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="text" class="form-control" name="nama" value="{{ $kegiatan->nama }}">
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Bidang</label>
                                <select name="bidang" class="form-control">
                                    <option value="">Pilih Bidang</option>
                                    @foreach($bidang as $row)
                                    <option value="{{ $row->id_bidang }}" @if($kegiatan->id_bidang == $row->id_bidang) selected @endif>{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form group -->
        
                             
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
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
            $("#form-kegiatan").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: "{{ route('kegiatan.edit.save') }}",
                    data: $('#form-kegiatan').serialize(),
                    type: "POST",
                    dataType: "JSON",
                    success: function(data){
                        if(data.status){
                            window.location.href = "{{ route('kegiatan.list') }}";
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