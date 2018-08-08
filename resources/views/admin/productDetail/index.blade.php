@extends('layouts.master_admin')

@section('content')
  	<div class="content-header">
	    <h1>
      		List Product
		</h1>
		<button class="btn btn-primary" data-title="create" data-toggle="modal" data-target="#create"  style="margin-top:15px;"><i class=" fa fa-plus" style="margin-right:10px"></i>Thêm mới</button>
		<ol class="breadcrumb">
		    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		    <li class="active">Product</li>
		    <li class="active">List Product</li>
		</ol>      
    </div>

    <div class="content">
    	<div id="page-wrapper">
			<div class="row">
		    	<div class="col-lg-12">
		 			<div class="panel panel-default">
		                <div class="panel-body">
		                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTableProduct" style="border-bottom: 1px solid #F2F2F2">
					            <thead>
					                <tr>
					                    <th style="text-align: center;border-bottom:none">ID</th>
					                    <th style="text-align: center;border-bottom:none">Product ID</th>
					                    <th style="text-align: center;border-bottom:none">Size ID</th>
					                    <th style="text-align: center;border-bottom:none">Color ID</th>
					                    <th style="text-align: center;border-bottom:none">Quantity</th>
					                    <th style="text-align: center;border-bottom:none">Action</th>
					                </tr>
					            </thead>
					            
		                    </table>
		                </div>
		            </div>
				</div>
			</div>
		</div>
    </div>
    <div class="modal fade" id="show">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Xem chi tiết</h4>
				</div>
				<div class="modal-body">
					<div class="panel panel-info">
        				<div class="panel-body">
          					<div class="row">
           				 		<div class=" col-md-9 col-lg-9 "> 
              						<table class="table table-user-information">
                						<tbody>
                							<tr>
					                        	<td><b>Mã số ID :</b> </td>
					                        	<td id="id"></td>
					                        </tr>
                  							<tr>
						                        <td><b>Size ID : </b></td>
						                        <td id="size_id"></td>
					                      	</tr>	
					                      	<tr>
					                        	<td><b>Color ID : </b></td>
					                        	<td id="color_id"></td>
					                      	</tr>		                   
				                            <tr>
					                        	<td><b>Gallary ID: </b></td>
					                        	<td id="gallary_id"></td>
				                      		</tr>
				                      		<tr>
					                        	<td><b>Quantity: </b></td>
					                        	<td id="quantity"></td>
				                      		</tr>
					                    </tbody>
					                </table>                  
            					</div>
          					</div>
        				</div>           
      				</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="create">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">New Product</h4>
				</div>
				<div class="modal-body">
					<form id="form_create" role="form">
						@csrf
						<div class="form-group">
							<label for="">Product ID</label>
							<select class="form-control" id="createCode">
						  		@foreach($products as $product)
									<option checked value="{{$product->code}}">{{$product->code}}</option>
								@endforeach	
							</select>
						</div>
						<div class="form-group">
							<label for="">Size ID</label>
							<select class="form-control"   id="createSize">
						  		@foreach($sizes as $size)
									<option checked value="{{$size->id}}">{{$size->name}}</option>
								@endforeach	
							</select>
						</div>

						<div class="form-group">
							<label for="">Color ID</label>
							<select class="form-control"   id="createColor">
						  		@foreach($colors as $color)
									<option checked value="{{$color->id}}">{{$color->name}}</option>
								@endforeach	
							</select>
						</div>


						<div class="form-group">
							<label for="">Quantity</label>
							<input type="number" class="form-control" id="createQuantity" name="quantity_create" value="">
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
	<div class="modal fade" id="edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Edit Product</h4>
				</div>
				<div class="modal-body">
					<form id="form_edit" role="form">
						@csrf
						<input type="hidden" name="id" value="">
						<div class="form-group">
							<label for="">Product ID</label>
							<select class="form-control"  name="product_code" id="editCode">
						  		@foreach($products as $product)
									<option checked value="{{$product->id}}">{{$product->id}}</option>
								@endforeach	
							</select>
						</div>
						<div class="form-group">
							<label for="">Size ID</label>
							<select class="form-control"  name="size_id" id="editSize">
						  		@foreach($sizes as $size)
									<option checked value="{{$size->id}}">{{$size->name}}</option>
								@endforeach	
							</select>
						</div>

						<div class="form-group">
							<label for="">Color ID</label>
							<select class="form-control"  name="color_id" id="editColor">
						  		@foreach($colors as $color)
									<option checked value="{{$color->id}}">{{$color->name}}</option>
								@endforeach	
							</select>
						</div>

						<div class="form-group">
							<label for="">Quantity</label>
							<input type="number" class="form-control" id="editQuantity" name="quantity_edit" value="">
						</div>
					
						
					
						<button type="submit" class="btn btn-primary" class="update">Update</button>
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

	<script >
		$(document).ready(function () {

		    var productTable = $('#dataTableProduct').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: url_productDetails,
		        columns: [{ data: 'id', name: 'id' }, { data: 'product_id', name: 'product_id' },{ data: 'size_id', name: 'size_id' },{ data: 'color_id', name: 'color_id' }, { data: 'quantity', name: 'quantity' },{ data: 'action', name: 'action' }]
		    });
		    $(document).on('click','.btn-danger',function(){
		        
			    swal({
				  	title: "Bạn muốn xóa?",
				  	text: "Sau khi xóa bạn không thể khôi phục lại tệp",
				  	icon: "warning",
				  	buttons: true,
				  	dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	var productDetail_id= $(this).attr('productDetailId');
			        $.ajax({
			            type: 'delete',
			            url: 'productDetails/' + productDetail_id,
			            success:function(response){
			                productTable.ajax.reload();
			            }
			        
				    })
					    swal("Bạn đã xóa thành công", {
					      	icon: "success",
					    	});
					  } else {
					    swal("Tệp của bạn an toàn");
					  }
					});
			});
			$(document).on('click','.btn-info',function(){
				var productDetail_id= $(this).attr('productDetailId');				
				$.ajax({

					type: 'GET',
					url: 'productDetails/'+ productDetail_id,
					success: function(response){
						console.log(response);
						$('#id').text(response.id);
						$('#code').text(response.product_code);
						$('#size_id').text(response.size_id);
						$('#color_id').text(response.color_id);
						$('#gallary_id').text(response.gallary_id);	
						$('#quantity').text(response.quantity);	
					}
				})
			});
			$(document).on('click','.btn-warning',function(){
				var productDetail_id= $(this).attr('productDetailId');
					$('#form_edit').find('input[name="id"]').val(productDetail_id);
					$.ajax({
						type: 'GET',
						url: 'productDetails/'+productDetail_id,
						success: function(response){
							console.log(response);
							$('#editCode').val(response.product_code);
							$('#editSize').val(response.size_id);
							$('#editColor').val(response.color_id);
							$('#editGallary').val(response.gallary_id);	
							$('#editQuantity').val(response.quantity);	
						}
					})
				
			});
			$('#form_create').submit(function(e) {
				e.preventDefault();
				var data = new FormData();
				data.append('product_code',$('#form_create').find('#createCode').val());
        		data.append('size_id',$('#form_create').find('#createSize').val());
        		data.append('color_id',$('#form_create').find('#createColor').val());
        		data.append('gallary_id',$('#form_create').find('#createGallary').val());
        		data.append('quantity',$('#form_create').find('input[name="quantity_create"]').val());
		        $.ajax({
		            type: 'POST',
		            url: 'productDetails' ,
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
			            	productTable.ajax.reload();
			            }
		                
		            }
		        
			    })
			});
			$('#form_edit').submit(function(event) {
			    event.preventDefault();
			    var data = new FormData();
        		data.append('product_code',$('#form_edit').find('#editCode').val());
        		data.append('size_id',$('#form_edit').find('#editSize').val());
        		data.append('color_id',$('#form_edit').find('#editColor').val());
        		data.append('gallary_id',$('#form_edit').find('#editGallary').val());
        		data.append('quantity',$('#form_edit').find('#editQuantity').val());
			    var id = $('input[name="id"]').val();
			    // alert(id);
			    $.ajax({
			        url: 'productDetails/update/'+id,
			        type: 'POST',
			        contentType: false,
			        processData: false,
			        data : data
			        ,
			        success: function(result)
			        {
			            if(result == "yes"){
			            	console.log('a')
			            	swal({
						  title: "Sửa thành công!",
						  icon: "success",
						  button: "ok",
						});
			            	$('#edit').modal('toggle');
			            	productTable.ajax.reload();
			            }
			        },
			        error: function(data)
			        {
			            console.log(data);
			        }
			    });

			});
		  
		});
	</script>
@endsection