<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="50" align="right" valign="middle" style="background: #000000;">
		<table border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="10%" class="style3"><a name="top" id="top"></a></td>
			<td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/meg_logo.png" alt="meg_logo" width="87" height="50" border="0" /></a></div></td>
			<!--td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/hksm_logo.png" alt="gc_logo" width="78" height="50" border="0" /></a></div></td>
			<td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/freeway_logo.png" alt="gc_logo" width="72" height="50" border="0" /></a></div></td>
			<td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/A1_logo.png" alt="gc_logo" width="150" height="50" border="0" /></a></div></td-->
		  </tr>
		</table>
	</td>
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
      <td align="center" valign="top">
		  <table border="0" cellspacing="0" cellpadding="0">
			<tr>
			  <td width="200" height="40" style="background:url(img/b01a.png) top center no-repeat;"></td>
			  <td width="32" style="background:url(img/b_d.png) top center no-repeat;"></td>
			  <td width="200" height="40" style="background:url(img/b02.png) top center no-repeat;"></td>
			  <td width="32" style="background:url(img/b_d.png) top center no-repeat;"></td>
			  <td width="200" height="40" style="background:url(img/b03.png) top center no-repeat;"></td>
			  <td width="32" style="background:url(img/b_d.png) top center no-repeat;"></td>
			  <td width="200" height="40" style="background:url(img/b04.png) top center no-repeat;"></td>
			</tr>
		  </table>
	  </td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td height="13" style="background:url(img/ibg_top.png) top center no-repeat;"></td>
    </tr>
    <tr>
      <td align="center" valign="top" style="background:url(img/ibg.png) top center repeat-y;">
	  <form id="form1" name="form1" method="post" action="<?php echo site_url('app/index/'.$event['code']);?>">
		<input type="hidden" name="is_submit" value="1" />
        <table width="896" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="8"></td>
          </tr>
          <tr>
            <td class="it"> <?php echo $event['header'];?> </td>
          </tr>
          <tr>
            <td><hr /></td>
          </tr>
          <tr>
            <td><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="11" height="31" style="background:url(img/itbg_left.png) top center no-repeat;"></td>
                <td width="874" align="left" valign="middle" class="ibgt" style="background:url(img/itbg.png) top left repeat-x;">請選擇課程並輸入您的個人資料：</td>
                <td width="11" style="background:url(img/itbg_right.png) top center no-repeat;"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td class="it">
				<table border="0" cellspacing="0" cellpadding="0" width="100%" >
				  <tr>
					<td align="left" valign="middle"><p class="style1">* 必須填寫 </p></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" valign="middle">活動名稱</td>
					<td width="316">
						<input name="name" type="text" class="textbox" id="name" value="<?php echo $event['name'];?>" readonly="readonly" style="width:200px"/>
					</td>
					<td width="431">&nbsp;</td>
				  </tr>
				  <tr>
					<td width="84" align="left" valign="middle">活動編號</td>
					<td>
						<input name="number" type="text" class="textbox" id="number" value="<?php echo $event['code'];?>" readonly="readonly" style="width:200px"/>
					</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" valign="middle"><span class="style1">*</span> 課程名稱</td>
					<td>
						<label for="course"></label>
						<select name="course" id="course" style="width:300px; margin:8px;">
							<option selected="selected">請選擇…</option>
							<?php foreach($event['course_list'] as $val){?>
							<option value="<?php echo $val['id'];?>" <?php echo $val['id']==$info['course'] ? 'selected' : '';?> ><?php echo $val['name'] . ' $' . $val['price'];?></option>
							<?php }?>
						</select>
					</td>
					<td><?php if(isset($error['course'])){?><span style="color:red"><?php echo $error['course']?></span><?php }?></td>
				  </tr>
				  <tr>
					<td align="left" valign="middle"><span class="style1">*</span>上課地點</td>
					<td><label for="location"></label>
					  <select name="location" id="location" style="width:300px; margin:8px;">
						<option selected="selected">請選擇…</option>
						<?php foreach($event['location_list'] as $val){?>
						<option value="<?php echo $val['id'];?>" <?php echo $val['id']==$info['location'] ? 'selected' : '';?> ><?php echo $val['name'];?></option>
						<?php }?>
					  </select></td>
					  <td><?php if(isset($error['location'])){?><span style="color:red"><?php echo $error['location']?></span><?php }?></td>
				  </tr>
				</table>
			</td>
          </tr>
		  <?php if($event['show_staff']){?>
          <tr>
            <td><hr /></td>
          </tr>
          <tr>
            <td class="it">
				<table border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="84" align="left" valign="middle"><span class="style1">*</span>員工編號</td>
					<td><input name="staff_code" type="text" class="textbox" id="number" placeholder="" value="<?php echo $info['staff_code'];?>" />
					<?php if(isset($error['staff_code'])){?><span style="color:red"><?php echo $error['staff_code']?></span><?php }?></td>
				  </tr>
				  <tr>
					<td align="left" valign="middle"><span class="style1">*</span>員工姓名</td>
					<td><input name="staff_name" type="text" class="textbox" id="textfield3" placeholder="" value="<?php echo $info['staff_name'];?>" />
					<?php if(isset($error['staff_name'])){?><span style="color:red"><?php echo $error['staff_name']?></span><?php }?></td>
				  </tr>
				</table>
			</td>
          </tr>
		  <?php }?>
          <tr>
            <td><hr /></td>
          </tr>
          <tr>
            <td>
				<table border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="11" height="31" style="background:url(img/itbg_left.png) top center no-repeat;"></td>
					<td width="874" align="left" valign="middle" class="ibgt" style="background:url(img/itbg.png) top left repeat-x;">學員資料 <span class="style5">*</span>必需填寫正確以下資料，資料會用作申請運輸處文件之用</td>
					<td width="11" style="background:url(img/itbg_right.png) top center no-repeat;"></td>
				  </tr>
				</table>
			</td>
          </tr>
          <tr>
            <td class="it">
			<table border="0" cellspacing="0" cellpadding="0" width="100%">
              <tr>
                <td width="121" align="left" valign="middle"> 
				  <span class="style1">*</span>學員姓名<br />(英文全名)
				</td>
                <td width="385">
					<table border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td>
							<input name="student_name" type="text" class="textbox" id="textfield2" placeholder="" value="<?php echo $info['student_name'];?>" />
							<?php if($event['show_staff']){?>
								  *如學員非員工本人時填寫
							<?php }?>
							<?php if(isset($error['student_name'])){?><span style="color:red"><?php echo $error['student_name']?></span><?php }?>
						</td>
					  </tr>
					</table>
				</td>
              </tr>
              <tr>
                <td align="left" valign="middle">
				  <span class="style1">*</span>身份證<br /><?php echo $event['full_id'] ? '':'(首四位數字)';?>
				</td>
                <td>
					<table border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td>
							<input name="student_id" type="text" class="textbox" id="textfield6" style="width:100px;" maxlength="<?php echo $event['full_id'] ? '10':'4';?>" placeholder="例：<?php echo $event['full_id'] ? 'A123456(1)':'1234';?>" value="<?php echo $info['student_id'];?>" />
							<?php if(isset($error['student_id'])){?><span style="color:red"><?php echo $error['student_id']?></span><?php }?>
						</td>
					  </tr>
					</table>
				</td>
              </tr>
              <tr>
                <td align="left" valign="middle">
					<span class="style1">*</span>性別
				</td>
                <td>
                  <input type="radio" name="student_gender" value="<?php echo MALE;?>" <?php echo $info['student_gender']==MALE || $info['student_gender']==0 ? 'checked' : '';?> /><?php echo $this->gender[MALE]['name'];?>
				  <input type="radio" name="student_gender" value="<?php echo FEMALE;?>" <?php echo $info['student_gender']==FEMALE ? 'checked' : '';?> /><?php echo $this->gender[FEMALE]['name'];?>
				</td>
              </tr>
              <tr>
                <td align="left" valign="middle">
					<span class="style1">*</span>出生日期
				</td>
                <td>
                 <select name="year" class="textbox">
					<?php for($i=1900;$i<=2015;$i++){?>
					<option value="<?php echo $i;?>" <?php echo $i==$info['year'] ? 'selected' : '';?>><?php echo $i;?></option>
					<?php }?>
				 </select>
				 年
				 <select name="month" class="textbox">
					<?php for($i=1;$i<=12;$i++){?>
					<option value="<?php echo $i;?>" <?php echo $i==$info['month'] ? 'selected' : '';?>><?php echo $i;?></option>
					<?php }?>
				 </select>
				 月
				 <select name="day" class="textbox">
					<?php for($i=1;$i<=31;$i++){?>
					<option value="<?php echo $i;?>" <?php echo $i==$info['day'] ? 'selected' : '';?>><?php echo $i;?></option>
					<?php }?>
				 </select>
				 日
				</td>
              </tr>
              <tr>
                <td align="left" valign="middle">
					<span class="style1">*</span>聯絡電話
				</td>
                <td>
					<table border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td>
							<input name="student_tel" value="<?php echo $info['student_tel'];?>" type="text" class="textbox" id="tel_no" style="width:100px;" maxlength="8" placeholder="例：12345678" />
						</td>
						<td>
							<?php if(isset($error['student_tel'])){?><span style="color:red"><?php echo $error['student_tel']?></span><?php }?>
						</td>
					  </tr>
					</table>
				</td>
              </tr>
              <tr>
                <td align="left" valign="middle">
					<span class="style1">*</span>電郵地址
				</td>
                <td>
					<table border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td>
							<input name="student_email" value="<?php echo $info['student_email'];?>" type="text" class="textbox" id="textfield9" style="width:350px;" placeholder="例：example@gmail.com" />				  
							<?php if(isset($error['student_email'])){?><span style="color:red"><?php echo $error['student_email']?></span><?php }?>
						</td>
					  </tr>
					</table>
				  </td>
              </tr>
              <tr>
                <td align="left" valign="middle">
					<span class="style1">*</span>郵寄地址
				</td>
                <td>
					<table border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td>
							<input name="student_address" value="<?php echo $info['student_address'];?>" type="text" class="textbox" id="textfield10" style="width:600px;" placeholder="" />
						</td>
						<td>
							<?php if(isset($error['student_address'])){?><span style="color:red"><?php echo $error['student_address']?></span><?php }?>
						</td>
					  </tr>
					</table>
				  </td>
              </tr>
              <tr>
                <td align="left" valign="middle">
					<span class="style1">*</span>驗證碼
				</td>
                <td valign="middle">
					<table border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td valign="middle">
							<?php echo $cap_img;?>
						</td>
						<td valign="middle">
							<input name="captcha" type="text" class="textbox" id="captcha" style="width:100px;" maxlength="4" />
						<?php if(isset($error['captcha'])){?><span style="color:red"><?php echo $error['captcha']?></span><?php }?>
						</td>
					  </tr>
					</table>
				</td>
              </tr>
            </table>
			</td>
          </tr>
          <tr>
            <td><hr /></td>
          </tr>
          <tr>
            <td align="center" valign="top">
				<table border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td class="rbtn01"><a href="#" onClick="javascript:document.getElementById('form1').submit();return false;" title="下一步">下一步 》</a></td>
				  </tr>
				</table>
			</td>
          </tr>
        </table>
      </form></td>
    </tr>
    <tr>
      <td height="13" style="background:url(img/ibg_bottom.png) top center no-repeat;"></td>
    </tr>
    <tr>
      <td height="50"></td>
    </tr>
  </table>
</div>
