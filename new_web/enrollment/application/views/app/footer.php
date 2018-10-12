

<div class="bottom-blk">

	<a href="javascript:void(0);" class="back-to-top-btn">
									
									<!--<img src="images/b2t.png">
									-->
									</a>


	<ul>
		<li><a href="../home">主頁</a>
		</li>
		<!--<li><a href="../news">最新消息</a>
		</li>-->
		<li><a href="../course">課程介紹</a>
		</li>
		<li><a href="../agent">代辦課程</a>
		</li>
		<li><a href="../company">公司資訊</a>
		</li>
		<li><a href="../enquiry">報名查詢</a>
		</li>
		<li><a href="https://www.a1driving.com.hk/enrollment/index.php/app/index/A1_Web_Enrollment" target="_blank">立即報名</a>
		</li>
        
		<li><a href="#" onclick="window.open('../terms','mywin','width=600,height=500')" target="_blank">私隱政策</a>
		</li>
	</ul>

	<ul class="bottom-info">
		<li>學車快線：6511-3311 </li>
		<li>服務熱線：8100-9228</li>
		<li>電郵：<a href="mailto:info@a1driving.com.hk" target="_blank">info@a1driving.com.hk</a>
		</li>
	</ul>

	<ul class="bottom-logo-blk">
		<li><a href="./" class="bottom-logo"><img class="a1-logo" src="../images/logo.png"></a>
		</li>
		
		
		
		
		<li>

			<table>
				<tbody><tr>
					<td>獨家代理商：</td>
					<td>
						<div class="logo-set">
							<a href="http://www.meg.com.hk/tc/" target="_blank"><img src="../images/meg-logo.png"></a><!-- <span class="line">|</span> <a href="https://www.facebook.com/a1drive" target="_blank"><img src="../images/fb-icon.png"></a> <a href="https://www.instagram.com/meg_driving/" tar
							
							><img src="../images/ig-icon.png"></a>-->
						</div>
					</td>
					


				</tr>

			</tbody></table>


		</li>
		
			<li>

			<table>
				<tbody><tr>
					<td>指定合作伙伴：</td>
			<td>
						<div class="logo-set">
							<a href="https://www.megclub.com.hk/" target="_blank"><img src="../images/megclub-logo.png"></a>
							</div>
				</td>
					</tr>
				</tbody></table>
				</li>
						

	</ul>

	<div class="copyright-sentence">Copyright © 2018 A1 Driving School</div>


</div>


</div>

<!--
		<?php foreach($js as $j){?>
		<script type="text/javascript" src="<?php echo $j;?>"></script>
		<?php }?>
-->

</div>
				<script type="text/javascript" src="js/responsive.js"></script>
				<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
				<script type="text/javascript" src="js/global.js?t=1528450701"></script>
				<script type="text/javascript" src="img/web_js.js"></script>


<!--<div class="footer-div">
    
    <div class="middle">Copyright &copy; 2018 A1 Driving School</div>
</div>
-->

<style type="text/css">
    
    
    
    .footer-div{
        display: table;
        background: #012c6a;
        width: 100%;
        
        
    }
	a:hover{
		background: transparent;
		
	}
    
    .footer-div .middle{
          display: table-cell;
    text-align: right;
    max-width: 1008px;
    margin: 0 auto;
        width: 100%;
    
    font-size: 12px;
    color: #fff;
    line-height: 20px;
    padding: 10px 10px 10px 0;
    
    }
    
	.menu-blk ul li a:hover{
		background: #fff;
	}
    
	.back-to-top-btn:hover{
	}
    </style>


<script type="text/javascript">
    
    
	
	
        $('.reload-captcha-btn').click(function(e){
        
            
            e.preventDefault();
        
     
             $.ajax({
            url: "<?php echo site_url("app/regen_captcha"); ?>",
            type: "post", // To protect sensitive data
            success:function(response){
                $('.capcha-span img').replaceWith(response);
            // Handle the response object
            }
        });
            
        })
     
	
	
		$('.coupon-btn').click(function(e){
			e.preventDefault();
			var input_code =$('#coupon_code_input').val();
						
			//alert($("select#course option:selected" ).attr('value'));
			var selected_course_id=$("select#course option:selected" ).attr('value');
			
			if ( selected_course_id == '0')
			{
				alert('請先選擇課程');
			}
			else
			{
			//	alert(input_code +' ' +selected_course_id);
				$.ajax({
				url: "<?php echo site_url("app/check_coupon_input"); ?>",
				type: "post", // To protect sensitive data
			    data: { input_code: input_code   , course_id : selected_course_id  },

				success:function(response){
					
		//			alert(response);
					
			//		alert(response);
					
							if(response>0)
						   {
								 
							   $('.coupon-btn').fadeOut(0);
							   $('.use-coupon-code-txt').fadeIn(0);
							   
							   	$('.use_coupon_id').val(response);

							   
							   $.ajax({
								url: "<?php echo site_url("app/coupon_discount"); ?>",
								type: "post", // To protect sensitive data
								data: { coupon_id: response },

								success:function(response){
									
									 coupon_discount = response;
							
									initial_use_coupon_status(coupon_discount);

								
							}});
							   
							   
							   
							 
					
							//	coupon_discount=response;
								
							   
						   }
					
							if(response==0)
							{
								alert('優惠代碼不正確');
							}
					
							if(response==-1)
							{
								alert('此優惠代碼不適用於這課程');
							}
					
					
				}
			});

			}
			
			
			 

			
			
		})
	
	
    
		$(function(){
		
			if($('.use_coupon_id').val()!='0')
				{
					$('.coupon-btn').click();
				}
	
			
			
		})
		
		
    </script>



<!-- Event snippet for Spring promotion conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-815170713/-dIdCOSf0oABEJmJ2oQD',
      'value': 1.0,
      'currency': 'USD'
  });
</script>


	</body>
</html>