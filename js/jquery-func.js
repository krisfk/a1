// jQuery for page scrolling feature - requires jQuery Easing plugin
/*$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});*/

/*-------------------------------------
  rollover2
-------------------------------------*/
/*$(".car1").fadeIn('slow',function(){
  $(this).animate({'right': '-=10px'},'slow');
});
$(".car2").fadeIn('slow',function(){
  $(this).animate({'right': '+=10px'},'slow');
});*/


(function($) {
	
	$.fn.opOver = function(op,oa,durationp,durationa){
		
		var c = {
			op:op? op:1.0,
			oa:oa? oa:0.6,
			durationp:durationp? durationp:'fast',
			durationa:durationa? durationa:'fast'
		};
		

		$(this).each(function(){
			$(this).css({
					opacity: c.op,
					filter: "alpha(opacity="+c.op*100+")"
				}).hover(function(){
					$(this).fadeTo(c.durationp,c.oa);
				},function(){
					$(this).fadeTo(c.durationa,c.op);
				})
		});
	},
	
	$.fn.wink = function(durationp,op,oa){

		var c = {
			durationp:durationp? durationp:'slow',
			op:op? op:1.0,
			oa:oa? oa:0.2
		};
		
		$(this).each(function(){
			$(this)	.css({
					opacity: c.op,
					filter: "alpha(opacity="+c.op*100+")"
				}).hover(function(){
				$(this).css({
					opacity: c.oa,
					filter: "alpha(opacity="+c.oa*100+")"
				});
				$(this).fadeTo(c.durationp,c.op);
			},function(){
				$(this).css({
					opacity: c.op,
					filter: "alpha(opacity="+c.op*100+")"
				});
			})
		});
	}
	
})(jQuery);	




(function($) {
$(function() {

  $('.over1').opOver();
  $('.over2').wink();
  $('.over3').opOver(0.6,1.0);
  $('.over4').opOver(1.0,0.6,200,500);
  $('.over5').wink(200);
  $('.over6').wink('slow',0.2,1.0);
  $('.over7').opOver(0.1,1.0);
  $('.test1 .over ').opOver();

});
})(jQuery);


$(document).ready(function(){
			
			$("#back").click(function(){
		   	window.location.href = "./notice.html";
		    }); 

		   	$("#meg").click(function(){
		   	window.open('http://www.meg.com.hk/');
		  	}); 
			
		   	$("#fb").click(function(){
		   	window.open('http://www.facebook.com/a1drive');
		  	}); 
		   
		  	$("#twitter").click(function(){
		   	window.open('https://twitter.com/');
		   	}); 
		   
		   	$("#instagram").click(function(){
		   	window.open('http://instagram.com/meg_driving');
		   	}); 
		   
});