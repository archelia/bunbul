function showsearch(){
	$(".search-dropdown").slideDown('fast', 'swing');
	$(".search-dropdown").css("overflow", "visible");
	$(".search-dropdown input").value="";
	$(".search-dropdown input").focus();
}
function showmsearch(){
	$(".mobile-menu").slideDown('fast', 'swing');
	$(".mobile-menu").css("overflow", "visible");
}

$(document).ready(function($){
	$('.search-button a').click(function(e){
		e.preventDefault();
	});		
	$('.mobile-menu-icon a').click(function(e){
		e.preventDefault();
	});	
	
	$('.add-comment>div>a').click(function(e){
		e.preventDefault();
		$(".popup").fadeIn('fast');
		$(".comment-pop").slideDown('slow', 'swing');
	});	
	$('.comment-pop .close').click(function(e){
		e.preventDefault();
		$(".popup").fadeOut('500');
		$(".pop").hide();
	});	
	$('.popup-login').click(function(e){
		e.preventDefault();
		$(".pop").hide();
		$(".popup").fadeIn('fast');
		$(".login-pop").slideDown('slow', 'swing');
	});	
	$('.login-pop .close').click(function(e){
		e.preventDefault();
		$(".popup").fadeOut('500');
		$(".pop").hide();
	});	
	$('.get-started a').click(function(e){
		e.preventDefault();
		$(".login-pop").slideUp('fast');
		$(".regis-pop").slideDown('slow', 'swing');
	});	
	$('.regis-pop .close').click(function(e){
		e.preventDefault();
		$(".popup").fadeOut('500');
		$(".pop").hide();
	});	
	$('.forgot').click(function(e){
		e.preventDefault();
		$(".login-pop").slideUp('fast');
		$(".forgot-pop").slideDown('slow', 'swing');
	});	
	$('.popup-sc').click(function(e){
		e.preventDefault();
		$(".shopping-cart.mini").toggle(function(){
			$(this).css("overflow","inherit");
		});
	});	
	
});
$(document).mouseup(function (e)
{
    var container = $(".search-dropdown");
	var triggerer = $(".search-button img");
    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0)// ... nor a descendant of the container
    {
		if(triggerer.is(e.target)){
			if(!container.is(':visible')) {
				showsearch();
			} else{
				container.hide();
			}
		}
        else {
			container.hide();
		}
    }
	
	var container2 = $(".mobile-menu");
	var triggerer2 = $('.mobile-menu-icon a');
	if (!container2.is(e.target) // if the target of the click isn't the container...
        && container2.has(e.target).length === 0) // ... nor a descendant of the container
    {
		if(triggerer2.is(e.target)){
			if(!container2.is(':visible')) {
				showmsearch();
			} else{
				container2.hide();
			}
		}
		else{
			container2.hide();
		}
    }
});