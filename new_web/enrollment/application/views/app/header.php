<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"><head>
	<base href="<?php echo base_url(); ?>"/>
	<title>
		<?php echo $title;?>
	</title>
	<meta name="keywords" content="<?php echo $keywords;?>"/>
	<meta name="description" content="<?php echo $description;?>"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<?php foreach($css as $c){?>
	<link rel="stylesheet" media="screen" type="text/css" href="<?php echo $c;?>"/>
	<?php }?>


    <link rel="shortcut icon" href="../images/favicon.ico">


	<link href="https://fonts.googleapis.com/css?family=Exo+2:400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/common.css">
	<link rel="stylesheet" href="../css/magnific-popup.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/progress.js"></script>
	<script type="text/javascript" src="../js/jquery.marquee.js"></script>
	<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="../js/jquery.inview.js"></script>
	<script type="text/javascript" src="../js/checkBrowser.js"></script>
	<script type="text/javascript" src="../js/jquery.ba-bbq.min.js"></script>
	<script type="text/javascript" src="../js/common.js"></script>
	<script type="text/javascript" src="../js/jquery.magnific-popup.js"></script>





	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117493966-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push( arguments );
		}
		gtag( 'js', new Date() );

		gtag( 'config', 'UA-117493966-1' );
	</script>
</head>






<body class="<?php echo $this->router->method;?> registration">
	<div class="white-tran"></div>


	<div class="load-txt"></div>


	<div class="mmenu-blk">


		<a class="logo" href="../home"><img src="../images/logo.png"></a>






		<a href="javascript:void(0);" class="menu-grid-btn">

			<div class="cross-bg"></div>
			<ul>
				<li class="first"></li>
				<li class="middle"></li>
				<li class="last"></li>
			</ul>

		</a>

		<ul class="list app-list">
			<li><a href="https://appsto.re/hk/qOLTib.i" class="app-link" target="_blank"><img src="../images/appstore-app.png"></a>
			</li>
			<li><a href="https://play.google.com/store/apps/details?id=hk.com.meg.pdistudent" class="app-link" target="_blank"><img src="../images/google-play-app.png"></a>
			</li>
		</ul>



		<!--
<li class="first"><a  href="../home"><span class="eng">HOME</span><br/>
        <span class="chi">主頁</span></a>
					</li><li><a   href="../news"><span class="eng">NEWS</span><br/>
        <span class="chi">最新消息</span></a>
					</li><li><a   href="../course"><span class="eng">COURSE</span><br/>
        <span class="chi">課程介紹</span></a>
					</li><li><a   href="../company"><span class="eng">COMPANY</span><br/>
        <span class="chi">公司資訊</span></a>
					</li><li><a   href="../contact-us"><span class="eng">CONTACT US</span><br/>
        <span class="chi">聯絡我們</span></a>
        			</li><li class="last"><a class='active'  href="http://www.meghongkong.com/meg/index.php/app/index/A1_Web_Enrollment" target="_blank"><span class="eng">REGISTRATION</span><br/>
        <span class="chi">立即報名</span></a>
					</li>
					
-->
		<ul class="list-menu">
			<li><a href="../home"><span class="eng">HOME</span> <span class="chi">主頁</span></a>
			</li>
			<!--<li><a href="../news"><span class="eng">NEWS</span> <span class="chi">最新消息</span></a></li>-->
			<li><a href="../course"><span class="eng">COURSE</span> <span class="chi">課程介紹</span></a>
			</li>
			<li><a href="../agent"><span class="eng">AGENT</span> <span class="chi">代辦課程</span></a>
			</li>
			<li><a href="../company"><span class="eng">COMPANY</span> <span class="chi">公司資訊</span></a>
			</li>
			<li><a href="../enquiry"><span class="eng">ENQUIRY</span> <span class="chi">報名查詢</span></a>
			</li>
			<!--<li><a href="../contact-us"><span class="eng">CONTACT US</span> <span class="chi">聯絡我們</span></a></li>
-->
			<li><a href="../registration#1" target="_blank"><span class="eng">REGISTRATION</span> <span class="chi">立即報名</span></a>
			</li>
			<!--<li class="last"><a target="_blank" class="student-area-btn" href="http://testapi.meghk.com/Meg/student"><img src="../images/student-area-btn.png"></a>
    
    </li>-->
			<li>

				<ul class="contact-info">
					<li>考牌快線：6511-3311</li>
					<li>東九龍熱線：8100-9228</li>
					<li><a href="mailto:info@a1driving.com.hk" target="_blank">info@a1driving.com.hk</a>
					</li>
				</ul>
			</li>

			<li>
				<table>
					<tbody>
						<tr>
							<td>獨家代理商：</td>
							<td>
								<div class="logo-set">
									<a href="http://www.meg.com.hk/tc/" target="_blank"><img src="../images/meg-logo.png"></a>
								</div>
							</td>


						</tr>

					</tbody>
				</table>

			</li>
		</ul>

	</div>
	<div class="main-container">


		<div class="header-blk">
			<div class="header">
				<div class="top-bar"> <a class="logo" href="../home"><img src="../images/logo.png"></a>
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
					<!--<a class="student-area-btn" href="http://testapi.meghk.com/Meg/student" target="_blank"><img src="../images/student-area-btn.png"></a>-->

					<!--<a class="reg-master-btn" href="javascript:void(0);" target="_blank"><img src="../images/reg-master-btn.png"></a>
-->

				</div>
			</div>
			<div class="menu-blk">
				<ul>
					<li class="first"><a href="../home"><span class="eng">HOME</span><br/> <span class="chi">主頁</span></a></li><li class="menu-course-li"><a href="../course"><span class="eng">COURSE</span><br/> <span class="chi">課程介紹</span></a><!--<a href="../course-plus" class="a1-plus-menu-btn"><img src="../images/a1-plus-menu-btn.png"></a>--></li><li><a href="../agent"><span class="eng">AGENT</span><br/> <span class="chi">代辦課程</span></a></li><li><a href="../company"><span class="eng">COMPANY</span><br/> <span class="chi">公司資訊</span></a></li><li><a href="../enquiry"><span class="eng">ENQUIRY</span><br/> <span class="chi">報名查詢</span></a></li><li class="last"><a class='active' href="https://www.a1driving.com.hk/enrollment/index.php/app/index/A1_Web_Enrollment"><span class="eng">REGISTRATION</span><br/> <span class="chi">立即報名</span></a></li>

					<!--	<li>
					<a   href="javascript:void(0);" target="_blank">學生專區</a>
					</li>
					
					<li class="last">
					</li>-->

				</ul>
				<ul class="active-bar">
					<li class="first">
						<div class="color-bar "></div>
					</li>
					<!--	<li>
						<div class="color-bar "></div>
					</li>-->
					<li>
						<div class="color-bar "></div>
					</li>
					<li>
						<div class="color-bar "></div>
					</li>
					<li>
						<div class="color-bar "></div>
					</li>
					<li>
						<div class="color-bar "></div>
					</li>
					<li class="last">
						<div class="color-bar active"></div>
					</li>
				</ul>
			</div>
			<div class="home-line"></div>
		</div>
		<div class="contact-us-banner main-banner">

			<img class="banner-img-bg" src="../images/contact-us-banner.jpg">


			<div class="banner-title-blk-outer">
				<div class="banner-title-blk">

					<div class="middle">
						<div class="eng-title animated-text-blk">
							<div class="animated-bar"></div>

							<span class="lang">REGISTRATION</span>
						</div>

						<div class="line"></div>

						<div class="chi-title animated-text-blk">
							<div class="animated-bar"></div>

							<span class="lang">- 立即報名 -</div>

			 </div>
				 </div>
		</div>
   </div>
   
   <div class="breadcrumb">
   	<a href="../home">Home 主頁</a> > <a href="https://www.a1driving.com.hk/enrollment/index.php/app/index/A1_Web_Enrollment">Registration 立即報名</a>
   	
   </div>
   
    <div class="section registration">
    <div class="middle enrollment-style" id="enrollment_start">
      <div class="section-title animated-text-blk">
     
          
          <div class="animated-bar"></div>
       
         <span class="eng lang">REGISTRATION</span> <span class="chi lang">報名查詢</span> </div>


						<?php 
		
		 $page_id = $this->uri->segment('3');
		
		$this->load->helper('url');

		$currentURL = site_url();
		$controller =$this->router->fetch_class();
		$method = $this->router->fetch_method(); // for method
;
		
		$url= $currentURL.'/'.$controller.'/'.$method.'/';
		
		?>

	<div class="iframe-nav">
		<ul class="col-menu">
			<li><a href="<?php echo $url."A1_Web_Enrollment"; ?>#s" <?php echo ($page_id=='A1_Web_Enrollment' ) ? "class='active'" : ""; ?> >私家車/輕型貨車 課程</a>
			</li>
			
			<li><a href="<?php echo $url."A1_Web_Enrollment_Plus"; ?>#s" <?php echo ($page_id=='A1_Web_Enrollment_Plus' ) ? "class='active'" : ""; ?> >私家車/輕型貨車「星級師傅」課程</a>
			</li>
			
			
			<li><a href="<?php echo $url."A1_Web_Enrollment_MC"; ?>#s" <?php echo ($page_id=='A1_Web_Enrollment_MC' ) ? "class='active'" : ""; ?>>電車單 課程</a>
			</li>

		</ul>
	</div>



						<div class="page-wrap">



							<style type="text/css">

							</style>

							<script type="text/javascript">
								
								function getUrlVars()
								{
									var vars = [], hash;
									var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
									for(var i = 0; i < hashes.length; i++)
									{
										hash = hashes[i].split('=');
										vars.push(hash[0]);
										vars[hash[0]] = hash[1];
									}
									return vars;
								}


								$( function () {

									
									
									
									$( window ).bind( 'hashchange', function ( e ) {
										init_scrollTop();
									} );
									
									init_scrollTop();
									
									var modify =  getUrlVars()["a"];
									if(modify==1)
										{
												window.location.hash='s';

										}

									function init_scrollTop() {
										var hash = window.location.hash.substring( 1 );
										if ( hash == 's' ) {
											
											$(window).load(function(){
												
													$( 'html, body' ).animate( {
												scrollTop: $('#enrollment_start').offset().top-100
											}, 0 );
												
											})
										
										}
									}



								} )
							</script>