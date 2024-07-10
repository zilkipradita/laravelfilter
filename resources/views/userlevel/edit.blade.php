@extends('layout.master')
<title>{{ $data['app_name'] }} | {{ $data['title_child'] }}</title>
@section('content')
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
  $(function () {
     $("#navAdminPanel").click(); 
	 document.getElementById("navAdminPanel").classList.add("active");
	 document.getElementById("navUserLevel").classList.add("active");

     $("#btnBack").click(function(){
		window.location = "{{ route('userlevel.index') }}";
	});

    $("#btnSubmit").click(function(){
		update();
	});

    var nama = document.getElementById("nama");
	  nama.addEventListener("keypress", function(event) {
	  if (event.key === "Enter") {
      event.preventDefault();
      update();
	  }
	});
  });

  function update(){
	   $.ajax({
			url: "{{ route('userlevel.update') }}",
			method: 'post',
			data: {
                _token: $('#_token').val(),
				id: $('#id').val(),
				nama: $('#nama').val()
			},
			success: function(response) {
                var data = JSON.parse(response);
                $("#lblNama").html("");
                $("#lblNama").css('display','none');
                
                if(data.code=="412"){
                    if(data.errors['nama']){
                        var errorsNama = '';
                        for(var x=0;x<=data.errors['nama'].length-1;x++){
                            errorsNama += '<span>' + data.errors['nama'][x] + '</span></br>';
                        }

                        $("#lblNama").html(errorsNama);
                        $("#lblNama").css('display','block');
                    }     
                }else if(data.code=="404"){
                    $("#divWarning").css('display','none');
                    $("#divInfo").css('display','none');
                    $("#divSuccess").css('display','none');
                    $("#divDanger").css('display','block');
					$("#divDanger").html(data.msg);
                }else if(data.code=="200"){
                    $("#divWarning").css('display','none');
                    $("#divDanger").css('display','none');
                    $("#divInfo").css('display','none');
                    $("#divSuccess").css('display','block');
					$("#divSuccess").html(data.msg);
					
					setInterval(function() { window.location.href = "{{ route('userlevel.index') }}" }, 2000);
                }else{
                    setInterval(function() { window.location.href = "{{ route('userlevel.index') }}" }, 2000);
                }
			}
		});
  }
</script>
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
            <div class="col-6">
                <div class="alert alert-warning alert-dismissible" id="divWarning" style="display:none"></div>
                <div class="alert alert-danger alert-dismissible" id="divDanger" style="display:none"></div>
                <div class="alert alert-info alert-dismissible" id="divInfo" style="display:none"></div>
                <div class="alert alert-success alert-dismissible" id="divSuccess" style="display:none"></div>
                <div class="card card-primary">
                    <form id="frmLevel" method="post">
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['user_level']->nama; ?>" placeholder="Masukan Nama">
                                <div id="lblNama" style="color:red;font-style: italic;display:none">&nbsp;</div>
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $data['user_level']->id; ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" id="btnBack" class="btn btn-primary">Back</button>
                            <button type="button" id="btnSubmit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
@endsection