@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
    <h1>Menu Home Semua User</h1>
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
                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                 
                  <td><a  href="{{route('useredit')}}" class="btn  btn-warning">Edit</a>
                    <button type="button" class="btn  btn-danger">Delete</button></td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>Win 95+</td>
                  
                  <td><a  href="{{route('useredit')}}" class="btn  btn-warning">Edit</a>
                    <button type="button" class="btn  btn-danger">Delete</button></td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.5
                  </td>
                  <td>Win 95+</td>
                 
                  <td><a  href="{{route('useredit')}}" class="btn  btn-warning">Edit</a>
                    <button type="button" class="btn  btn-danger">Delete</button></td>
                </tr>

             
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
    <link rel="stylesheet" href="/css/admin_custom.css">
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
