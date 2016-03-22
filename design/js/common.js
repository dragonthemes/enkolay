$(document).ready(function(){	
	//Browse By tab start
	$(".browseByUl li a").click(function() {
		
		$(".browseByUl li a").removeClass("active");
		$(".browseTabCont").hide();
		
		$(this).addClass("active"); 
		var activeTab = $(this).attr("id");
		$('#'+activeTab+'_content').show();
	});	
	//Browse By tab end
	
	//Search for tab start
	$(".searchUl1 li a").click(function() {
		//$(".searchUl1 li a").removeClass("active");
		$(".saleRent").hide();
		
	//	$(this).addClass("active"); 
		var activeTab = $(this).attr("id");
		$('#'+activeTab+'_content').show();
	});
	//Search for tab end
	//Search Tab background changes start
	$(".searchUl1 li a.rent").click(function() {
		$(".searchUl1 li a.sale").addClass("rent1");									 	
		$(".searchUl1 li a.rent").addClass("sale1");
	});
	$(".searchUl1 li a.sale").click(function() {
		$(".searchUl1 li a.sale").removeClass("rent1");									 	
		$(".searchUl1 li a.rent").removeClass("sale1");
	});
	//Search Tab background changes end
});