@extends('layouts.applte')

@section('content')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

<script src="{{ asset('assets/lte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
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
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            &nbsp;
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Merk Mobil</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Merk Mobil</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">

                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Merk</th>
                        <th>Images</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php $no=1; ?>
                          @foreach($merks as $merk)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $merk->name }}</td>
                        <td><img src="{{ url('/') }}/{{ $merk->img }}" style="height: 40px" ></td>
                        <td>
                          <a href="{{ route('merk.type', ['merk_id' => Crypt::encryptString($merk->id)]) }}"  data-toggle="tooltip" data-placement="top" title="Data Model">
                              <i class="fa fa-list-ul text-yellow" style="font-size: 20px"></i>
                          </a>&nbsp;
                            <a href="{{ route('merk.edit', ['id' => Crypt::encryptString($merk->id)]) }}"  data-toggle="tooltip" data-placement="top" title="Edit Data">
                                <i class="fa fa-edit text-blue" style="font-size: 20px"></i>
                            </a>&nbsp;
                            <a href="{{ route('merk.delete', ['id' => Crypt::encryptString($merk->id)]) }}"  data-toggle="tooltip" data-placement="top" title="Hapus Data" onclick="return confirm('Apakah anda yakin akan menghapus {{ $merk->name }}?')">
                                <i class="fa fa-trash text-red" style="font-size: 20px"></i>
                            </a>
                        </td>
                      </tr>
                          @endforeach
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Merk</th>
                        <th>Images</th>
                        <th>Action</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
            <!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div>
            <!-- /.box-footer-->
          </div>
          <!-- /.box -->

        </section>
        <!-- /.content -->
      </div>
@endsection
