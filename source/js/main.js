$(document).ready(function($){	
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
});
