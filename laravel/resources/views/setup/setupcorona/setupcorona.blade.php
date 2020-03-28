@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Corona Covid-19
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Corona</li>
    </ol>
  </section>

   <section class="content" style="min-height : 150px">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$total_negara}}</h3>

                    <p>TOTAL NEGARA</p>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$total_positif}}</h3>

                    <p>TOTAL KONFIRMASI</p>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$total_meninggal}}</h3>

                    <p>TOTAL MENINGGAL</p>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3>{{$total_sembuh}}</h3>

                    <p>TOTAL SEMBUH</p>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->


    <!-- /.row (main row) -->

</section>

  <!-- Main content -->
  <section class="content">

    <div for="tabel" class="box box-default">
      <div class="box-header with-border">
        <div class="text-right">
          <!-- <a class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-plus"></i>&nbsp Tambah Lab Test Request</a> -->
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover dataTables-client" id="mytabel" style="width: 100%">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Negara</th>
                <th class="text-center">Confirmed</th>
                <th class="text-center">Death</th>
                <th class="text-center">Recovered</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
      </div>
    </div>
    <!--/data table-->


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.13
  </div>
  <strong>Copyright &copy; 2019 <a href="https://adminlte.io">Amir Thoham .Inc</a>.</strong> All rights
  reserved.
</footer>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script>
  $(document).ready(function(){


    var t = $('#mytabel').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "responsive": true,
      "autoWidth": false,
      "pageLength": 10,
      "retrieve" : true,
      "ajax": {
        "url" :  '{{ url('/setup/corona/tabel') }}',
        "type": "GET"
      },
      "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
      "columns": [
      { "defaultContent": "" },
      { "data": "attributes.Country_Region" },
      { "data": "attributes.Confirmed" },
      { "data": "attributes.Deaths" },
      { "data": "attributes.Recovered" },
      ],
      "order": [[ 1, 'asc' ]],
    });

    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    });// -x End Document get ready



  </script>



