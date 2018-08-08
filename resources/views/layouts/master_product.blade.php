<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title>YOURStore - Responsive HTML5 Template</title>
		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="YOURStore - Responsive HTML5 Template">
		<meta name="author" content="etheme.com">
		<link rel="shortcut icon" href="{{asset('')}}favicon.ico" />
		<!-- Mobile Specific Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- External Plugins CSS -->
		<link rel="stylesheet" type="text/css" href="{{mix('css/slick.css')}}">
		<link rel="stylesheet" type="text/css" href="{{mix('css/slick-theme.css')}}">
		<link rel="stylesheet" type="text/css" href="{{mix('css/magnific-popup.css')}}">
		<link rel="stylesheet" type="text/css" href="{{mix('css/bootstrap-select.css')}}">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
		<link rel="stylesheet" type="text/css" href="{{mix('css/settings.css')}}" media="screen" />
		<!-- Custom CSS -->
		<link rel="stylesheet" href="{{mix('css/css-style.css')}}">
		<!-- Icon Fonts  -->
		<link rel="stylesheet" href="{{mix('css/font-style.css')}}">
		<!-- Head Libs -->	
		<!-- Modernizr -->
		<!-- jQuery 1.10.1--> 
		<script src="{{mix('js/jquery-2.1.4.min.js')}}"></script> 
		<script src="{{mix('js/modernizr.min.js')}}"></script>
		@yield('header')
	</head>
	<body class="index">				  
		<div id="loader-wrapper">
			<div id="loader">
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
			</div>
		</div>
		<!-- Back to top -->
	    <div class="back-to-top"><span class="icon-keyboard_arrow_up"></span></div>
	    <!-- /Back to top -->
	    <!-- mobile menu -->
		<div class="hidden">
			<nav id="off-canvas-menu">				
				<ul class="expander-list">				
					<li>
						<span class="name">
							<span class="expander">-</span>
							<a href="{{asset('index')}}"><span class="act-underline">HOME</span></a>
						</span>
					</li>					
					<li>
						<span class="name">
							<span class="expander">-</span>
							<a href=""><span class="act-underline">CATEGORY</span></a>
						</span>						
					</li>
					<li>
						<span class="name">
							<span class="expander">-</span>
							<a href="{{asset('list')}}"><span class="act-underline"><span class="act-underline">PRODUCT</span></span></a>
						</span>
					<li>
						<span class="name">
							<span class="expander">-</span>
							<a href="blog-layout-1.html"><span class="act-underline">GALLERY</span></a>
						</span>
					</li>
				</ul>
			</nav>
		</div>		
	    <!-- /mobile menu -->
		<!-- HEADER section -->
		<div class="header-wrapper">
			<header id="header">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-6 col-xl-7">
							<!-- logo start --> 
							<a href="index.html"><img class="logo replace-2x img-responsive" src="{{asset('')}}images/logo.png" alt=""/> </a> 
							<!-- logo end --> 
						</div>
						<div class="col-sm-8 col-md-8 col-lg-6 col-xl-5 text-right">
							<!-- slogan start -->
							<div class="slogan"> Default welcome msg! </div>
							<!-- slogan end --> 						
							<div class="settings">
								<!-- currency start -->
								<div class="currency dropdown text-right">
									<div class="dropdown-label hidden-sm hidden-xs">Currency:</div>
									<a class="dropdown-toggle" data-toggle="dropdown"> USD<span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-menu--xs-full">
										<li><a href="#">GBP - British Pound Sterling</a></li>
										<li><a href="#">EUR - Euro</a></li>
										<li><a href="#">USD - US Dollar</a></li>
										<li class="dropdown-menu__close"><a href="#"><span class="icon icon-close"></span>close</a></li>
									</ul>
								</div>
								<!-- currency end --> 
								<!-- language start -->
								<div class="language dropdown text-right">
									<div class="dropdown-label hidden-sm hidden-xs">Language:</div>
									<a class="dropdown-toggle" data-toggle="dropdown"> English<span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-menu--xs-full">
										<li><a href="#">English</a></li>
										<li><a href="#">German</a></li>
										<li><a href="#">Spanish</a></li>
										<li><a href="#">Russian</a></li>
										<li class="dropdown-menu__close"><a href="#"><span class="icon icon-close"></span>close</a></li>
									</ul>
								</div>
								<!-- language end --> 
							</div>
						</div>
					</div>
				</div>
				<div class="stuck-nav">
					<div class="container offset-top-5">
						<div class="row">
							<div class="pull-left col-sm-9 col-md-9 col-lg-10">
								<!-- navigation start -->
								<nav class="navbar">
									<div class="responsive-menu mainMenu">									
										<!-- Mobile menu Button-->
										<div class="col-xs-2 visible-mobile-menu-on">
											<div class="expand-nav compact-hidden">
												<a href="#off-canvas-menu" class="off-canvas-menu-toggle">
													<div class="navbar-toggle"> 
														<span class="icon-bar"></span> 
														<span class="icon-bar"></span> 
														<span class="icon-bar"></span> 
														<span class="menu-text">MENU</span> 
													</div>
												</a>
											</div>
										</div>
										<!-- //end Mobile menu Button -->
										<ul class="nav navbar-nav">
											<li class="dl-close"><a href="#"><span class="icon icon-close"></span>close</a></li>
											<li class="dropdown dropdown-mega-menu">
												<a href="{{asset('list')}}" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">Home</span></a>
											</li>
											<li class="dropdown dropdown-mega-menu">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">Category</span></a>
												<ul class="dropdown-menu megamenu image-links-layout" role="menu">				@foreach($categories as $category)				
													<li class="col-one-fourth" >
														<span class="image-link">
														<span class="figure"><img style="width: 240px;height: 220px" class="img-responsive img-border" src="{{$category->thumbnail}}" alt=""/><a href="{{asset('')}}list/category/{{$category->id}}"><span class="btn btn--ys btn--lg findCategory" idCategory="{{$category->id}}">VIEW</span></a></span>
														<span class="figcaption">{{$category->name}}</span>
														</span>
													</li>

													@endforeach
												</ul>
											</li>
											<li class="dropdown dropdown-mega-menu">
												<a href="{{asset('gallery')}}" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">Gallery</span></a>
											</li>
										</ul>
									</div>
								</nav>
							</div>
							<!-- navigation end -->
							<div class="pull-right col-sm-3 col-md-3 col-lg-2">
								<div class="text-right">	
									<!-- search start -->
									<div class="search link-inline">
										<a href="#" class="search__open"><span class="icon icon-search"></span></a>
										<div class="search-dropdown">
											<form >
												<div class="input-outer">
													<input class="inputSearch" type="search" name="search" value="" maxlength="128" placeholder="SEARCH:">
													<button type="button" title="" class="icon icon-search searchPro"></button>
												</div>
												<a href="#" class="search__close"><span class="icon icon-close"></span></a>									
											</form>
										</div>
									</div>
									<!-- search end -->										
									<!-- account menu start -->
									<div class="account link-inline">
										<div class="dropdown text-right">
											<a class="dropdown-toggle" data-toggle="dropdown">
											<span class="icon icon-person "></span>
											</a>
											<ul class="dropdown-menu dropdown-menu--xs-full">
												<li><a href=""><span class="icon icon-person"></span>{{session('name')}}</a></li>
												<li><a href="{{asset('')}}login"><span class="icon icon-lock"></span>Login</a></li>
												<li><a class="dropdown-item" href="{{ route('logout') }}"
								                     onclick="event.preventDefault();
								                                   document.getElementById('logout-form').submit();"><span class="icon fa fa-sign-out"></span>
								                      {{ __('Logout') }}
								                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form></li>
												<li class="dropdown-menu__close"><a href="#"><span class="icon icon-close"></span>close</a></li>
											</ul>
										</div>
									</div>
									<!-- account menu end -->
									<!-- shopping cart start -->
									<div class="cart link-inline">
										<div class="dropdown text-right">
											<a class="dropdown-toggle">
											<span class="icon icon-shopping_basket"></span>
											<span class="badge badge--cart"></span>
											</a>
											<div class="dropdown-menu dropdown-menu--xs-full slide-from-top" role="menu">
												<div class="container">
													<div class="cart__top">CART</div>
													<a href="#" class="icon icon-close cart__close"><span>CLOSE</span></a>
													<ul>
														@foreach($carts as $cart)
														<li class="cart__item">
															<div class="cart__item__image pull-left"><a href="#"><img src="{{asset('')}}images/product/product-1.jpg" alt=""/></a></div>
															<div class="cart__item__control">
																<div class="cart__item__delete"><a idCart="{{$cart->rowId}}" class="icon icon-delete deleteCart"><span>Delete</span></a></div>
																<div class="cart__item__edit"><a idCart="{{$cart->rowId}}" class="icon icon-edit editCart"><span>Edit</span></a></div>
															</div>
															<div class="cart__item__info">
																<div class="cart__item__info__title">
																	<h2><a href="#">{{$cart->name}}</a></h2>
																</div>
																<div class="cart__item__info__price"><span class="info-label">Price:</span><span>${{$cart->price}}</span></div>
																<div class="cart__item__info__qty"><span class="info-label">Qty:</span><input type="number" class="input--ys editQty" value='{{$cart->qty}}' /></div>
																<div class="cart__item__info__details">
																	<div class='multitooltip'>
																		<a href="#">Details</a>
																		<div class="tip on-bottom">
																			<span><strong>Color:</strong> {{$cart->options->color}}</span>
																			<span><strong>Size:</strong> {{$cart->options->size}}</span>
																		</div>
																	</div>
																</div>
															</div>
														</li>
														@endforeach
													</ul>
													<div class="cart__bottom">
														<div class="cart__total">Cart subtotal: <span> {{$total}}</span></div>
														<button class="btn btn--ys btn-checkout addOrder">Checkout <span class="icon icon--flippedX icon-reply"></span></button>
														<a href="#" class="btn btn--ys"><span class="icon icon-shopping_basket"></span> View Cart</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- shopping cart end -->			
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
		</div>
		<!-- End HEADER section -->
		<div class="content">
			@yield('content')
		</div>
		<!-- FOOTER section -->
		<footer>
			<!-- footer-data -->
			<div class="container inset-bottom-60">
				<div class="row" >
					<div class="col-sm-12 col-md-5 col-lg-6 border-sep-right">
						<div class="footer-logo hidden-xs">
							<!--  Logo  --> 
							<a class="logo" href="index.html"> <img class="replace-2x" src="{{asset('')}}images/logo.png"  alt="YOURStore"> </a> 
							<!-- /Logo --> 
						</div>
						<div class="box-about">
							<div class="mobile-collapse">
								<h4 class="mobile-collapse__title visible-xs">ABOUT US</h4>
								<div class="mobile-collapse__content">
									<p> No more need to look for other ecommerce themes. We provide huge number of different layouts. Yourstore comes packed with free and useful features developed to make your website creation easier. Innovative clean design, advanced functionality, UI made for humans, extensive documenta- tion and support i continue this list infinitely... </p>
								</div>
							</div>
						</div>
						<!-- subscribe-box -->
						<div class="subscribe-box offset-top-20">
							<div class="mobile-collapse">
								<h4 class="mobile-collapse__title">NEWSLETTER SIGNUP</h4>
								<div class="mobile-collapse__content">
									<form class="form-inline">
										<input class="subscribe-form__input" type="text" name="subscribe">
										<button type="submit" class="btn btn--ys btn--xl">SUBSCRIBE</button>
									</form>
								</div>
							</div>
						</div>
						<!-- /subscribe-box --> 
					</div>
					<div class="col-sm-12 col-md-7 col-lg-6 border-sep-left">
						<div class="row">
							<div class="col-sm-4">
								<div class="mobile-collapse">
									<h4 class="text-left  title-under  mobile-collapse__title">INFORMATION</h4>
									<div class="v-links-list mobile-collapse__content">
										<ul>
											<li><a href="about.html">About Us</a></li>
											<li><a href="support-24.html">Customer Service</a></li>
											<li><a href="faq.html">Privacy Policy</a></li>
											<li><a href="site-map.html">Site Map</a></li>
											<li><a href="typography.html">Search Terms</a></li>
											<li><a href="warranty.html">Advanced Search</a></li>
											<li><a href="delivery-page.html">Orders and Returns</a></li>
											<li><a href="contact.html">Contact Us</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="mobile-collapse">
									<h4 class="text-left  title-under  mobile-collapse__title">WHY BUY FROM US</h4>
									<div class="v-links-list mobile-collapse__content">
										<ul>
											<li><a href="warranty.html">Shipping &amp; Returns</a></li>
											<li><a href="typography.html">Secure Shopping</a></li>
											<li><a href="about.html">International Shipping</a></li>
											<li><a href="delivery-page.html">Affiliates</a></li>
											<li><a href="support-24.html">Group Sales</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="mobile-collapse">
									<h4 class="text-left  title-under  mobile-collapse__title">MY ACCOUNT</h4>
									<div class="v-links-list mobile-collapse__content">
										<ul>
											<li><a href="login_form.html">Sign In</a></li>
											<li><a href="shopping_cart.html">View Cart</a></li>
											<li><a href="wishlist.html">My Wishlist</a></li>
											<li><a href="support-24.html">Track My Order</a></li>
											<li><a href="faq.html">Help</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /footer-data --> 
			<div class="divider divider-md visible-xs visible-sm visible-md"></div>
			<!-- social-icon -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="social-links social-links--large">
							<ul>
								<li><a class="icon fa fa-facebook" href="http://www.facebook.com/"></a></li>
								<li><a class="icon fa fa-twitter" href="http://www.twitter.com/"></a></li>
								<li><a class="icon fa fa-google-plus" href="http://www.google.com/"></a></li>
								<li><a class="icon fa fa-instagram" href="https://instagram.com/"></a></li>
								<li><a class="icon fa fa-youtube-square" href="https://www.youtube.com/"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /social-icon --> 
			<!-- footer-copyright -->
			<div class="container footer-copyright">
				<div class="row">
					<div class="col-lg-12"> <a href="index.html"><span>Your</span>Store</a> &copy; 2016 . All Rights Reserved. </div>
				</div>
			</div>
			<!-- /footer-copyright --> 
			<a href="#" class="btn btn--ys btn--full visible-xs" id="backToTop">Back to top <span class="icon icon-expand_less"></span></a> 
		</footer>
		<!-- END FOOTER section -->
		


		
		<!-- Bootstrap 3--> 
		<script src="{{mix('js/bootstrap.min.js')}}" ></script>
		<!-- Specific Page External Plugins --> 
		<script src="{{mix('js/slick.min.js')}}"></script>
		<script src="{{mix('js/bootstrap-select.min.js')}}"></script>
		<script type="text/javascript" src="{{mix('js/jquery.plugin.min.js')}}"></script>  
		<script type="text/javascript" src="{{mix('js/jquery.countdown.min.js')}}"></script>  
		<script type="text/javascript" src="{{mix('js/jquery.magnific-popup.min.js')}}"></script>  
		<script type="text/javascript" src="{{mix('js/isotope.pkgd.min.js')}}"></script>  
		<script type="text/javascript" src="{{mix('js/imagesloaded.pkgd.min.js')}}"></script>  
		<script type="text/javascript" src="{{mix('js/jquery.colorbox-min.js')}}"></script>
		<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
		<script type="text/javascript" src="{{mix('js/jquery.themepunch.tools.min.js')}}"></script> 
		<script type="text/javascript" src="{{mix('js/jquery.themepunch.revolution.min.js')}}"></script> 
		<script src="{{mix('js/instafeed.min.js')}}"></script>  
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
		<!-- Custom --> 
		
		<script src="{{mix('js/custom.js')}}"></script>
		<script type="text/javascript">
			jQuery.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
			    }
			});
			var url = "{{asset('')}}";
			jQuery(document).ready(function(){
				jQuery(document).on('click','.editCart',function(e){
					e.preventDefault();
					var cart_id= jQuery(this).attr('idCart');
					var quantity = jQuery('.editQty').val();  
					jQuery.ajax({
			            type: 'post',
			            url: 'products/editcart/' + cart_id,
			            data: {
							quantity: quantity
						},
			            success:function(response){
			                window.location.reload();
			            }
				    })
				});
				jQuery(document).on('click','.deleteCart',function(e){
					e.preventDefault();
					var cart_id= jQuery(this).attr('idCart');
					jQuery.ajax({
			            type: 'get',
			            url: 'products/deletecart/' + cart_id,
			            success:function(response){
			                window.location.reload();
			            }
				    })
				});
				jQuery(document).on('click','.addOrder',function(e){
					e.preventDefault();
					jQuery.ajax({
						type: 'post',
						url: url+'orders' ,
						success:function(response){
							if(response == "yes"){
								// swal({
								//   title: "Đặt hàng thành công!",
								//   icon: "success",
								//   button: "ok",
								// });
								window.location.reload();
			            	}
						}
					})
				});
				jQuery(document).on('click','.searchPro',function(){
					var info = jQuery('.inputSearch').val();
					window.location.assign(url+"list/search/"+info);
					
				});
			})
		</script>
		@yield('footer')	

	</body>
</html>