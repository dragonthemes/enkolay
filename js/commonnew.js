//$(document).ready(function(){	
	// Font Family Changes
	$(".fontOption").change(function(){
		var fontOption = $( ".fontOption option:selected" ).text();
		$(".container div").css("font-family",fontOption);
	});
	// Font Color Changes
	/*$(".showPalette,.text-showPalette").spectrum({
		showPalette: true,
		palette: [["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)","rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)","rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)","rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)","rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)","rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]]
	});*/
	//colorchange();
	// Font Size Decrease Changes
	$(".minusfontSize,.text-minusfontSize").click(function(){
		var fontSize = $(".fontSize");
		fontSize.val( +fontSize.val() - 1 );
		var minussize = $(".fontSize").val()+"px";
		$("body").css("font-size",minussize);
	});
	// Font Size Increase Changes
	$(".plusfontSize,.text-plusfontSize").click(function(){
		var fontSize = $(".fontSize");
		fontSize.val( +fontSize.val() + 1 );
		var plussize = $(".fontSize").val()+"px";
		$("body").css("font-size",plussize);
	});
	// Font Weight Changes
	$(".fontWeight").change(function(){
		var fontWeight = $( ".fontWeight option:selected" ).text();
		$(".container *").css("font-weight",fontWeight);
	});
	$(".fontSize").keyup(function(){
		var fontpressSize = $( ".fontSize" ).val()+"px";
		$("body").css("font-size",fontpressSize);
	});
	//Text Formatting Tool	
	/*$(this).parent().prev().click(function(){
		$(".formattoolBg").slideToggle();
	});	*/
	
	
	$(".contentedit").mousedown(function(){

			$("#toolbar").show();
			$(".btn-toolbar").remove();
			var id = $(this).attr("id");
			var toolid = id.split('_');
			var tooltop = $(this).offset();
			var tooltoppara = $(this).offset();
			//$("#toolbar").css("top",tooltoppara.top-100);
			//$("#toolbar").css("top",tooltop.top-170);
			if(id == 'updateTitle'){
				$("#toolbar").css("top",(tooltop.top - 50));	
			}
			else{
				$("#toolbar").css("top",(tooltop.top - 80));	
			}
			$("#toolbar").css("left","28%");
			/*if(toolid[0] == 'buildTitle' || toolid[0] == 'buildContact' || toolid[0] == 'headingContent' || toolid[0] == 'headingdescription'){
				$("#toolbar").removeClass("fixed");
				$("#toolbar").css("top",tooltop.top-100);
				$("#toolbar").css("left","28%");
				$(window).scroll(function(){
					if($(window).scrollTop() > (tooltop.top-50)){
						$("#toolbar").removeClass("fixed");
						$("#toolbar").css("top",tooltop.top-100);
						$("#toolbar").css("left","28%");
					}
					if($(window).scrollTop() <= (tooltop.top-50)){
						$("#toolbar").removeClass("fixed");
						$("#toolbar").css("top",tooltop.top-100);
						$("#toolbar").css("left","28%");
					}
				});
			}
			if(toolid[0] == 'buildPara'){
				$("#toolbar").css("top",tooltoppara.top-100);
				$("#toolbar").css("left","28%");
				var toolpara = $("#toolbar").css("top");
				$(window).scroll(function(){
					if($(window).scrollTop() > (tooltoppara.top-50)){
						$("#toolbar").addClass("fixed");
						$("#toolbar").css("top","50px");
						$("#toolbar").css("left","41%");
					}
					if($(window).scrollTop() <= (tooltoppara.top-50)){
						$("#toolbar").removeClass("fixed");
						$("#toolbar").css("top",toolpara);
						$("#toolbar").css("left","28%");
					}
				});
			}
			if(toolid[0] == 'imgtitle'){
				$("#toolbar").css("top",tooltoppara.top-100);
				$("#toolbar").css("left","28%");
				var toolimg = $("#toolbar").css("top");
				$(window).scroll(function(){
					if($(window).scrollTop() > (tooltoppara.top-50)){
						$("#toolbar").addClass("fixed");
						$("#toolbar").css("top","50px");
						$("#toolbar").css("left","41%");
					}
					if($(window).scrollTop() <= (tooltoppara.top-50)){
						$("#toolbar").removeClass("fixed");
						$("#toolbar").css("top",toolimg);
						$("#toolbar").css("left","28%");
					}
				});
			}*/
			if(toolid[0] == 'buildTitle')
				$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertorderedlist','insertunorderedlist','strikethrough','removeFormat']});
			else if(toolid[0] == 'buildPara')
				$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertheading4','strikethrough','removeFormat']});
			else if(toolid[0] == 'buildImgTxt')
				$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertheading4','removeFormat']});
			else if(toolid[0] == 'buildContact')
				$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertorderedlist','insertunorderedlist','createlink','removeFormat']});
			else if(toolid[0] == 'headingContent')
				$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertorderedlist','insertunorderedlist','justifyleft','justifycenter','justifyright','justifyfull','removeFormat']});
			else if(toolid[0] == 'headingdescription')
				$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertorderedlist','insertunorderedlist','justifyleft','justifycenter','justifyright','justifyfull','removeFormat']});
			else if(toolid[0] == 'updateTitle')
				$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertorderedlist','insertunorderedlist','justifyleft','justifycenter','justifyright','justifyfull','createlink','removeFormat']});		
			else
			 	$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertheading4','insertorderedlist','insertunorderedlist','removeFormat']});
			$(this).freshereditor("edit", true);	
	});	
	
//});	

// Font Color Changes
function colorchange(color){
    
    
	var domain_id = $('#domain_id').val();
	var page_id = $('#page_id').val();
	idval = $('#clickid').val();
	idlist = idval.split('_');
	var name = idlist[0]+'_fontcolor';
	var colorchangeVal = $(color).css("background-color");
    //$(".backstatus1").removeClass("active");    
    //$("#theme_background").css("background","");
    $("#theme_background").css("background-color",colorchangeVal);
    /*$(".change_bg_color_popup_on").addClass("active");
    $.post("ajaxFile.php",{"action":"changeBackgroundColor","colorval":colorchangeVal},function(data){ 
        if(data=='N')
        {
            $("#theme_background").css("background-color",colorchangeVal);
        }
    });	*/
    
	//$('#'+idval).css("color",colorchangeVal);
	upval = colorchangeVal;
	page_list_id = idlist[1];
	/*if(activedivnew[0] == 'buildContact')
		{
			updateFontForContact(activedivnew[1],page_id,name,upval);
		}
	else
		{
			updateFontStyling(domain_id,page_id,page_list_id,name,upval);
		}
*/}
function rightcolor(){
	var domain_id = $('#domain_id').val();
	var page_id = $('#page_id').val();
	idval = $('#clickid').val();
	idlist = idval.split('_');
	var name = idlist[0]+'_fontcolor';
	var rightcolor = $(".sp-color").css("background-color");	
	$('#'+idval).css("color",rightcolor);
	upval = rightcolor;
	page_list_id = idlist[1];
	if(activedivnew[0] == 'buildContact')
		{
			updateFontForContact(activedivnew[1],page_id,name,upval);
		}
	else
		{
			updateFontStyling(domain_id,page_id,page_list_id,name,upval);
		}
}
// Link Function
function linkmame(){
	var linkmame = $(".linkname").val();
	$(".linkText").html("<a href="+linkmame+">"+linkmame+"</a>");	
}


/*$(".contentedit").click(function(){
	$(this).children(".formattoolBg").show();
});	
$(".formattoolBg").click(function(){
	$(".formattoolBg").show();
});	
$(document).on('mousedown', function (e) {
	if ($(e.target).closest(".contentedit,.formattoolBg").length === 0){
		$(".formattoolBg").hide();
	}
});*/
$(document).ready(function(){
$(document).click(function(event){
	 if($(event.target).closest(".contentedit,#toolbar").length == 0) { $("#toolbar").fadeOut(200); } 
	 if($(event.target).closest("#deletePopup,.deleteOuter").length == 0) { $("#deletePopup").fadeOut(200); } 
});
});

$(function() {
	$('.contentedit').on('keypress', function(e) {
		if (e.keyCode === 9) {
			e.preventDefault();
		}
	});
	$('.contentedit').keyup("v",function(e) {
	 	if(e.ctrlKey)
		{
			//var a = $(this).text();
			//$(this).html(a);
			//var a = $(this).html();
			$(this).find("*").removeAttr("style");
			$(this).find("img").remove();			
		}
	});
});
function closesizefont(){
	$("#jquery-colour-picker").hide();
}													   




