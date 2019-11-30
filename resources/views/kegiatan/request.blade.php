@extends('adminlte::page')

@section('title', 'Request Barang')

@section('content_header')
    <h1>Request Barang</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-xs-12">

                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Request Barang</h3>
                    </div>
                    <div class="box-body">
                        
                        <form action="#" id="form-request">
                            <div class="form-group">
                                <label>Nama Request</label>

                                <input type="text" class="form-control" name="nama_req">
                            </div>
                            <div class="form-group">
                                <label>Barang</label>
                                <select name="id_barang" class="form-control" id="select-barang">
                                    <option value="">Barang</option>
                                    @foreach($barang as $row)
                                    <option value="{{ $row->id_barang }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Jumlah</label>

                                <input type="text" class="form-control" name="qty">
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Kegiatan</label>
                                <select name="id_kegiatan" class="form-control" id="select-kegiatan">
                                    <option value="">Kegiatan</option>
                                    @foreach($kegiatan as $row)
                                    <option value="{{ $row->id_kegiatan }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Nama Pengambil</label>
                                <select name="id_user" class="form-control" id="select-user">
                                    <option value="">Pengambil</option>
                                    @foreach($user as $row)
                                    <option value="{{ $row->id_user }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                    <a href="{{ route('request') }}" class="btn btn-warning">Batalkan</a>
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
            $("#form-request").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: "{{ route('requestbarang.save') }}",
                    data: $('#form-request').serialize(),
                    type: "POST",
                    dataType: "JSON",
                    success: function(data){
                        if(data.status){
                            window.location.href = "{{ route('request') }}";
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

            $("#select-barang").select2();
            $("#select-kegiatan").select2();
            $("#select-user").select2();
        });
    </script>
@stop