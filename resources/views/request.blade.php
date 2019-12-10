@extends('adminlte::page')

@section('title', 'Request')

@section('content_header')
    <h1>Daftar Permintaan Barang</h1>
@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            
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
                  <th>Jumlah </th>
                  <th>Kegiatan</th>
                  <th>Nama Pengambil</th>
                  <th width="210">Aksi</th>
                </tr>
                </thead>
                <tbody>

                @foreach($request as $row)
                <tr>
                  <td>{{ $row->nama_req }}</td>
                  <td>{{ $row->qty }}</td>
                  <td>{{ $row->kegiatan->nama }}</td>
                  <td>{{ $row->user->nama }}</td>
                  <td>
                    <a href="{{ route('requestbarang.lihat',['id'=>$row->id_request]) }}" class="btn  btn-warning">Lihat</a>
                    @if($roles == 'gudang' || $roles == 'admin')
                    <a href="@if($row->status == 0){{ route('requestbarang.setujui',['id'=>$row->id_request]) }}@else#@endif" class="btn btn-success">
                      @if($row->status == 0)
                        Setujui
                      @else
                        Disetujui
                      @endif
                    </a>
                    @endif
                    @if($roles == 'gudang' || $roles == 'admin')
                    <a href="{{ route('requestbarang.delete',['id'=>$row->id_request]) }}"" class="btn  btn-danger">Delete</a>
                    @endif
                  </td>
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Aset</th>
                  <th>Jumlah </th>
                  <th>Kegiatan</th>
                  <th>Nama Pengambil</th>
                  <th>Aksi</th>
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
