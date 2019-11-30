@extends('adminlte::page')

@section('title', 'Kegiatan')

@section('content_header')
    <h1>List Kegiatan</h1>
@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{route('kegiatan.add')}}" class="btn btn-success "><i class="fa fa-fw fa-plus"></i>Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @if (Session::has("success"))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  {{ Session::get("success") }}
                </div>
              @endif
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="30">ID</th>
                  <th>Kegiatan</th>
                  <th>Bidang</th>
                  <th width="100">Action</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach ($kegiatans as $row)
                    <tr>
                      <td>{{ $row->id_kegiatan }}</td>
                      <td>{{ $row->nama }}</td>
                      <td>{{ $row->bidang->nama }}</td>
                      <td>
                        <a href="{{route('kegiatan.edit',['id'=>$row->id_kegiatan])}}" class="btn  btn-warning">Edit</a>
                        <a href="{{route('kegiatan.delete',['id'=>$row->id_kegiatan])}}" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  @endforeach
             
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Kegiatan</th>
                  <th>Bidang</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@stop
