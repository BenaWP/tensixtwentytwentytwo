$(document).ready(function() {
	
	$(window).scroll(function() {
		if ($(this).scrollTop() > 1){  
			$('.page-title').addClass("sticky");
		}
		else{
			$('.page-title').removeClass("sticky");
		}
	});

	// Menu has children
	$( '<i class="fa fa-caret-down"></i>').insertAfter( $( '.menu-item-has-children > a' ) );

	$( '.sub-menu' ).hide();

	$(".fa-caret-down").on("click", function() {

		$(this).toggleClass("active").next().slideToggle();

		$(".contents").not($(this).next()).slideUp(300);

		$(this).siblings().removeClass("active");
	});

});
