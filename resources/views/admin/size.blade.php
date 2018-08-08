@extends('layouts.master_admin')

@section('content')
	<div class="content-header">
	    <h1>
      		List Size
		</h1>
		<button class="btn btn-primary" data-title="create" data-toggle="modal" data-target="#create"  style="margin-top:15px;"><i class=" fa fa-plus" style="margin-right:10px"></i>Thêm mới</button>
		<ol class="breadcrumb">
		    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		    <li class="active">Size</li>
		    <li class="active">List Size</li>
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
@endsection
@section('footer')

	<script >
		var url_sizes = "{{route('sizes.list')}}";
		$(document).ready(function () {

		    $('#dataTableColor').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: url_sizes,
		        columns: [{ data: 'id', name: 'id' }, { data: 'name', name: 'name' }]

			});
		});
	</script>
@endsection