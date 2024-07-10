@extends('layout.master')
<title>{{ $data['app_name'] }} | {{ $data['title_child'] }}</title>
@section('content')
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
  $(function () {
     $("#navAdminPanel").click(); 
	 document.getElementById("navAdminPanel").classList.add("active");
	 document.getElementById("navUserLevel").classList.add("active");

    var table = new DataTable('#DataTable', {
		dom: 'Bfrtip',
		buttons: [ 
			{
				text:'Refresh',
				action:function(e, dt, node, config){
					table.ajax.reload();
					toastr.success('Successfully refresh data');
				}
			},'excel', "pdf", "print"
		],
		ajax: "{{ route('userlevel.json') }}",
		columns: [
			{ data: 'id'},
			{ data: 'nama' },
			{ data: 'action'}
		]
	});
  });
</script>
<style>
.dataTables_wrapper   .dataTables_filter{
    float: right 
}	
.dataTables_wrapper   .dataTables_paginate{
    float: right 
}	
.dataTable tbody tr:hover{
    background: #3f6791 !important;
    font-size:18px;
}	
</style>
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $data['title_child'] }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('userlevel.index') }}">{{ $data['title_parent'] }}</a></li>
              <li class="breadcrumb-item active">{{ $data['title_child'] }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">      
        <div class="row">
            <div class="col-12">

            @if (session('info'))
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Alert!</h5>
                {{ session('info') }}
            </div>
            @endif

            @if (session('alert'))
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                {{ session('alert') }}
            </div>
            @endif  

            @if (session('danger'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                {{ session('danger') }}
            </div>
            @endif 
        
            @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                {{ session('success') }}
            </div>
            @endif 
            
                <div class="card">
                    <div class="card-body">
                        <table id="DataTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th style="text-align:center">ID</th>
                            <th>Nama</th>
                            <th style="text-align:center">Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                            <th style="text-align:center">ID</th>
                            <th>Nama</th>
                            <th style="text-align:center">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
@endsection