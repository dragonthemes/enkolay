//$(document).ready(function(){
			/*$("#buildTitleLeft").click(function(){
				var domain_id = $('#domain_id').val();
				var page_id = $('#page_id').val();
				var name="title_select";
				updatePageListing(domain_id,page_id,name,"buildTitle");
			//	$("#buildTitle").show();
				//$("#buildTitle").parent().addClass("activemove");
			});
			$("#buildContactLeft").click(function(){
				var domain_id = $('#domain_id').val();
				var page_id = $('#page_id').val();
				var name = "contact_form";
				updatePageListing(domain_id,page_id,name,"buildContact");
				//$("#buildContact").show();
				//$("#buildContact").parent().addClass("activemove");
			});
			$("#buildDivideLeft").click(function(){
				var domain_id = $('#domain_id').val();
				var page_id = $('#page_id').val();
				var name = "divider";
				updatePageListing(domain_id,page_id,name,"buildDivide");
				//$("#buildDivide").show();
			//	$("#buildDivide").parent().addClass("activemove");
			});
			$("#buildParaLeft").click(function(){
				var domain_id = $('#domain_id').val();
				var page_id = $('#page_id').val();
				var name = "description_select";
				updatePageListing(domain_id,page_id,name,"buildPara");
				//$("#buildPara").show();
			//	$("#buildPara").parent().addClass("activemove");
			});
			$("#buildImgTxtLeft").click(function(){
				var domain_id = $('#domain_id').val();
				var page_id = $('#page_id').val();
				var name = "image_multiple_select";
				updatePageListing(domain_id,page_id,name,"buildImgTxt");
				//$("#buildImgTxt").show();
			//	$("#buildImgTxt").parent().addClass("activemove");
			});
			$("#buildImgLeft").click(function(){
				var domain_id = $('#domain_id').val();
				var page_id = $('#page_id').val();
				var name = "image_select";
				updatePageListing(domain_id,page_id,name,"buildImg");
				//$("#buildImg").show();
			//	$("#buildImg").parent().addClass("activemove");
			});
			/*$("#buildImgLeft").click(function(){
				$("#vinoth").show();
			});
			$("#buildSearchLeft").click(function(){
				$("#buildSearch").show();
			//	$("#buildSearch").parent().addClass("activemove");
			/*});
			$("#buildButtonLeft").click(function(){
				$("#buildButton").show();
			//	$("#buildButton").parent().addClass("activemove");
			});
			$("#buildSocialLeft").click(function(){
				var domain_id = $('#domain_id').val();
				var page_id = $('#page_id').val();
				var name = "social_plugins";
				updatePageListing(domain_id,page_id,name,"buildSocial");
				//$("#buildSocial").show();
			//	$("#buildSocial").parent().addClass("activemove");
			});	
			$("#youtubeVideo").click(function(){
				var domain_id = $('#domain_id').val();
				var page_id = $('#page_id').val();
				var name = "youtube_video";
				updatePageListing(domain_id,page_id,name,"youtube_video");
				//$("#buildSocial").show();
			//	$("#buildSocial").parent().addClass("activemove");
			});			*/
			$( "#sortable" ).sortable({
				update: function(event, ui) {
					$.post("ajaxFile.php", { pages: $('#sortable').sortable('serialize') } );
				},
				cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.galleryimagepop,.galleryimage',
								handle: ".controlMidBg"
    		});
    	
			$( ".contentedit" ).attr("contentEditable",true);
			$(".closeImg").click(function(){
				$(this).next(".contentedit").hide();
				$(this).next("#buildImg").hide();
			});	

    $('#photoimg').die('click').live('change', function()			{ 
		        $("#imageform").ajaxForm({target: '#preview', 
			     beforeSubmit:function(){ 
			     	$("#imageloadstatus").show();
				 	$("#imageloadbutton").hide();
				 }, 
				success:function(){ 
				 $("#imageloadstatus").hide();
				 $("#imageloadbutton").hide();
				 window.location = jssitebaseUrl+'/main.php';
				}, 
				error:function(){ 
				    $("#imageloadstatus").hide();
					$("#imageloadbutton").show();
				} }).submit();
		});
	$("#buildContact input").click(function(){
			$(".contactlabelsPopup").show();
		});
		
		$(".spacingOption").change(function(){
			var spacingOption = $( ".spacingOption option:selected" ).text();
			if(spacingOption == 'None'){
				$("#buildContact input").css("margin","0px");
			}
			if(spacingOption == 'Small'){
				$("#buildContact input").css("margin","5px 0px");
			}
			if(spacingOption == 'Medium'){
				$("#buildContact input").css("margin","10px 0px");
			}
			if(spacingOption == 'Large'){
				$("#buildContact input").css("margin","15px 0px");
			}
		});
		$(".widthOption").change(function(){
			var widthOption = $( ".widthOption option:selected" ).text();
			if(widthOption == 'Small'){
				$("#buildContact input").css("width","50%");
			}
			if(widthOption == 'Medium'){
				$("#buildContact input").css("width","70%");
			}
			if(widthOption == 'Large'){
				$("#buildContact input").css("width","100%");
			}
		});
	$("#change-fonts-button").click(function(){
			$("#fontlist").slideDown();
		});
		$("#fontlist li").click(function(){
			var fontname = $(this).html();
			$("body").css("cssText", "font-family:"+fontname+" !important");
		});
//});
function popclose(){
		$(".contactlabelsPopup").hide();
		$("#contactmask").hide();
		$(".contactform").css({"position":"static","z-index":0,"background":"none","padding":0+"px","width":"auto"});
	}
$(".clickheretext").click(function(){
	$(this).removeClass("contenttext");
});
$(".clickheretext").mouseleave(function(){
	if($(this).text() == ''){
		$(this).addClass("contenttext");
	}
	if($(this).text() != ''){
			$(this).removeClass("contenttext");
	}
	/*if($(this).text() == ''){
		$(this).removeClass("contenttext");
	}
	if($(this).text() != ''){
		$(this).addClass("contenttext");
	}*/
});


function toolbar(toolbar){
	$("#toolbar").show();
	$(".btn-toolbar").remove();
	var tooltop = $(toolbar).offset();
	$("#toolbar").css("top",tooltop.top-100);
	$(toolbar).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertheading4']});
	$(toolbar).freshereditor("edit", false);
}
function edittext(edit){
	$(edit).removeClass("contenttext");	
}

