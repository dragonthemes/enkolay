$(document).ready(function() {

    $('.fancybox').fancybox();
    $(".fancybox-effects-a").fancybox({
        helpers: {
            title: {
                type: 'outside'
            },
            overlay: {
                speedOut: 0
            }
        }
    });
    $(".fancybox-effects-b").fancybox({
        openEffect: 'none',
        closeEffect: 'none',

        helpers: {
            title: {
                type: 'over'
            }
        }
    });
    $('.fancybox-thumbs').fancybox({
        prevEffect: 'none',
        nextEffect: 'none',
        closeBtn: true,
        arrows: true,
        nextClick: true,
        helpers: {
            thumbs: {
                width: 50,
                height: 50
            }
        }
    });

});
$(document).ready(function() {
    $('#slider').nivoSlider();
});
$(document).ready(function() {
    $('#slider2').nivoSlider();
});


$(document).ready(function() {
    var winHei = $(window).height();
    var docHei = $(document).height();
    if (winHei < docHei) {
       /* $(".footerScriptBg").css({
            "position": "absolute",
            "bottom": "0",
            "width": 100 + "%"
        })
        $(".theme2Banner").css({
            "height": 100 + "%"
        });*/
    }
});
$(document).ready(function() {
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
	$('.carousel').carousel({
		interval: 5000 //
	});
});