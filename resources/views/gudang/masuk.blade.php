@extends('adminlte::page')

@section('title', 'Barang Masuk')

@section('content_header')
    <h1>List Barang Masuk</h1>
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
                  <th>Jumlah</th>
                  <th>Kegiatan</th>
                  <th>Tanggal</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($barang as $row)
                <tr>
                  <td>{{ $row->nama }}</td>
                  <td>{{ $row->qty }}/{{ $row->satuan }}</td>
                  <td>{{ $row->kegiatan->nama }}</td>
                  <td> {{ date('d M Y', strtotime($row->tanggal)) }}</td>
                  <td>
                    <a  href="#" class="btn  btn-success">Setujui</a>
                  </td>
                </tr>
                @endforeach
             
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Nama Pengambil</th>
                  <th>Tanggal</th>
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