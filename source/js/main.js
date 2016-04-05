$(document).ready(function($){		
	
	// mobile menus function
	$('.mobile-menu-icon a').click(function(e){
		e.preventDefault();
		if($('nav.mobile').hasClass("open")){
			$('nav.mobile').slideUp("fast");
			$('nav.mobile').removeClass("open");
		}
		else{
			$('nav.mobile').slideDown("slow");
			$('nav.mobile').addClass("open");
		}		
	});	
	// has sub mobile toggle
	$('.mobile ul li.hasub').click(function(e){		
		if($(this).children(".submenu").is(":visible")){
			$(this).removeClass("opened");
		} else {
			$(this).addClass("opened");
		}
		$(this).children(".submenu").toggle();
	});
	
	// back to top function
	$("scrol-top a").click(function(e){
		e.preventDefault();
		$("html, body").animate(
			{scrollTop: 0},
			{
				duration: 1200,
				easing: 'linear'
				// try using 'swing' too
				// 'easeInOutExpo' is supported with jQuery UI
			});
		return false;
	});
	
	// showing scroll to top when scrolling down	
	var timeout = null;
	$(window).scroll(function () {
		if (!timeout) {
			timeout = setTimeout(function () {          
				clearTimeout(timeout);
				timeout = null;
				if ($(window).scrollTop() >= 200) {
					$(".scrol-top").addClass("shown");
					$(".logo").addClass("hidden");
					$(".header-content").addClass("mobmode");
				}
				else{
					$(".scrol-top").removeClass("shown");
					$(".logo").removeClass("hidden");
					$(".header-content").removeClass("mobmode");
				}
			}, 250);
		}
	});
	
});
