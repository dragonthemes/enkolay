
var currHeight;
function HiddenResize1 () {
	/*$('.nivoSliderImg').css({overflow:'visible',background:'none'});
	setTimeout (function(){
		$('.nivo-main-image').stop().animate({opacity:0},500);
		currHeight=$('.nivoSliderImg').data('nivo:vars').currentImage.height();
	},10);*/
}
function HiddenResize2 () {
	//$('.nivo-main-image').css({opacity:1,height:currHeight});
} 
$(document).ready(function(){
	 /* $(".map_resize").resizable({
		  handles: 'e, w',
		  resize: function(event, ui) {
			  var outer = $("#rightColumn").width();
			  if(ui.position.left<0) { ui.position.left = 0; }
			  if(ui.size.width>outer) { ui.size.width = outer;$(this).css("width",outer); }
		  },
		  stop: function(event, ui) {
			  var width = ui.size.width;
			  var height = ui.size.height;
			  var idimg = $(this).parent().attr("id"); 
			  var id = idimg.split('_');
		  }
	  });*/
	$(".responsive_slideshow").responsiveSlides({
		nav: true,  
		prevText: "Previous",
  		nextText: "Next", 
		before: function(){
			var screenheight = screen.height;
			var imageheight = (screenheight/100)*50;
		},
		after: function(){
			var screenheight = screen.height;
			var imageheight = (screenheight/100)*50;
			var outerheight = $(".responsive_slideshow img").height();
		}	
	});
	$('.slider3').bxSlider({
		slideWidth: 450,
		minSlides: 1,
		maxSlides: 1,
		moveSlides: 1,
	});
	//$("#sortableImg" ).sortable();
	$('.slider2').bxSlider({
			slideWidth: 300,
			minSlides: 1,
			maxSlides: 1,
			moveSlides: 1,
		});
	});
	/*$('.nivoSliderImg').nivoSlider({
		effects: 'fade',
		beforeChange: function(){HiddenResize1()},
		afterChange: function(){HiddenResize2()}
	});	*/
	 $('#slider2').nivoSlider();
	 $('#slider3').nivoSlider();
	 $(".publishClose").click(function(){
		  $(".navListtop").removeClass("active");
	  });
	  $(".contactform").click(function() {
		  $("#toolbar").removeClass("toolzindex");
		  $(this).css({"position":"absolute","z-index":10720,"background":"#ffffff","padding":10+"px","width":100+"%","-moz-box-sizing": "border-box","box-sizing": "border-box","-webkit-box-sizing": "border-box"});
		  $("#contactmask").show();
		  $("#contactmask").css({"z-index":1010});
		  //$("#jquery-colour-picker,#toolbar").css({"z-index":21001});
		  $(".contactSaveButt").show();
	  });	
	  $("#dropBox2 .contactform").click(function() {
		  $("#contactmask").hide();
	  });
	  $("#contactmask").click(function() {
		  $(".contactform").css({"position":"static","z-index":0,"background":"none","padding":0+"px","width":"auto"});
		  $("#contactmask").hide();
		  $(".contactSaveButt").hide();
	  });	
	  $(".contactSaveButt").click(function() {
		  $(".contactform").css({"position":"static","z-index":0,"background":"none","padding":0+"px","width":"auto"});
		  $("#contactmask").hide();
	  });	
	  $("ul.TopMenuNavList li a").click(function() {
		  $("ul.TopMenuNavList li a").removeClass("active");
		  $(this).addClass("active");
	  });	
	  $("ul.TopMenuNavListSec li a").click(function() {
		  $("ul.TopMenuNavListSec li a").removeClass("active");
		  $(this).addClass("active");
	  });	
	  $("select.nav.fontfamily option,.fontlistdiv select option, .selectlist select option").click(function() {
		  $("select.nav.fontfamily option,.fontlistdiv select option, .selectlist select option").removeClass("active");
		  $(this).addClass("active");
	  });
	  $("ul.buildSection li a").click(function() {
		  $("ul.buildSection li a").removeClass("active");
		  $(this).addClass("active");
	  });	
	  $("ul.mainLeftPanelUl li a").click(function() {
		  $("ul.mainLeftPanelUl li a").removeClass("active");
		  $(this).addClass("active");
		  $(".mainLeftPanelUlContent").hide();
		  $(this).parent().children(".mainLeftPanelUlContent").show();
	  });	
	  $(".mainTabNav").click(function(){
		  $(".mainLeftArrow,.mainRightArrow").hide();
	  });
	  $(".mainTabNav.basicnav").click(function(){
		  $(".mainLeftArrow,.mainRightArrow").show();
	  });
	  $("ul li.listbox").click(function() {
		  $("ul li.listbox").removeClass("active");
		  $(this).addClass("active");
	  });	
	  $(".blogPageBgInnerTab4 a").click(function() {
		  $(".blogPageBgInnerTab4 a").removeClass("active");
		  $(this).addClass("active");
	  });
	  $("#selection .onboardsite").click(function() {
		  $("#selection").hide();
		  $("#themeselection").show();
	  });	
	  $("#selection .onboardblog").click(function() {
		  $("#selection").hide();
		  $("#blogthemeselection").show();
	  });
	  $("#selection .onboardstore").click(function() {
		  $("#selection").hide();
		  $("#storethemeselection").show();
	  });
	  $('#selection .onboardsite').keypress(function(e){
		   var code = (e.keyCode ? e.keyCode : e.which);
			if(code == 13) {
			  $("#selection").hide();
			  $("#themeselection").show();
			}
	  });
	  $('#selection .onboardblog').keypress(function(e){
		   var code = (e.keyCode ? e.keyCode : e.which);
			if(code == 13) {
			  $("#selection").hide();
			  $("#blogthemeselection").show();
			}
	  });
	  $('#selection .onboardstore').keypress(function(e){
		   var code = (e.keyCode ? e.keyCode : e.which);
			if(code == 13) {
			  $("#selection").hide();
			  $("#storethemeselection").show();
			}
	  });
	  $('.loginPop.dropdown').click(function(){
				$(this).addClass('open');
			});
			$('.mysiteNavList.dropdown').click(function(){
				$(this).addClass('open');
			});
			$('.headerLangListSec.dropdown').click(function(){
				$(this).addClass('open');
			});
			$('.headerLangList.dropdown').click(function(){
				$(this).addClass('open');
			});
			$('.draftCommentList.dropdown').click(function(){
				$(this).addClass('open');
			});
			$( "#droppable_content" ).sortable({
				update: function(event, ui) {
					$.post("ajaxFile.php", { pages: $('#droppable_content').sortable('serialize') } );
				},
				cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount',
								handle: ".controlMidBg"
			});
			$( "#sortable_1" ).sortable({
				update: function(event, ui) {
					$.post("ajaxFile.php", { pages: $('#sortable_1').sortable('serialize') } );
				},
				cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount',
								handle: ".controlMidBg"
			});
			$( "#sortable_2" ).sortable({
				update: function(event, ui) {
					$.post("ajaxFile.php", { pages: $('#sortable_2').sortable('serialize') } );
				},
				cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount',
								handle: ".controlMidBg"
			});
			$( "#sortable_3" ).sortable({
				update: function(event, ui) {
					$.post("ajaxFile.php", { pages: $('#sortable_3').sortable('serialize') } );
				},
				cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount',
								handle: ".controlMidBg"
			});
			$( "#sortable_4" ).sortable({
				update: function(event, ui) {
					$.post("ajaxFile.php", { pages: $('#sortable_4').sortable('serialize') } );
				},
				cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount',
								handle: ".controlMidBg"
			});
			$( "#sortable_5" ).sortable({
				update: function(event, ui) {
					$.post("ajaxFile.php", { pages: $('#sortable_5').sortable('serialize') } );
				},
				cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount',
								handle: ".controlMidBg"
			});
			$( ".contentedit" ).attr("contentEditable",true);
							
    		$('#photoimglogo').die('click').live('change', function()			{ 
			        $("#imageformlogo").ajaxForm({target: '#preview', 
				     beforeSubmit:function(){ 
				     	$("#imageloadstatus").show();
					 	$("#imageloadbutton").hide();
					 }, 
					success:function(){ 
					 $("#imageloadstatus").show();
					 $("#imageloadstatuslogo").show();
					 $("#imageloadbutton").hide();
					 window.location = jssitebaseUrl+'/main.php';
					}, 
					error:function(){ 
					    $("#imageloadstatus").hide();
						$("#imageloadbutton").show();
					} }).submit();
			});
		
		 $('#slimgphoto').die('click').live('change', function()			{ 
			        $("#slimagephotogal").ajaxForm({target: '#preview', 
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
			$( ".onboardsite" ).click(function() {
			$( ".themeselectionOuter").slideUp( 300 ).delay( 0 ).fadeIn( 300 );
		});
		$( ".themebackTop" ).click(function() {
			$( ".themeselectionOuter").slideDown( 300 ).delay( 0 ).fadeOut( 300 );
			$( ".siteBlockOuter").slideUp( 300 ).delay( 0 ).fadeIn( 300 );
		});
		$( ".onboardblog" ).click(function() {
			$( ".blogselectionOuter").slideUp( 300 ).delay( 0 ).fadeIn( 300 );
			$( ".blockbackTop").slideDown( 300 );
		});
		$( ".blockbackTop" ).click(function() {
			$( ".blogselectionOuter").slideDown( 300 ).delay( 0 ).fadeOut( 300 );
			$( ".siteBlockOuter").slideUp( 300 ).delay( 0 ).fadeIn( 300 );
		});
		$( ".onboardstore" ).click(function() {
			$( ".storeselectionOuter").slideUp( 300 ).delay( 0 ).fadeIn( 300 );
			$( ".storebackTop").slideDown( 300 );
		});
		$( ".storebackTop" ).click(function() {
			$( ".storeselectionOuter").slideDown( 300 ).delay( 0 ).fadeOut( 300 );
			$( ".siteBlockOuter").slideUp( 300 ).delay( 0 ).fadeIn( 300 );
		});
		$('.onboardsite').keypress(function(e){
		     var code = (e.keyCode ? e.keyCode : e.which);
		      if(code == 13) {
		      	$( ".themeselectionOuter").slideUp( 300 ).delay( 0 ).fadeIn( 300 );
			  }
		});
		$( ".onboardblog" ).keypress(function(e){
		     var code = (e.keyCode ? e.keyCode : e.which);
		      if(code == 13) {
		      	$( ".blogselectionOuter").slideUp( 300 ).delay( 0 ).fadeIn( 300 );
				$( ".blockbackTop").slideDown( 300 );
			  }
		});
		$( ".onboardstore" ).keypress(function(e){
		 var code = (e.keyCode ? e.keyCode : e.which);
		  if(code == 13) {
		  	$( ".storeselectionOuter").slideUp( 300 ).delay( 0 ).fadeIn( 300 );
			$( ".storebackTop").slideDown( 300 );
		  }
		});
		$( ".themewrapper1 .logoresize" ).resizable({
					stop: function(event, ui) {
						var width = ui.size.width;
						var height = ui.size.height;
						var domain_id = $('#domain_id').val();
						updateLogoForDomain(domain_id,width,height);
					}
			});
			$(".logodiv").draggable();
			$( ".mainPageThmeTitle" ).attr("contentEditable",true);
			$( ".uploadImgBg img.imagechange" ).hover(function(){
				/*$(this).resizable({
					handles: 'se',
					aspectRatio: true,
					resize: function(event, ui) {
						var outer = $("#dropBox").width()-16;
						var outerheight = $(".uploadImgBg").height();
						if(ui.position.left<0) { ui.position.left = 0; }
						if(ui.size.width>outer) { ui.size.width = outer;$(this).css("width",outer); }
					},
					stop: function(event, ui) {
						var width = ui.size.width;
						var height = ui.size.height;
						var idimg = $(this).parent("a").parent(".uploadImgBg").parent().attr("id"); 
						var id = idimg.split('_');
						updateImageForPage(id[1],width,height);
					}	
				});	*/
			});
			//$( ".uploadImgBg img.imagechangeNew").resizable();
			$( ".uploadImgBg img.imagechangeNew" ).hover(function(){			
				$(this).resizable({
					handles: 'se',
					aspectRatio: true,
					resize: function(event, ui) {
						var outer = $("#dropBox").width()-16;
						if(ui.position.left<0) { ui.position.left = 0; }
						if(ui.size.width>outer) { ui.size.width = outer;$(this).css("width",outer); }
					},
					stop: function(event, ui) {
						var width = ui.size.width;
						var height = ui.size.height;
						var idimg = $(this).parent(".uploadImgBg").parent(".buildImgTxt").parent(".row-fluid").parent().attr("id"); 
						var id = idimg.split('_');
						updateImageForPage(id[1],width,height);
					}	
				});	
			});
			$( ".hideupload img" ).hover(function(){			
				$(this).resizable({
					stop: function(event, ui) {
						var width = ui.size.width;
						var height = ui.size.height;
						var idimg = $(this).parent(".uploadImgBg").parent().attr("id"); 
						var id = idimg.split('_');
						updateImageForPage(id[1],width,height);
					}	
				});	
			});
			$(".indexViwePort a.viewImg").click(function() {
				$(".indexViwePort a.viewImg").removeClass("active");
				$(this).addClass("active");
			});	
			var winHeiclock = $(window).height();
			$(".headerLangList").css({"top":winHeiclock - 28});
			var winHei = $(window).height();
			var rightPannalWidt = $(".indexRightPanel").width();
			$(".startSomethimgBanner,.indexpowersupport,#index_feature,.indexModernThemeSel,#index_work").css({"height":winHei});
			$(".indexpowersupport").css({"width":rightPannalWidt});
			$(".indexpowersupport").css({"height":winHei});
			var winHei = $(window).height();
			$(".startSomethimgBanner").css({"height":winHei});
			var themeBannerDocHei = $(document).height();
			$('.bannerClick1').click(function(){
				var a = $(".startSomethimgBanner").height();
				$(window).scrollTop(a);
			});
			$('.bannerClick2').click(function(){
			var b = $(".indexpowersupport").height()+$(".startSomethimgBanner").height();
			$(window).scrollTop(b);
		});
		$('.bannerClickTop1').click(function(){
			$(window).scrollTop(0);
		});
		$('.bannerClick3').click(function(){
			var c = $("#index_feature").height()+ $(".indexpowersupport").height()+$(".startSomethimgBanner").height()+$(".indexBottSeperator").height();
			$(window).scrollTop(c);
		});
		$('.bannerClickTop2').click(function(){
			var f = $(".startSomethimgBanner").height();
			$(window).scrollTop(f);
		});
		$('.bannerClick4').click(function(){
			var d = $(".indexModernThemeSel").height()+$("#index_feature").height()+ $(".indexpowersupport").height()+$(".startSomethimgBanner").height()+$(".indexBottSeperator").height();
			$(window).scrollTop(d);;
		});
		$('.bannerClickTop3').click(function(){
			var g = $(".startSomethimgBanner").height()+$("#index_feature").height();
			$(window).scrollTop(g);
		});
		$('.bannerClick5').click(function(){
			var e = $("#index_work").height()+ $(".indexModernThemeSel").height()+$("#index_feature").height()+ $(".indexpowersupport").height()+$(".startSomethimgBanner").height()+$(".indexBottSeperator").height();
			$(window).scrollTop(e);
		});
		$('.bannerClickTop4').click(function(){
			var h = $(".startSomethimgBanner").height()+$("#index_feature").height()+$(".startSomethimgBanner").height();
			$(window).scrollTop(h);
		});
		/*$(".buildSocialIcon").click(function(e){	
			$(".socialPop").show();
            alert(e.target.id);
		});*/
        
        function showSocialPopup(id)
        {
            $("#pluginShow_"+id).show();
        }
        
		$( ".imageGallery" ).click(function() {
			$(".galleryimageInn").slideDown();
			//$(this).children(".galleryimageInn").slideDown();
		});
		$(".gallerycancel").click(function() {
			$(".galleryimagepop").slideUp();
			$(".galleryimageInn").hide();
		});
		$(".mapcancel").click(function() {
			$(".mappop").slideUp();
		});
		$(".addGoogCancel").click(function() {
			$(".addGoogPop").slideUp();
		});
		var blockSort = true;
	$(".leftuldiv").sortable();
	$(".leftuldiv").bind('sortreceive', function () {
		blockSort = false;
	}).bind('sortstop', function (e) {
		if (blockSort) {
			e.preventDefault();
		}
		blockSort = true;
	});
	$(".columnOption").change(function(){
			var columnOption = $( ".columnOption option:selected" ).text();
			if(columnOption == '2'){
				$(".imageGallery").css({"width":"49.95%","min-height":"299px","max-height":"299px"});
			}
			if(columnOption == '3'){
				$(".imageGallery").css({"width":"33.28%","min-height":"199px","max-height":"199px"});
			}
			if(columnOption == '4'){
				$(".imageGallery").css({"width":"24.95%","min-height":"150px","max-height":"150px"});
			}
			if(columnOption == '5'){
				$(".imageGallery").css({"width":"19.95%","min-height":"120px","max-height":"120px"});
			}
			if(columnOption == '6'){
				$(".imageGallery").css({"width":"16.62%","min-height":"100px","max-height":"100px"});
			}
		});
		
		$(".imagespacingOption").change(function(){
			var imagespacingOption = $( ".imagespacingOption option:selected" ).text();
			if(imagespacingOption == 'None'){
				$(".imageGallery").css("margin","0px 0px");
			}
			if(imagespacingOption == 'Small'){
				$(".imageGallery").css("margin","5px 0px");
			}
			if(imagespacingOption == 'Medium'){
				$(".imageGallery").css("margin","10px 0px");
			}
			if(imagespacingOption == 'Large'){
				$(".imageGallery").css("margin","15px 0px");
			}
		});
		$(".borderOption").change(function(){
			var borderOption = $( ".borderOption option:selected" ).text();
			if(borderOption == 'None'){
				$(".imageGallery img").css("border","0px solid #ddd");
			}
			if(borderOption == 'Thin'){
				$(".imageGallery img").css("border","2px solid #ddd");
			}
			if(borderOption == 'Medium'){
				$(".imageGallery img").css("border","3px solid #ddd");
			}
			if(borderOption == 'Thick'){
				$(".imageGallery img").css("border","4px solid #ddd");
			}
		});
		$('.BlogNewPost').click(function(){
			 	$('.BlogNewPostPopup').show();
				//$('.blogMask').show();
			});
			$(".sucriptionPageLeft .subcriptionPlan:first .subcriptionPlanContent").show();
			$('.subcriptionPlan').find('.subcriptionPlanHead').click(function(){
				$('.subcriptionPlanHead').removeClass("active");
				$(this).addClass("active");
				$(".subcriptionPlanContent").hide();				
				$(this).next().slideToggle('fast');
				$(".subcriptionPlanContent").not($(this).next()).slideUp('fast');
			});
			$('.myAccTab').find('.myAccTabHead').click(function(){
				$(".myAccTabCont").hide();				
				$(this).next().slideToggle('slow');
				$(".myAccTabCont").not($(this).next()).slideUp('slow');
			});
			$('.AccInfoRhtInnerButton').click(function(){
				$(this).next().slideToggle('slow');
			});
			$('.NoSlidePopOuterImg,.NoSlidePopOuterImgSec').click(function(){
				$('.SlideUploadInner').addClass('in');
				$('.SlideUploadInner').removeClass('hide');
			});
			
			$('.NoSlideColumPopOuterImg,.NoSlideColumPopOuterImgSec').click(function(){
				$('.SlideColumnUploadInner').addClass('in');
				$('.SlideColumnUploadInner').removeClass('hide');
				$('.sample2').css({'z-index':'inherit'});
			});
			$(".sucriptionPageLeft .subcriptionPlan:first .subcriptionPlanContent").show();
			$('.subcriptionPlan').find('.subcriptionPlanHead').click(function(){
				$('.subcriptionPlanHead').removeClass("active");
				$(this).addClass("active");
				$(".subcriptionPlanContent").hide();				
				$(this).next().slideToggle('fast');
				$(".subcriptionPlanContent").not($(this).next()).slideUp('fast');
			});
			$('.myAccTab').find('.myAccTabHead').click(function(){
				$(".myAccTabCont").hide();				
				$(this).next().slideToggle('slow');
				$(".myAccTabCont").not($(this).next()).slideUp('slow');
			});
			$('.AccInfoRhtInnerButton').click(function(){
				$(this).next().slideToggle('slow');
			});
			var tdcount = $(".sample2 tr td").length;
			if(tdcount == 2){
				var columnwidth = $(".sample2").width() - 60;
				var newwidth = columnwidth/tdcount;
				$(".sortcolumn").css("max-width",newwidth);
				$(".sortcolumn").css("width",newwidth);
				$(".tablewidthmax").css("max-width",newwidth);
				$(".tablewidthmax").css("width",newwidth);
			}	
			if(tdcount == 3){
				var columnwidth = $(".sample2").width() - 90;
				var newwidth = columnwidth/tdcount;
				$(".sortcolumn").css("max-width",newwidth);
				$(".sortcolumn").css("width",newwidth);
				$(".tablewidthmax").css("max-width",newwidth);
				$(".tablewidthmax").css("width",newwidth);
			}	
			if(tdcount == 4){
				var columnwidth = $(".sample2").width() - 120;
				var newwidth = columnwidth/tdcount;
				$(".sortcolumn").css("max-width",newwidth);
				$(".sortcolumn").css("width",newwidth);
				$(".tablewidthmax").css("max-width",newwidth);
				$(".tablewidthmax").css("width",newwidth);
			}	
			if(tdcount == 5){
				var columnwidth = $(".sample2").width() - 150;
				var newwidth = columnwidth/tdcount;
				$(".sortcolumn").css("max-width",newwidth);
				$(".sortcolumn").css("width",newwidth);
				$(".tablewidthmax").css("max-width",newwidth);
				$(".tablewidthmax").css("width",newwidth);
			}
			var headLimitWidth1 = $(".mainRhtBannerInnerRight,.bannerrightCont").width();
	var headWidth1 = $(".headlimit").width() +10;
    
	if(headWidth1 < headLimitWidth1){
		$(this).attr("contenteditable","true");
		$(".mainRhtBannerInnerRight,.bannerrightCont").removeClass("textends");
	}
    
	if(headWidth1 > headLimitWidth1){
	    
		$(this).attr("contenteditable","false");
		$(".mainRhtBannerInnerRight,.bannerrightCont").addClass("textends");
	}
	$(".headlimit").keypress(function(event){
		var headLimitWidth = $(".mainRhtBannerInnerRight,.bannerrightCont").width();
		var headWidth = $(".headlimit").width() +10;
		if(headWidth < headLimitWidth){
			$(this).attr("contenteditable","true");
			$(".mainRhtBannerInnerRight,.bannerrightCont").removeClass("textends");
		}        
		if(headWidth > headLimitWidth){
			$(this).attr("contenteditable","false");
			$(".mainRhtBannerInnerRight,.bannerrightCont").addClass("textends");
		}
		if((headWidth > headLimitWidth) && (event.which == 8)){		  
			$(this).attr("contenteditable","true");
			$(".mainRhtBannerInnerRight,.bannerrightCont").removeClass("textends");
		}
		if(event.which == 0){		  
			$(this).attr("contenteditable","true");
			$(".mainRhtBannerInnerRight,.bannerrightCont").removeClass("textends");
		}
		$("#dropBox2 .deleteBg").click(function(){
		var leftvalue = $(this).offset().left - 100;
		$("#deletePopup").css("left",leftvalue);
	});
	$(".tableslider").click(function(){
		$("#maska").remove();
		$("#maskatable").show();
	});
	$(".closetableslider").click(function(){
		$("#maskatable").hide();
	});	
	$("#maska").mousedown(function(){
		return false;
	});
	$(window).resize(function(){
		var midbuildheight = $(window).height() - ($("#draggable_content").height()+$(".headerSec").height());
	});
	$("#change-theme-button").click(function(){
			$(".bgWrapper").css("background","none");
		});		
		var midbuildheight = $(window).height() - ($("#draggable_content").height()+$(".headerSec").height());
		});
		function alignmentImage(id,align){
		   var alignment = $(align).val();
		   $('#'+id).css("text-align",alignment);
		}
		function socialaligns(id)
        {
			var align = $("#socialalign"+id).val();
                
			$("#buildSocial_"+id).css("text-align",align);
		}
		var columntd = $(".sample2 tr td").length;
		var columnwidth = $(".sample2").width() / $(".sample2").parent().width() * 100;
		var attr = $(".sample2 tr td").attr('style');
		var tdone = $(".sample2 tr td:first").width();
		var tdtwo = $(".sample2 tr td:nth-child(2)").width();
		var tdthree = $(".sample2 tr td:nth-child(3)").width();
		var tdfour = $(".sample2 tr td:nth-child(4)").width();
		var tdfive = $(".sample2 tr td:nth-child(5)").width();
		var colpagelist = $(".sample2 tr td").find(".columnpagelistid").val();	
		function selecttochange(tdcountvar,pagelistid){
			var countval = $(tdcountvar).val();
			var tdcount = $(".sample2 .column_inner_div").length;			
			$(".sample2 .column_inner_div").attr("contenteditable","true");
			updateColoumCount(countval,pagelistid);
			
		}	
		function loadIframe(iframeName, url) {
			var $iframe = $('#' + iframeName);
			if ( $iframe.length ) {
				$iframe.attr('src',url);   
				return false;
			}
			return true;
		}
		function after(){
		   $(".loadmask").show();
		   $(".ui-loader").show();
		}
		function hidemask(){
		   $(".loadmask").hide();
		   $(".ui-loader").hide();
		}
		window.onbeforeunload=before;				
		function before(){
		   $(".loadmask").show();
		   $(".ui-loader").show();
		}	
		
		
	  /*//////////F12 disable code////////////////////////
			document.onkeypress = function (event) {
				event = (event || window.event);
				if (event.keyCode == 123) {
				   //alert('No F-12');
					return false;
				}
			}
			document.onmousedown = function (event) {
				event = (event || window.event);
				if (event.keyCode == 123) {
					//alert('No F-keys');
					return false;
				}
			}
		document.onkeydown = function (event) {
				event = (event || window.event);
				if (event.keyCode == 123) {
					//alert('No F-keys');
					return false;
				}
			}
		/////////////////////end///////////////////////

		//Disable right click script 
		//visit http://www.rainbow.arch.scriptmania.com/scripts/ 
		var message="Sorry, right-click has been disabled"; 
		/////////////////////////////////// 
		function clickIE() {if (document.all) {(message);return false;}} 
		function clickNS(e) {if 
		(document.layers||(document.getElementById&&!document.all)) { 
		if (e.which==2||e.which==3) {(message);return false;}}} 
		if (document.layers) 
		{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;} 
		else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;} 
		document.oncontextmenu=new Function("return false") 
		// 
		function disableCtrlKeyCombination(e)
		{
		//list all CTRL + key combinations you want to disable
		var forbiddenKeys = new Array('u');
		var key;
		var isCtrl;
		if(window.event)
		{
		key = window.event.keyCode;     //IE
		if(window.event.ctrlKey)
		isCtrl = true;
		else
		isCtrl = false;
		}
		else
		{
		key = e.which;     //firefox
		if(e.ctrlKey)
		isCtrl = true;
		else
		isCtrl = false;
		}
		//if ctrl is pressed check if other key is in forbidenKeys array
		if(isCtrl)
		{
		for(i=0; i<forbiddenKeys.length; i++)
		{
		//case-insensitive comparation
		if(forbiddenKeys[i].toLowerCase() == String.fromCharCode(key).toLowerCase())
		{
		//alert('Key combination CTRL + '+String.fromCharCode(key) +' has been disabled.');
		return false;
		}
		}
		}
		return true;
		}*/
		
//Drag Drop Script

var origin = 'selected';
var arrayname = [];
var index = 0;
$(function(){
	$( "#draggable_content li" ).draggable({ 
		containment: "window",
		scroll: true,
		scrollSensitivity: 20,
          scrollSpeed: 20,
		revert: 'invalid',
		connectToSortable: '#droppable_content',
		helper: 'clone',
		start: function(event,ui) {
			origin = 'draggable_content';
			$(".dragloadmask").show();
			$("#dropBox").css({"border":"1px dashed #3399FF"});
			$("#dropBox").addClass("highlight_bg");
		},
		stop: function(event,ui) {
			$(".dragloadmask").hide();
			$("#dropBox").css({"border":"1px dashed transparent"});
			$("#dropBox").removeClass("highlight_bg");
		},
		drag: function(event,ui) {
			var leftvalue = $(this).attr("id").split('box')[1];
			var dragleft = $(this).width();
			var dragtop = ($(".headerSec").height())*3;
			if(leftvalue == '1'||leftvalue == '2'||leftvalue == '3'||leftvalue == '4'||leftvalue == '5'||leftvalue == '9'||leftvalue == '10'||leftvalue == '11'||leftvalue == '12'||leftvalue == '13'){
				ui.helper.css({"left":event.screenX-dragleft,"top":event.screenY-dragtop});	
			}
			if(leftvalue == '8'){
			  	ui.helper.css({"left":event.screenX-dragleft,"top":event.screenY-dragtop});
			}	
			if(leftvalue == '7'||leftvalue == '14'||leftvalue == '15'){
				ui.helper.css({"left":event.screenX-dragleft,"top":event.screenY-dragtop});	
			}
			if(leftvalue == '6'){
			   	ui.helper.css({"left":event.screenX-dragleft,"top":event.screenY-dragtop});
			}
		}
	});
	$("#droppable_content").droppable({
		drop: function(event, ui) {
			$dropId = ui.draggable;
			var domain_id = $('#domain_id').val();
			var page_id = $('#page_id').val();
			var blog_comment = $('#blog_comment').val();
			var store_comment = $('#store_comment').val();
			var title_id = $('#title_id').val();
			var titleforblog = $('#titlename').val();
			var dropvalid = $(this).attr('id');
            brain.registerDrop(function() {              
              if(dropvalid == 'droppable_content'){
		      	var tdid = $(this).attr('id');
                if (origin === 'draggable_content') {
				var drop_content_id = ui.draggable.attr("data-title");
				if (blog_comment == "1") {
					if (title_id == "") {
						return false;
					} else {
						if (drop_content_id == 'box1') {
							var name = "title_select";
							updatePageListingForBlog(domain_id, page_id, name, title_id, titleforblog);
						}
						if (drop_content_id == 'box2') {
							var name = "description_select";
							updatePageListingForBlog(domain_id, page_id, name, title_id, titleforblog);
						}
						if (drop_content_id == 'box3') {
							var name = "image_multiple_select";
							updatePageListingForBlog(domain_id, page_id, name, title_id, titleforblog);
						}
						if (drop_content_id == 'box4') {
							var name = "image_select";
							updatePageListingForBlog(domain_id, page_id, name, title_id, titleforblog);

						}
						if (drop_content_id == 'box5') {
							var name = "contact_form";
							updatePageListingForBlog(domain_id, page_id, name, title_id, titleforblog);
						}
						if (drop_content_id == 'box6') {
							var name = "Divider";
							updatePageListingForBlog(domain_id, page_id, name, title_id, titleforblog);
						}
						if (drop_content_id == 'box7') {
							var name = "youtube_video";
							updatePageListingForBlog(domain_id, page_id, name, title_id, titleforblog);
						}
						if (drop_content_id == 'box8') {
							var name = "social_plugins";
							updatePageListingForBlog(domain_id, page_id, name, title_id, titleforblog);
						}
						if (drop_content_id == 'box9') {
							var name = "gallery";
							updatePageListingForBlog(domain_id, page_id, name, title_id, titleforblog);
						}
						if (drop_content_id == 'box10') {
							var name = "map";
							updatePageListingForBlog(domain_id, page_id, name, title_id, titleforblog);
						}
						if (drop_content_id == 'box11') {
							var name = "slider";
							updatePageListingForBlog(domain_id, page_id, name, title_id, titleforblog);
						}
						if (drop_content_id == 'box12') {
							var name = "google_adsense";
							updatePageListingForBlog(domain_id, page_id, name, title_id, titleforblog);
						}
						if (drop_content_id == 'box13') {
							var name = "column_show";
							updatePageListingForBlog(domain_id, page_id, name, title_id, titleforblog);
						}
						if (drop_content_id == 'box14') {
							var name = "file";
							updatePageListingForBlog(domain_id, page_id, name, title_id, titleforblog);
						}
						if (drop_content_id == 'box15') {
							var name = "document";
							updatePageListingForBlog(domain_id, page_id, name, title_id, titleforblog);
						}
					}
				} else if (store_comment == '1') {
					return false;
				} else {
					if (drop_content_id == "box1") {
						var name = "title_select";
						updatePageListing(domain_id, page_id, name, "buildTitle")
					}
					if (drop_content_id == "box2") {
						var name = "description_select";
						updatePageListing(domain_id, page_id, name, "buildPara");
					}
					if (drop_content_id == "box3") {
						var name = "image_multiple_select";
						updatePageListing(domain_id, page_id, name, "buildImgTxt");
					}
					if (drop_content_id == "box4") {
						var name = "image_select";
						updatePageListing(domain_id, page_id, name, "buildImg");
					}
					if (drop_content_id == "box5") {
						var name = "contact_form";
						updatePageListing(domain_id, page_id, name, "buildContact");
					}
					if (drop_content_id == "box6") {
						var name = "divider";
						updatePageListing(domain_id, page_id, name, "buildDivide");
					}
					if (drop_content_id == "box7") {
						var name = "youtube_video";
						updatePageListing(domain_id, page_id, name, "youtube_video");
					}
					if (drop_content_id == "box8") {
						var name = "social_plugins";
						updatePageListing(domain_id, page_id, name, "buildSocial");
					}
					if (drop_content_id == "box9") {
						var name = "gallery";
						updatePageListing(domain_id, page_id, name, "buildSocial");
					}
					if (drop_content_id == "box10") {
						var name = "map";
						updatePageListing(domain_id, page_id, name, "map");
					}
					if (drop_content_id == "box11") {
						var name = "slider";
						updatePageListing(domain_id, page_id, name, "slider");
					}
					if (drop_content_id == "box12") {
						var name = "google_adsense";
						updatePageListing(domain_id, page_id, name, "google_adsense");
					}
					if (drop_content_id == "box13") {
						var name = "column_show";
						updatePageListing(domain_id, page_id, name, "column_show");
					}
					if (drop_content_id == 'box14') {
						var name = "file";
						updatePageListing(domain_id, page_id, name, "file");
					}
					if (drop_content_id == 'box15') {
						var name = "document";
						updatePageListing(domain_id, page_id, name, "document");
					}
				}
				$('#droppable_content li').click(function(e) {
					$(this).closest('li').droppable("destroy");
					this.focus();
				}).blur(function() {
					$(this).closest('li').droppable();
				});
				origin = 'droppable_content';
			}
            }
            });
		}
	}).sortable({
		revert: true,
		handle: '.controlMidOuter',
		placeholder: 'highlightLine'
	});	
	$("#droppable_content .column_inner_div").droppable({
		hoverClass:'ui-state-highlight',
		over:function(event, ui){
			$(".highlightLine").addClass("removehighlight");
		},
		out:function(event, ui){
			$(".highlightLine").removeClass("removehighlight");
		},
		drop: function(event, ui) {
			$dropId = ui.draggable;
			var domain_id = $('#domain_id').val();
			var page_id = $('#page_id').val();
			var blog_comment = $('#blog_comment').val();
			var store_comment = $('#store_comment').val();
			var title_id = $('#title_id').val();
			var titleforblog = $('#titleforblog').val();
			var columnpagelist = $(this).children('.columnpagelistid').val();
			var tdid = $(this).attr('id');
            brain.registerDrop(function() {			
			var col_id = tdid;
			columid = col_id.split('_');
			columidcheck = col_id.split('_')[1];
			columid = columid[1];
            columidval = col_id.split('_')[0];
            if(columidval == 'col'){  
            if (origin === 'draggable_content') {
				var drop_content_id = ui.draggable.attr("data-title");
				if (blog_comment == "1") {
					if (title_id == "") {
						return false;
					} 
					else {
						if (drop_content_id == 'box1') {
							var name = "title_select";
							updatePageListingForBlogColumn(domain_id, page_id, name, title_id, titleforblog, columid, columnpagelist);
						}
						if (drop_content_id == 'box2') {
							var name = "description_select";
							updatePageListingForBlogColumn(domain_id, page_id, name, title_id, titleforblog, columid, columnpagelist);
						}
						if (drop_content_id == 'box3') {
							var name = "image_multiple_select";
							updatePageListingForBlogColumn(domain_id, page_id, name, title_id, titleforblog, columid, columnpagelist);
						}
						if (drop_content_id == 'box4') {
							var name = "image_select";
							updatePageListingForBlogColumn(domain_id, page_id, name, title_id, titleforblog, columid, columnpagelist);

						}
						if (drop_content_id == 'box5') {
							var name = "contact_form";
							updatePageListingForBlogColumn(domain_id, page_id, name, title_id, titleforblog, columid, columnpagelist);
						}
						if (drop_content_id == 'box6') {
							var name = "divider";
							updatePageListingForBlogColumn(domain_id, page_id, name, title_id, titleforblog, columid, columnpagelist);
						}
						if (drop_content_id == 'box7') {
							var name = "youtube_video";
							updatePageListingForBlogColumn(domain_id, page_id, name, title_id, titleforblog, columid, columnpagelist);
						}
						if (drop_content_id == 'box8') {
							var name = "social_plugins";
							updatePageListingForBlogColumn(domain_id, page_id, name, title_id, titleforblog, columid, columnpagelist);
						}
						if (drop_content_id == 'box9') {
							var name = "gallery";
							updatePageListingForBlogColumn(domain_id, page_id, name, title_id, titleforblog, columid, columnpagelist);
						}
						if (drop_content_id == 'box10') {
							var name = "map";
							updatePageListingForBlogColumn(domain_id, page_id, name, title_id, titleforblog, columid, columnpagelist);
						}
						if (drop_content_id == 'box11') {
							var name = "slider";
							updatePageListingForBlogColumn(domain_id, page_id, name, title_id, titleforblog, columid, columnpagelist);
						}
						if (drop_content_id == 'box12') {
							var name = "google_adsense";
							updatePageListingForBlogColumn(domain_id, page_id, name, title_id, titleforblog, columid, columnpagelist);
						}
						if (drop_content_id == 'box13') {
							var name = "column_show";
							updatePageListingForBlogColumn(domain_id, page_id, name, title_id, titleforblog, columid, columnpagelist);
						}
						if (drop_content_id == 'box14') {
							var name = "file";
							updatePageListingForBlogColumn(domain_id, page_id, name, title_id, titleforblog, columid, columnpagelist);
						}	
						if (drop_content_id == 'box15') {
							var name = "document";
							updatePageListingForBlogColumn(domain_id, page_id, name, title_id, titleforblog, columid, columnpagelist);
						}
					}
				} 
				else if (store_comment == '1') {
					return false;
				} 
				else {
					if (drop_content_id == 'box1') {
						var name = "title_select";
						updatePageListingForColumn(domain_id, page_id, name, "buildTitle", columid, columnpagelist);
					}
					if (drop_content_id == 'box2') {
						var name = "description_select";
						updatePageListingForColumn(domain_id, page_id, name, "buildPara", columid, columnpagelist);
					}
					if (drop_content_id == 'box3') {
						var name = "image_multiple_select";
						updatePageListingForColumn(domain_id, page_id, name, "buildImgTxt", columid, columnpagelist);
					}
					if (drop_content_id == 'box4') {
						var name = "image_select";
						updatePageListingForColumn(domain_id, page_id, name, "buildImg", columid, columnpagelist);

					}
					if (drop_content_id == 'box5') {
						var name = "contact_form";
						updatePageListingForColumn(domain_id, page_id, name, "buildContact", columid, columnpagelist);
					}
					if (drop_content_id == 'box6')

					{
						var name = "divider";
						updatePageListingForColumn(domain_id, page_id, name, "buildDivide", columid, columnpagelist);
					}
					if (drop_content_id == 'box7') {
						var name = "youtube_video";
						updatePageListingForColumn(domain_id, page_id, name, "youtube_video", columid, columnpagelist);
					}
					if (drop_content_id == 'box8') {
						var name = "social_plugins";
						updatePageListingForColumn(domain_id, page_id, name, "buildSocial", columid, columnpagelist);
					}
					if (drop_content_id == 'box9') {
						var name = "gallery";
						updatePageListingForColumn(domain_id, page_id, name, "buildSocial", columid, columnpagelist);
					}
					if (drop_content_id == 'box10') {
						var name = "map";
						updatePageListingForColumn(domain_id, page_id, name, "map", columid, columnpagelist);
					}
					if (drop_content_id == 'box11') {
						var name = "slider";
						updatePageListingForColumn(domain_id, page_id, name, "slider", columid, columnpagelist);
					}
					if (drop_content_id == 'box12') {
						var name = "google_adsense";
						updatePageListingForColumn(domain_id, page_id, name, "google_adsense", columid, columnpagelist);
					}
					if (drop_content_id == 'box13') {
						var name = "column_show";
						updatePageListingForColumn(domain_id, page_id, name, "column_show", columid, columnpagelist);
					}
					if (drop_content_id == 'box14') {
						var name = "file";
						updatePageListingForColumn(domain_id, page_id, name, "file", columid, columnpagelist);
					}
					if (drop_content_id == 'box15') {
						var name = "document";
						updatePageListingForColumn(domain_id, page_id, name, "document", columid, columnpagelist);
					}
                   
				}
				$('#droppable_content li').click(function(e) {
					$(this).closest('li').droppable("destroy");
					this.focus();
				}).blur(function() {
					$(this).closest('li').droppable();
				});
                 }
                 }
                });
		}
	}).sortable({
		revert: true,
		handle: '.controlMidOuter',
		placeholder: 'highlightLine'
	});	
	$(".galleryimagepop").draggable({
		drag:function(event,ui){
			var winwidth = $(window).width();
			if(ui.position.left<180) { ui.position.left = 180;}
			if(ui.position.left>(winwidth-203)) {ui.position.left = winwidth-203;}
		}
	});	
	 $('.contentedit').on('keypress', function(e) {
		if (e.keyCode == 9) {
			e.preventDefault();
		}
	});
	$('.contentedit').keyup("v",function(e) {
		if(e.ctrlKey && e.keyCode == 86)
		{			
			$(this).find("*").removeAttr("style");
			$(this).find("img").remove();			
		}
		
	});	
	$('.deleteBg').on('click',function(event){
		$("#deletePopup").fadeIn().css({"left":event.pageX-110,"top":event.pageY-230});
	});
	$(document).click(function(event){
		if($(event.target).closest("#deletePopup,.deleteOuter").length == 0) { 
			 $("#deletePopup").hide().removeAttr("style");
		} 
		 if($(event.target).closest(".contentedit,#toolbar").length == 0) {
			$("#toolbar").hide();
		 } 
	});
    $(".column_inner_div,.column_inner_div ul").css("min-height",$(".sample2").height());
});
var brain = {
	state : {
		dropAction : function() {},
		dropTimer : null
	},
	registerDrop  : function(cb) {
		brain.state.dropAction = cb;
		if (brain.state.dropTimer) {
			clearTimeout(brain.state.dropTimer);
		}
		brain.state.dropTimer = setTimeout(function() {
			brain.state.dropAction();
		}, 2);
	}
}	

$(document).ready(function(){    
    $('.contentedit').click(function(e){
        e.preventDefault();
    });
	$("#droppable_content img").mousedown(function(){
		return false;											   
	});
    /*$( "#showDatepicker" ).datepicker({
		showOn: 'button',
		buttonImage: 'http://jqueryui.com/resources/demos/datepicker/images/calendar.gif',
		buttonImageOnly: true,
		onSelect: function (selectedDate) {
			//$('#calendarDay').text(selectedDate);
			$(this).prev().html(selectedDate);
			//alert($('#domain_id').val());
			$.post("ajaxFile.php",{'action':'updatepostdate','domain_id':$("#domain_id").val(),'title_id':$("#title_id").val(),'date':selectedDate},function(data){
				
				$(".postCommPopInnDate").html(selectedDate);
			});
			$('#hiddenInput').datepicker('hide');
		}            
	});*/
	$("ul.mainLeftPanelUl li").click(function() {
		$("ul.mainLeftPanelUl li").removeClass("activeType");
		$(this).addClass("activeType");
	});
	$(".mainRightPanel").css("margin-top",$(".toppanel").height());
	
});