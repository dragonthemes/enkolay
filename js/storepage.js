$(document).ready(function() {
	$('.fancybox').fancybox();
	$(".fancybox-effects-a").fancybox({
		helpers: {
			title : {
				type : 'outside'
			},
			overlay : {
				speedOut : 0
			}
		}
	});
	$(".fancybox-effects-b").fancybox({
		openEffect  : 'none',
		closeEffect	: 'none',

		helpers : {
			title : {
				type : 'over'
			}
		}
	});
	$('.fancybox-thumbs').fancybox({
		prevEffect : 'none',
		nextEffect : 'none',
		closeBtn  : true,
		arrows    : true,
		nextClick : true,
		helpers : {
			thumbs : {
				width  : 50,
				height : 50
			}
		}
	});	
	$('.addtoMiniCartBtn').click(function(){
		$(window).scrollTop(0);
	});
	$('#slider').nivoSlider();
	$('#scrollSlide').zoom();
	$('#scrollSlide').cycle({
		fx: 'scrollHorz',
		speed:  'slow', 
		timeout: 0,
		next:   '#next', 
		prev:   '#prev',
		pager:  '#thumbScroll',
		pagerAnchorBuilder: function(idx, slide) { 
			return '<li><a href="#"><img src="' + slide.src + '" width="60" height="60" /></a></li>'; 
		}  
	});
	$("#thumbScroll li a").click(function(){
		var urlimage = $(this).children("img").attr("src");
		$(".zoomImg").remove();
		$('#scrollSlide').zoom({
			url: urlimage
		});
	});
});