<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="50" align="right" valign="middle" style="background: #000000;"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10%" class="style3"><a name="top" id="top"></a></td>
        <td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/meg_logo.png" alt="gc_logo" width="87" height="50" border="0" /></a></div></td>
		<!--td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/hksm_logo.png" alt="gc_logo" width="78" height="50" border="0" /></a></div></td>
        <td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/freeway_logo.png" alt="gc_logo" width="72" height="50" border="0" /></a></div></td>
        <td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/A1_logo.png" alt="gc_logo" width="150" height="50" border="0" /></a></div></td-->
      </tr>
    </table></td>

  </tr>
</table>


<div align="center">
  <table width="1008" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td><?php echo $event['banner'];?></td>
    </tr>
    <tr>
      <td height="6"></td>
    </tr>
    <tr>
      <td align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0" id="navMain">
        <tr>
          <td width="200" height="40" style="background:url(img/b01.png) top center no-repeat;"></td>
          <td width="32" style="background:url(img/b_d.png) top center no-repeat;"></td>
          <td width="200" height="40" style="background:url(img/b02.png) top center no-repeat;"></td>
          <td width="32" style="background:url(img/b_d.png) top center no-repeat;"></td>
          <td width="200" height="40" style="background:url(img/b03.png) top center no-repeat;"></td>
          <td width="32" style="background:url(img/b_d.png) top center no-repeat;"></td>
          <td width="200" height="40" style="background:url(img/b04a.png) top center no-repeat;"></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td height="13" style="background:url(img/ibg_top.png) top center no-repeat;"></td>
    </tr>
    <tr>
      <td align="center" valign="top" style="background:url(img/ibg.png) top center repeat-y;"><table width="896" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="8"></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="11" height="31" style="background:url(img/itbg_left.png) top center no-repeat;"></td>
              <td width="874" align="left" valign="middle" class="ibgt" style="background:url(img/itbg.png) top left repeat-x;">完成</td>
              <td width="11" style="background:url(img/itbg_right.png) top center no-repeat;"></td>
            </tr>
          </table></td>
        </tr>
		
        <tr>
          <td class="it">
		    <p>&nbsp; </p>
		<?php if($now < $event['start_time'] || !$event['allow']){?>
            <p align="center">活動尚未開始</p>
		<?php } else if($now > $event['end_time']){?>
            <p align="center">活動已結束</p>
		<?php } else if(EVENT_STATUS_PAUSE == $event['status']){?>
            <p align="center">活動已暫停</p>
		<?php } else if(EVENT_STATUS_CANCEL == $event['status']){?>
            <p align="center">活動已取消</p>
		<?php }?>
			<p align="center">&nbsp; </p>
			<?php if($event['allow']){?>
            <p align="center">活動開始時間: <?php echo $event['start_time'];?></p>
			<p align="center">活動結束時間: <?php echo $event['end_time'];?></p>
			<?php }?>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
		  </td>
        </tr>
        <tr>
          <td><hr /></td>
        </tr>
        <tr>
          <td><hr /></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="13" style="background:url(img/ibg_bottom.png) top center no-repeat;"></td>
    </tr>
    <tr>
      <td height="50"></td>
    </tr>
  </table>
</div>
