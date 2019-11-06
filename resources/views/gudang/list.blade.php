@extends('adminlte::page')

@section('title', 'Gudang')

@section('content_header')
    <h1>List Gudang</h1>
@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{route('gudang.add')}}" class="btn btn-success "><i class="fa fa-fw fa-plus"></i>Tambah</a>
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
                  <th>Gudang</th>
                  <th width="150">Action</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach ($gudang as $row)
                    <tr>
                      <td>{{ $row->id_gudang }}</td>
                      <td>{{ $row->nama }}</td>
                      <td>
                        <a href="{{ route('gudang.edit',['id'=>$row->id_gudang]) }}" class="btn  btn-warning">Edit</a>
                        <a href="{{ route('gudang.delete',['id'=>$row->id_gudang]) }}" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  @endforeach
             
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Gudang</th>
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
