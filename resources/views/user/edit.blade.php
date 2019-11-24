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

                        <form action="#" id="form-user">
                            <input type="hidden" name="id_user" value="{{ $user->id_user }}">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $user->nama }}">
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" value="{{ $user->jabatan }}">
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" class="form-control" name="nip" value="{{ $user->nip }}">
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Status</option>
                                    <option value="1" @if($user->status == 1) selected @endif>Aktif</option>
                                    <option value="0" @if($user->status == 0) selected @endif>Non-Aktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="Submit" class="btn btn-success">Edit</button>
                                <a href="{{ route('user') }}" class="btn btn-warning">Batalkan</a>
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
            $("#form-user").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: "{{ route('useredit.save') }}",
                    data: $('#form-user').serialize(),
                    type: "POST",
                    dataType: "JSON",
                    success: function(data){
                        if(data.status){
                            window.location.href = "{{ route('user') }}";
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