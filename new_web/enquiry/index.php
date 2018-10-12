<!doctype html>

<?php $base = "../";?>
<?php $pos = "enquiry"; ?>

<?php include $base.'header.php'; ?>

<div class="contact-us-banner main-banner">

	<img class="banner-img-bg" src="<?php echo $base; ?>images/contact-us-banner.jpg">


	<div class="banner-title-blk-outer">
		<div class="banner-title-blk">

			<div class="middle">
				<div class="eng-title animated-text-blk">
					<div class="animated-bar"></div>

					<span class="lang">ENQUIRY</span>
				</div>

				<div class="line"></div>

				<div class="chi-title animated-text-blk">
					<div class="animated-bar"></div>

					<span class="lang">- 報名查詢 -</div>

			 </div>
				 </div>
		</div>
   </div>
   
   <div class="breadcrumb">
   	<a href="<?php echo $base;?>home">Home 主頁</a> > <a href="<?php echo $base;?>enquiry">Enquiry 報名查詢</a>
   	
   </div>
   
    <div class="section news">
    <div class="middle">
      <div class="section-title animated-text-blk">
     
          
          <div class="animated-bar"></div>
       
         <span class="eng lang">ENQUIRY</span> <span class="chi lang">報名查詢</span> </div>


				<div class="enquiry-side-menu">

					<ul>
						<li><img src="<?php echo $base;?>images/contact01.jpg" class="enquiry-side-menu-img">
						</li>

						<li><a href="javascript:void(0);" class="active enquiry-btn-a">A1 駕駛學校門市</a>
						</li>
						<li><a href="javascript:void(0);" class="enquiry-btn-a">MEG 門市 <span class="small">(獨家銷售代理)</span></a>
						</li>
						<li class="additional">

							<div class="text">
								學車快線： 6511-3311<br/> 服務熱線： 8100-9228<br/> 電郵： <a href="mailto:info@a1driving.com.hk">info@a1driving.com.hk</a>

							</div>
						</li>
					</ul>


				</div>

				<div class="contact-list-container cl cl-1">

					<h2>A1 駕駛學校門市</h2>


					<div>

						<span class="shop-name">A1 深水埗總店</span><br/> 地址： 長沙灣道264號 金輝大樓 地下B鋪<br/> 電話： 2359-9009<br/> 營業時間： 9:00am - 6:30pm[星期一至六] 11:00am - 6:00pm [星期日及公眾假期]<br/><br/>



						<?php
						date_default_timezone_set( 'Asia/Hong_Kong' );


						if ( new DateTime() > new DateTime( "2018-08-08 00:00:00" ) ) {


							?>
						<span class="shop-name">A1 土瓜灣分店暨電單車中心</span><br/> 地址： 土瓜灣靠背壟道121號富裕閣F及G地舖 (落山道交界)<br/> 電話： 2359-9192<br/> 營業時間： 9:00am - 8:00pm[星期一至六] 9:00am - 7:00pm [星期日及公眾假期]
						<?php

						} else {
							?>
						<span class="shop-name">A1 土瓜灣分店暨電單車中心</span><br/> 地址： 土瓜灣美善同道1號美嘉大廈 地下8號鋪<br/> 電話： 2359-9192<br/> 營業時間： 9:00am - 8:00pm[星期一至六] 9:00am - 7:00pm [星期日及公眾假期]
						<?php
						}


						?>

					</div>








				</div>


				<div class="contact-list-container cl cl-2">

					<h2>MEG 門市 <span class="small">(獨家銷售代理)</span><span class="meg-shop-work-hr">營業時間：11:30am - 8:30pm[星期一至日及公眾假期]</span></h2>


					<div>

						<span class="shop-name">MEG 銅鑼灣分店</span><br/> 銅鑼灣軒尼詩道 502 號黃金廣場 15 樓 1503 室 (港鐵銅鑼灣站F出口)<br/><br/>

						<span class="shop-name">MEG 旺角分店</span><br/> 旺角彌敦道 610 號荷李活商業中心 10 樓 1023 室 (港鐵旺角站E2出口，旺角百老匯戲院對面)<br/><br/>

						<span class="shop-name">MEG 荃灣分店</span><br/> 荃灣青山公路 263 - 267 號力生廣場地下 G8-10 號舖 (港鐵站 A 出口)<br/><br/>

						<span class="shop-name">MEG 元朗分店</span><br/> 元朗廣場2樓 266 號舖<br/><br/>

						<span class="shop-name">MEG 屯門分店</span><br/> 屯門港鐵站TUM42號舖 (近港鐵站D出口)<br/><br/>

						<span class="shop-name">MEG 觀塘分店</span><br/> 觀塘成業街 6 號 泓富廣場 13 樓 1309 室 (港鐵觀塘站 B1 出口)
						<br/> 營業時間： 9:00am - 6:00pm[星期一至六及公眾假期，星期日休息]
						<br/> <br/>

					</div>





				</div>



				<!--<ul class="wrap contact-info">






                    <li class="grid">
                        <img class="contact-img" src="<?php echo $base;?>images/contact01.jpg">
                        
                        <table  class="enquiry-table-info">
                            <tr><td class="col-1"> 學車快線：</td><td class="col-2">6511-3311 </td></tr>
                            <tr><td class="col-1"> 服務熱線：</td><td class="col-2">8100-9228 </td></tr>
                            
                            <tr><td class="col-1"> 電郵：</td><td class="col-2"><a href="mailto:info@a1driving.com.hk">info@a1driving.com.hk</a> </td></tr>
                            </table>
                   
                    </li>

                    <li class="grid">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.5711273753204!2d114.15881786545289!3d22.3320538973837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340400b34fe0ae47%3A0x360aaacf36277c50!2z5rex5rC05Z-X6ZW35rKZ54Gj6YGTMjY06Jmf6YeR6Lyd5aSn5qiT!5e0!3m2!1szh-TW!2shk!4v1511426539089" width="600" height="1250" frameborder="0" style="border:0" allowfullscreen></iframe>

                        
                         <table class="enquiry-table-info">
                         
							 
							  <tr>
								
								 <td class="col-1">I.</td>
								<td class="col-2">A1深水埗總店</td>
							 
							 </tr>							 
							  <tr>
								
								 <td class="col-1"></td>
								<td class="col-2">地址：<br/>長沙灣道 264號 金輝大樓 地下B鋪</td>
							 
							 </tr>
							 
							 
							 <tr><td class="col-1"> 地址：</td>
								<td class="col-2">
                                A1 深水埗總店<br/>
                                長沙灣道264號<br/>金輝大樓 地下B鋪 </td></tr>
                            <tr><td class="col-1"> 電話：</td><td class="col-2">2359-9009 </td></tr>
                            
                            <tr><td class="col-1"> 營業時間：</td><td class="col-2">9:00am - 6:30pm<br/> [星期一至六]<br/>
                                                11:00am - 6:30pm <br/>[星期日及公眾假期]<br/> </td></tr>
                            </table>
                  
                    </li>

                    <li class="grid">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.9071932081097!2d114.18492721545265!3d22.319349397842284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340400d717c629c5%3A0x3ac07ea31e0c0d40!2z5Zyf55Oc54Gj576O5ZaE5ZCM6YGTMS0xMeiZn-e-juWYieWkp-W7iA!5e0!3m2!1szh-TW!2shk!4v1511426414461" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        
                          <table class="enquiry-table-info">
                            <tr><td class="col-1"> 地址：</td><td class="col-2">A1土瓜灣分店暨電單車中心<br/>土瓜灣美善同道1號美嘉大廈 地下8號鋪 </td></tr>
                            <tr><td class="col-1"> 電話：</td><td class="col-2">2359-9192 </td></tr>
                            
                            <tr><td class="col-1"> 營業時間：</td><td class="col-2"> 9:00am - 8:00pm<br/>[星期一至六]<br/>
                                                9:00am - 7:00pm<br/>[星期日及公眾假期]<br/> </td></tr>
                            </table>
                        


                        
                    </li>



                </ul>-->





				<iframe class="form-iframe" src="https://www.a1driving.com.hk/enquiry-form/join_course.php?id=4" width="100%" height="1400" frameborder="0" scrolling="yes" allowtransparency="true"></iframe>
				<!--   
                <form action="">
                    <table id="enquiry-form" cellpadding="0" cellspacing="0">
                        <tbody>

                            <tr style="display: none;">
	<td>活動編號:</td>
	<td>A1 Driving</td>
	</tr>
                            <tr>
                                <td class="col-1">課程名稱:<span class="st">*</span>
                                </td>
                                <td class="col-2">
                                    <select id="course" name="course">
                                        <option value="0" selected="selected">選擇課程</option>
                                        <option value="1">私家車課程</option>
                                        <option value="2">輕型貨車課程</option>
                                        <option value="3">電單車課程</option>
                                        <option value="4">中型貨車課程</option>
                                        <option value="5">巴士課程</option>
                                        <option value="6">掛接車輛駕駛課程</option>
                                        <option value="7">有牌補鐘</option>
                                        <option value="8">重考課程</option>
                                        <option value="9">其他</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-1">英文姓名:<span class="st">*</span>
                                </td>
                                <td class="col-2"><input name="name" type="text" id="name" class="required" value="">
                                    <p class="hints">(與身分證姓名相符)</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-1">聯絡電話:<span class="st">*</span>
                                </td>
                                <td class="col-2"><input name="phone" type="text" id="phone" class="required" value="">
                                </td>
                            </tr>
                            
                               <tr>
                                <td class="col-1">電郵地址:</td>
                                <td class="col-2"><input name="email" type="text" id="email" class="required" value="">
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="col-1">分店選擇:<span class="st">*</span>
                                </td>
                                <td class="col-2">
                                    <select id="age" name="age">
                                        <option value="" selected="selected">選擇分店</option>
                                        <option value="A1 深水埗總店">A1 深水埗總店</option>
                                        <option value="A1 土瓜灣電單車中心">A1 土瓜灣電單車中心</option>
                                        <option value="MEG 銅鑼灣分店">MEG 銅鑼灣分店</option>
                                        <option value="MEG 旺角分店">MEG 旺角分店</option>
                                        <option value="MEG 荃灣分店">MEG 荃灣分店</option>
                                        <option value="MEG 元朗分店">MEG 元朗分店</option>
                                        <option value="MEG 屯門分店">MEG 屯門分店</option>
                                        <option value="MEG 觀塘分店">MEG 觀塘分店</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-1">聯絡時間:<span class="st">*</span>
                                </td>
                                <td class="col-2">
                                    <select id="age" name="age">
                                        <option value="0" selected="selected">選擇時間</option>
                                        <option value="09:00 - 12:00">09:00 - 12:00</option>
                                        <option value="12:00 - 16:00">12:00 - 16:00</option>
                                        <option value="16:00 - 19:00">16:00 - 19:00</option>
                                        <option value="19:00 - 20:30">19:00 - 20:30</option>
                                    
                                    </select>
                                </td>
                            </tr>

                         
                       
                            <tr>
                                <td class="col-1">其他意見:</td>
                                <td class="col-2"><textarea name="comment" type="text" id="comment" class="required"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="col-1">驗證碼:<span class="red">*</span>
                                </td>
                                <td class="col-2">

                     
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="submit-td">

                                    <input type="button" name="apply" id="apply" value="發送表格">
     
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </form>-->


				<!--        <iframe style="width: 100%;margin: 20px 0 0 -8px;" src="http://meghongkong.com/table/A1register/join_course.php" width="80%" height="950" frameborder="0" scrolling="no" allowtransparency="true"></iframe>
-->


				<!--<form method="POST" id="target" action="#" enctype="multipart/form-data" autocomplete="off">
<input type="hidden" name="send" value="1">
<table id="miyazaki" cellpadding="0" cellspacing="0">
<tbody>

<tr>
	<td>活動編號:</td>
	<td>A1 Driving</td>
	</tr>
	<tr>
	<td>課程名稱:<span class="st">*</span></td>
	<td>
		<select id="course" name="course">
				<option value="0" selected="selected">選擇課程</option>				<option value="1">私家車課程</option>				<option value="2">輕型貨車課程</option>				<option value="3">電單車課程</option>				<option value="4">中型貨車課程</option>				<option value="5">巴士課程</option>				<option value="6">掛接車輛駕駛課程</option>				<option value="7">有牌補鐘</option>				<option value="8">重考課程</option>				<option value="9">其他</option>				</select>
	</td>
	</tr>
	<tr>
	<td>英文姓名:<span class="st">*</span></td>
	<td><input name="name" type="text" id="name" class="required" value=""> <p class="hints">(與身分證姓名相符)</p></td>
	</tr>
	<tr>
	<td>聯絡電話:<span class="st">*</span></td>
	<td><input name="phone" type="text" id="phone" class="required" value=""></td>
	</tr>
	<tr>
	<td>電郵地址:</td>
	<td><input name="email" type="text" id="email" class="required" value=""></td>
	</tr>
	<tr>
	<td>身份証號碼:<span class="st">*</span></td>
	<td><input name="identity_number" type="text" id="identity_number" class="required" value=""> <p class="hints">身份証首四個數字</p></td>
	</tr>
	<tr>
	<td>地區:<span class="st">*</span></td>
	<td>
		<select id="area" name="area">
				<option value="0" selected="selected">地區</option>				<option value="1">港島區</option>				<option value="2">長洲</option>				<option value="3">東區</option>				<option value="4">九龍城</option>				<option value="5">葵青</option>				<option value="6">觀塘</option>				<option value="7">大嶼山</option>				<option value="8">新界北</option>				<option value="9">西貢</option>				<option value="10">深水埗</option>				<option value="11">沙田</option>				<option value="12">南區</option>				<option value="13">大埔</option>				<option value="14">荃灣</option>				<option value="15">屯門</option>				<option value="16">灣仔</option>				<option value="17">黃大仙</option>				<option value="18">油尖旺</option>				<option value="19">元朗</option>				</select>
	</td>
	</tr>
	<tr>
	<td>年齡:<span class="st">*</span></td>
	<td>
		<select id="age" name="age">
				<option value="0" selected="selected">選擇年齡</option>				<option value="1">18-25</option>				<option value="2">26-30</option>				<option value="3">31-35</option>				<option value="4">36-40</option>				<option value="5">40或以上</option>				</select>
	</td>
	</tr>
	<tr>
	<td>職業:</td>
	<td>
		<select id="job" name="job">
				<option value="0" selected="selected">職業選擇</option>				<option value="1">管理階層</option>				<option value="2">專業人士</option>				<option value="3">教師</option>				<option value="4">文職</option>				<option value="5">工人</option>				<option value="6">主婦</option>				<option value="7">學生</option>				<option value="8">自僱</option>				<option value="9">待業</option>				<option value="10">退休</option>				<option value="11">其他</option>				</select>
	</td>
		</tr><tr>
	<td>其他意見:</td>
	<td><textarea style="width:80%;height:100px;" name="comment" type="text" id="comment" class="required"></textarea></td>
	</tr>
	
	<tr>
	<td>驗證碼:<span class="red">*</span></td>
	<td><input type="text" name="verifier_number" id="osolCatchaTxt0" class="inputbox required validate-captcha"><p><img src="./resources/classes/code.php"></p></td>
	</tr>
	<tr>
		<td>
			<input type="button" name="apply" id="apply" value="申請">
		</td>
		<td></td>
	</tr>
	</tbody>
</table>
</form>-->




				<!--	<div class="news-detail-content">
				
				
							
			
				<div class="outer">
				
				
				</div>
				
				<div class="outer outer2">
				</div>				
				
				</div>-->









			</div>


		</div>





		<?php include $base.'footer.php'; ?>


	</div>
	</body>

	</html>