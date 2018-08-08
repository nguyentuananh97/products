@extends('layouts.master_product')

@section('content')
<!-- CONTENT section -->
		<div id="pageContent">
			<div class="container-fill">
				<h1 class="text-center text-uppercase title-under">Gallery</h1>												
				<!-- gallery -->
				<div id="page-wrap" class="gallery">	
		
			        <div class="filter-nav">
			            <div rel="all" class="current">All</div> 
			            @foreach($categories as $category)
			            <div rel="{{$category->slug}}">{{$category->name}}</div>
			            @endforeach
			        </div>
			        
			             
			        <div id="filter-content" class="gallery-content row gallery-layout-3">    @foreach($products as $product)
				        <div class="filter-content-item all {{$product->slug}} col-sm-6 col-md-4  col-lg-3 col-xl-3">
				        	<figure>
				        		<img style="width: 340px;height: 340px" src="{{asset('storage')}}/{{$product->image}}" alt="" />
				        		<figcaption><!-- add class .content-center in figcaption (center icons)-->					        			
				        			<div class="block-table">
				        				<div class="block-table-cell">
				        					<h6 class="title text-uppercase"><a href="#">{{$product->name}}</a></h6>
						        			<em class="color-custom font18">{{$product->category_name}}</em>
						        			<div class="divider divider--sm"></div>
						        			<p class="font-lighter">
						        				{{$product->description}}
						        			</p>
						        			<div class="button-box">
						        				<a href="{{asset('storage')}}/{{$product->image}}" class="zomm-gallery"  title="Title"></a>
						        				<a href="{{asset('product')}}/{{$product->id}}" class="link-gallery"></a>
						        			</div>
				        				</div>
				        			</div> 
				        		</figcaption>
				        	</figure>
				        </div>  
				      	@endforeach
					</div>
				</div>
				<br>
				<!-- /gallery -->
				<div class="text-center">
					{{$products->links()}}
				</div>
			</div>
		</div>
		<!-- End CONTENT section --> 
@endsection