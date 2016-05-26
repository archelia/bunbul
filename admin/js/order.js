function loadcustomeraddress(){
	var idcust = $("#idcustomer").val();
	$.ajax({
		url: "../modules/ajaxselectcustomeraddress.php",
		type: "post",
		data: {idcust: idcust},
		success: function (response){
			$(".customeraddress ul")
			.empty()
			.append(response);
		},
		error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}
function loadavailablesize(){
	var idproduct = $("#idproduct").val();
	$.ajax({
		url: "../modules/ajaxloadsizeproduct.php",
		type: "post",
		data: {idproduct: idproduct},
		success: function (response){
			$("#productsize")
			.empty()
			.append(response);
		},
		error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}
function loadavailableqty(){
	var iditem = $("#productsize").val();
	$.ajax({
		url: "../../modules/ajaxloadstock.php",
		type: "post",
		data: {iditem: iditem},
		success: function (response){
			$("#productqty")
			.empty()
			.append(response);
		},
		error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}

$(document).ready(function(){
	// highlight
	var elements = $("input[type!='submit'], textarea, select");
	elements.focus(function() {
		$(this).parents('li').addClass('highlight');
	});
	elements.blur(function() {
		$(this).parents('li').removeClass('highlight');
	});
	$("#addorder").validate();
	$(".customeraddress").hide();	
	$(".productvarian").hide();	
	
	// search customer
	$(".search").keyup(function(){ 
		var searchid = $(this).val();
		var dataString = 'search='+ searchid;
		var dataSearch = $(this).attr("data-search");
		var ajaxUrl = "";
		var resultDiv = $(this);
		if(dataSearch=="customer"){
			ajaxUrl = "../modules/ajaxselectcustomer.php";
			resultDiv = $(".result-customer");					
		}
		else{
			ajaxUrl = "../modules/ajaxselectproduct.php";
			resultDiv = $(".result-product");
		}

		if(searchid!=''){
			$.ajax({
				type: "POST",
				url: ajaxUrl,
				data: dataString,
				cache: false,
				success: function(html)
				{
					resultDiv.html(html).show();
				}
			});
		}
		return false;    
	});

	// result for customer on click
	$(".result-customer").on("click",function(e){
		var clicked = $(e.target);
		var idcustomer = clicked.attr("data-idcust");
		$('#idcustomer').val(idcustomer);
		$('#searchid').val(clicked.attr("data-cust-name"));
		loadcustomeraddress();
		$(".customeraddress").show();			
	});
	
	// result for product on click
	$(".result-product").on("click",function(e){
		var clicked = $(e.target);
		var idproduct = clicked.attr("data-idproduct");
		$('#idproduct').val(idproduct);
		$('#productname').val(clicked.attr("data-prod-name"));		
		$(".productvarian").show();
		loadavailablesize();
		loadavailableqty();
	});
	
	// show the search result
		$('.search').click(function(){
		$(this).siblings(".result").fadeIn();
	});
	
	// close the search result
	$(document).on("click", function(e){ 
		var $clicked = $(e.target);
		if (!$clicked.hasClass("search")){
			$(".result").fadeOut(); 
		}
	});	
	
	$("#productsize").change(function() {
		loadavailableqty();
	});
});