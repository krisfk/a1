<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">

	<title>A1駕駛學校 學車快線：6511-3311 服務熱線：8100-9228</title>
	<link href="https://fonts.googleapis.com/css?family=Exo+2:400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $base; ?>css/animate.css">
	<link rel="stylesheet" href="<?php echo $base; ?>css/common.css">
	<link rel="stylesheet" href="<?php echo $base; ?>css/magnific-popup.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $base; ?>js/progress.js"></script>
	<script type="text/javascript" src="<?php echo $base; ?>js/jquery.marquee.js"></script>
	<script type="text/javascript" src="<?php echo $base; ?>js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php echo $base; ?>js/jquery.inview.js"></script>
	<script type="text/javascript" src="<?php echo $base; ?>js/checkBrowser.js"></script>
	<script type="text/javascript" src="<?php echo $base; ?>js/jquery.ba-bbq.min.js"></script>
	<script type="text/javascript" src="<?php echo $base; ?>js/common.js"></script>
	<script type="text/javascript" src="<?php echo $base; ?>js/jquery.cookie.js"></script>

	<script type="text/javascript" src="<?php echo $base; ?>js/jquery.magnific-popup.js"></script>

	<link rel="shortcut icon" href="<?php echo $base; ?>images/favicon.ico">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117493966-2"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push( arguments );
		}
		gtag( 'js', new Date() );

		gtag( 'config', 'UA-117493966-2' );
	</script>

	<!-- Google Tag Manager -->
	<script>
		( function ( w, d, s, l, i ) {
			w[ l ] = w[ l ] || [];
			w[ l ].push( {
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			} );
			var f = d.getElementsByTagName( s )[ 0 ],
				j = d.createElement( s ),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore( j, f );
		} )( window, document, 'script', 'dataLayer', 'GTM-58978PC' );
	</script>
	<!-- End Google Tag Manager -->

	<style type="text/css">
		@-webkit-keyframes blink {
			from {
				opacity: 1.0;
			}
			to {
				opacity: 0.0;
			}
		}
		
		.blink {
			-webkit-animation-name: blink;
			-webkit-animation-iteration-count: infinite;
			-webkit-animation-timing-function: cubic-bezier(1.0, 0, 0, 1.0);
			-webkit-animation-duration: 1s;
		}
	</style>
</head>

<body class="<?php echo $pos;?>">




	<?php

	date_default_timezone_set( 'Asia/Hong_Kong' );

	function check_in_range( $start_date, $end_date, $date_from_user ) {
		// Convert to timestamp
		$start_ts = strtotime( $start_date );
		$end_ts = strtotime( $end_date );
		$user_ts = strtotime( $date_from_user );
		// Check that user date is between start & end
		return ( ( $user_ts >= $start_ts ) && ( $user_ts <= $end_ts ) );
	}


	$start_date = '2018-08-01';
	$end_date = '2020-08-08';
	$date_from_user = date( "Y-m-d" );

	if ( check_in_range( $start_date, $end_date, $date_from_user ) ) {
		echo '<a class="new-shop-banner" href="https://www.a1driving.com.hk/images/a1-discount-web-2.jpg" style="display: none;">.</a>
	<script type="text/javascript">
		$( function () {
			if ( $.cookie( "enter" ) != 1 ) {
				
				$.cookie( "enter", 1, {
					expires: 7,
					path: "/"
				} );

				$( window ).load( function () {
					$( ".new-shop-banner" ).click();
				} );
				
			}

			$( ".new-shop-banner" ).magnificPopup( {
				type: "image"
			} );
} );
	</script>';
	}




	?>



	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-58978PC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->


	<div class="white-tran"></div>
	<?php

	$useragent = $_SERVER[ 'HTTP_USER_AGENT' ];

	if ( preg_match( '/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent ) || preg_match( '/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr( $useragent, 0, 4 ) ) ) {
		$mobile = true;
	}

	?>


	<div class="load-txt"></div>



	<?php include 'mmenu.php'; ?>

	<div class="main-container">


		<div class="header-blk">

<!--			<a class="warning-bar" href="<?php echo $base;?>top-news"><span class="blink">【惡劣天氣安排】</span></a>
-->			<div class="header">
				<div class="top-bar"> <a class="logo" href="<?php echo $base;?>home"><img src="<?php echo $base;?>images/logo.png"></a>
					<!--<div class="des">由擁有多年教授經驗的金牌師傅專人指導，重實習精理論，排期特快。
					<ul><li>學車快線：6511-3311</li><li>服務熱線：8100-9228</li></ul>
					</div>-->

					<div class="header-contact-txt">
						<ul>

							<li>學車快線：6511-3311</li>
							<li>服務熱線：8100-9228</li>
						</ul>

					</div>


					<div class="list-app-list-blk">
						<ul class="list app-list">
							<li><a href="https://www.a1driving.com.hk/app/ios/" class="app-link" target="_blank"><img src="../images/appstore-app.png"></a>
							</li>
							<li><a href="https://www.a1driving.com.hk/app/android/" class="app-link" target="_blank"><img src="../images/google-play-app.png"></a>
							</li>
						</ul>
					</div>

					<!--   <ul class="list app-list">
					<li><a href="https://appsto.re/hk/qOLTib.i" class="app-link" target="_blank"><img src="../images/appstore-app.png"></a></li>
					<li><a href="https://play.google.com/store/apps/details?id=hk.com.meg.pdistudent" class="app-link" target="_blank"><img src="../images/google-play-app.png"></a></li>
					</ul>-->


					<!--<div class="contact-info"> 學車快線：6511-3311<br/> 東九龍學車熱線：8106-4717 </div>-->
					<!--<a class="student-area-btn" href="http://testapi.meghk.com/Meg/student" target="_blank"><img src="<?php echo $base;?>images/student-area-btn.png"></a>-->

					<!--<a class="reg-master-btn" href="javascript:void(0);" target="_blank"><img src="<?php echo $base;?>images/reg-master-btn.png"></a>
-->

				</div>
			</div>
			<div class="menu-blk"><ul><li class="first"><a <?php if($pos=="home" ) echo "class='active'";?> href="<?php echo $base;?>home"><span class="eng">HOME</span><br/> <span class="chi">主頁</span></a></li><li><a <?php if($pos=="course" ) echo "class='active'";?> href="<?php echo $base;?>course"><span class="eng">COURSE</span><br/> <span class="chi">課程介紹</span></a></li><li><a <?php if($pos=="agent" ) echo "class='active'";?> href="<?php echo $base;?>agent"><span class="eng">AGENT</span><br/> <span class="chi">代辦課程</span></a></li><li><a <?php if($pos=="company" ) echo "class='active'";?> href="<?php echo $base;?>company"><span class="eng">COMPANY</span><br/> <span class="chi">公司資訊</span></a></li><li><a <?php if($pos=="enquiry" ) echo "class='active'";?> href="<?php echo $base;?>enquiry"><span class="eng">ENQUIRY</span><br/> <span class="chi">報名查詢</span></a></li><li class="last"><a <?php if($pos=="registration" ) echo "class='active'";?> href="<?php echo $base;?>enrollment/index.php/app/index/A1_Web_Enrollment"><span class="eng">REGISTRATION</span><br/> <span class="chi">立即報名</span></a></li></ul><ul class="active-bar"><li class="first"><div class="color-bar <?php if($pos==" home ") echo "active ";?>"></div></li><!--<li><div class="color-bar <?php if($pos=="news") echo "active";?>"></div></li>--><li><div class="color-bar <?php if($pos==" course ") echo "active ";?>"></div></li><li><div class="color-bar <?php if($pos==" agent ") echo "active ";?>"></div></li><li><div class="color-bar <?php if($pos==" company ") echo "active ";?>"></div></li><li><div class="color-bar <?php if($pos==" enquiry ") echo "active ";?>"></div></li><li class="last"><div class="color-bar <?php if($pos==" registration ") echo "active ";?>"></div></li></ul></div>
			<div class="home-line"></div>
		</div>