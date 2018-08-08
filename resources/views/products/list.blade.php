@extends('layouts.master_product')

@section('header')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/11.1.0/nouislider.css">

@endsection

@section('content')
<div class="container">
	<div class="row">
		<!-- left column -->
		<aside class="col-md-4 col-lg-3 col-xl-2" id="leftColumn">
			<a href="#" class="slide-column-close visible-sm visible-xs"><span class="icon icon-chevron_left"></span>back</a>
			<div class="filters-block visible-xs">
				<div class="filters-row__select">
					<label>Sort by: </label>
					<div class="select-wrapper">
						<select class="select--ys">
							<option>Position</option>
							<option>Price</option>
							<option>Rating</option>
						</select>
					</div>
					<a href="#" class="sort-direction icon icon-arrow_back"></a> 
				</div>
				<div class="filters-row__select">
					<label>Show: </label>
					<div class="select-wrapper">
						<select class="select--ys">
							<option>25</option>
							<option>50</option>
							<option>100</option>
						</select>
					</div>
				</div>
				<a href="#" class="icon icon-arrow-down active"></a><a href="#" class="icon icon-arrow-up"></a> 
			</div>
			<!-- shopping by block -->
			<div class="collapse-block open">
				<h4 class="collapse-block__title">SHOPPING BY:</h4>
				<div class="collapse-block__content">
					<ul class="filter-list">
						<li> Color: <span>White</span><a href="#" class="icon icon-clear icon-to-right"></a> </li>
						<li> Size: <span>S</span><a href="#" class="icon icon-clear icon-to-right"></a> </li>
					</ul>
					<a class="btn btn--ys btn--sm btn--light">Clear All</a> 
				</div>
			</div>
			<!-- /shopping by block --> 
			<!-- category block -->
			<div class="collapse-block open">
				<h4 class="collapse-block__title ">WOMENS</h4>
				<div class="collapse-block__content">
					<ul class="expander-list">
						<li class="active">
							<a href="#">TOPS</a><span class="expander"></span>
							<ul>
								<li class="active"><a href="#">Blouses &amp; Shirts</a></li>
								<li><a href="#">Dresses</a></li>
							</ul>
						</li>
						<li>
							<a href="#">BOTTOMS</a><span class="expander"></span>
							<ul>
								<li><a href="#">Trousers</a></li>
								<li><a href="#">Jeans</a></li>
								<li><a href="#">Leggings</a></li>
								<li><a href="#">Jumpsuit &amp; shorts</a></li>
								<li><a href="#">Skirts</a></li>
								<li><a href="#">Tights</a></li>
							</ul>
						</li>
						<li>
							<a href="#">ACCESSORIES</a><span class="expander"></span>
							<ul>
								<li><a href="#">Jewellery</a></li>
								<li><a href="#">Hats</a></li>
								<li><a href="#">Scarves &amp; snoods</a></li>
								<li><a href="#">Belts</a></li>
								<li><a href="#">Bags</a></li>
								<li><a href="#">Shoes</a></li>
								<li><a href="#">Sunglasses</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<!-- /category block --> 
			<!-- price slider block -->
			<div class="collapse-block open">
				<h4 class="collapse-block__title">PRICE</h4>
				<div class="collapse-block__content">
					<div id="priceSlider" class="price-slider"></div>
					<form >
						<div class="price-input">
							<label>From:</label>
							<input type="text" id="priceMin" />
						</div>
						<div class="price-input-divider">-</div>
						<div class="price-input">
							<label>To:</label>
							<input type="text" id="priceMax" />
						</div>
						<div class="price-input">
							<button type="button" class="btn btn--ys btn--md filterPrice">Filter</button>
						</div>
					</form>
				</div>
			</div>
			<!-- /price slider block --> 
			<!-- size block -->
			<div class="collapse-block open">
				<h4 class="collapse-block__title">SIZE</h4>
				<div class="collapse-block__content">
					<ul class="options-swatch options-swatch--size options-swatch--lg">
						@foreach($sizes as $size)
						<li ><a href="{{asset('list/size')}}/{{$size->id}}">{{$size->name}}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
			<!-- /size block --> 
			<!-- color block -->
			<div class="collapse-block open">
				<h4 class="collapse-block__title">COLOR</h4>
				<div class="collapse-block__content">
					<ul class="options-swatch options-swatch--color options-swatch--lg">
						@foreach($colors as $color)
						<li><a href="{{asset('list/color')}}/{{$color->id}}"><span class="swatch-label" style="background: {{$color->name}}"></span></a></li>
						@endforeach
					</ul>
				</div>
			</div>
			<!-- /color block --> 
			<!-- brands block -->
			<div class="collapse-block">
				<h4 class="collapse-block__title">BRANDS</h4>
				<div class="collapse-block__content">
					<ul class="simple-list">
						<li><a href="#">Levi’s </a></li>
						<li><a href="#">Gap</a></li>
						<li><a href="#">Zara</a></li>
						<li><a href="#">Polo</a></li>
						<li><a href="#">Ecco</a></li>
						<li><a href="#">H&amp;M</a></li>
						<li><a href="#">Diesel</a></li>
						<li><a href="#">Bockers</a></li>
						<li><a href="#">Lacoste</a></li>
					</ul>
				</div>
			</div>
			<!-- /brands block --> 
			<!-- gender block -->
			<div class="collapse-block">
				<h4 class="collapse-block__title">GENDER</h4>
				<div class="collapse-block__content">
					<ul class="simple-list">
						<li><a href="#">Men</a></li>
						<li><a href="#">Women</a></li>
						<li><a href="#">Unisex</a></li>
					</ul>
				</div>
			</div>
			<!-- /gender block --> 
			<!-- sleeve lenght block -->
			<div class="collapse-block">
				<h4 class="collapse-block__title">SLEEVE LENGTH</h4>
				<div class="collapse-block__content">
					<ul class="simple-list">
						<li><a href="#">Long</a></li>
						<li><a href="#">Short</a></li>
						<li><a href="#">3/4</a></li>
					</ul>
				</div>
			</div>
			<!-- /sleeve lenght block --> 
			<!-- occasion block -->
			<div class="collapse-block">
				<h4 class="collapse-block__title">OCCASION</h4>
				<div class="collapse-block__content">
					<ul class="simple-list">
						<li><a href="#">Partywear</a></li>
						<li><a href="#">Casual</a></li>
						<li><a href="#">Evening</a></li>
						<li><a href="#">Workwear</a></li>
					</ul>
				</div>
			</div>
			<!-- /occasion block --> 
			<!-- compare block -->
			<div class="collapse-block open">
				<h4 class="collapse-block__title">COMPARE PRODUCTS</h4>
				<div class="collapse-block__content">
					<div class="compare">
						<div class="compare__item">
							<div class="compare__item__image pull-left"><a href="#"><img src="{{asset('')}}images/imageList/6.jpg" alt=""></a></div>
							<div class="compare__item__delete"><a href="#" class="icon icon-close"></a></div>
							<div class="compare__item__title">
								<h2><a href="#">Quis nostrud exercit ation ullamco</a></h2>
							</div>
						</div>
						<div class="compare__item">
							<div class="compare__item__image pull-left"><a href="#"><img src="{{asset('')}}images/imageList/4.jpg" alt=""></a></div>
							<div class="compare__item__delete"><a href="#" class="icon icon-close"></a></div>
							<div class="compare__item__title">
								<h2><a href="#">Quis nostrud exercit ation ullamco</a></h2>
							</div>
						</div>
					</div>
					<div><a href="#" class="btn btn--ys btn--md">Compare</a> <a href="#" class="btn btn--ys btn--md btn--light">Clear All</a></div>
				</div>
			</div>
			<!-- /compare block --> 
			<!-- poll block -->
			<div class="collapse-block">
				<h4 class="collapse-block__title">COMMUNITY POLL</h4>
				<div class="collapse-block__content">
					<p class="under-form-text color">What is your favorite color</p>
					<form id="pollForm" action="#">
						<ul class="filter-list">
							<li>
								<label class="radio">
								<input id="radio1" type="radio" name="radios" checked>
								<span class="outer"><span class="inner"></span></span>Green</label>
							</li>
							<li>
								<label class="radio">
								<input id="radio2" type="radio" name="radios">
								<span class="outer"><span class="inner"></span></span>Red</label>
							</li>
							<li>
								<label class="radio">
								<input id="radio3" type="radio" name="radios">
								<span class="outer"><span class="inner"></span></span>Black</label>
							</li>
							<li>
								<label class="radio">
								<input id="radio4" type="radio" name="radios">
								<span class="outer"><span class="inner"></span></span>Magenta</label>
							</li>
						</ul>
						<button type="submit" class="btn btn--ys btn--md btn--light">Vote</button>
					</form>
				</div>
			</div>
			<!-- /poll block --> 
			<!-- featured block -->
			<div class="collapse-block open coll-products-js">
				<h4 class="collapse-block__title">FEATURED</h4>
				<div class="collapse-block__content coll-gallery">
				</div>
				
				<div class="coll-gallery-clone" style="display:none">
					
						<div class="vertical-carousel vertical-carousel-2 offset-top-10">
							<div class="vertical-carousel__item">
								<div class="vertical-carousel__item__image pull-left"><a href="#"><img src="{{asset('')}}images/imageList/3.jpg" alt=""></a>
								</div>
								<div class="vertical-carousel__item__title">
									<h2><a href="#">Quis nostrud exercit ation</a></h2>
								</div>
								<div class="price-box">$26.00 <span class="price-box__old">$28.00</span></div>
								<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
							</div>
							<div class="vertical-carousel__item">
								<div class="vertical-carousel__item__image pull-left"><a href="#"><img src="{{asset('')}}images/imageList/1.jpg" alt=""></a>
								</div>
								<div class="vertical-carousel__item__title">
									<h2><a href="#">Quis nostrud exercit ation</a></h2>
								</div>
								<div class="price-box">$26.00</div>
								<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
							</div>
							<div class="vertical-carousel__item">
								<div class="vertical-carousel__item__image pull-left"><a href="#"><img src="{{asset('')}}images/imageList/2.jpg" alt=""></a></div>
								<div class="vertical-carousel__item__title">
									<h2><a href="#">Quis nostrud exercit ation</a></h2>
								</div>
								<div class="price-box">$26.00</div>
								<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
							</div>
						</div>
					
				</div>
			</div>
			<!-- /featured block --> 
			<!-- tags block -->
			<div class="collapse-block">
				<h4 class="collapse-block__title">POPULAR TAGS</h4>
				<div class="collapse-block__content">
					<ul class="tags-list">
						<li><a href="#">Grey</a></li>
						<li><a href="#">Shirt</a></li>
						<li><a href="#">suit</a></li>
						<li><a href="#">Dresses </a></li>
						<li><a href="#">Outerwear</a></li>
					</ul>
				</div>
			</div>
			<!-- /tags block --> 
			<!-- custom block -->
			<div class="collapse-block">
				<h4 class="collapse-block__title">CUSTOM BLOCK</h4>
				<div class="collapse-block__content">
					<p class="light-font">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
					<ul class="marker-list">
						<li><a href="#">Lorem ipsum dolor sit amet</a></li>
						<li><a href="#">Conse ctetur adipisicing</a></li>
						<li><a href="#">Elit sed do eiusmod tempor</a></li>
					</ul>
					<p class="light-font">Amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labor.</p>
				</div>
			</div>
			<!-- /custom block --> 
		</aside>
		<!-- /left column --> 
		<!-- center column -->
		<aside class="col-md-8 col-lg-9 col-xl-10" id="centerColumn">
			<!-- title -->
			<div class="title-box">
				<h2 class="text-center text-uppercase title-under">Clothes</h2>
			</div>
			<!-- /title -->
			<div class="row">
				<div class="col-sm-6">
					<a href="listing-without-col-without-static-block_06.html" class="banner banner--md link-img-hover">
					<span class="figure">
						<img width="420px" height="350px" src="{{asset('')}}images/imageList/man.jpg" alt="" class="vis-hid-img-small " /> 
						<img width="420px" height="350px" src="{{asset('')}}images/imageList/man.jpg" alt="" class="vis-hid-img-big  " />
						<span class="figcaption">
							<span class="block-table">
								<span class="block-table-cell">
									<span class="banner__title size1">New<br>collection</span>
									<span class="text size2">OF FASHION CLOTHES</span>
								</span>
							</span>
						</span>
					</span>
					</a>
				</div>
				<div class="divider divider-md visible-xs"></div>
				<div class="col-sm-6">
					<a href="listing-without-col-without-static-block_06.html" class="banner banner--md link-img-hover">
					<span class="figure">
						<img width="420px" height="350px" src="{{asset('')}}images/imageList/woman.jpg" alt="" class="vis-hid-img-small" /> 
						<img width="420px" height="350px" src="{{asset('')}}images/imageList/woman.jpg" alt="" class="vis-hid-img-big" />
						<span class="figcaption">
							<span class="block-table">
								<span class="block-table-cell">
									<span class="banner__title size2">15% OFF</span>
									<span class="text size5"><em>on brand-new models</em></span>
									<span class="btn btn--ys btn--xl">Shop now!</span> 
								</span>
							</span>
						</span>
					</span>
					</a>
				</div>
			</div>
			<div class="offset-top-20">
				<p class="light-font">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliqui.</p>
			</div>
			<div class="divider"></div>
			<div class="row">
				@foreach($categories as $category)
				<a href="{{asset('')}}list/category/{{$category->id}}"><div class="subcategory-item col-sm-4 col-xs-6 col-xl-one-fifth findCategory" idCategory="{{$category->id}}">
					<span class="figure"> <img src="{{$category->thumbnail}}" width="270px" height="315px" style="width: 270px;height:315px" alt="" class="img-responsive" /> </span>
					<h3 class="subcategory-item__title">{{$category->name}}</h3>
				</div></a>
				@endforeach
			</div>
			<!-- filters row -->
			<div class="filters-row">
				<div class="pull-left">
					<div class="filters-row__mode">
						<a href="#" class="btn btn--ys slide-column-open visible-xs visible-sm hidden-xl hidden-lg hidden-md">Filter</a> 
						<a class="filters-row__view active link-grid-view btn-img btn-img-view_module"><span></span></a> 
						<a class="filters-row__view link-row-view btn-img btn-img-view_list"><span></span></a> 
					</div>
					<div class="filters-row__select hidden-sm hidden-xs">
						<label>Sort by: </label>
						<div class="select-wrapper">
							<select class="select--ys sort-position">
								<option>Position</option>
								<option>Price</option>
								<option>Rating</option>
							</select>
						</div>
						<a href="#" class="sort-direction icon icon-arrow_back"></a> 
					</div>
				</div>
				<div class="pull-right">
					<div class="filters-row__items hidden-sm hidden-xs">28 Item(s)</div>
					<div class="filters-row__select hidden-sm hidden-xs">
						<label>Show: </label>
						<div class="select-wrapper">
							<select class="select--ys show-qty">
								<option>25</option>
								<option>50</option>
								<option>100</option>
							</select>
						</div>
						<a href="#" class="icon icon-arrow-down active"></a><a href="#" class="icon icon-arrow-up"></a> 
					</div>
					<div class="filters-row__pagination">
						{{$products->links()}}

					</div>
				</div>
			</div>
			<!-- /filters row -->
			<div class="product-listing row">
				@foreach ($products as $product)
				<a href="{{asset('product')}}/{{$product->id}}"><div class="col-xs-6 col-sm-4 col-md-6 col-lg-4 col-xl-one-fifth">
					<!-- product -->					
					<div class="product product--zoom">
						<div class="product__inside">
							<!-- product image -->							
							<div class="product__inside__image">
								<a href="{{asset('product')}}/{{$product->id}}"> <img src="{{asset('storage')}}/{{$product->image}}" alt="" width="350px" height="350px"> </a> 
								<!-- quick-view --> 
								<div  productID="{{$product->id}}" href="#" data-toggle="modal" data-target="#quickViewModal" class="quick-view showDetail"><b><span class="icon icon-visibility"></span> Quick view</b> </div>  
								<!-- /quick-view --> 
							</div>							
							
							<!-- /product image --> 
							<!-- product name -->
							<div class="product__inside__name">
								<h2><a href="{{asset('product')}}/{{$product->id}}">{{$product->name}}</a></h2>
							</div>
							<!-- /product name -->                 <!-- product description --> 
							<!-- visible only in row-view mode -->
							<div class="product__inside__description row-mode-visible">{{$product->description}}</div>
							<!-- /product description -->                 <!-- product price -->
							<div class="product__inside__price price-box">${{$product->price}}</div>
							<!-- /product price --> 
							<!-- product review --> 
							<!-- visible only in row-view mode -->
							<div class="product__inside__review row-mode-visible">
								<div class="rating row-mode-visible"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
								<a href="#">1 Review(s)</a> <a href="#">Add Your Review</a> 
							</div>
							<!-- /product review --> 
							<div class="product__inside__hover">
								<!-- product info -->
								<div class="product__inside__info">
									<div class="product__inside__info__btns"> <!--  -->
										<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
										<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
										<a href="#" data-toggle="modal" data-target="#quickViewModal" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="icon icon-visibility"></span> Quick view</a> 
									</div>
								</div>
								<!-- /product info --> 
							</div>
						</div>
					</div>					
					<!-- /product --> 
				</div></a>
				@endforeach		
			</div>
			<!-- filters row -->
			<div class="filters-row">
				<div class="pull-left">
					<div class="filters-row__mode">
						<a href="#" class="btn btn--ys slide-column-open visible-xs visible-sm hidden-xl hidden-lg hidden-md">Filter</a> 
						<a class="filters-row__view active link-grid-view btn-img btn-img-view_module"><span></span></a> 
						<a class="filters-row__view link-row-view btn-img btn-img-view_list"><span></span></a> 
					</div>
					<div class="filters-row__select hidden-sm hidden-xs">
						<label>Sort by: </label>
						<div class="select-wrapper">
							<select class="select--ys sort-position">
								<option>Position</option>
								<option>Price</option>
								<option>Rating</option>
							</select>
						</div>
						<a href="#" class="sort-direction icon icon-arrow_back"></a> 
					</div>
				</div>
				<div class="pull-right">
					<div class="filters-row__items hidden-sm hidden-xs">28 Item(s)</div>
					<div class="filters-row__select hidden-sm hidden-xs">
						<label>Show: </label>
						<div class="select-wrapper">
							<select class="select--ys show-qty">
								<option>25</option>
								<option>50</option>
								<option>100</option>
							</select>
						</div>
						<a href="#" class="icon icon-arrow-down active"></a><a href="#" class="icon icon-arrow-up"></a> 
					</div>
					<div class="filters-row__pagination">
						{{$products->links()}}
					</div>
				</div>
			</div>
			<!-- /filters row --> 
		</aside>
		<!-- center column --> 
	</div>
</div>
<!-- Modal (quickViewModal) -->		
<div class="modal  modal--bg fade"  id="quickViewModal">
  <div class="modal-dialog white-modal">
    <div class="modal-content container">
    	<div class="modal-header">
       	 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
     	 </div>
    	<!--  -->
    	<div class="product-popup">
			<div class="product-popup-content">
				<div class="container-fluid">
					<div class="row product-info-outer">
						<div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
							<div class="product-main-image">
								<div class="product-main-image__item"><img class="imgProduct" alt="" /></div>
							</div>
						</div>
						<div class="product-info col-xs-12 col-sm-7 col-md-6 col-lg-6">
							<div class="wrapper">
								<div class="product-info__sku pull-left">SKU: <strong class="id_product"></strong></div>
								<div class="product-info__availabilitu pull-right">Availability:   <strong class="color">In Stock</strong></div>
							</div>
							<div class="product-info__title">
								<h2 class="name_product"></h2>
							</div>
							<div class="price-box product-info__price"><span class="price-box__new price_product"></span><span class="price-box__old originalprice_product"></span></div>
							<div class="divider divider--xs product-info__divider"></div>
							<div class="product-info__description">
								<div class="product-info__description__brand"><img src="{{asset('')}}images/custom/brand.png" alt=""> </div>
								<div class="product-info__description__text description_product"></div>
							</div>
							<div class="divider divider--xs product-info__divider"></div>
							<div class="wrapper">
								<div class="pull-left"><span class="option-label">COLOR:</span>  </div>
								<div class="pull-right required">* Required Fields</div>
							</div>
							<ul class="options-swatch options-swatch--color options-swatch--lg colors">							
							</ul>						
							<div class="wrapper">
								<div class="pull-left"><span class="option-label">SIZE:</span></div>
								<div class="pull-left required">*</div>
							</div>
							<ul class="options-swatch options-swatch--size options-swatch--lg sizes">
							</ul>
							<div class="divider divider--sm"></div>
							<div class="wrapper">
								<div class="pull-left"><span class="qty-label">QTY:</span></div>
								<div class="pull-left"><input type="number" name="quantity" class="input--ys qty-input pull-left quantity" value="1"></div>
								<div class="pull-left"><button type="submit" class="btn btn--ys btn--xxl addToCart"><span class="icon icon-shopping_basket"></span> Add to cart</button></div>
							</div>
							<ul class="product-link">
								<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
								<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#"><span class="text">Add to compare</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
    	<!-- / -->
    </div>
  </div>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/11.1.0/nouislider.js"></script>
<script >
	var url_storage = "{{asset('storage')}}/";
	jQuery(document).ready(function () {
		jQuery(document).on('click','.showDetail',function(e){
			var product_id= jQuery(this).attr('productId');	
			e.preventDefault();					
			jQuery.ajax({
				type: 'GET',
				url: 'products/'+ product_id,
				success: function(response){
					jQuery('.id_product').text(response.id);
					jQuery('.name_product').text(response.name);
					jQuery('.price_product').text(response.price);
					jQuery('.originalprice_product').text(response.original_price);
					jQuery('.description_product').text(response.description);
				}
			});
			jQuery.ajax({
				type: 'GET',
				url: 'productDetails/find/'+ product_id,
				success: function(response){
					jQuery('.imgProduct').attr("src",url_storage+response.product.image);
					jQuery('.licolor').remove();
					jQuery('.lisize').remove();
					for(var i=0;i<response.colors.length;i++){
						jQuery('.colors').append('<li productIDCol="'+ product_id+'" idcolor="'+response.colors[i].color+'" class="licolor col-'+response.colors[i].color+'" style="background: '+response.colors[i].color+'"><a ><span class="swatch-label " ></span></a></li>');
					}		
				}	
			});
		});
		var product_id;
		var idsize;
		var idcolor;
		jQuery(document).on('click','.licolor',function(e){
			product_id = jQuery(this).attr('productIDCol');
			
			idcolor = jQuery(this).attr('idcolor');
			console.log(idcolor);
			jQuery('.licolor').css('border','0px');
			jQuery('.col-'+idcolor).css('border','2px solid black');
			jQuery.ajax({
				type: 'GET',
				url: 'productDetails/findByColor/'+product_id+ '/'+ idcolor,
				success: function(response){
					
					jQuery('.lisize').remove();
					for(var i=0;i<response.sizes.length;i++){
						jQuery('.sizes').append(' <li idsize="'+response.sizes[i].size+'" class="lisize size-'+response.sizes[i].size+'"><a>'+response.sizes[i].size+'</a></li> ');
					}		
				}	
			});
			

		});	
		jQuery(document).on('click','.lisize',function(e){
				idsize = jQuery(this).attr('idsize');
				jQuery('.lisize').css('border','0px');
				jQuery('.size-'+idsize).css('border','2px solid black');
				
		});
		jQuery(document).on('click','.addToCart',function(e){
			e.preventDefault();
			var quantity = jQuery('.quantity').val();
			jQuery.ajax({
				method:'POST',
				url:'products/addtocart',
				data: {
					product_id: product_id,
					color: idcolor,
					size : idsize,
					quantity: quantity
				},
				success: function(response){
					if(response == "yes"){
						jQuery('#quickViewModal').modal('toggle');
						window.location.reload();
	            	}
				}
			});					
		});
		jQuery(document).on('click','.filterPrice',function(){
			var min = jQuery('#priceMin').val();
			var max = jQuery('#priceMax').val();
			window.location.assign(url+"list/price/"+min+"/"+max);			
		});
		
	});
</script>
@endsection