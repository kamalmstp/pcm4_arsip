@extends('adminlte::page')

@section('title', 'Add')

@section('content_header')
    <h1>Tambah Jenis Barang</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-xs-12">

                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Tambah Jenis Barang</h3>
                    </div>
                    <div class="box-body">
                        <form action="#" id="form-jenis">
                            <div class="form-group">
                                <label>Nama Jenis Barang</label>
        
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <!-- /.form group -->
        
                             
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Tambah</button>
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
            $("#form-jenis").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: "{{ route('jenis.save') }}",
                    data: $('#form-jenis').serialize(),
                    type: "POST",
                    dataType: "JSON",
                    success: function(data){
                        if(data.status){
                            window.location.href = "{{ route('jenis.list') }}";
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