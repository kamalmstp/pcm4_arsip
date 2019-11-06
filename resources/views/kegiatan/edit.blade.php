@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1>Edit Bidang</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-xs-12">

                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Edit Bidang</h3>
                    </div>
                    <div class="box-body">
                        <form action="#" id="form-bidang">
                            <input type="hidden" name="id_bidang" value="{{ $bidang->id_bidang }}">
                            <div class="form-group">
                                <label>Nama Bidang</label>
                                <input type="text" class="form-control" name="nama" value="{{ $bidang->nama }}">
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
            $("#form-bidang").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: "{{ route('bidang.edit.save') }}",
                    data: $('#form-bidang').serialize(),
                    type: "POST",
                    dataType: "JSON",
                    success: function(data){
                        if(data.status){
                            window.location.href = "{{ route('bidang.list') }}";
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