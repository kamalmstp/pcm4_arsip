@extends('adminlte::page')

@section('title', 'Perawatan')

@section('content_header')
    <h1>List Perawatan</h1>
@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
              <a href="{{route('tambahperawatan')}}" class="btn  btn-success "><i class="fa fa-fw fa-plus"></i>Tambah</a>
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
                  <th>Nama Aset</th>
                  <th>Jadwal</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($perawatan as $row)
                <tr>
                  <td>{{ $row->barang->nama }}</td>
                  <td>{{ $row->jadwal }}</td>
                  <td>{{ $row->keterangan }}</td>
                  <td>{{ $row->status }}</td>
                  <td>
                    <a href="{{route('perawatan.edit',['id'=>$row->id_perawatan])}}" class="btn  btn-warning">Edit</a>
                    <a href="{{route('perawatan.delete',['id'=>$row->id_perawatan])}}" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach
             
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  
                  <th>CSS grade</th>
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