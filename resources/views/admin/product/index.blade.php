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
					                    <th style="text-align: center;border-bottom:none">Name</th>
					                    <th style="text-align: center;border-bottom:none">Original Price</th>
					                    <th style="text-align: center;border-bottom:none">Price</th>
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
           				 		<div class=" col-md-12 col-lg-12 "> 
              						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTableProductDetail" style="border-bottom: 1px solid #F2F2F2">
							            <thead>
							                <tr>
							                    <th style="text-align: center;border-bottom:none">ID</th>
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
				<div class="modal-footer">
					<button type="button" data-title="createDetail" data-toggle="modal" data-target="#createDetail" class="btn btn-primary" ><i class=" fa fa-plus"></i></button>
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
							<label for="">Name</label>
							<input type="text" class="form-control" placeholder="Nhập tên sản phẩm"  name="name" value="">
						</div>

						<div class="form-group">
							<label for="">Original Price</label>
							<input type="text" class="form-control" placeholder="Nhập giá gốc"  name="original_price">
						</div>

						<div class="form-group">
							<label for="">Price</label>
							<input type="text" class="form-control" placeholder="Nhập giá"  name="price">
						</div>

						<div class="form-group">
							<label for="">Description</label>
							<input type="text" class="form-control" placeholder="Mô tả"  name="description">
						</div>

						<div class="form-group">
							<label for="">Category</label>
							<select class="form-control"  name="category_id" id="createCategory">
						  		@foreach($categories as $category)
									<option checked value="{{$category->id}}">{{$category->name}}</option>
								@endforeach	
							</select>
						</div>
						<div class="form-group">
							<label for="">Vendor</label>
							<select class="form-control"   name="vendor_id" id="createVendor">
						  		@foreach($vendors as $vendor)
									<option checked value="{{$vendor->id}}">{{$vendor->name}}</option>
								@endforeach	
							</select>
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
							<label for="">Name</label>
							<input type="text" class="form-control" id="editName" name="name" value="">
						</div>

						<div class="form-group">
							<label for="">Original Price</label>
							<input type="text" class="form-control" id="editOriginalPrice" name="original_price">
						</div>

						<div class="form-group">
							<label for="">Price</label>
							<input type="text" class="form-control" id="editPrice" name="price">
						</div>

						<div class="form-group">
							<label for="">Description</label>
							<input type="text" class="form-control" id="editDescription"  name="description">
						</div>
						<div class="form-group">
							<label for="">Category</label>
							<select class="form-control"  name="category_id" id="editCategory">
						  		@foreach($categories as $category)
									<option checked value="{{$category->id}}">{{$category->name}}</option>
								@endforeach	
							</select>
						</div>
						<div class="form-group">
							<label for="">Vendor</label>
							<select class="form-control"   name="vendor_id" id="editVendor">
						  		@foreach($vendors as $vendor)
									<option checked value="{{$vendor->id}}">{{$vendor->name}}</option>
								@endforeach	
							</select>
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
	<div class="modal fade" id="createDetail">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">New Detail</h4>
				</div>
				<div class="modal-body">
					<form id="form_createDetail" enctype="multipart/form-data" role="form" method="post">
						@csrf
						<div class="form-group">
							<label for="">Product ID</label>
							<input type="text" class="form-control" id="Product_id_create" value="" disabled>
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
						
					
						<button type="submit" class="btn btn-primary create" id="submit-form-detail">Create</button>
					</form>
					
					
				</div>
				<div class="modal-footer">					
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="editDetail">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Edit Detail</h4>
				</div>
				<div class="modal-body">
					<form id="form_editDetail" role="form">
						@csrf
						<input type="hidden" name="idDetail" value="">
						<div class="form-group">
							<label for="">Product ID</label>
							<input type="text" class="form-control" id="Product_id_edit" value="" disabled>
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
	<div class="modal fade" id="upImg">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add Image</h4>
				</div>
				<div class="modal-body">
					<form id="form_image" role="form" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="">Product ID</label>
							<input type="text" class="form-control" id="Product_id_image" value="" disabled name="product_id">
						</div>						
						<div class="form-group">
							<label for="">Image</label>
	                        <div class="file-loading">
	                            <input id="fileImg" type="file" name="files[]" multiple class="file">
	                        </div>
	                    </div>					
						<button type="submit" class="btn btn-primary">Add</button>
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
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" /> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/themes/fa/theme.js" type="text/javascript"></script> -->
    
	<script >
		
		$(document).ready(function () {
			var url = "{{asset('admin/productDetails/list1')}}";
		    var productTable = $('#dataTableProduct').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: url_products,
		        columns: [{ data: 'id', name: 'id' }, { data: 'name', name: 'name' },{ data: 'original_price', name: 'original_price' }, { data: 'price', name: 'price' },{ data: 'action', name: 'action' }]
		    });
		    $(document).on('click','.deleteProduct',function(){
		        
			    swal({
				  	title: "Bạn muốn xóa?",
				  	text: "Sau khi xóa bạn không thể khôi phục lại tệp",
				  	icon: "warning",
				  	buttons: true,
				  	dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	var product_id= $(this).attr('productId');
			        $.ajax({
			            type: 'delete',
			            url: 'products/' + product_id,
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
			$(document).on('click','.addDetail',function(){
				var product_id= $(this).attr('productId');
				$('#Product_id_create').val(product_id);
				$('#Product_id_edit').val(product_id);
				console.log(product_id);				
				$('#dataTableProductDetail').DataTable({
				destroy:true,
		        processing: true,
		        serverSide: true,
		        ajax: url+'/'+product_id,
		        columns: [{ data: 'id', name: 'id' },{ data: 'size', name: 'size_id' },{ data: 'color', name: 'color_id' },{ data: 'quantity', name: 'quantity' },{ data: 'action', name: 'action' }]
		    	});
			});
			$(document).on('click','.editProduct',function(){
				var product_id= $(this).attr('productId');
					$('#form_edit').find('input[name="id"]').val(product_id);
					$.ajax({
						type: 'GET',
						url: 'products/'+product_id,
						success: function(response){
							console.log(response);
							$('#editCode').val(response.code);
							$('#editName').val(response.name);
							$('#editOriginalPrice').val(response.original_price);
							$('#editPrice').val(response.price);
							$('#editDescription').val(response.description);
							$('#editCategory').val(response.category_id);
							$('#editVendor').val(response.vendor_id);
						}
					})
				
			});
			$(document).on('click','.addImage',function(){
				var product_id= $(this).attr('productId');
				console.log(product_id);
				$('#Product_id_image').val(product_id);
				var formImage = document.getElementById('form_image');
				var request = new XMLHttpRequest();
				$('#form_image').submit(function(e) {					
					e.preventDefault();
					var formData = new FormData(formImage);
					formData.append('product_id',$('#form_image').find('#Product_id_image').val());
				    request.open('post','gallaries');
				    request.send(formData);
				    swal({
						  title: "Thêm thành công!",
						  icon: "success",
						  button: "ok",
						});
			        $('#upImg').modal('toggle');
				});
			});
			$('#form_create').submit(function(e) {
				e.preventDefault();
				var data = new FormData();
				data.append('name',$('#form_create').find('input[name="name"]').val());
				data.append('code',$('#form_create').find('#createCode').val());
        		data.append('original_price',$('#form_create').find('input[name="original_price"]').val());
        		data.append('price',$('#form_create').find('input[name="price"]').val());
        		data.append('description',$('#form_create').find('input[name="description"]').val());
        		data.append('category_id',$('#form_create').find('#createCategory').val());
        		data.append('vendor_id',$('#form_create').find('#createVendor').val());
		        $.ajax({
		            type: 'POST',
		            url: 'products' ,
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
        		data.append('name',$('#form_edit').find('input[name="name"]').val());
        		data.append('original_price',$('#form_edit').find('input[name="original_price"]').val());
        		data.append('price',$('#form_edit').find('input[name="price"]').val());
        		data.append('description',$('#form_edit').find('input[name="description"]').val());
        		data.append('category_id',$('#form_edit').find('#editCategory').val());
        		data.append('vendor_id',$('#form_edit').find('#editVendor').val());
			    var id = $('input[name="id"]').val();
			    // alert(id);
			    $.ajax({
			        url: 'products/update/'+id,
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
			$(document).on('click','.editDetail',function(){
				var productDetail_id= $(this).attr('productDetailId');
					$('#form_editDetail').find('input[name="idDetail"]').val(productDetail_id);
					$.ajax({
						type: 'GET',
						url: 'productDetails/'+productDetail_id,
						success: function(response){
							console.log(response);
							$('#editSize').val(response.size_id);
							$('#editColor').val(response.color_id);
							$('#editGallary').val(response.gallary_id);	
							$('#editQuantity').val(response.quantity);	
						}
					})
				
			});
		  	$(document).on('click','.deleteDetail',function(){
		        
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
			                $('#dataTableProductDetail').DataTable().ajax.reload();
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
			$('#form_createDetail').submit(function(e) {
				e.preventDefault();
				
				var data = new FormData();
				data.append('product_id',$('#form_createDetail').find('#Product_id_create').val());
        		data.append('size_id',$('#form_createDetail').find('#createSize').val());
        		data.append('color_id',$('#form_createDetail').find('#createColor').val());
        		data.append('quantity',$('#form_createDetail').find('input[name="quantity_create"]').val());
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
			            	$('#createDetail').modal('toggle');
			            	$('#dataTableProductDetail').DataTable().ajax.reload();
			            }
		                
		            }
		        
			    })
			});
			$('#form_editDetail').submit(function(event) {
			    event.preventDefault();
			    var data = new FormData();
        		data.append('product_id',$('#form_editDetail').find('#Product_id_edit').val());
        		data.append('size_id',$('#form_editDetail').find('#editSize').val());
        		data.append('color_id',$('#form_editDetail').find('#editColor').val());
        		data.append('quantity',$('#form_editDetail').find('#editQuantity').val());
			    var id = $('input[name="idDetail"]').val();
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
			            	$('#editDetail').modal('toggle');
			            	$('#dataTableProductDetail').DataTable().ajax.reload();
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