<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="50" align="right" valign="middle" style="background: #000000;"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10%" class="style3"><a name="top" id="top"></a></td>
        <td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/meg_logo.png" alt="gc_logo" width="87" height="50" border="0" /></a></div></td>
		<!--td width="150" class="style3"><div align="center"><a href="http://hksm.com.hk/" title="前往官方網站" target="_top"><img src="img/hksm_logo.png" alt="gc_logo" width="78" height="50" border="0" /></a></div></td>
		<td width="150" class="style3"><div align="center"><a href="http://freewaydriving.com.hk/catalog/index.php" title="前往官方網站" target="_top"><img src="img/freeway_logo.png" alt="gc_logo" width="72" height="50" border="0" /></a></div></td>
		<td width="150" class="style3"><div align="center"><a href="http://a1driving.com.hk/" title="前往官方網站" target="_top"><img src="img/A1_logo.png" alt="gc_logo" width="150" height="50" border="0" /></a></div></td-->
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
          <td width="200" height="40" style="background:url(img/b02a.png) top center no-repeat;"></td>
          <td width="32" style="background:url(img/b_d.png) top center no-repeat;"></td>
          <td width="200" height="40" style="background:url(img/b03.png) top center no-repeat;"></td>
          <td width="32" style="background:url(img/b_d.png) top center no-repeat;"></td>
          <td width="200" height="40" style="background:url(img/b04.png) top center no-repeat;"></td>
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
      <td align="center" valign="top" style="background:url(img/ibg.png) top center repeat-y;">
	   <table width="896" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="8"></td>
          </tr>
          <tr>
            <td><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="11" height="31" style="background:url(img/itbg_left.png) top center no-repeat;"></td>
                <td width="874" align="left" valign="middle" class="ibgt" style="background:url(img/itbg.png) top left repeat-x;">請確認您所選擇的課程內容：</td>
                <td width="11" style="background:url(img/itbg_right.png) top center no-repeat;"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table border="0" cellspacing="0" cellpadding="0" width="100%">
              <tr>
                <td width="70" align="left" valign="middle">所選課程：</td>
                <td width="300" align="left" valign="middle" class="txt01"><?php echo $info['course']['name'];?></td>
              </tr>
              <tr>
                <td align="left" valign="middle">價錢：</td>
                <td align="left" valign="middle" class="txt01">HK $<?php echo $info['course']['price'];?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="26" valign="middle" class="it">* 備註：<?php echo $info['course']['remark'];?></td>
          </tr>
          <tr>
            <td><hr /></td>
          </tr>
          <tr>
            <td><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="11" height="31" style="background:url(img/itbg_left.png) top center no-repeat;"></td>
                <td width="874" align="left" valign="middle" class="ibgt" style="background:url(img/itbg.png) top left repeat-x;">請確認您所填寫的個人資料：</td>
                <td width="11" style="background:url(img/itbg_right.png) top center no-repeat;"></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td class="it"><table border="0" cellspacing="0" cellpadding="0" class="confirm">
			<?php if($event['show_staff']){?>
              <tr>
                <td width="70" align="left" valign="middle">員工編號：</td>
                <td width="300" align="left" valign="middle" class="txt01"><?php echo $info['staff_code'];?></td>
                </tr>
              <tr>
                <td align="left" valign="middle">員工姓名：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $info['staff_name'];?></td>
                </tr>
			 <?php }?>
              <tr>
                <td align="left" valign="middle">學員姓名：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $info['student_name'];?></td>
                </tr>
              <tr>
              <tr>
                <td align="left" valign="middle">學員性別：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $this->gender[$info['student_gender']]['name'];?></td>
                </tr>
              <tr>
                <td align="left" valign="middle">出生日期：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $info['student_birthday'];?></td>
                </tr>
              <tr>
                <td align="left" valign="middle">身份證：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $info['student_id'];?></td>
                </tr>
              <tr>
                <td align="left" valign="middle">聯絡電話：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $info['student_tel'];?></td>
              </tr>
              <tr>
                <td align="left" valign="middle">電郵地址：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $info['student_email'];?></td>
                </tr>
              <tr>
                <td align="left" valign="middle">郵寄地址：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $info['student_address'];?></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><hr /></td>
          </tr>
          <tr>
            <td class="it"><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top">條款及細則：</td>
              </tr>
              <tr>
                <td><label for="textfield"></label>
                  <textarea name="textfield" readonly="readonly" class="textbox02 txt01" id="textfield"><?php echo $event['policy'];?></textarea></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="26" align="center" valign="middle"><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><input type="checkbox" name="agreement" id="agreement" />
                  <label for="checkbox"></label></td>
                <td>本人已閱讀，並同意所有以上列出之課程相關條款及細則</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="26" align="center" valign="middle"><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
				<form id="form1" name="form1" method="post" action="<?php echo site_url('app/save/'.$event['code']);?>">
				<input type="checkbox" name="allow_promo" id="allow_promo" value="1" />
				</form>
                  <label for="checkbox"></label></td>
                <td> 本人同意接收由 MEG.Ltd 發出的任何最新優惠資訊 </td>
              </tr>
            </table></td>
          </tr>

          <tr>
            <td><hr /></td>
          </tr>
          <tr>
            <td align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="rbtn01"><a href="<?php echo site_url('app/index/'.$event['code']);?>" title="修改資料">《 修改資料</a></td>
                <td width="10"></td>
                <td class="rbtn01"><a href="#" onClick="javascript:if(document.getElementById('agreement').checked){document.getElementById('form1').submit()}else{alert('必須同意條款')};return false;"  title="下一步">下一步 》</a></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td height="13" style="background:url(img/ibg_bottom.png) top center no-repeat;"></td>
    </tr>
    <tr>
      <td height="50"></td>
    </tr>
  </table>
</div>
