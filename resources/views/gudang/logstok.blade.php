@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
    <h1>Log Stok</h1>
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
                  <th>Nama Barang</th>
                  <th>Jumlah Stok</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($history as $row)
                <tr>
                  <td>{{ $row->barang->nama }}</td>
                  <td>{{ $row->qty }}</td>
                  <td>{{ $row->tanggal }}</td>
                  <td>Disetujui</td>
                  <td>
                    <a  href="#" class="btn  btn-success">Cetak</a>
                  </td>
                </tr>
                @endforeach
             
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Barang</th>
                  <th>Jumlah Stok</th>
                  <th>Tanggal</th>
                  <th>Status</th>
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