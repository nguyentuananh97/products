@extends('layouts.master_admin')

@section('content')
	<div class="content-header">
	    <h1>
      		List Color
		</h1>
		<button class="btn btn-primary" data-title="create" data-toggle="modal" data-target="#create"  style="margin-top:15px;"><i class=" fa fa-plus" style="margin-right:10px"></i>Thêm mới</button>
		<ol class="breadcrumb">
		    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		    <li class="active">Color</li>
		    <li class="active">List Color</li>
		</ol>      
    </div>

    <div class="content">
    	<div id="page-wrapper">
			<div class="row">
		    	<div class="col-lg-12">
		 			<div class="panel panel-default">
		                <div class="panel-body">
		                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTableColor" style="border-bottom: 1px solid #F2F2F2">
					            <thead>
					                <tr>
					                    <th style="text-align: center;border-bottom:none">ID</th>
					                    <th style="text-align: center;border-bottom:none">Review</th>
					                    <th style="text-align: center;border-bottom:none">Name</th>
					                </tr>
					            </thead>
					            
		                    </table>
		                </div>
		            </div>
				</div>
			</div>
		</div>
    </div>
    <div class="modal fade" id="create">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">New Color</h4>
				</div>
				<div class="modal-body">
					<form id="form_create" role="form">
						@csrf
						<div class="form-group" >
							<div class="input-group colorpicker colorpicker-component">
								<label for="">Name</label>
								<input type="text" value="#00AABB" class="form-control" name="name" />
								<span class="input-group-addon"><i ></i></span> 
							</div>
						</div>		
					
						<button type="submit" class="btn btn-primary" class="create">Create</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	<style type="text/css">
		span.input-group-addon{
			height: 30px !important;
		}
	</style>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/css/bootstrap-colorpicker.min.css" rel="stylesheet">

  	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/js/bootstrap-colorpicker.min.js"></script> 

	<script >
		$('.colorpicker').colorpicker();
		var url_colors = "{{route('colors.list')}}";
		$(document).ready(function () {

		    var colorTable = $('#dataTableColor').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: url_colors,
		        columns: [{ data: 'id', name: 'id' },{ data: 'review', name:'review'}, { data: 'name', name: 'name' }]

			});
		    $('#form_create').submit(function(e) {
				e.preventDefault();
				var data = new FormData();
				data.append('name',$('#form_create').find('input[name="name"]').val());
		        $.ajax({
		            type: 'POST',
		            url: 'colors' ,
		            contentType: false,
			        processData: false,
			        data : data
			        ,
		            success:function(response){
		            	if(response == "yes"){
			            	console.log('a')
			            	swal({
						  title: "Thêm thành công!",
						  icon: "success",
						  button: "ok",
						});
			            	$('#create').modal('toggle');
			            	colorTable.ajax.reload();
			            }
			            if(response == "no"){
			            	swal({
						  title: "Đã tồn tại màu!",
						  icon: "warning",
						  button: "ok",
						});
			            	$('#create').modal('toggle');
			            	colorTable.ajax.reload();
			            }
		                
		            }
		        
			    })
			});

		});

		
	</script>
@endsection