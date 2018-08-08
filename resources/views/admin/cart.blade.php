@extends('layouts.master_admin')

@section('content')
  	<div class="content-header">
	    <h1>
      		List Order
		</h1>
		<ol class="breadcrumb">
		    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		    <li class="active">Order</li>
		    <li class="active">List Order</li>
		</ol>      
    </div>

    <div class="content">
    	<div id="page-wrapper">
			<div class="row">
		    	<div class="col-lg-12">
		 			<div class="panel panel-default">
		                <div class="panel-body">
		                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTableOrder" style="border-bottom: 1px solid #F2F2F2">
					            <thead>
					                <tr>
					                    <th style="text-align: center;border-bottom:none">ID</th>
					                    <th style="text-align: center;border-bottom:none">Code</th>
					                    <th style="text-align: center;border-bottom:none">Product Detail ID</th>
					                    <th style="text-align: center;border-bottom:none">Quantity</th>
					                    <th style="text-align: center;border-bottom:none">Total</th>
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
@endsection

@section('footer')

	<script >
		$(document).ready(function () {

		    var orderTable = $('#dataTableOrder').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: url_orders,
		        columns: [{ data: 'orderID', name: 'orderID' }, { data: 'code', name: 'code' },{ data: 'product_detail_id', name: 'product_detail_id' },{ data: 'quantity', name: 'quantity' }, { data: 'sum', name: 'total' },{ data: 'action', name: 'action' }]
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
				  	var order_id= $(this).attr('orderId');
			        $.ajax({
			            type: 'delete',
			            url: 'orders/' + order_id,
			            success:function(response){
			                orderTable.ajax.reload();
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
		});
	</script>
@endsection