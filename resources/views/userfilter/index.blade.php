@extends('layout.master')
<title>{{ $data['app_name'] }} | {{ $data['title_child'] }}</title>
@section('content')
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
  $(function () {
    window.alert = function() {};
     $("#navAdminPanel").click(); 
	 document.getElementById("navAdminPanel").classList.add("active");
	 document.getElementById("navUser").classList.add("active");
     
    load_data();

    $('#gender').change(function(){
        search_data();
    });

    $('#province').change(function(){
        search_data();
    });

    $('#search').on('keyup', function () {
        search_data();
    });
  });

  function load_data(){
    $.ajax({
			url: "{{ route('userfilter.json') }}",
			method: "get",
			success: function(response) {
				var result = JSON.parse(response);

                console.log(response);
                console.log(result.data[0].name);
                console.log(result.data.length);

                if(result.data.length > 0){
                    var trRows = '';
                    $("#trContent").html('');
                    for(var x=0;x<=result.data.length-1;x++){
                        trRows += '<tr>';
                            trRows += '<td style="text-align:center">' + result.data[x].id + '</td>';
                            trRows += '<td>' + result.data[x].name + '</td>';
                            trRows += '<td>' + result.data[x].telp + '</td>';
                            trRows += '<td>' + result.data[x].gender + '</td>';
                            trRows += '<td>' + result.data[x].province + '</td>';
                            trRows += '<td>' + result.data[x].city + '</td>';
                            trRows += '<td>' + result.data[x].address + '</td>';
                        trRows += '</tr>';
                    }

                    $("#trContent").html(trRows);
                    $('#DataTable').DataTable({searching: false, paging: true, info: true});
    
                }
			}
		});
  }

  function search_data(){
    $('#DataTable').DataTable().destroy();

    $.ajax({
			url: "{{ route('userfilter.search') }}",
			method: 'post',
			data: {
                _token: $('#_token').val(),
                gender: $('#gender').val(),
				province: $('#province').val(),
                search: $('#search').val(),
			},
			success: function(response) {
                var result = JSON.parse(response);
                console.log(result);

                var trRows = '';
                $("#trContent").html('');
                for(var x=0;x<=result.data.length-1;x++){
                        trRows += '<tr>';
                            trRows += '<td style="text-align:center">' + result.data[x].id + '</td>';
                            trRows += '<td>' + result.data[x].name + '</td>';
                            trRows += '<td>' + result.data[x].telp + '</td>';
                            trRows += '<td>' + result.data[x].gender + '</td>';
                            trRows += '<td>' + result.data[x].province + '</td>';
                            trRows += '<td>' + result.data[x].city + '</td>';
                            trRows += '<td>' + result.data[x].address + '</td>';
                        trRows += '</tr>';
                }

                $("#trContent").html(trRows);
                $('#DataTable').DataTable({searching: false, paging: true, info: true});
			}
		});
  }
</script>
<style>
.dataTables_wrapper   .dataTables_filter{
    float: right 
}	
.dataTables_wrapper   .dataTables_paginate{
    float: right 
}	
#DataTable tbody tr:hover{
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
                <div class="card" style="padding:10px">
                    <form id="frmFilter" method="post">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <div class="row" style="padding:10px">
                        <div class="col-12 col-sm-6 col-md-3">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="">Select</option>    
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>        
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <label for="province">Province</label>
                            <select class="form-control" id="province" name="province">
                                <option value="">Select</option>    
                                <?php 
							    foreach($data['province_select'] as $post){
								?>
                                    <option value="<?= $post->province ?>"><?= $post->province ?></option>
                                <?php
							    }
							    ?>
                            </select>    
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <label for="search">Search</label>
                            <input type="text" class="form-control" id="search" name="search" value="" placeholder="Search by Name">
                        </div>
                    </div>
                    </form>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table id="DataTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th style="text-align:center">ID</th>
                            <th>Name</th>
                            <th>Telp</th>
                            <th>Gender</th>
                            <th>Province</th>
                            <th>City</th>
                            <th>Address</th>
                            </tr>
                            </thead>
                            <tbody id="trContent">
				            </tbody>
                            <tfoot>
                            <tr>
                            <th style="text-align:center">ID</th>
                            <th>Name</th>
                            <th>Telp</th>
                            <th>Gender</th>
                            <th>Province</th>
                            <th>City</th>
                            <th>Address</th>
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