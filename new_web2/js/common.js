// JavaScript Document



$(function () {

	var offsetTop = 90;
	$(window).load(function () {
		$('.home-banner.main-banner').addClass('loaded');
		
		$('.marquee').marquee({
			direction: 'left',
			duration: 40000,
		    duplicated: true,
			gap:0,
			startVisible:true
		});	
		
	})
	
	$(window).scroll(function(){
		
			var nowPos=$(document).scrollTop();
		
		if(nowPos>$('.main-container .header').height())
		{
				$('.menu-blk').css({'position':'fixed','top':'0','z-index':'1000'});
				$('.home-line').css({'position':'fixed','top':'0','width':'100%','top':'50px','z-index':'80'});
				
				var marginTop=$('.menu-blk').height()+$('.home-line').height();
				$('.main-container').css({'margin-top':marginTop+'px'});
				
		}
		else
		{
			$('.menu-blk').css({'position':'relative','top':'','z-index':'1000'});
			$('.home-line').css({'position':'relative','top':'','width':'100%','z-index':'80'});
				$('.main-container').css({'margin-top':'0px'});

			/*
			  height: 4px;
    background: #fff;
    margin: 0px 0 0 0;
    border-bottom: 1px solid #cccccc;
	opacity: 0.8;
			*/
				
		}

	})

	$('.menu-blk ul li a').mouseenter(function () {

		var button_idx = $(this).parent('li').index();

		$('.active-bar li .color-bar').eq(button_idx).addClass('hover');

	})

	
	$('.news-dot-btn').click(function(e){
				e.preventDefault();
		
			if(!$(this).hasClass('dots'))
				{
						$('.news-dot-btn').removeClass('active');
						$(this).addClass('active');
				}
	})

	$('.menu-blk ul li a').mouseleave(function () {

		var button_idx = $(this).parent('li').index();

		$('.active-bar li .color-bar').removeClass('hover');

	})

	$('.course.section .middle2 li >a').mouseenter(function () {
		$(this).addClass('bounceIn');
	})

	
	$('.back-to-top-btn').click(function(e){
		e.preventDefault();
		$('body,html').stop().animate({scrollTop: 0},{duration:1000, easing:"easeInOutQuart",complete:function(){}} );

	})
	
	$('.mouse-btn').click(function(e){
		e.preventDefault();
		$('body,html').stop().animate({scrollTop: $('.section.news').offset().top-offsetTop},{duration:1000, easing:"easeInOutQuart",complete:function(){animatingScroll=false;}} );

	})

	initAnimation();
	
	
	$('.meg-gor-btn').bind('inview', function (event, visible) {
	//	alert($('.meg-gor-btn img').height());
		$('.meg-gor-btn').animate({'top':-$('.meg-gor-btn img').height()+'px'},{duration:1000, easing:"easeInOutQuart",complete:function(){$(this).css({'z-index':'200'})}}) ;
		//    top: -191px;

	})
	
	$('.animated-text-blk').bind('inview', function (event, visible) {
	  if (visible == true) {
//		  alert(5);
		  
			var idx=$('.animated-text-blk').index(this);
		  if(!$('.animated-text-blk').eq(idx).hasClass('animated'))
		  {  		$('.animated-text-blk').eq(idx).addClass('animated');
		 //  			$('.animated-text-blk').eq(idx).find('.lang').css({'opacity':'0'});
		   //			$('.animated-text-blk').eq(idx).find('.animated-bar').css({'width':'0%'});
		  	
		   		if(!$('.main-banner .line').hasClass('animated'))
				{
		   			$('.main-banner .line').css({'width':'0%'});
		   			$('.main-banner .line').addClass('animated');
		   			$('.main-banner .line').delay(800).animate({'width':'100%'},{duration:800, easing:"easeInOutQuart"});
				}
		   
		   			$('.animated-text-blk').eq(idx).find('.animated-bar').stop().delay(200).animate({'width':'100%'},{duration:400, easing:"easeInOutQuart",complete:function(){
						$('.animated-text-blk').eq(idx).find('.animated-bar').css({'left':'auto','right':'0px'});
						$('.animated-text-blk').eq(idx).find('.lang').animate({'opacity':'1'},{duration:1000, easing:"easeInOutQuart"} );
						$('.animated-text-blk').eq(idx).find('.animated-bar').stop().animate({'width':'0%'},{duration:400, easing:"easeInOutQuart",complete:function(){
							$(this).remove();
						}} );

					}} );
		  }
		 
	  } else {}
	});

	
	
	
		updateMarquee();

	
	$(window).resize(function(){
		updateMarquee();
		
		$('.meg-gor-btn').css({'top':-$('.meg-gor-btn img').height()+'px'}) ;

		
	})
	
	
	
	
	$('.employment-btn').click(function(e){
		e.preventDefault();
		$('.employment-btn').removeClass('active');
		$(this).addClass('active');
		var idx= $(this).parent('li').index();
		$('.employment-detail-content-blk').css({'display':'none'});
		$('.employment-detail-content-blk-'+Number(idx+1)).css({'opacity':'0','display':'inline-block'});
		$('.employment-detail-content-blk-'+Number(idx+1)).animate({'opacity':'1'},500);
	})

	$('.menu-grid-btn').click(function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		
		if($(this).hasClass('active'))
		{
				$('.mmenu-blk').stop().animate({'height':'100%'},{duration:200, easing:"easeInOutQuart"} );

		}
		else{
							$('.mmenu-blk').stop().animate({'height':'38px'},{duration:200, easing:"easeInOutQuart"} );

		}
		
	})

})

function updateMarquee()
{
	var view_w= $(window).width()+20;
		$('.marquee').css({'width':view_w+'px','margin-left':'-10px'});
		
}

function initAnimation() {
	
	$('.meg-gor-btn').css({'top':'0px'});
/*	mouseAnimation();
*/	animateBar();
}

function mouseAnimation() {
	$('.mouse-btn').css({
		'margin-top': '25px'
	});
	$('.mouse-btn').animate({
		'margin-top': '30px'
	}, 1000, function () {
		mouseAnimation();
	});
}

function animateBar()
{
	

}


