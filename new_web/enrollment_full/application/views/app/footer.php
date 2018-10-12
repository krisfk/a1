

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
		<li><a href="../registration#1" target="_blank">立即報名</a>
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
		<li><a href="./"><img class="a1-logo" src="../images/logo.png"></a>
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

	</ul>

	<div class="copyright-sentence">Copyright © 2018 A1 Driving School</div>


</div>


</div>

<!--
		<?php foreach($js as $j){?>
		<script type="text/javascript" src="<?php echo $j;?>"></script>
		<?php }?>
-->


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