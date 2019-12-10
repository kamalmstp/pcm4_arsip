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
                  @if($roles == 'gudang')
                  <th>Action</th>
                  @endif
                </tr>
                </thead>
                <tbody>

                @foreach($barang as $row)
                <tr>
                  <td>{{ $row->nama }}</td>
                  <td>{{ $row->qty }}/{{ $row->satuan }}</td>
                  <td>{{ $row->kegiatan->nama }}</td>
                  <td> {{ date('d M Y', strtotime($row->tanggal)) }}</td>
                  @if($roles == 'gudang')
                  <td>
                    <a href="{{ url('gudang/setujui') }}/{{ $row->id_barang }}" class="btn @if($row->status_gudang == 0) btn-warning @else btn-success @endif" id="btn-setujui-gudang">@if($row->status_gudang == 0) Setujui @else Disetujui @endif</a>
                  </td>
                  @endif
                </tr>
                @endforeach
             
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Nama Pengambil</th>
                  <th>Tanggal</th>
                  @if($roles == 'gudang')
                  <th>Action</th>
                  @endif
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