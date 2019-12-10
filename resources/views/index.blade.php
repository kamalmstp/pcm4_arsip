@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Menu Home</h1>
@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>List Aset</th>
                  <th>Jumlah Stok</th>
                  <th>Kegiatan</th>
                  <th width="130">Action</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach($barang as $row)
                <tr>
                  <td>{{ $row->nama }}</td>
                  <td>{{ $row->qty }}/{{ $row->satuan }}</td>
                  <td>{{ $row->kegiatan->nama }}</td>
                  <td>
                    <a href="{{ route('aset.edit', ['id'=>$row->id_barang]) }}" class="btn btn-warning">Edit</a>
                    <button type="button" class="btn btn-danger">Delete</button>
                  </td>
                </tr>
                @endforeach
             
                </tbody>
                <tfoot>
                <tr>
                  <th>List Aset</th>
                  <th>Jumlah Stok</th>
                  <th>Kegiatan</th>
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
