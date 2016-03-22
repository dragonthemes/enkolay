{$getglobalvarjavascript}
<!--<script type="text/javascript" src="{$SITE_JS_URL}/jquery.min.js"></script>-->
<script type="text/javascript" src="{$SITE_JS_URL}/bootstrap.js"></script>

{literal}
	<script type="text/javascript">
		$(document).ready(function()
		{
			//$(".hideupload").hide();
			/*$(".buildimage").each(function(){
				//$(".hideupload").show();
				var id = $(this).attr("title");	
				var settings = {
					url: "ajaxImageDrag.php",
					method: "POST",
					allowedTypes:"jpg,png,gif,doc,pdf,zip,psd",
					fileName: "photos",
					multiple: true,
					onSuccess:function(files,data,xhr)
					{
					   
						alert(data);
						//var imagesrc = data.replace(/\{/g,"").replace(/\}/g,"").replace(/\"/g,"").replace(/\//g,"").replace(/\:/g,"").replace(/\\/g,"/");
						//alert(imagesrc)
					   // var imagename = jssitebaseUrl+"/"+imagesrc;
						//alert(imagename);
						$("#image_"+id).attr("src",data);
						//location.reload();
					}
				}
				$("#mulitplefileuploader_"+id).uploadFile(settings);
				
			});
			
			$(".buildImgTxt").each(function(){
				//$(".hideupload").show();
				alert("buildImgTxt_Tpl_1");
				var id = $(this).attr("title");	
				var settings = {
					url: "ajaxImageTextDrag.php",
					method: "POST",
					allowedTypes:"jpg,png,gif,doc,pdf,zip,psd",
					fileName: "photos",
					multiple: true,
					onSuccess:function(files,data,xhr)

					{
					   $("#image_"+id).attr("src",data);
                        //$("#imageshow").html(data)
						//location.reload();
					}
				}
				alert("buildImgTxt_Tpl_2");
				$("#mulitplefileuploader_"+id).uploadFile(settings);
				
			});*/
			
			
		});
	</script>
{/literal}

<script type="text/javascript" src="{$SITE_JS_URL}/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery-form.js"></script>


{if $req_file_name eq 'main.php'}
	<script type="text/javascript" src="{$SITE_JS_URL}/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="{$SITE_JS_URL}/jquery.easydropdown.js"></script>	
{/if}
	<script type="text/javascript" src="{$SITE_JS_URL}/shortcut.js"></script>
	<script type="text/javascript" src="{$SITE_JS_URL}/farbtastic.js"></script>
	<script type="text/javascript" src="{$SITE_JS_URL}/freshereditor.js"></script>
	{if $req_file_name eq 'main.php'}
		<script type="text/javascript" src="{$SITE_JS_URL}/drag-drop-custom.js"></script>
		<script type="text/javascript" src="{$SITE_JS_URL}/selectbox.js"></script>
	{/if}
	<script type="text/javascript" src="{$SITE_JS_URL}/jquery.ui.all.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/colResizable-1.3.min.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/common.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.bxslider.js"></script>
{if $req_file_name eq 'main.php'}
	<script type="text/javascript" src="{$SITE_JS_URL}/jquery.wallform.js"></script>
	<!--<script type="text/javascript" src="{$SITE_JS_URL}/classie.js"></script>-->
	<!--<script type="text/javascript" src="{$SITE_JS_URL}/jcarousellite.js"></script>	-->
{/if}


{if $req_file_name eq 'index.php'}
<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/facebook.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.cycle.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/slideshow.js"></script>


<script type="text/javascript" src="{$SITE_JS_URL}/showtime.js"></script>
{literal}
	<script type="text/javascript">
		var autoslide_time =3000;
		jQuery(document).ready(function($){$("a[rel^='prettyPhoto']").prettyPhoto();  } );
	</script>
{/literal}
<script type="text/javascript" src="{$SITE_JS_URL}/slider_3d.js"></script>
{/if}
{literal}
	<script type="text/javascript">
		$(document).ready(function(){
			$('.slider3').bxSlider({
				slideWidth: 450,
				minSlides: 1,
				maxSlides: 1,
				moveSlides: 1,
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.slider2').bxSlider({
				slideWidth: 300,
				minSlides: 1,
				maxSlides: 1,
				moveSlides: 1,
			});
		});
	</script>
{/literal}
{literal}
	<script type="text/javascript">
		$(document).ready(function(){
			 $('#slider').nivoSlider();
		});
		$(document).ready(function(){
			 $('#slider2').nivoSlider();
		});
	</script>
{/literal}
	{if $req_file_name eq 'main.php'}
	{literal}
		<script type="text/javascript">
			$(document).ready(function(){
				//$(".mainLeftPanelScroll.nano").nanoScroller();
				//$(".mainLeftPanelScrollNew.nano").nanoScroller();	
				$(".mainRightPanel").css("height",$(window).height()-128);
				/*$(".mainRightPanel").mCustomScrollbar({
					scrollButtons:{
						enable:true
					},
					mouseWheelPixels:200
				}); */
			});
			$(window).scroll(function(){
				$(".sample2").css("z-index","10690");
			});
			$(".leftuldiv").hover(function(){
				$(".sample2").css("z-index","10710");
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				//$(".mainLeftPageScroll.nano").nanoScroller();
				
/*				$(".navTabMore ul").css({"display":"none"});
				$(".navTabMore").mouseover(function(){
					$(".navTabMore ul").slideDown("slow");
				});
				$(".navTabMore").mouseleave(function(){
					$(".navTabMore ul").slideUp("slow");
				});
*/			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){	
				$(".contactform").click(function() {
					$(this).css({"position":"absolute","z-index":100000,"background":"#ffffff","padding":10+"px","width":100+"%","-moz-box-sizing": "border-box","box-sizing": "border-box","-webkit-box-sizing": "border-box"});
					$("#contactmask").show();
					$("#contactmask").css({"z-index":10979});
					$("#jquery-colour-picker,#toolbar").css({"z-index":21001});
					$(".contactSaveButt").show();
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
			});
		</script>
		{/literal}
	{/if}
{literal}
	<script type="text/javascript">
		$(document).ready(function(){	
			$("ul.TopMenuNavList li a").click(function() {
				$("ul.TopMenuNavList li a").removeClass("active");
				$(this).addClass("active");
			});	
		});
		$(document).ready(function(){	
			$("ul.TopMenuNavListSec li a").click(function() {
				$("ul.TopMenuNavListSec li a").removeClass("active");
				$(this).addClass("active");
			});	
		});
		$(document).ready(function(){	
			/*$("ul.nav.fontfamily li,.fontlistdiv ul li, .selectlist ul li").click(function() {
				$("ul.nav.fontfamily li,.fontlistdiv ul li, .selectlist ul li").removeClass("active");
				$(this).addClass("active");
			});*/
			$("select.nav.fontfamily option,.fontlistdiv select option, .selectlist select option").click(function() {
				$("select.nav.fontfamily option,.fontlistdiv select option, .selectlist select option").removeClass("active");
				$(this).addClass("active");
			});
		});
	</script>
	
	<script type="text/javascript">
		$(document).ready(function(){	
			$("ul.buildSection li a").click(function() {
				$("ul.buildSection li a").removeClass("active");
				$(this).addClass("active");
			});	
		});
	</script>
	<script type="text/javascript">
		/*$(document).ready(function(){	
			$("ul.pagenav li a").click(function() {
				$("ul.pagenav li").removeClass("active");
				$(this).parent().addClass("active");
				var navid = $(this).attr("id");
				$(".sectioncontent").hide();
				$("#"+navid+"_content").show();
			});	
		});*/
		$(document).ready(function(){	
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
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){	
			$("ul li.listbox").click(function() {
				$("ul li.listbox").removeClass("active");
				$(this).addClass("active");
			});	
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){	
			$(".blogPageBgInnerTab4 a").click(function() {
				$(".blogPageBgInnerTab4 a").removeClass("active");
				$(this).addClass("active");
			});	
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){	
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
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.loginPop.dropdown').click(function(){
				$(this).addClass('open');
			});
			$('.mysiteNavList.dropdown').click(function(){
				$(this).addClass('open');
			});
			$('.headerLangListSec.dropdown').click(function(){
				$(this).addClass('open');
			});
		});
		$(document).ready(function(){
			$('.headerLangList.dropdown').click(function(){
				$(this).addClass('open');
			});
			$('.draftCommentList.dropdown').click(function(){
				$(this).addClass('open');
			});
			/*$( "#sortable" ).sortable({update: function(event, ui) {
				$.post("ajaxFile.php", { pages: $('#sortable').sortable('serialize') } );
    		}});*/
			
			$( "#sortable" ).sortable({
				update: function(event, ui) {
					$.post("ajaxFile.php", { pages: $('#sortable').sortable('serialize') } );
				},
				cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount'
			});
			$( "#sortable_1" ).sortable({
				update: function(event, ui) {
					$.post("ajaxFile.php", { pages: $('#sortable_1').sortable('serialize') } );
				},
				cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount'
			});
			$( "#sortable_2" ).sortable({
				update: function(event, ui) {
					$.post("ajaxFile.php", { pages: $('#sortable_2').sortable('serialize') } );
				},
				cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount'
			});
			$( "#sortable_3" ).sortable({
				update: function(event, ui) {
					$.post("ajaxFile.php", { pages: $('#sortable_3').sortable('serialize') } );
				},
				cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount'
			});
			$( "#sortable_4" ).sortable({
				update: function(event, ui) {
					$.post("ajaxFile.php", { pages: $('#sortable_4').sortable('serialize') } );
				},
				cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount'
			});
			$( "#sortable_5" ).sortable({
				update: function(event, ui) {
					$.post("ajaxFile.php", { pages: $('#sortable_5').sortable('serialize') } );
				},
				cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount'
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
		  
		  $('#galimgphoto').die('click').live('change', function()			{ 
			        $("#galimagephotogal").ajaxForm({target: '#preview', 
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
			
		});
	</script>
	<script>
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
	</script>
{/literal}
<script type="text/javascript" src="{$SITE_JS_URL}/ajaxMainjs.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/spectrum.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/commonnew.js"></script>

{literal}
	<script type="text/javascript">
		$(document).ready(function(){
			/*$("#youtubeVideo").click(function(){
				$("#youtubeDiv").show();
			});
			$("#youtubeDiv,.youtubeDivCover").click(function(){
				$(".youtubelabelsPopup").show();
			});
			$(".videosubmit").click(function(){
				var urlvideo = $(".videoUrl").val();
				$("#youtubeVideo iframe").prop("src",urlvideo);
				$(".youtubelabelsPopup").hide();
			});		
			$("#buildLeftButton").click(function(){
				$("#buttondiv").show();
			});	*/
			$( ".themewrapper1 .logoresize" ).resizable({
					stop: function(event, ui) {
						var width = ui.size.width;
						var height = ui.size.height;
						var domain_id = $('#domain_id').val();
						updateLogoForDomain(domain_id,width,height);
					}
			});
			$(".logodiv").draggable();
			/*$(".logodiv").draggable({
				  drag: function(event, ui) {
					if(ui.position.top<0) { ui.position.top = 0; }
					if(ui.position.left<0) { ui.position.left = 0; }
					if(ui.position.left>750) { ui.position.left = 750; }
					},
				  stop: function(event, ui) {
						var left = ui.position.left;
						var top = ui.position.top;
						var domain_id = $('#domain_id').val();
						updateLogoPosForDomain(domain_id,left,top);
					},
					cancel: '.mainPageThmeTitle'
			});*/
			$( ".mainPageThmeTitle" ).attr("contentEditable",true);
			$( ".uploadImgBg img.imagechange" ).hover(function(){			
				$(this).resizable({
					resize: function(event, ui) {
						var outer = $("#rightColumn").width();
						if(ui.position.left<0) { ui.position.left = 0; }
						if(ui.size.width>outer) { ui.size.width = outer;$(this).css("width",outer); }
					},
					stop: function(event, ui) {
						var width = ui.size.width;
						var height = ui.size.height;
						var idimg = $(this).parent(".uploadImgBg").parent().attr("id"); 
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
			
		/*	if($(".clickheretext").text() == ''){
					$(".clickheretext").addClass("contenttext");
			}
			if($(".clickheretext").text() != ''){
				$(".clickheretext").removeClass("contenttext");
			}*/
		});
	//	$('#buttondiv').draggable({cancel:false});
		function loadIframe(iframeName, url) {
			var $iframe = $('#' + iframeName);
			if ( $iframe.length ) {
				$iframe.attr('src',url);   
				return false;
			}
			return true;
		}		
	</script>
{/literal}
{literal}
	<script type="text/javascript">
		$(document).ready(function(){	
			$(".indexViwePort a.viewImg").click(function() {
				$(".indexViwePort a.viewImg").removeClass("active");
				$(this).addClass("active");
			});	
		});
	</script>
{/literal}
{if $req_file_name neq 'onboarding.php'}
{literal}
	<script type="text/javascript">		
		window.onbeforeunload=before;				
		function before(){
		   $(".ui-loader").show();
		}
	</script>
{/literal}
{/if}
{literal}
	<script type="text/javascript">		
		$(document).ready(function(){	
			var winHeiclock = $(window).height();
			$(".headerLangList").css({"top":winHeiclock - 28});
		});	
		$(document).ready(function(){	
			var winHei = $(window).height();
			var rightPannalWidt = $(".indexRightPanel").width();
			$(".startSomethimgBanner,.indexpowersupport,#index_feature,.indexModernThemeSel,#index_work").css({"height":winHei});
			$(".indexpowersupport").css({"width":rightPannalWidt});
			$(".indexpowersupport").css({"height":winHei});
		});	
		$(document).ready(function(){	
			var winHei = $(window).height();
			$(".startSomethimgBanner").css({"height":winHei});
		});	
		$('.bannerClick1').click(function(){
			var a = $(".startSomethimgBanner").height();
			$(window).scrollTop(a);
		});
		
		$(document).ready(function(){	
			var seperateHei = $(".indexBottSeperator").height();
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
	</script>
{/literal}
{literal}
	<script type="text/javascript">
		/*$(document).ready(function(){	
			$(".main_title").focus(function() {
				$(this).css({"box-shadow" : "0 0 5px #ff6600","border" : "none"});
			});	
		});*/
		
		
		$(".buildSocialIcon").click(function(){	
			$(".socialPop").show();
		});
		/*$(document).click(function(event){
		//alert($(event.target).closest(".socialPop").length);
			 if($(event.target).closest(".socialPop").length == 0) { $(".socialPop").hide(); } 
		});*/
		
		/*$(document).ready(function() {
			$(".buildSocialIcon").click(function(event) {
				if (event.target.classname !== 'buildSocialIcon') {
					$(".socialPop").show();
				}else{
					$(".socialPop").hide();
				}
			});
		});*/
		
		
		$( ".deleteBg" ).click(function() {
			$( "#deletePopup").css({"margin-top" : -249}).fadeIn( 300 );
		});
	</script>
{/literal}
{if $req_file_name eq 'main.php'}
{literal}
	<script type="text/javascript">
		/*$(document).ready(function(){	
			var winHeiLoad = $(window).height();
			var winwidtLoad = $(window).width();
			var loadImgWidt = $('.laodImgChange').width();
			$(".laodImgChange").css({"bottom":0,"right":0});
		});	*/
		$( ".imageGallery" ).click(function() {
			$(".galleryimageInn").slideUp();
			$(this).children(".galleryimageInn").slideDown();
		});
		$(".gallerycancel").click(function() {
			$(".galleryimagepop").slideUp();
		});
		$(".mapcancel").click(function() {
			$(".mappop").slideUp();
		});
		$(".addGoogCancel").click(function() {
			$(".addGoogPop").slideUp();
		});
		$(document).ready(function(){	
			var dropheight = $("#dropBox").height() + 170;
			$("#dropBox").css("min-height",dropheight+"px");
		});
		var dropheight = $("#dropBox").height() + 170;
		$("#dropBox").css("min-height",dropheight+"px");
		
// Custom drop actions for <div id="dropBox">
/*function columnId(dropid){
		var dropval = $(dropid).parent().parent().attr("id");	
		$(".dropvalue").val(dropval);
	}
function columnIdOut(dropid){
		var dropval = $(dropid).parent().parent().attr("id");	
		$(".dropvalue").val("");
	}
function columnId(dropid){
	var dropval = $(dropid).parent().parent().attr("id");	
	$(".dropvalue").val(dropval);
}
$('.sample2').hover(function(){
	var dropval = $(".sample2").parent().parent().attr("id");
	$(".dropvalue").val(dropval);
});*/

/*$("#dropBox2").hover(function(event){
	if($(event.target).closest(".sample2").length == 0) {
		$(".dropvalue").val("dropBox");
	}
});*/
$('.sample2').on({
    mouseover: function() {
    	//var dropval = $(".sample2").parent().parent().attr("id");
		$(".columnDragTxt").text("");
		$(".dropvalue").val("dropBox2");	
	},
    mouseout:  function() {
    	$(".columnDragTxt").text("Drag Element Here");
    	$(".dropvalue").val("dropBox");    	
	}
}); 
function dropItems(idOfDraggedItem,targetId,x,y)
{	
	var dropvalinput = $(".dropvalue").val();
	//alert(dropvalinput);
	if(dropvalinput == 'dropBox2')
		{
			dropItems2(idOfDraggedItem,targetId,x,y);
		}
	else
		{
			var id = idOfDraggedItem+'Div';
			//var html = $(".rightDiv ."+id).html();
			//if(html.length>0)html = html + '<br>';
			//html = html;
			//htmlClick = $(".contentedit").attr("onClick","toolbar(this)");
			//document.getElementById('dropContent').innerHTML = html;
			//$("#sortable").append("<li onClick='toolbar(this)'>"+html+"</li>");
			var domain_id = $('#domain_id').val();
			var page_id = $('#page_id').val();
			var blog_comment = $('#blog_comment').val();
			var store_comment = $('#store_comment').val();
			var title_id = $('#title_id').val();
			var titleforblog = $('#titleforblog').val();
			if(blog_comment == "1")
				{
					if(title_id == "")
						{
							//return false;
							if(id == 'box1Div')
								{
									var name="title_select";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box2Div')
								{
									var name = "description_select";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box3Div')
								{
									var name = "image_multiple_select";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box4Div')
								{
									var name = "image_select";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
									
								}
							if(id == 'box5Div')
								{
									var name = "contact_form";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box6Div')
								{
									var name = "divider";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box7Div')
								{
									var name = "youtube_video";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box8Div')
								{
									var name = "social_plugins";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box9Div')
								{
									var name = "gallery";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box10Div')
								{
									var name = "map";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box11Div')
								{
									var name = "slider";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box12Div')
								{
									var name = "google_adsense";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box13Div')
								{
									var name = "column_show";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
						}
					else
						{
							if(id == 'box1Div')
								{
									var name="title_select";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box2Div')
								{
									var name = "description_select";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box3Div')
								{
									var name = "image_multiple_select";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box4Div')
								{
									var name = "image_select";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
									
								}
							if(id == 'box5Div')
								{
									var name = "contact_form";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box6Div')
								{
									var name = "divider";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box7Div')
								{
									var name = "youtube_video";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box8Div')
								{
									var name = "social_plugins";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box9Div')
								{
									var name = "gallery";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box10Div')
								{
									var name = "map";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box11Div')
								{
									var name = "slider";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box12Div')
								{
									var name = "google_adsense";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
							if(id == 'box13Div')
								{
									var name = "column_show";
									updatePageListingForBlog(domain_id,page_id,name,title_id,titleforblog);
								}
						}
				}
			else if(store_comment == '1')
				{
					return false;
				}
			else
				{
					//var dropheight = $("#dropBox").height();
					//$("#dropBox").css("min-height","+="+dropheight+"px");
					if(id == 'box1Div')
						{
							var name="title_select";
							updatePageListing(domain_id,page_id,name,"buildTitle");
						}
					if(id == 'box2Div')
						{
							var name = "description_select";
							updatePageListing(domain_id,page_id,name,"buildPara");
						}
					if(id == 'box3Div')
						{
							var name = "image_multiple_select";
							updatePageListing(domain_id,page_id,name,"buildImgTxt");
						}
					if(id == 'box4Div')
						{
							var name = "image_select";
							updatePageListing(domain_id,page_id,name,"buildImg");
							
						}
					if(id == 'box5Div')
						{
							var name = "contact_form";
							updatePageListing(domain_id,page_id,name,"buildContact");
						}
					if(id == 'box6Div')
						{
							var name = "divider";
							updatePageListing(domain_id,page_id,name,"buildDivide");
						}
					if(id == 'box7Div')
						{
							var name = "youtube_video";
							updatePageListing(domain_id,page_id,name,"youtube_video");
						}
					if(id == 'box8Div')
						{
							var name = "social_plugins";
							updatePageListing(domain_id,page_id,name,"buildSocial");
						}
					if(id == 'box9Div')
						{
							var name = "gallery";
							updatePageListing(domain_id,page_id,name,"buildSocial");
						}
					if(id == 'box10Div')
						{
							var name = "map";
							updatePageListing(domain_id,page_id,name,"map");
						}
					if(id == 'box11Div')
						{
							var name = "slider";
							updatePageListing(domain_id,page_id,name,"slider");
						}
					if(id == 'box12Div')
						{
							var name = "google_adsense";
							updatePageListing(domain_id,page_id,name,"google_adsense");
						}
					if(id == 'box13Div')
						{
							var name = "column_show";
							updatePageListing(domain_id,page_id,name,"column_show");
						}
				}
			}
	
}
function dropItems2(idOfDraggedItem,targetId,x,y)
{
	$('.sample2 tr td').hover(function(){
		var tdid = $(this).attr('id');	
		var col_id = tdid;
		columid = col_id.split('_');
		columid = columid[1];
		var columnpagelist = $(this).children('.columnpagelistid').val();
		var id = idOfDraggedItem+'Div';
		//var html = $(".rightDiv ."+id).html();
		//if(html.length>0)html = html + '<br>';
		//html = html;
		//htmlClick = $(".contentedit").attr("onClick","toolbar(this)");
		//document.getElementById('dropContent').innerHTML = html;
		//$("#sortable").append("<li onClick='toolbar(this)'>"+html+"</li>");
		var domain_id = $('#domain_id').val();
		var page_id = $('#page_id').val();
		var blog_comment = $('#blog_comment').val();
		var store_comment = $('#store_comment').val();
		var title_id = $('#title_id').val();
		var titleforblog = $('#titleforblog').val();
		if(blog_comment == "1")
			{
				if(title_id == "")
					{
						return false;
					}
				else
					{
						if(id == 'box1Div')
							{
								var name="title_select";
								updatePageListingForBlogColumn(domain_id,page_id,name,title_id,titleforblog,columid,columnpagelist);
							}
						if(id == 'box2Div')
							{
								var name = "description_select";
								updatePageListingForBlogColumn(domain_id,page_id,name,title_id,titleforblog,columid,columnpagelist);
							}
						if(id == 'box3Div')
							{
								var name = "image_multiple_select";
								updatePageListingForBlogColumn(domain_id,page_id,name,title_id,titleforblog,columid,columnpagelist);
							}
						if(id == 'box4Div')
							{
								var name = "image_select";
								updatePageListingForBlogColumn(domain_id,page_id,name,title_id,titleforblog,columid,columnpagelist);
								
							}
						if(id == 'box5Div')
							{
								var name = "contact_form";
								updatePageListingForBlogColumn(domain_id,page_id,name,title_id,titleforblog,columid,columnpagelist);
							}
						if(id == 'box6Div')
							{
								var name = "divider";
								updatePageListingForBlogColumn(domain_id,page_id,name,title_id,titleforblog,columid,columnpagelist);
							}
						if(id == 'box7Div')
							{
								var name = "youtube_video";
								updatePageListingForBlogColumn(domain_id,page_id,name,title_id,titleforblog,columid,columnpagelist);
							}
						if(id == 'box8Div')
							{
								var name = "social_plugins";
								updatePageListingForBlogColumn(domain_id,page_id,name,title_id,titleforblog,columid,columnpagelist);
							}
						if(id == 'box9Div')
							{
								var name = "gallery";
								updatePageListingForBlogColumn(domain_id,page_id,name,title_id,titleforblog,columid,columnpagelist);
							}
						if(id == 'box10Div')
							{
								var name = "map";
								updatePageListingForBlogColumn(domain_id,page_id,name,title_id,titleforblog,columid,columnpagelist);
							}
						if(id == 'box11Div')
							{
								var name = "slider";
								updatePageListingForBlogColumn(domain_id,page_id,name,title_id,titleforblog,columid,columnpagelist);
							}
						if(id == 'box12Div')
							{
								var name = "google_adsense";
								updatePageListingForBlogColumn(domain_id,page_id,name,title_id,titleforblog,columid,columnpagelist);
							}
						if(id == 'box13Div')
							{
								var name = "column_show";
								updatePageListingForBlogColumn(domain_id,page_id,name,title_id,titleforblog,columid,columnpagelist);
							}
					}
			}
		else if(store_comment == '1')
			{
				return false;
			}
		else
			{
				if(id == 'box1Div')
					{
						var name="title_select";
						updatePageListingForColumn(domain_id,page_id,name,"buildTitle",columid,columnpagelist);
					}
				if(id == 'box2Div')
					{
						var name = "description_select";
						updatePageListingForColumn(domain_id,page_id,name,"buildPara",columid,columnpagelist);
					}
				if(id == 'box3Div')
					{
						var name = "image_multiple_select";
						updatePageListingForColumn(domain_id,page_id,name,"buildImgTxt",columid,columnpagelist);
					}
				if(id == 'box4Div')
					{
						var name = "image_select";
						updatePageListingForColumn(domain_id,page_id,name,"buildImg",columid,columnpagelist);
						
					}
				if(id == 'box5Div')
					{
						var name = "contact_form";
						updatePageListingForColumn(domain_id,page_id,name,"buildContact",columid,columnpagelist);
					}
				if(id == 'box6Div')
					{
						var name = "divider";
						updatePageListingForColumn(domain_id,page_id,name,"buildDivide",columid,columnpagelist);
					}
				if(id == 'box7Div')
					{
						var name = "youtube_video";
						updatePageListingForColumn(domain_id,page_id,name,"youtube_video",columid,columnpagelist);
					}
				if(id == 'box8Div')
					{
						var name = "social_plugins";
						updatePageListingForColumn(domain_id,page_id,name,"buildSocial",columid,columnpagelist);
					}
				if(id == 'box9Div')
					{
						var name = "gallery";
						updatePageListingForColumn(domain_id,page_id,name,"buildSocial",columid,columnpagelist);
					}
				if(id == 'box10Div')
					{
						var name = "map";
						updatePageListingForColumn(domain_id,page_id,name,"map",columid,columnpagelist);
					}
				if(id == 'box11Div')
					{
						var name = "slider";
						updatePageListingForColumn(domain_id,page_id,name,"slider",columid,columnpagelist);
					}
				if(id == 'box12Div')
					{
						var name = "google_adsense";
						updatePageListingForColumn(domain_id,page_id,name,"google_adsense",columid,columnpagelist);
					}
				if(id == 'box13Div')
					{
						var name = "column_show";
						updatePageListingForColumn(domain_id,page_id,name,"column_show",columid,columnpagelist);
					}
			}
		});
	
}
var dragDropObj = new dragDrop();
var blog_comment = $('#blog_comment').val();
var title_id = $('#title_id').val();
if(blog_comment == "0")
	{
		dragDropObj.addSource('box1',true);	// Make <div id="box1"> dragable. slide item back into original position after drop
		dragDropObj.addSource('box2',true);	// Make <div id="box2"> dragable. slide item back into original position after drop
		dragDropObj.addSource('box3',true);	// Make <div id="box3"> dragable. slide item back into original position after drop
		dragDropObj.addSource('box4',true);	// Make <div id="box4"> dragable. slide item back into original position after drop
		dragDropObj.addSource('box5',true);	
		dragDropObj.addSource('box6',true);	
		dragDropObj.addSource('box7',true);	
		dragDropObj.addSource('box8',true);
		dragDropObj.addSource('box9',true);
		dragDropObj.addSource('box10',true);
		dragDropObj.addSource('box11',true);	
		dragDropObj.addSource('box12',true);
		dragDropObj.addSource('box13',true);
		dragDropObj.addTarget('dropBox','dropItems');	// Set <div id="dropBox"> as a drop target. Call function dropItems on drop
		dragDropObj.addTarget('dropBox2','dropItems2');	// Set <div id="dropBox2"> as a drop target. Call function dropItems2 on drop
		dragDropObj.init();
	}
else if(title_id != "")
	{
		dragDropObj.addSource('box1',true);	// Make <div id="box1"> dragable. slide item back into original position after drop
		dragDropObj.addSource('box2',true);	// Make <div id="box2"> dragable. slide item back into original position after drop
		dragDropObj.addSource('box3',true);	// Make <div id="box3"> dragable. slide item back into original position after drop
		dragDropObj.addSource('box4',true);	// Make <div id="box4"> dragable. slide item back into original position after drop
		dragDropObj.addSource('box5',true);	
		dragDropObj.addSource('box6',true);	
		dragDropObj.addSource('box7',true);	
		dragDropObj.addSource('box8',true);
		dragDropObj.addSource('box9',true);
		dragDropObj.addSource('box10',true);
		dragDropObj.addSource('box11',true);	
		dragDropObj.addSource('box12',true);
		dragDropObj.addSource('box13',true);		
		dragDropObj.addTarget('dropBox','dropItems');	// Set <div id="dropBox"> as a drop target. Call function dropItems on drop
		dragDropObj.addTarget('dropBox2','dropItems2');	// Set <div id="dropBox2"> as a drop target. Call function dropItems2 on drop
		dragDropObj.init();
	}
</script>
{/literal}
{/if}


{literal}
<script type="text/javascript">
	$(document).ready(function(){	
		$(".columnOption").change(function(){
			var columnOption = $( ".columnOption option:selected" ).text();
			if(columnOption == '2'){
				$(".imageGallery").css("width","49%");
			}
			if(columnOption == '3'){
				$(".imageGallery").css("width","32%");
			}
			if(columnOption == '4'){
				$(".imageGallery").css("width","24%");
			}
			if(columnOption == '5'){
				$(".imageGallery").css("width","19%");
			}
			if(columnOption == '6'){
				$(".imageGallery").css("width","15.5%");
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
				$(".imageGallery").css("border","0px solid #ddd");
			}
			if(borderOption == 'Thin'){
				$(".imageGallery").css("border","2px solid #ddd");
			}
			if(borderOption == 'Medium'){
				$(".imageGallery").css("border","3px solid #ddd");
			}
			if(borderOption == 'Thick'){
				$(".imageGallery").css("border","4px solid #ddd");
			}
		});
	});
</script>
{/literal}

{literal}
	<script type="text/javascript">
		$(document).ready(function(){
			 $('.BlogNewPost').click(function(){
			 	$('.BlogNewPostPopup').show();
				//$('.blogMask').show();
			});
		});
	</script>
{/literal}
{literal}
	<script type="text/javascript">
		$(document).ready(function(){
			$(".sucriptionPageLeft .subcriptionPlan:first .subcriptionPlanContent").show();
			$('.subcriptionPlan').find('.subcriptionPlanHead').click(function(){
				$('.subcriptionPlanHead').removeClass("active");
				$(this).addClass("active");
				$(".subcriptionPlanContent").hide();				
				$(this).next().slideToggle('fast');
				$(".subcriptionPlanContent").not($(this).next()).slideUp('fast');
			});
		});
		
		$(document).ready(function(){
			$('.myAccTab').find('.myAccTabHead').click(function(){
				$(".myAccTabCont").hide();				
				$(this).next().slideToggle('slow');
				$(".myAccTabCont").not($(this).next()).slideUp('slow');
			});
			$('.AccInfoRhtInnerButton').click(function(){
				$(this).next().slideToggle('slow');
			});
		});
	</script>
{/literal}
{literal}
	<script type="text/javascript">
		$(document).ready(function(){
			$(".sucriptionPageLeft .subcriptionPlan:first .subcriptionPlanContent").show();
			$('.subcriptionPlan').find('.subcriptionPlanHead').click(function(){
				$('.subcriptionPlanHead').removeClass("active");
				$(this).addClass("active");
				$(".subcriptionPlanContent").hide();				
				$(this).next().slideToggle('fast');
				$(".subcriptionPlanContent").not($(this).next()).slideUp('fast');
			});
		});
		
		$(document).ready(function(){
			$('.myAccTab').find('.myAccTabHead').click(function(){
				$(".myAccTabCont").hide();				
				$(this).next().slideToggle('slow');
				$(".myAccTabCont").not($(this).next()).slideUp('slow');
			});
			$('.AccInfoRhtInnerButton').click(function(){
				$(this).next().slideToggle('slow');
			});
		});
	</script>
{/literal}
{*literal}
	<script type="text/javascript">
		//////////F12 disable code////////////////////////
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
		}

	</script>
{/literal*}
{literal}
<script type="text/javascript">
		var columntd = $(".sample2 tr td").length;
		var columnwidth = $(".sample2").width();
		//var attr = $(".sample2 tr td").attr('style');
		$(".sample2 tr td.addwidth").css("width",columnwidth/columntd);
		var onSampleResized = function(e){
			var columns = $(e.currentTarget).find("td");
			var msg = '';
			columns.each(function(){ msg += $(this).width() + "px; "; });
			var tdone = $(".sample2 tr td:first").width();
			var tdtwo = $(".sample2 tr td:nth-child(2)").width();
			var tdthree = $(".sample2 tr td:nth-child(3)").width();
			var tdfour = $(".sample2 tr td:nth-child(4)").width();
			var tdfive = $(".sample2 tr td:nth-child(5)").width();
			var colpagelist = $(e.currentTarget).find(".columnpagelistid").val();	
			updatewidthvalue(tdone,tdtwo,tdthree,tdfour,tdfive,colpagelist);
		};	
		//$(".sample2 tr td:nth-child(3),.sample2 tr td:nth-child(4),.sample2 tr td:nth-child(5)").hide();
		function colResize(){
			$(".sample2").colResizable({
				liveDrag:true, 
				draggingClass:"dragging", 
				onResize:onSampleResized
			});	
		}
		colResize();
		//$(".sample2 tr td").removeClass("addwidth")
		function selecttochange(tdcountvar,pagelistid){
			var countval = $(tdcountvar).val();
			var tdcount = $(".sample2 tr td").length;
			
			$(".relative .CRC:first-child").remove();
			$(".sample2 tr td").removeAttr("style");
			if(countval == 2){
				if(tdcount >2){
					$(tdcountvar).next(".sample2 tr td:nth-child(3),.sample2 tr td:nth-child(4),.sample2 tr td:nth-child(5)").hide();	
					$.getScript("js/colResizable-1.3.min.js");
					colResize();			
				}
				if(tdcount == 2){
					$.getScript("js/colResizable-1.3.min.js");
					colResize();	
				}
			}	
			if(countval == 3){
				if(tdcount >3){
					$(tdcountvar).next(".sample2 tr td:nth-child(4),.sample2 tr td:nth-child(5)").hide();	
					$.getScript("js/colResizable-1.3.min.js");
					colResize();	
				}
				if(tdcount == 3){
					$.getScript("js/colResizable-1.3.min.js");
					colResize();	
				}
				if(tdcount == 2){
					//$(".sample2 tr").append("<td>3</td>");
					$(tdcountvar).next(".sample2 tr td:nth-child(3)").show();
					$.getScript("js/colResizable-1.3.min.js");
					colResize();	
				}
			}	
			if(countval == 4){
				if(tdcount >4){
					$(tdcountvar).next(".sample2 tr td:nth-child(5)").hide();	
					$.getScript("js/colResizable-1.3.min.js");
					colResize();
				}	
				if(tdcount == 4){
					$.getScript("js/colResizable-1.3.min.js");
					colResize();
				}
				if(tdcount == 3){
					//$(".sample2 tr").append("<td>4</td>");
					$(tdcountvar).next(".sample2 tr td:nth-child(4)").show();
					$.getScript("js/colResizable-1.3.min.js");
					colResize();
				}
				if(tdcount == 2){
					//$(".sample2 tr").append("<td>3</td><td>4</td>");
					$(tdcountvar).next(".sample2 tr td:nth-child(3),.sample2 tr td:nth-child(4)").show();
					$.getScript("js/colResizable-1.3.min.js");
					colResize();
				}
			}	
			if(countval == 5){
				if(tdcount == 5){
					$.getScript("js/colResizable-1.3.min.js");
					colResize();
				}
				if(tdcount == 4){
					//$(".sample2 tr").append("<td>5</td>");	
					$(tdcountvar).next(".sample2 tr td:nth-child(5)").show();
					$.getScript("js/colResizable-1.3.min.js");
					colResize();	
				}
				if(tdcount == 3){
					//$(".sample2 tr").append("<td>4</td><td>5</td>");	
					$(tdcountvar).next(".sample2 tr td:nth-child(4),.sample2 tr td:nth-child(5)").show()
					$.getScript("js/colResizable-1.3.min.js");
					colResize();	
				}
				if(tdcount == 2){
					//$(".sample2 tr").append("<td>3</td><td>4</td><td>5</td>");	
					$(tdcountvar).next(".sample2 tr td:nth-child(3),.sample2 tr td:nth-child(4),.sample2 tr td:nth-child(5)").show()
					$.getScript("js/colResizable-1.3.min.js");
					colResize();	
				}
			}
			colResize();	
			$(".sample2 tr td").attr("contenteditable","true");
			updateColoumCount(countval,pagelistid);
		}			
	</script>
{/literal}

{literal}
<script type="text/javascript">
$(document).ready(function(){
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
	});
	$("#dropBox2 .deleteBg").click(function(){
		var leftvalue = $(this).offset().left - 100;
		$("#deletePopup").css("left",leftvalue);
	});
	$(".tableslider").click(function(){
		$(".mainLeftPanel,.headerSec").addClass("zindex1000");
		$("#maska").remove();
		$("#maskatable").show();
	});
	$(".closetableslider").click(function(){
		$(".mainLeftPanel,.headerSec").removeClass("zindex1000");
		$("#maskatable").hide();
	});
	//$(".sample2 td").resizable();
});	
	/*$.fn.textWidth = function(){
	  var html_org = $(this).html();
	  var html_calc = '<span>' + html_org + '</span>';
	  $(this).html(html_calc);
	  var width = $(this).find('span:first').width();
	  $(this).html(html_org);
	  return width;
	};
	function headinglimit(limit){
		var textcount = $(limit).textWidth();
		var textcountWidth = $('.mainRhtBannerInnerRight').width();
		if(textcount >= textcountWidth){
			$(limit).removeAttr("contenteditable");   
		}
		else{			        
		}
	}*/
	//function headinglimit(limit){
	/*$(document).ready(function(){
		$("#headingContent").keypress(function(){
			var a = $(this).text().length;
			var b = $(this).text();
			var c = '<span class="headlimit">'+b+'</span>'
			$(this).html(c);
		});
	});*/
	$("#maska").mousedown(function(){
		return false;
	});
</script>
{/literal}