"use strict";function debouncer(e,o){var i,o=o||500;return function(){var n=this,t=arguments;clearTimeout(i),i=setTimeout(function(){e.apply(n,Array.prototype.slice.call(t))},o)}}function compareSlideIni(){$j("#compareSlide").length>0&&($j(".compare-link").on("click",function(e){$j("#compareSlide").toggleClass("open"),e.preventDefault()}),$j(".compareSlide__close").on("click",function(e){$j("#compareSlide").toggleClass("open"),e.preventDefault()}))}function cartSlideIni(){$j("header .cart").length>0&&($j("header .cart .dropdown-toggle").on("click",function(e){$j("header .cart .dropdown").toggleClass("open"),headerCartSize(),e.preventDefault()}),$j("header .cart .cart__close").on("click",function(e){$j("header .cart .dropdown").toggleClass("open"),e.preventDefault()}))}function headerCartSize(){$cart.length&&($cart.find(".dropdown-menu").scrollTop(0),cartHeight())}function cartHeight(){var e=$cart.find(".dropdown-menu"),o=window.innerHeight,i=e.outerHeight(),n=parseInt(o-i);n<0&&e.css({"max-height":i+n,overflow:"auto","overflow-x":"hidden"})}function changeInputNameCartPage(){$j(window).width()>767?($j(".input-mobile").attr("name",""),$j(".input-desktop").attr("name","updates[]")):($j(".input-mobile").attr("name","updates[]"),$j(".input-desktop").attr("name",""))}function slideColumn(){$j("#leftColumn").length>0&&($j(window).resize(function(){window.innerWidth<992?filtersHeight():$j("#leftColumn").removeAttr("style")}),$j(".slide-column-close").addClass("position-fix"),$j(".slide-column-open").on("click",function(e){e.preventDefault(),$j("#leftColumn").addClass("column-open"),$j("body").css("top",-$j("body").scrollTop()),$j("body").addClass("no-scroll").append('<div class="modal-filter"></div>'),$j(".modal-filter").length>0&&$j(".modal-filter").click(function(){$j(".slide-column-close").trigger("click")})}),$j(".slide-column-close").on("click",function(e){e.preventDefault(),$j("#leftColumn").removeClass("column-open");var o=-1*parseInt($j("body").css("top").replace("px",""));$j("body").removeAttr("style"),$j("body").removeClass("no-scroll"),$j("body").scrollTop(o),$j(".modal-filter").unbind(),$j(".modal-filter").remove()}))}function filtersHeight(){var e=$j("#leftColumn"),o=window.innerHeight,i=e.outerHeight(),n=parseInt(o-i);n<0&&e.css({"max-height":i+n,overflow:"auto","overflow-x":"hidden"})}function countDown(){$j("#countdown1").length>0&&$j("#countdown1").countdown({until:new Date(2016,12,1)})}function inputCounter(){$j(".input-counter").length>0&&($j(".minus-btn").click(function(){var e=$j(this).parent().find("input"),o=parseInt(e.val())-1;return o=o<1?1:o,e.val(o),e.change(),!1}),$j(".plus-btn").click(function(){var e=$j(this).parent().find("input");return e.val(parseInt(e.val())+1),e.change(),!1}))}function sliderNoZoom(){$j(".slider-no-zoom").length>0&&($j(".slider-product-large").slick({slidesToShow:1,slidesToScroll:1,arrows:!1,fade:!0,centerPadding:"40px",infinite:!0,asNavFor:".slider-product-small"}),$j(".slider-product-small").slick({slidesToShow:4,slidesToScroll:1,infinite:!0,asNavFor:".slider-product-large",dots:!0,centerPadding:"40px",focusOnSelect:!0}))}function productCarousel(e,o,i,n,t,s){var l=(window.innerWidth||$j(window).width(),o>0?o:6),r=i>0?i:4,a=n>0?n:i,c=t>0?t:n,d=s>0?s:1,e=e;e.parent().find(".carousel-products__button").length>0?e.slick({prevArrow:e.parent().find(".carousel-products__button .btn-prev"),nextArrow:e.parent().find(".carousel-products__button .btn-next"),dots:!0,slidesToShow:l,slidesToScroll:l,responsive:[{breakpoint:1770,settings:{slidesToShow:r,slidesToScroll:r}},{breakpoint:992,settings:{slidesToShow:a,slidesToScroll:a}},{breakpoint:768,settings:{slidesToShow:c,slidesToScroll:c}},{breakpoint:480,settings:{slidesToShow:d,slidesToScroll:d}}]}):e.slick({slidesToShow:l,slidesToScroll:1,speed:500,responsive:[{breakpoint:1770,settings:{slidesToShow:r,slidesToScroll:r}},{breakpoint:992,settings:{slidesToShow:a,slidesToScroll:a}},{breakpoint:768,settings:{slidesToShow:c,slidesToScroll:c}},{breakpoint:480,settings:{slidesToShow:d,slidesToScroll:d}}]}),fixCarouselHover(e)}function productBigCarousel(e,o,i,n,t,s){var l=(window.innerWidth||$j(window).width(),o>0?o:6),r=i>0?i:4,a=n>0?n:i,c=t>0?t:n,d=s>0?s:1,e=e;e.parent().find(".carousel-products__button").length>0?e.slick({prevArrow:e.parent().find(".carousel-products__button .btn-prev"),nextArrow:e.parent().find(".carousel-products__button .btn-next"),dots:!0,slidesToShow:l,slidesToScroll:l,responsive:[{breakpoint:1770,settings:{slidesToShow:r,slidesToScroll:d}},{breakpoint:992,settings:{slidesToShow:a,slidesToScroll:d}},{breakpoint:768,settings:{slidesToShow:c,slidesToScroll:d}},{breakpoint:480,settings:{slidesToShow:d,slidesToScroll:d}}]}):e.slick({slidesToShow:l,slidesToScroll:1,speed:500,responsive:[{breakpoint:1770,settings:{slidesToShow:r,slidesToScroll:d}},{breakpoint:992,settings:{slidesToShow:a,slidesToScroll:d}},{breakpoint:768,settings:{slidesToShow:c,slidesToScroll:d}},{breakpoint:480,settings:{slidesToShow:d,slidesToScroll:d}}]}),fixCarouselHover(e)}function mobileOnlyCarousel(){var e=window.innerWidth||$j(window).width(),o=$j(".carousel-products-mobile");e<480&&$j(".carousel-products-mobile").slick({slidesToShow:1,slidesToScroll:1}),$j(window).resize(debouncer(function(e){(window.innerWidth||$j(window).width())<480?o.slick({slidesToShow:1,slidesToScroll:1}):o.hasClass("slick-initialized")&&o.slick("unslick")}))}function bannerCarousel(e){e.slick({infinite:!0,dots:!1,slidesToShow:3,slidesToScroll:3,responsive:[{breakpoint:768,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]})}function bannerCarouselShort(e){e.slick({infinite:!0,dots:!1,slidesToShow:3,slidesToScroll:3,responsive:[{breakpoint:1200,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]})}function blogCarousel(e,o,i,n,t,s){var l=(window.innerWidth||$j(window).width(),o>0?o:6),r=i>0?i:4,a=n>0?n:i,c=t>0?t:n,d=s>0?s:1,e=e;e.parent().find(".carousel-products__button").length>0?e.slick({prevArrow:e.parent().find(".carousel-products__button .btn-prev"),nextArrow:e.parent().find(".carousel-products__button .btn-next"),dots:!1,infinite:!0,slidesToShow:l,slidesToScroll:l,responsive:[{breakpoint:1770,settings:{slidesToShow:r,slidesToScroll:r}},{breakpoint:992,settings:{slidesToShow:a,slidesToScroll:a}},{breakpoint:768,settings:{slidesToShow:c,slidesToScroll:c}},{breakpoint:480,settings:{slidesToShow:d,slidesToScroll:d}}]}):e.slick({slidesToShow:l,slidesToScroll:1,speed:500,responsive:[{breakpoint:1770,settings:{slidesToShow:r,slidesToScroll:r}},{breakpoint:992,settings:{slidesToShow:a,slidesToScroll:a}},{breakpoint:768,settings:{slidesToShow:c,slidesToScroll:c}},{breakpoint:480,settings:{slidesToShow:d,slidesToScroll:d}}]})}function bannerAsid(e){e.slick({infinite:!0,dots:!0,arrows:!1,slidesToShow:1,slidesToScroll:1})}function testimonialsAsid(e){e.slick({infinite:!0,dots:!0,arrows:!1,slidesToShow:1,slidesToScroll:1})}function brandsCarousel(e){e.slick({infinite:!0,dots:!1,slidesToShow:10,slidesToScroll:10,responsive:[{breakpoint:1770,settings:{slidesToShow:6,slidesToScroll:6}},{breakpoint:1199,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:768,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:480,settings:{slidesToShow:2,slidesToScroll:2}}]})}function verticalCarousel(e,o){var o=o>0?o:2;e.slick({infinite:!1,dots:!1,slidesToShow:o,slidesToScroll:o,vertical:!0})}function thumbnailsCarousel(e){e.slick({infinite:!1,dots:!1,slidesToShow:4,slidesToScroll:1,responsive:[{breakpoint:1200,settings:{slidesToShow:3,slidesToScroll:1}},{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:1}}]})}function fixCarouselHover(e){e.find(".slick-slide").bind("mouseenter mouseleave",function(e){$j(this).closest(".slick-slider").toggleClass("hover")})}function elevateZoom(){var e=window.innerWidth||document.documentElement.clientWidth;$j(".product-zoom").imagesLoaded(function(){if($j(".product-zoom").length){var o;o="rtl"==$j("html").css("direction").toLowerCase()?11:1,e>767?$j(".product-zoom").elevateZoom({zoomWindowWidth:$j(".product-zoom").width()-60,zoomWindowHeight:$j(".product-zoom").width()-60,gallery:"smallGallery",galleryActiveClass:"active",zoomWindowPosition:o}):$j(".product-zoom").elevateZoom({gallery:"smallGallery",zoomType:"inner",galleryActiveClass:"active",zoomWindowPosition:o})}}),$j(".product-main-image > .product-main-image__zoom ").bind("click",function(){if(galleryObj=[],current=0,itemN=0,$j("#smallGallery").length)console.log("1"),$j("#smallGallery li a").not(".video-link").each(function(){$j(this).hasClass("active")&&(current=itemN),itemN++;var e=$j(this).data("zoom-image");image={},image.src=e,image.type="image",galleryObj.push(image)});else{console.log("2"),itemN++;var e=$j(this).parent().find(".product-zoom").data("zoom-image");image={},image.src=e,image.type="image",galleryObj.push(image)}$j.magnificPopup.open({items:galleryObj,gallery:{enabled:!0}},current)});var o=e;$j(window).resize(debouncer(function(e){var i=window.innerWidth||$j(window).width();i!=o&&($j(".zoomContainer").remove(),$j(".elevatezoom").removeData("elevateZoom"),$j(".product-zoom").length&&(i>767?$j(".product-zoom").elevateZoom({zoomWindowHeight:$j(".product-zoom").height(),gallery:"smallGallery"}):$j(".product-zoom").elevateZoom({gallery:"smallGallery",zoomType:"inner"}))),o=window.innerWidth||$j(window).width()}))}function elevateZoom1(){(window.innerWidth||$j(window).width())>767&&$j(".bigGallery .product-zoom1").length&&$j(".bigGallery .product-zoom1").elevateZoom({zoomType:"inner",cursor:"crosshair",zoomWindowFadeIn:300,zoomWindowFadeOut:300})}function setProductSize(){(window.innerWidth||$j(window).width())>767&&$j(".product").each(function(){var e=$j(this).outerHeight();$j(this).css({"min-height":e+"px"}),$j(this).find(".product__inside").addClass("pos-abs")}),$j(window).resize(function(e){$j(".product").each(function(){$j(this).css({"min-height":""}),$j(this).find(".product__inside__info").css({height:"0"}),$j(this).find(".product__inside").removeClass("pos-abs")});var o;clearTimeout(o),o=setTimeout(function(){var e=window.innerWidth||$j(window).width();$j(".product").each(function(){if($j(this).find(".product__inside__info").css({height:""}),e>767){var o=$j(this).outerHeight();$j(this).css({"min-height":o+"px"}),$j(this).find(".product__inside").addClass("pos-abs")}})},1e3)})}function navbarClick(){(window.innerWidth||$j(window).width())>1025&&$j(".navbar .dropdown > a").on("click",function(){return location.href=this.href,!1})}function setProductArrows(){var e=window.innerWidth||$j(window).width(),o=function(e){if(e>1199){var o=$j(".product-main-image img").height();$j("#productPrevNext > a").css({top:o/2+"px"})}};o(e),$j(window).resize(debouncer(function(e){var i=window.innerWidth||$j(window).width();o(i)}))}function setCarouselArrows(){var e=window.innerWidth||$j(window).width(),o=function(e){e<480?($j(".carousel-products-mobile.slick-initialized").length||$j(".carousel-products.slick-initialized").length)&&($j(".carousel-products-mobile").each(function(){var e=$j(this).find(".slick-list .slick-track .slick-slide:first-child img").height();$j(this).find(".slick-arrow").css({top:e/2+"px"})}),$j(".carousel-products").each(function(){if($j(this).parent().parent().find(".carousel-products__button").length>0){var e=$j(this).find(".slick-list .slick-track .slick-slide:first-child img").height(),o=$j(this).parent().parent().find(".title-with-button").height();$j(this).parent().parent().find(".carousel-products__button").css({top:e/2+o+"px"})}})):$j(".carousel-products").each(function(){if($j(this).parent().parent().find(".carousel-products__button").length>0)$j(this).parent().parent().find(".carousel-products__button").css({top:""});else{var e=$j(this).find(".slick-list .slick-track .slick-slide:first-child img").height();$j(this).find(".slick-arrow").css({top:e/2+"px"})}})};o(e),$j(window).resize(debouncer(function(e){var i=window.innerWidth||$j(window).width();o(i)}))}function setMobileDrop(){var e,o=$j("body").innerWidth();e=function(e){e<1025?$j(".dropdown-menu--xs-full").each(function(){$j(this).css({width:e+"px"})}):$j(".dropdown-menu--xs-full").each(function(){$j(this).css({width:""})})},e(o),$j(window).resize(debouncer(function(o){var i=$j("body").innerWidth();e(i)}))}function handlerDropDownClose(){$j(".dropdown-menu__close").on("click",function(e){e.preventDefault(),$j(this).closest(".dropdown.open .dropdown-toggle").dropdown("toggle")})}function searchDropDown(){$j(".search__open").on("click",function(e){e.preventDefault(),$j(this).parent(".search").addClass("open"),$j(this).next("#search-dropdown, .search-dropdown").addClass("open"),$j("header .badge").addClass("badge--hidden")}),$j(".search__close").on("click",function(e){e.preventDefault(),$j(this).closest(".search").removeClass("open"),$j(this).closest("#search-dropdown, .search-dropdown").removeClass("open"),$j("header .badge").removeClass("badge--hidden")})}function footerCollapse(){$j(".mobile-collapse__title").on("click",function(e){e.preventDefault,$j(this).parent(".mobile-collapse").toggleClass("open")})}function productInsideCarousel(){$j(".product__inside__carousel").each(function(){var e=$j(this);e.carousel({interval:!1}),e.find(".carousel-control.next").on("click",function(){e.carousel("next")}),e.find(".carousel-control.prev").on("click",function(){e.carousel("prev")})})}function expanderList(){$j(".expander-list .expander").each(function(){$j(this).parent("li").hasClass("active")&&($j(this).next("ul").slideDown(0),$j(this).parent().addClass("open"))}),$j(".expander-list .expander").on("click",function(e){e.preventDefault;var o=$j(this).parent(),i=$j(this).next("ul");o.hasClass("open")?(o.removeClass("open"),i.slideUp(300)):(o.addClass("open"),i.slideDown(300))})}function collapseBlock(){$j(".collapse-block__content").each(function(){$j(this).parent(".collapse-block").hasClass("open")&&$j(this).slideDown(0)}),$j(".collapse-block__title").on("click",function(e){e.preventDefault;var o=$j(this).parent(),i=$j(this).next(".collapse-block__content");o.hasClass("open")?(o.removeClass("open"),i.slideUp(300)):(o.addClass("open"),i.slideDown(300))})}function priceSlider(){if($j(".price-slider").length){var e=document.getElementById("priceSlider");noUiSlider.create(e,{start:[100,900],connect:!0,step:1,range:{min:0,max:1e3}});var o=document.getElementById("priceMax"),i=document.getElementById("priceMin");e.noUiSlider.on("update",function(e,n){var t=e[n];n?o.value=t:i.value=t}),o.addEventListener("change",function(){e.noUiSlider.set([null,this.value])}),i.addEventListener("change",function(){e.noUiSlider.set([this.value,null])})}}function listingModeToggle(){$j("a.link-row-view").length&&$j("a.link-row-view").on("click",function(e){e.preventDefault(),$j(this).addClass("active"),$j("a.link-grid-view").removeClass("active"),$j(".product-listing").addClass("row-view")}),$j("a.link-row-view").length&&$j("a.link-grid-view").on("click",function(e){e.preventDefault(),$j(this).addClass("active"),$j("a.link-row-view").removeClass("active"),$j(".product-listing").removeClass("row-view")})}function backToTop(){$j(".back-to-top").length>0&&($j(".back-to-top").click(function(){return $j("html, body").animate({scrollTop:0},500),!1}),$j(window).scroll(function(){$j(window).scrollTop()>500?$j(".back-to-top").stop((!0).false).fadeIn(110):$j(".back-to-top").stop((!0).false).fadeOut(110)}))}function stuckNav(){$j(".stuck-nav").length>0&&(HeaderTop=$j(".header-layout-02").length&&window.innerWidth>1024?$j("#pageContent").offset().top:$j(".stuck-nav").offset().top,$j(window).scroll(function(){checkStickyPosition(),!!$j(".header-layout-02").length&&stickNav()}),$j(window).resize(function(){HeaderTop=$j("#pageContent").offset().top,checkStickyPosition(),!!$j(".header-layout-02").length&&($j(".stuck-nav").length&&window.innerWidth<=1024?$j(".stuck-nav").show():stickNav())}),checkStickyPosition())}function checkStickyPosition(){$j(window).scrollTop()>HeaderTop?$j(".stuck-nav").addClass("fixedbar"):$j(".stuck-nav").removeClass("fixedbar")}function stickNav(){$j(".stuck-nav").length&&window.innerWidth>1024&&($j(window).scrollTop()>$j("#header").innerHeight()?$j(".stuck-nav").show():$j(".stuck-nav").hide())}function blogPostSlider(){$j(".blogPostSlider").length>0&&$j(".blogPostSlider").slick({infinite:!0,slidesToShow:1})}function selectpicker(){$j(".selectpicker").length>0&&$j(".selectpicker").selectpicker({showSubtext:!0})}function submenuXposition(e){var o=window.innerWidth,i=e.offset().left,n=e.outerWidth(),t=parseInt(o-i-n-25);t<0&&e.css("left",t)}function submenuYposition(e){var o=window.innerHeight,i=$j(".stuck-nav").hasClass("fixedbar")?e.position().top:e.offset().top,n=e.outerHeight(),t=parseInt(o-i-n);t<0&&e.css({"max-height":n+t-25,overflow:"auto"})}function menuScroll(e){e.data.obj.removeAttr("style"),submenuXposition(e.data.obj),submenuYposition(e.data.obj)}function l9rectangle(){var e=$j(".l9-one-product-js");e.find(".row").removeAttr("style"),setTimeout(function(){var o=window.innerHeight,i=e.offset().top,n=e.outerHeight(),t=parseInt(o-i-n);t>0&&e.find(".row").css("padding-bottom",t)},100)}function initTabsGallery(){$j(".nav-tabs--ys-center a").each(function(){$j(this).click(function(){$j(this).unbind();var e=$j(this).attr("href"),o=e+"-clone";$j(e).empty(),$j(o).children().clone().appendTo($j(e));var i=$j(e).find(".carouselTab");i.css("visibility","hidden"),i.length&&setTimeout(function(){productCarousel(i,6,4,3,2,1),i.hide(),i.css("visibility","visible"),i.fadeIn(500)},5)})})}function initListingGalleryEvent(){$j(".coll-products-js").click(function(){$j(this).unbind(),listingGalleryEventHandler()})}function listingGalleryEventHandler(){$j(".coll-gallery").empty(),$j(".coll-gallery-clone").children().clone().appendTo(".coll-gallery"),verticalCarousel($j(".coll-gallery .vertical-carousel-2"),2)}var $j=jQuery.noConflict();$j(function(){$j("[placeholder]").focus(function(){var e=$j(this);e.val()==e.attr("placeholder")&&(e.val(""),e.removeClass("placeholder"))}).blur(function(){var e=$j(this);""!=e.val()&&e.val()!=e.attr("placeholder")||(e.addClass("placeholder"),e.val(e.attr("placeholder")))}).blur(),$j("[placeholder]").parents("form").submit(function(){$j(this).find("[placeholder]").each(function(){var e=$j(this);e.val()==e.attr("placeholder")&&e.val("")})})});var $cart=$j(".cart");$j(window).resize(headerCartSize),$j(".input-mobile").length&&$j(".input-desktop").length&&(changeInputNameCartPage(),$j(window).resize(changeInputNameCartPage)),jQuery(function(e){if($j("#off-canvas-menu").length>0){$j(document).bind("cbox_open",function(){$j("html").css({overflow:"hidden"})}).bind("cbox_closed",function(){$j("html").css({overflow:""})});var o=$j("body").hasClass("rtl")?"none":"0",i=$j("body").hasClass("rtl")?"0":"none";$j(".off-canvas-menu-toggle").colorbox({inline:!0,opacity:.55,transition:"none",arrowKey:!1,width:"300",height:"100%",fixed:!0,className:"canvas-menu",top:0,right:i,left:o,colorBoxCartPos:0})}}),$j(window).resize(function(){$j("#cboxClose").length&&window.innerWidth>1024&&$j("#cboxClose").trigger("click")}),jQuery(function(e){e("#off-canvas-menu .expander-list").find("ul").hide().end().find(" .expander").text("+").end().find(".active").each(function(){e(this).parents("li ").each(function(){var o=e(this),i=o.find("> ul"),n=o.find("> .name .expander");i.show(),n.html("&minus;")})}).end().find(" .expander").each(function(){var o=e(this),i="+"===o.text(),n=o.parent(".name").next("ul");o.next("a");o.click(function(){"block"==n.css("display")?n.slideUp("slow"):n.slideDown("slow"),e(this).html(i?"&minus;":"+"),i=!i})})});var HeaderTop="";jQuery(function(e){e(".header-layout-06 ").length>0&&(e(".header-layout-06 .icon-search").click(function(){e(".header-layout-06 .alignment-extra").toggleClass("width-extra")}),e(".header-layout-06 .icon-close").click(function(){e(".header-layout-06 .alignment-extra").toggleClass("width-extra")}))}),jQuery(function(e){e("header .cart").click(function(){e("#slider").toggleClass("slider-button")}),e("html.touch").length>0&&e(".product .product__inside__image a").click(function(e){e.preventDefault()})}),jQuery(function(e){e(".toggle-menu").length&&e(".toggle-menu .icon, .toggle-menu .close").click(function(){e(".toggle-menu .dropdown-menu").fadeToggle(20)})}),jQuery(function(e){e(".image-bg").length&&e(".image-bg").each(function(){var o=e(this).attr("data-image");e(this).css({"background-image":"url("+o+")"})})}),jQuery(function(e){if(e("#newsletterModal").length){var o=e("#newsletterModal").attr("data-pause");setTimeout(function(){e("#newsletterModal").modal("show")},o)}}),jQuery(function(e){e(".content--parallax, .carusel--parallax").length&&e(".content--parallax, .carusel--parallax").each(function(){var o=e(this).attr("data-image");e(this).css({"background-image":"url("+o+")"})})}),jQuery(function(e){e(".panel-group").on("show.bs.collapse",function(o){e(o.target).prev(".panel-heading").addClass("active")}).on("hide.bs.collapse",function(o){e(o.target).prev(".panel-heading").removeClass("active")})}),$j("nav").each(function(){$j(this).hasClass("navbar-vertical")||$j(this).find(".dropdown").each(function(){$j(this).hover(function(){var e=$j(this),o=e.find(".dropdown-menu");submenuXposition(o),submenuYposition(o),$j(window).bind("scroll",{obj:o},menuScroll)},function(){$j(this).find(".dropdown-menu").removeAttr("style"),$j(window).unbind("scroll",menuScroll)})})}),$j(".l9-one-product-js").length&&(l9rectangle(),$j(window).resize(l9rectangle)),$j(document).ready(function(){navbarClick(),countDown(),setMobileDrop(),handlerDropDownClose(),searchDropDown(),footerCollapse(),productInsideCarousel(),expanderList(),collapseBlock(),priceSlider(),compareSlideIni(),slideColumn(),backToTop(),stuckNav(),blogPostSlider(),selectpicker(),cartSlideIni(),changeInputNameCartPage(),inputCounter(),listingModeToggle(),productCarousel($j("#megaMenuCarousel1"),1,1,1,1,1,"productCarousel"),blogCarousel($j(".slider-blog"),1,1,1,1,1,"blogCarousel"),verticalCarousel($j(".vertical-carousel-1"),2,2,2,2,2,"verticalCarousel"),$j("body").addClass("loaded");var e;clearTimeout(e),e=setTimeout(function(){},500);var o;clearTimeout(o),o=setTimeout(function(){setCarouselArrows(),$j("#productPrevNext").length&&setProductArrows()},2e3)}),$j(window).resize(debouncer(function(e){elevateZoom1()})),$j(".nav-tabs--ys-center").length&&(initTabsGallery(),$j(".nav-tabs--ys-center .active a").trigger("click"),$j(window).resize(function(){$j(".nav-tabs--ys-center a").unbind(),initTabsGallery()})),$j(".coll-products-js").length&&($j(".coll-products-js").hasClass("open")?listingGalleryEventHandler():initListingGalleryEvent(),$j(window).resize(function(){$j(".coll-products-js").unbind(),initListingGalleryEvent(),$j(".coll-products-js").hasClass("open")&&listingGalleryEventHandler()})),jQuery(function(e){e(".gallery").length&&e(".gallery .zomm-gallery").magnificPopup({type:"image",gallery:{enabled:!0}})}),jQuery(function(e){var o="";e(".filter-nav div").click(function(){e("#all-filter-content").hide(0),e("#all-filter-content").fadeIn(500),e(".filter-nav div").removeClass("current"),e(this).addClass("current"),o=e(this).attr("rel"),e(".filter-content-item").not("."+o).fadeOut(),e("."+o).fadeIn(),e("#all-filter-content").fadeIn(0)})}),jQuery(function(e){e(".gallery-isotope").length&&e(".gallery-isotope .zomm-gallery").magnificPopup({type:"image",gallery:{enabled:!0}})}),jQuery(function(e){function o(){var o=window.innerWidth||$(window).width(),n=1;o>1199?n=5:o>991?n=4:o>767?n=3:o>480&&(n=2);var t=i.parent(".container").width(),s=t/n;i.find(".gallery__item").each(function(){e(this).hasClass("gallery__item--double")&&o>767?e(this).css({width:2*s+"px"}):e(this).css({width:s+"px"})});var l=i.find(".gallery__item:not(.gallery__item--double)").height();i.find(".gallery__item").each(function(){e(this).css({height:""}),e(this).hasClass("gallery__item--double")&&o>767&&e(this).css({height:2*l+"px"})}),i.isotope("layout")}var i=e(".gallery-isotope");i.imagesLoaded(function(){i.length&&(i.isotope({itemSelector:".gallery__item",isResizeBound:!1,masonry:{isFitWidth:!0}}),o())});var n=window.innerWidth||e(window).width();e(window).resize(debouncer(function(t){if(i.length){(window.innerWidth||e(window).width())!=n&&o(),n=window.innerWidth||e(window).width()}}))}),jQuery(function(e){if("devicePixelRatio"in window&&2==window.devicePixelRatio)for(var o=jQuery("img.replace-2x").get(),i=0,n=o.length;i<n;i++){var t=o[i].src;t=t.replace(/\.(png|jpg|gif)+$/i,"@2x.$1"),o[i].src=t}}),jQuery(function(e){e(".nav.navbar-nav li").hover(function(){e(this).addClass("hover")},function(){e(this).removeClass("hover")})});