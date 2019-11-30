@extends('adminlte::page')

@section('title', 'Jenis Barang')

@section('content_header')
    <h1>List Jenis Barang</h1>
@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{route('jenis.add')}}" class="btn btn-success "><i class="fa fa-fw fa-plus"></i>Tambah</a>
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
                  <th>Jenis</th>
                  <th width="100">Action</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach ($jenis as $row)
                    <tr>
                      <td>{{ $row->id_jenis }}</td>
                      <td>{{ $row->nama }}</td>
                      <td>
                        <a href="{{ route('jenis.edit',['id'=>$row->id_jenis]) }}" class="btn  btn-warning">Edit</a>
                        <a href="{{ route('jenis.delete',['id'=>$row->id_jenis]) }}" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  @endforeach
             
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Jenis</th>
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
