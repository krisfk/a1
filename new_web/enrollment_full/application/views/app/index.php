

<!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="50" align="right" valign="middle" style="background: #000000;">
		<table border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="10%" class="style3"><a name="top" id="top"></a></td>
			<td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/meg_logo.png" alt="gc_logo" width="87" height="50" border="0" /></a></div></td>
			-->
              <!--td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/hksm_logo.png" alt="gc_logo" width="78" height="50" border="0" /></a></div></td>
			<td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/freeway_logo.png" alt="gc_logo" width="72" height="50" border="0" /></a></div></td>
			<td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/A1_logo.png" alt="gc_logo" width="150" height="50" border="0" /></a></div></td-->
		<!--  </tr>
		</table> 
	</td> 
  </tr>
</table>-->

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
		  <table border="0" cellspacing="0" cellpadding="0" id="navMain">
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
				<table border="0" cellspacing="0" cellpadding="0" width="100%" class="form-table" >
				  <tr>
					<td align="left" valign="middle" style="width: 150px;"><p class="style1">* 必須填寫 </p></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr style="display: none;">
					<td align="left" valign="middle">活動名稱</td>
					<td width="316">
						<input name="name" type="text" class="textbox" id="name" value="<?php echo $event['name'];?>" readonly style="width:350px"/>
					</td>
					<td width="431">&nbsp;</td>
				  </tr>
				  <tr style="display: none;">
					<td width="84" align="left" valign="middle">活動編號</td>
					<td>
						<input name="number" type="text" class="textbox" id="number" value="<?php echo $event['code'];?>" readonly style="width:200px"/>
					</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" valign="middle" class="v-td" ><span class="style1">*</span> 課程名稱</td>
					<td>
						<label for="course"></label>
						<select name="course" id="course" style="width:530px;">
							<option selected="selected" value="0">請選擇…</option>
							<?php foreach($event['course_list'] as $val){?>
							<option value="<?php echo $val['id'];?>" <?php echo $val['id']==$info['course'] ? 'selected' : '';?> ><?php echo $val['name'] . ' $' . $val['price'];?></option>
							<?php }?>
						</select>
                        
                        <a href="javascript:void(0);" class="course-detail-btn">顯示課程內容</a>
                        
                        <?php if(isset($error['course'])){?><span style="color:red"><?php echo $error['course']?></span><?php }?>
                        
                        
                    
					</td>
					<td></td>
				  </tr>
                    <tr>
                        <td colspan="3">
                            <div class="expand-course-content">
                        
                            
                        </div>
                        
                        </td>
                    </tr>
				  <tr>
					<td align="left" valign="middle"><span class="style1">*</span>上課地點</td>
					<td><label for="location"></label>
					  <select name="location" id="location">
						<option selected="selected">請選擇…</option>
						<?php foreach($event['location_list'] as $val){?>
						<option value="<?php echo $val['id'];?>" <?php echo $val['id']==$info['location'] ? 'selected' : '';?> ><?php echo $val['name'];?></option>
						<?php }?>
					  </select>
                      <?php if(isset($error['location'])){?><span style="color:red"><?php echo $error['location']?></span><?php }?>
                      </td>
					  <td></td>
				  </tr>
					
					<tr class="lesson-place-show-td-row">
						<td class="lesson-place-show-td-row-name">上課地點</td>
					
						<td class="lesson-place-show-td">
							
							
							
						</td>
						
						<td>
						</td>
						
						</tr>
                    
                    
                    

                    

				</table>
                
                <div class="final-cost-div">
                      <span class="final-cost-title" >付款金額：</span>
                        
                    
                    
                    <span class="final-cost-div-inner-old"><strike>$<span class="final-cost">xxxx</span></strike></span>
                
                    <span class="final-cost-div-inner">$<span class="final-cost">xxxx</span></span>
            
                
                </div>
                
          <!--      <?php
                
           //     if($event['ask_reg_enquiry'])
            //    { 
                    ?>
                 <div class="reg-enquiry-div">
                
                     電單車路試部份有不同考試場地及優惠提供、詳情請按
                     <br/>
                <a href="https://www.hksm.com.hk/hksm_dev/promo/payment_02.html" target="_blank" class="reg-enquiry-a"><!--<span class="check">☑</span><span class="uncheck">☐</span>&nbsp;登記查詢</a>
                <br/> 
                我們的銷售代理(MEG)將與 閣下聯絡跟進。
                </div>
                
                <?php
        //     }
                ?>-->
  
<!--                <input name="reg_enquiry" class="reg_enquiry" type="hidden" value="<?php //echo $info['reg_enquiry'] ? '1':'0';?>">
-->
                
                
                <?php
                
                if($event['ask_megclub'])
                {
                    
                ?>
                <div class="meg-club-block">
                    
                    
                    <div class="meg-club-block-inner">
                        
                        <hr>
                        <div class="megclub-logo-div">
                        <img class="megclub-logo" src="img/megclub-logo.jpg">
                        <img class="megclub-slogan" src="img/megclub-slogan.png">
                        
                        </div>
                    MEG Club ，一個屬於你的一站式生活品味學習平台。我們的使命是將樂趣，驚喜及刺激融入你的生活環節。立即加入我們，體驗最新嘅玩樂課程及享受會員專屬優惠!<br/><br/>


MEG Club, your one-stop portal to exciting and classy lifestyle learning experience. Our mission is to enrich your daily life and get you to know how living can be filled with more WOW and FUN. Join us now and stay tuned for our latest activities and exclusive member privileges!<br/><br/>

                   
                    
                <div class="megclub-promote-statement"><span>成為 MEG Club 會員，即專享香港駕駛學院課程HK$200優惠！</span></div>
                
                            
                    <span class="megclub-btns-group-1">
                <a href="#megclub-popup" class="open-popup-link join-megclub-btn-1"> 加入 MEG Club </a>
<!--<a href="javascript:void(0);" class="is-meg-club-member-btn">已是會員？</a>-->
</span>
                        
                       
                    
            
                
                    
                    <span class="megclub-btns-group-2">
                        <span class="join-sentence"><span class="smile" ></span>已選擇加入MEG CLUB</span>
                        <a href="javascript:void(0);" class="cancel-join-btn">取消加入</a>
                        
                    </span>
                        
                          </div>
                    
	            
                
                <div id="megclub-popup" class="white-popup mfp-hide">
                    <h2>MEG Club會籍的條款及條件約束：</h2>
    

                    <textarea name="textfield4" cols="107" rows="7" class="megclub-tnc-textarea" readonly>版權所有MEG Club 2018
                        
MEG Club 會籍將受以下條款及條件約束：
                        
1. 定義
1.1 除非本協議文本中另有要求，否則在本協議條款中，下列術語和詞彙應具有以下含義：
（a） “本協議”是指MEG CLUB與會員根據本協議文本內容就其在Club的權利和義務之協議。
（b）“Club”是指按照本協議由MEG CLUB所營運和管理的會員計劃。
（c）“優惠提供者”是指MEG CLUB與商戶的統稱。
（d）“優惠”是指MEG CLUB根據實際情況不時在其網站或出版刊物上所公佈的會員可享有的優惠。
（e）“獎賞積分計劃”是指由MEG CLUB所營運和管理的獎賞積分計劃（請參閱第8條之規定）。
（f）“獎賞積分計劃交易”是指與可獲取積分有關的交易或活動（請參閱第8.2條之規定）
（g）“會員卡”是指由MEG CLUB向會員所發行的會員卡或根據實際情況不時向會員所發行與Club及/或獎賞積分計劃有關的此類其他卡。
（h）“預付款”是指由會員按照第4條中之規定所支付並按照實際情況不時被扣減（若適用）的預付款。
（i）“會員”是指第2.1條中所述的人士。
（j）“會籍”是指Club會員的會籍。
（k）“商戶”是指已經同意不時向會員提供優惠的第三方。
（l）“積分”是指MEG CLUB按照獎賞積分計劃所給予的積分。
（m）“帳戶”是指會員按照MEG CLUB的條款和條件在Club中所具有的帳戶。
（n）“本協議條款”是指按照第15.1條之規定根據情況不時修訂的此類條款和條件。
1.2除非本協議文本中另有要求，否則在本協議條款中：
（a）本文中所提及的條款指本協議條款中的條款；
（b）表示一種性別的詞彙應包含所有其他性別；
（c）表示單數的詞彙應包含複數形式，反之亦然；
（d）詞彙“人”包括所有自然人、合夥企業、法人實體或非法人實體以及政府部門。
1.3 在本協議條款中，所提及的由MEG CLUB所公佈的任何資訊、修訂或金額是指MEG CLUB在其官方網站www.megclub.com.hk.所公佈的資訊、修訂或金額。
2. 會籍
2.1 任何經MEG CLUB認可的方式訂購或使用MEG CLUB服務並且支付了預付款（若適用）的人即代表同意本協議的條款及成為會員。
2.2 任何人如提交會籍申請，或啟動會籍或帳號，或向優惠提供者出示會員卡或提供會員卡號，或通過MEG CLUB的任何服務點操作個人帳戶，即代表其已經同意本協議之條款。
2.3 如滿足第2.1條之規定，會籍將開始生效，有效期為二（2）年。之後會籍將每年自動續期壹(1)年，直至會籍按照本協議條款之規定而終止。
2.4 會員明白並同意會員與MEG CLUB之間乃按照本協議所簽訂的合約關係，而會員不具有本協議條款所明確規定之外的其他權利。
2.5會籍不可轉讓。
2.6根據MEG CLUB的條款和條件之規定，本協議為允許MEG CLUB向預付帳戶進行扣減之相關條款和條件。
2.7 MEG CLUB可拒絕任何人的會籍申請而毋須提供任何理由。
3. 會員卡
3.1會員卡可以是實物形式或電子形式，並歸MEG CLUB所有，並須在會籍終止時立即歸還予MEG CLUB。
3.2會員卡僅限持卡會員使用。如會員卡遭遺失或盜竊或損毀，或會員姓名有變更，應立即通知MEG CLUB，並繳交有關費用後由MEG CLUB重新補發新卡。
3.3會員有責任妥善保管會員卡，同時會員須為任何其他人對會員卡的任何使用負責，不論其是否已經由會員授權。
3.4會員不得改動會員卡，包括但不限於會員卡內存的軟體及所記錄的資料。
4. 預付款
4.1 MEG CLUB有權要求任何人在成為會員或在獲得任何優惠之前支付預付款。
4.2 預付款的金額應以MEG CLUB不時所公佈的金額為準。
4.3 MEG CLUB有權（但非必須）從預付款中扣除會員須向MEG CLUB繳付的任何性質的任何金額。
5. 會員優惠
5.1會員有權在其會籍有效期內按照本協議的條款及其他有關條款享有優惠。
5.2所有優惠的提供以實際可行性為準，優惠提供者可在未發出通知的情況下，撤銷或暫停任何優惠。
5.3優惠按照優惠提供者所公佈的其他條款和條件、註冊及/或批准為準，並通知會員。除非另行註明，否則優惠不可與同一優惠提供者的任何其他優惠同時使用。
5.4除非另有書面許可，否則優惠僅屬會員個人使用，並且不得出售、轉讓、讓與或用於任何商業用途。
5.5換領優惠時，會員必須出示會員卡或提供會員卡號或優惠提供者所要求的其他會籍證明，如會員未能以上述方式證明會員會籍則優惠提供者可拒絕提供優惠。
5.6 MEG CLUB所公佈的有關商戶優惠的所有描述和資訊是基於商戶所提供的資訊，因此MEG CLUB不會對商戶或其他第三方所提供的任何資訊負責。
6. 責任免除
6.1商戶並非MEG CLUB的代理商，亦沒有任何明示或暗示的權利以約束MEG CLUB或代表MEG CLUB作出任何聲明、保證或陳述。
6.2 MEG CLUB並非會員與任何商戶之間任何交易的參與方，並且沒有任何明示或暗示的權利以約束商戶或代表商戶作出任何聲明、保證或陳述。
6.3如就優惠產生任何異議，相關優惠提供者的決定為最終決定並對會員具有約束力。
6.4在法例所允許的範圍內，MEG CLUB不會對會員因MEG CLUB做出的任何行為、疏忽或過失所產生或導致會員可能直接或間接蒙受與本協議有關的任何形式的損失、損壞或傷害負責（因MEG CLUB的欺詐行為而直接導致或引起的結果除外）。
6.5 MEG CLUB不會對有關商戶向會員所提供或供應的任何產品或服務的狀況、適用性、品質、適宜性或安全性作出任何明示或暗示的保證或負責，不論該等保證是否基於法例規定或其他方式所作出的。
6.6會員明白MEG CLUB不會對商戶就任何優惠的任何暫停或撤銷負責，亦不會對商戶任何優惠的狀況、適用性、品質、適宜性、安全性或可用性負責，亦不會對任何商戶的任何行為或疏忽遺漏或任何商戶未能遵守商戶與會員所約定的任何交易條款負責。此外，在法例允許的範圍內，MEG CLUB不會對會員的有關情況負責。
7. 會費及支付款項
7.1 MEG CLUB可向會員收取會費以提供會員優惠（費用的金額及條款將不時更改）。
7.2如會員要求MEG CLUB提供及/或交付任何資訊或文件，MEG CLUB可收取因此所產生的支出或費用。
7.3根據本協議，會員向MEG CLUB所支付的會費、費用或會員其他應付的任何性質的金額應通過信用卡或其他MEG CLUB不時接受的其他付款方式存入到預付帳戶，同時會員特此不可撤銷地授權MEG CLUB執行此類借記入帳或貸記入帳，而毋須向會員發出個別通知或額外獲得會員授權或同意。
8. 獎賞積分計劃
8.1除非已經主動選擇不參與計劃，否則會員將根據有關條款和條件自動參與獎賞積分計劃。
8.2會員可根據以下條件獲償積分：
（a）會員完成MEG CLUB不時公佈的指定活動；或
（b）MEG CLUB不時通知會員就其合資格的會籍消費金額可獲償的積分。每壹港元的合資格會籍消費均會獲得積分，惟少於1港元的消費金額將不獲計算，MEG CLUB將不時公佈合資格會籍消費金額可獲償的相對積分。
8.3 MEG CLUB將不時公佈可供會員以積分兌換的商品和服務、兌換此類商品和服務所需的積分以及兌換的方式。
8.4 會員積分的有效期為24個月（另有書面約定的除外），如此類積分在所述的24個月期限內仍未作兌換則該等積分將被視為無效並從所累計的未被兌換的積分中扣除。
8.5所獲得的積分不得轉讓他人或在同一會員的不同帳戶之間進行轉帳，不可兌換現金，亦不得以本協議條款以及其他有關條款所明確規定以外的其他任何方式使用。
8.6如會員尚有任何性質的欠款，則MEG CLUB有權暫停其參與獎賞積分計劃的會籍，直至其全數付清所欠金額。會員在獎賞積分計劃會籍暫停期間將不會獲得任何獎賞積分計劃交易的積分，並且不可兌換任何商品或服務。MEG CLUB有絕對酌情權在任何時候釐定獎賞積分的計算方法。
8.7 MEG CLUB可根據實際情況不時公佈執行新的及/或取消現有的獎賞積分計劃交易或修訂會員獲取積分的方式或修改或增加任何有關條件，而毋須事先通知。
8.8 兌換任何特定商品或服務須符合以下規定：
（a）會員擁有兌換此類商品或服務所需的有效且未兌換的積分，並且此類商品和服務可供兌換；以及
（b）符合MEG CLUB就所述兌換的有關任何特定條款或條件及/或MEG CLUB不時所發佈的或通知會員的此類商品或服務的供應商的條款和條件。
8.9 MEG CLUB有權公佈撤銷任何可供兌換的商品或服務或修改兌換特定商品或服務所需的積分，而毋須事先通知。
8.10 如MEG CLUB與會員之間就所獲取的積分、商品和服務的兌換以及獎賞積分計劃的營運存在任何異議，則MEG CLUB的決定為最終決定且對會員具有約束力。
8.11如MEG CLUB認為任何會員違反了本協議條款的規定或因任何原因而終止Club會籍，MEG CLUB可隨時通知該會員終止其獎賞積分計劃的會籍。
8.12如會員的獎賞積分計劃的會籍無論因任何原因而被終止，在終止日期後該會籍所累計的所有積分將為無效，而該會員在獎賞積分計劃下的所有權利亦告終止。
8.13 MEG CLUB有絕對酌情權在任何時候公佈終止獎賞積分計劃的營運而毋須給予任何理由，並且在獎賞積分計劃終止之後，獎賞積分計劃項下所有會員的權利將立即終止，同時會員所累積的所有積分均將為無效。
8.14會員不得就任何所累積的積分之無效或其在獎賞積分計劃會籍之終止或獎賞積分計劃之終止而向MEG CLUB索求任何賠償。
9. 網站、移動應用程式及其他線上平台的使用
9.1會員可獲提供一個帳號和密碼或其他代碼或設備，以准許其登入MEG CLUB網站的限制區域、移動應用程式及其他線上平台；同時，在此類連接中，會員同意並確認此類受限制區域內的資訊屬於MEG CLUB的機密資訊並且僅供會員本人使用，並保證保密有關資訊和內容。
9.2會員須嚴密保管第9.1條中所述的用戶名、帳號和密碼以及其他代碼或裝置，並且不得允許任何其他方使用其用戶名、帳號和密碼以及其他代碼或裝置。會員須負責在MEG CLUB網站、移動應用程式及其他線上平台上以其用戶名、帳號和密碼所進行的所有操作行為，不論此類行為是否是由會員本人操作或得到會員授權或以其他方式所進行。
9.3如MEG CLUB認為任何會員的使用妨害其網站、移動應用程式以及其他線上平台的營運或可能導致MEG CLUB的利益受損，MEG CLUB保留禁止該會員使用MEG CLUB所提供的用戶名、帳號和密碼以及其他代碼或裝置的權利。
10. 會籍終止
10.1會員可向MEG CLUB發出書面通知放棄其Club會籍。
10.2 MEG CLUB可在任何時候向會員發出通知終止會員的會籍而毋須給予任何理由亦毋須向會員負責。
10.3 一旦會員的會籍終止，其會籍所具有的任何權利、利益或特權將即時終止，並且不再享有獲取和享受優惠的權利。
11. Club營運的終止
11.1 MEG CLUB有絕對酌情權在任何時候公佈終止Club的營運而毋須給予任何解釋。
11.2 Club一旦終止營運，所有會籍的權利與特權隨之停止，並且會員不得及不能就Club的終止營運而向MEG CLUB、其董事、股東或管理層提出任何性質及任何形式的索賠或要求。
11.3在本協議終止或Club終止營運後，第12條或與第12條相關的其他條款將繼續適用及具有法律效力。
12. 保障
12.1在不影響會員在其他協議情況下對MEG CLUB的保障，就會員由於下列情況所發生或所導致的任何以及所有損壞、損失、成本、費用、債務或索賠，會員將保障MEG CLUB並保證在任何時候MEG CLUB不受其影響：
（a）會員本人或任何其他人使用其會員卡（不論其是否獲得會員的授權或會員是否知釋）；或
（b）會員違反本協議的任何條款。
13. 不可抗力
13.1 對於MEG CLUB因延遲履行或未能履行或以其他方式未能完成其在本協議項下的義務而導致會員遭受的任何損失、損害，若此類延遲履行或未能履行是由於天災、戰爭、革命、內亂、公敵行為、禁運、政府之法令規定、駭客入侵或其他任何超出合理控制範圍的情況且並非因MEG CLUB任何過失或疏忽所導致的，MEG CLUB不需對該等負責。
14. 通知
14.1除非本協議條款中另有規定，否則根據本協議，MEG CLUB可以下列的任何方式向會員發出通知或文件：
（a）通過郵資預付寄送郵件至會員為接收MEG CLUB所提供服務的地址，在發出信件的兩天後將視為會員已收到郵件；或
（b）通過向會員為此目的所提供的傳真號碼發送傳真，在發出傳真之時將視為會員已經收到傳真；或
（c）通過向會員為此目的所提供的電子郵箱發送電子郵件，在發出電子郵件之時將視為會員已經收到電子郵件，會員並且已接受有關利用電子郵件所涉及的傳送及保安風險；或
（d）通過向會員為此目的所提供的手機電話號碼或關聯的移動應用程式發送電子資訊，在發出電子資訊之時將視為會員已經收到資訊，會員並且已接受有關利用移動通訊所涉及的傳送及保安風險。
14.2會員可以向MEG CLUB為此目的所提供的傳真號碼、電子郵箱、郵寄地址、傳真、或親自遞送發送通知，所有通知以MEG CLUB實際收到之時為已經收到。
15. 其他
15.1 MEG CLUB可根據實際需要不時地：
（a）修訂本協議的條款內容；
（b）增加、替換及刪減優惠列表及優惠提供者；
（c）確定或修改本協議項下應付或相關的費用或收費；及
（d）修改獎賞積分計劃項下獲取積分及/或以積分兌換商品和服務的方式，並在修改生效日期前至少30天公佈有關細則及令有關生效日期具有約束力。
15.2 如由於法例而導致本協議的任何條款變為無效、非法或不具有法律執行效力，將不會影響或妨礙本協議的其他條款的有效性、合法性及法律執行效力，而其餘的條款內容仍完全有效。
15.3 MEG CLUB對任何條款違約作出的任何豁免僅在個別實際情況中有效，且MEG CLUB是以該實際情況之目的而豁免。如MEG CLUB未能或延遲履行或延遲執行本協議項下任何權利不應被視為放棄該權利或豁免任何違約。
15.4 如會員所提供有關其Club會籍的聲明或資訊有任何變更，則會員應盡快以書面形式通知MEG CLUB。
15.5如本協議條款的中文版本和英文版本不一致，則以英文版本為準。
16. 管轄法律
16.1 本協議條款受香港法律規管，並根據香港法律詮釋。
16.2 協議各方在此承認香港法庭之非獨有審判權。
16.3凡因本協議引起的或與本協議相關的任何爭議，各方同意首先進行討論協商及調解。


Copyright MEG Club 2018
                        
Membership of the MEG Club is subject to and governed by the following terms and conditions.

1. Definitions
1.1 In these Terms, unless the context otherwise requires, the following words and expressions shall have the following meanings:
(a) “Agreement” means the agreement on the rights and obligations on the Club between MEG CLUB and a Member on these Terms.
(b) “Club” means the program MEG CLUB operated and administered by MEG CLUB pursuant to the Terms.
(c) “Benefits Providers” means collectively MEG CLUB and the Merchants.
(d) “Benefits” means the benefits made available to the Members from time to time as published by MEG CLUB in its website or publication.
(e) “Bonus Points Scheme” means the Club Bonus Points Scheme operated and administered by MEG CLUB as referred to in clause 8.
(f) “Bonus Points Scheme Transactions” means transactions or tasks in relation to which Points will be awarded as referred to in clause 8.2.
(g) “Card” means the Club membership card issued by MEG CLUB to the Member or such other card MEG CLUB may issue to a Member in relation to the Club and/or the Bonus Points Scheme from time to time.
(h) “Pre-payment” means the pre-payment paid by the Member pursuant to clause 4, where applicable, as reduced by deduction from time to time.
(i) “Member” means a person referred to in clause 2.1.
(j) “Membership” means the Member's membership of the Club.
(k) “Merchant” means a third party who has agreed to offer certain Benefits to Members from time to time.
(l) “Points” means the points to be awarded by MEG CLUB pursuant to the Bonus Points Scheme.
(m) “Account” means the account maintained by the Member with MEG CLUB pursuant to the Terms and Conditions for MEG CLUB.
(n) “Terms” means these terms and conditions as amended pursuant to clause 15.1 from time to time.
1.2 In these Terms, unless the context otherwise requires:
(a) references to Clauses are to clauses of these Terms;
(b) words denoting one gender shall include all other genders;
(c) words denoting the singular shall include the plural and vice versa; and
(d) the word “person” includes an individual, partnership, corporation or unincorporated body and government department.
1.3 In these Terms, reference to any information, amendment or amount as published by MEG CLUB means the information, amendment or amount as published by MEG CLUB in its website at www.megclub.com.hk.

2. Membership
2.1 A person who has subscribed to any service of MEG CLUB has agreed to these Terms in such manner MEG CLUB may accept, and paid the Pre-payment (where applicable) shall be a Member.
2.2 A person shall be deemed to have agreed to these Terms by applying for Membership, activating the membership or account, presenting the Card or quoting the membership number to a Benefit Provider or accessing the personal account via any service points of MEG CLUB.
2.3 Membership shall commence when clause 2.1 has been complied with and shall continue for 2 years. Thereafter, membership shall be automatically renewed annually for one year until it is terminated in accordance with these Terms.
2.4 The Member acknowledges and agrees that the Club is a contractual relationship between the Member and MEG CLUB on these Terms and the Member has no right other than as expressly set out in these Terms.
2.5 Membership is non-transferable.
2.6 For the purpose of the Terms and Conditions for MEG CLUB, this Agreement is a Related Agreement as referred to in the Terms and Conditions for MEG CLUB under which debit can be made to the Prepaid Account.
2.7 MEG CLUB may refuse application of Membership from any person without giving any reason.

3. Membership Card
3.1 The Card may be in a physical or electronic form and remains the property of MEG CLUB and shall be returned immediately to MEG CLUB upon the termination of the Membership.
3.2 The Card shall only be used by the Member to whom the Card is issued. If the Card is lost or stolen or damaged or if the name of the Member is changed, such shall be reported immediately to MEG CLUB and a replacement Card shall be issued by MEG CLUB upon the payment of the relevant charge as published by MEG CLUB.
3.3 The Member shall be responsible for the safe keeping of the Card and the Member shall be liable for any use of the Card by any third party whether authorised by him or otherwise.
3.4 The Member shall not tamper with the Card, including but not limited to the software and the data recorded on the Card.

4. Pre-payment
4.1 MEG CLUB shall be entitled to require a person to pay the Pre-payment before becoming a Member or before redeeming any Benefits.
4.2 The Pre-payment shall be the amount as published by MEG CLUB from time to time.
4.3 MEG CLUB shall be entitled (but not obliged) to deduct any amount due from the Member to MEG CLUB of whatever nature from the Pre-payment.

5. Member's Benefits
5.1 The Member will be eligible to enjoy the Benefits subject to these Terms and the related terms during the continuation of his Membership.
5.2 All Benefits are subject to availability and a Benefit Provider may withdraw or suspend any Benefit without notice.
5.3 The Benefits may be subject to other terms and conditions, registration and/or approval which may be imposed by the Benefit Providers and communicated to the Member. Unless otherwise stated, no Benefit may be claimed in conjunction with any other offer from the relevant Benefit Provider.
5.4 The Benefits are available to the Member personally and shall not be sold, transferred, assigned or use for any commercial purpose unless otherwise stated in writing.
5.5 To claim a Benefit, the Member must produce the Card or quote the membership number to the Benefit Provider or prove his Membership in any other way as the Benefit Provider may request failing which the Benefit Provider may refuse to provide the Benefit.
5.6 All descriptions and information on the Benefits from Merchants as published by MEG CLUB are based on information supplied by the Merchants and MEG CLUB shall not be liable to the Member for any information provided by the Merchants or other third parties.

6. Exclusion of Liability
6.1 The Merchants are not agents of MEG CLUB and have no authority, express or implied, to bind MEG CLUB or to make any representations, warranties or statements on MEG CLUB’s behalf.
6.2 MEG CLUB is not a party to any transaction entered into between the Member and a Merchant and has no authority, express or implied, to bind the Merchants or to make any representations, warranties or statements on their behalf.
6.3 In case of dispute on any Benefit, the decisions of the relevant Benefit Provider shall be final and binding on the Member.
6.4 To the extent permissible by law, MEG CLUB shall not be liable to the Member for any loss, damage or injury whatsoever which the Member may suffer as a direct or indirect result of any act, omission or default of MEG CLUB in relation to the Agreement howsoever caused or arisen (other than those caused or arisen as a direct result of fraud on the part of MEG CLUB) to the Member.
6.5 MEG CLUB makes no warranty, whether express or implied and whether arising under legislation or otherwise, nor shall MEG CLUB be liable in any way, in respect of the condition, suitability, quality, fitness or safety of any goods or services offered or supplied to the Member by a Merchant.
6.6 The Member acknowledges that MEG CLUB is not responsible for any suspension or withdrawal of any Benefit by a Merchant, the condition, suitability, quality, fitness, safety or availability of any Benefit from a Merchant or any act or omission of any Merchant or a failure by any Merchant to comply with the terms of any transaction entered into between the Merchant and the Member and to the extent permitted by law, MEG CLUB shall not be liable to the Member in relation thereto.

7. Membership Fee and Disbursements
7.1 MEG CLUB may impose a membership fee (amount subject to review from time to time) on the Member for its provision of the Benefits at such rate and on such terms as it may determine from time to time.
7.2 A charge may be imposed by MEG CLUB for disbursement of its costs or expenses incurred in the provision and/or delivery of any information or document requested by the Member.
7.3 The membership fee, any charge and any other amount of whatever nature payable by the Member to MEG CLUB pursuant to this Agreement shall be paid by debiting the Prepaid Account or by such credit card or other payment means as MEG CLUB may accept from time to time and the Member hereby irrevocably authorises such debit or credit without notice to or further authority or consent from the Member.

8. Bonus Points Scheme
8.1 Unless otherwise opted out, the Member shall be entitled to participate in the Bonus Points Scheme on the terms and conditions set out in this clause.
8.2 Points will be awarded to the Member
(a) upon the completion of specific tasks as published by MEG CLUB from time to time; or
(b) based on the amount he spends on the relevant transactions as published by MEG CLUB from time to time and the number of Points the Member shall receive for each Hong Kong Dollar of spending shall be as published by MEG CLUB from time to time provided that no Point will be awarded for part of HK$1.
8.3 MEG CLUB shall publish from time to time the goods and services available for redemption by Members, the Points required to redeem those goods and services and the manner of redemption.
8.4 Each Point awarded to the Member will have a valid period (except otherwise in writing) of 24 months and if such Point is not redeemed at the end of such 24 months, such Point will expire and will be deducted from the then accumulated Points which have not been used for redemption.
8.5 Points awarded shall not be transferred to other person or between different accounts of a Member or exchanged for cash or used in any way other than as expressly set out in these Terms and any other related terms.
8.6 In the event that any amount of whatever nature is outstanding from the Member to MEG CLUB, MEG CLUB shall be entitled to suspend his membership of the Bonus Points Scheme until the outstanding amount has been paid in full. During the suspension of the Member’s membership of the Bonus Points Scheme, no Points will be awarded to the Member for any Bonus Points Scheme Transaction and he shall not be able to redeem any goods or services. MEG CLUB shall have the right at any time at its absolute discretion to determine the calculation of the Bonus Points.
8.7 MEG CLUB may from time to time introduce new and/or cancel existing Bonus Points Scheme Transactions or amend the ways Points are awarded to the Member or amend or impose any relevant condition without prior notice by publishing such introduction, cancellation or amendments.
8.8 The redemption of any particular goods or services shall be subject to :-
(a) the Member having the relevant accumulated valid and unredeemed Points required to redeem such goods or services and the availability of such goods and services; and
(b) any specific term or condition of MEG CLUB in relation thereto and/or the terms and conditions of the supplier of such goods or services as published by MEG CLUB from time to time or as communicated to the Member.
8.9 MEG CLUB shall be entitled to withdraw any goods or services from redemption or to change the number of Points required to redeem any particular goods or services without prior notice by publishing such withdrawal or changes.
8.10 In the event of any dispute between MEG CLUB and the Member on the awarding of Points, the redemption of goods and services and the operation of the Bonus Points Scheme, the decision of MEG CLUB shall be final and binding on the Member.
8.11 MEG CLUB may at any time by notice to the Member terminate the Member’s membership of the Bonus Points Scheme if the Member has in the opinion of MEG CLUB breached these Terms or upon the termination of the Member’s membership of the Club for whatever reason.
8.12 Upon the termination of the Member’s membership of the Bonus Points Scheme for whatever reason, all the Member’s accumulated Points as at the date of termination shall be become invalid and the Member shall cease to have any right under the Bonus Points Scheme.
8.13 MEG CLUB shall have the right at any time at its absolute discretion without giving any reason publish a notice to terminate the operation of the Bonus Points Scheme and upon termination of the Bonus Points Scheme, all the Member’s rights under the Bonus Points Scheme shall cease forthwith and all his accumulated Points at the time will be invalid.
8.14 The Member shall have no claim against MEG CLUB for the invalidity of any accumulated Points or for the termination of his membership of the Bonus Points Scheme or for the termination of the Bonus Points Scheme.

9. Access to Website, Mobile Application and Other Online Platforms
9.1 The Member shall be provided with an account number and password or other codes or devices to gain access to restricted portions of the website, mobile applications and other online platforms of MEG CLUB in respect of the Club and in that connection, the Member agrees and confirms that the information contained in such restricted area is confidential to MEG CLUB, and is provided to the Member for his personal use only and the Member undertakes to keep these information and content confidential.
9.2 The Member shall keep his user name, account number and password or other codes or devices referred to in clause 9.1 confidential and shall not allow other parties to use the same. The Member shall be responsible for all activities at the website, mobile applications and other online platform of MEG CLUB conducted using his user name, account number and password whether such activity is conducted by the Member, with the Member’s authority or otherwise.
9.3 MEG CLUB reserves its right to prohibit the use of the account number, password, code or device provided by MEG CLUB to the Member where MEG CLUB determines that such use interferes with the operation of its website, mobile applications and other online platforms or results in commercial benefits for other entities to the detriment of MEG CLUB.

10. Termination of Membership
10.1 The Member may resign from his Membership by notice in writing to that effect to MEG CLUB.
10.2 MEG CLUB may at any time by notice to the Member terminate the Membership of the Member without reason and without liability to the Member.
10.3 Upon termination, the Member shall cease to have any right, benefit or privilege of the Membership and shall no longer have any right to receive and enjoy the Benefits.

11. Termination of Operation of the Club
11.1 MEG CLUB shall have the right at any time at its absolute discretion to publish a notice without giving any reason to terminate the operation of the Club.
11.2 Upon termination of the operation of the Club, all Membership rights and privileges shall cease and no claim or demand of whatsoever nature and howsoever arising shall be made or capable of being made by the Member against MEG CLUB, the employees, the directors, the shareholders or the management of MEG CLUB in connection with the termination of the operation of the Club.
11.3 Clause 12 and any other clause which due to its nature shall continue to apply after the termination of the Agreement or the operation of the Club shall survive the termination of the Club and this Agreement and shall continue to have effect thereafter.

12. Indemnity
12.1 Without prejudice to any other indemnity from the Member to MEG CLUB under any other agreement, the Member shall keep MEG CLUB indemnified and shall hold MEG CLUB harmless at all times from and against any and all damage, loss, costs, expenses, liability or claims arising from or as a result of:-
(a) the use of the Card by the Member or any other person or persons with or without his authorisation or knowledge; or
(b) any breach of any provision of these Terms on the part of the Member.

13. Force Majeure
13.1 MEG CLUB shall not be liable for any loss or damage suffered or incurred by the Member arising from the delay in fulfilling or failure to fulfill or otherwise discharge any of its obligations under the contract, to the extent that such delay or failure is caused by reason of acts of God, wars, revolution, civil commotion, acts of public enemy, embargo, acts of government in its sovereign capacity, hacker attacks or any other circumstances beyond the reasonable control and not involving any fault or negligence of MEG CLUB.

14. Notice
14.1 Unless otherwise specified in these Terms, any notice or document from MEG CLUB to the Member in accordance with the Agreement shall be sent in any of the methods set out below at the option of MEG CLUB:
(a) prepaid post to the address of the Member as provided for the provision of the services of MEG CLUB which shall be deemed to have been received by the Member two days after the date of posting; or
(b) facsimile transmission to the facsimile number provided by the Member for this purpose which shall be deemed to have been received by the Member upon dispatch; or
(c) email to the email address provided by the Member for this purpose which shall be deemed to have been received by the Member upon dispatch and the Member accepts the transmission and security risk associated with communication by email; or
(d) electronic messages to the phone number or associated mobile applications provided by the Member for this purpose which shall be deemed to have been received by the Member upon dispatch and the Member accepts the transmission and security risk associated with mobile communications.
14.2 Any notice from the Member to MEG CLUB may be sent by fax, email, post or personal delivery to the fax number, email address or address as prescribed by MEG CLUB for this purpose and published in its website and all notices to MEG CLUB shall be considered as received upon its actual receipt by MEG CLUB.

15 Miscellaneous
15.1 MEG CLUB may from time to time:
(a) amend the terms of these Terms;
(b) add, replace and reduce the list of Benefits and the Benefit Providers;
(c) determine or change fees or charges payable under or in connection with these Terms; and
(d) change the ways for award of Points and/or the redemption of goods and services with the Points under the Bonus Points Scheme by publishing such not later than 30 days before the relevant effective date and such shall be binding on such effective date.
15.2 If any of these Terms is or become invalid, illegal or unenforceable in any respect under any law, the validity, legality and enforceability of the remaining provisions of these Terms shall not in any way be affected or impaired and such remaining provisions shall remain in full force and effect.
15.3 Any waiver by MEG CLUB of any breach of these Terms shall be effective only in the instance and for the purpose for which it is given and no failure or delay by MEG CLUB in exercising or enforcing any right under these Terms shall operate as a waiver thereof.
15.4 The Member shall notify MEG CLUB promptly in writing of any change in the statements or information provided by the Member to MEG CLUB for the purpose of the Club.
15.5 In the event of any inconsistency between the Chinese version and the English version of these Terms, the English version shall prevail.

16 Governing Law
16.1 These Terms shall be governed by and construed in accordance with the laws of Hong Kong.
16.2 The parties submit to the non-exclusive jurisdiction of the courts of Hong Kong.
16.3 In the event of any dispute arising out of or in connection with the Agreement, the parties agree in the first instance to discuss and consider referring the dispute to mediation.

                        

                        

</textarea>
                    
                    
                    <table class="megclub-agree-table">
                    <tr>
                        <td>
                        <input type="checkbox" value="agree" class="agree-checkbox">
                        </td>
                        <td>
                         我同意以上條款及細則。<br/>
                    I agree on the terms and conditions.
                        </td>
                        </tr>
                    </table>
                   
                    
                    <div class="popup-btns">
                    <a href="javascript:void(0);" class="btn join-btn">加入</a>
                    <a href="javascript:void(0);" class="btn cancel-btn">返回</a>
                    </div>
                    </div>
                    <?php 
                  //  echo $info['join_megclub'];
                    ?>
                    <input name="join_megclub" class="join_megclub" type="hidden" value="<?php echo $info['join_megclub'] ? '1':'0';?>">
                </div>
                
                <?php } ?>
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
            <td>
                
                
              
                
                <hr />
              
              
                <ul class="flow-menu">
                <li class="first"><a href="javascript:void(0);" class="enrollment-flow-btn" style="display: inline;">報名流程</a></li>
                <li><a href="javascript:void(0);" class="exam-flow-btn" style="display: inline;">考試流程</a></li>
                </ul>
                
                <div class="flow-div-oouter">
                <div class="flow-div-outer">
                <div class="flow-div">
                
                    
                </div>
                </div>
                    </div>
                
                
              </td>
          </tr>
          <tr>
            <td>
				<table border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="11" height="31" style="background:url(img/itbg_left.png) top center no-repeat;"></td>
					<td width="874" align="left" valign="middle" class="ibgt" style="background:url(img/itbg.png) top left repeat-x;">學員資料 <span class="style5">*</span>必須提供正確資料、部份資料將用作申請運輸署文件</td>
					<td width="11" style="background:url(img/itbg_right.png) top center no-repeat;"></td>
				  </tr>
				</table>
			</td>
          </tr>
          <tr>
            <td class="it">
			<table border="0" cellspacing="0" cellpadding="0" width="100%" class="form-table form-table-2">
              
                 <tr>
                <td align="left" valign="middle">
					<span class="style1">*</span>稱謂
				</td>
                <td>
                  <input type="radio" name="student_gender" value="<?php echo MALE;?>" <?php echo $info['student_gender']==MALE || $info['student_gender']==0 ? 'checked' : '';?> /><?php echo $this->gender[MALE]['name'];?>
				<input style="margin: 0 5px 0 5px;" type="radio" name="student_gender" value="<?php echo FEMALE;?>" <?php echo $info['student_gender']==FEMALE ? 'checked' : '';?> /><?php echo $this->gender[FEMALE]['name'];?>
				</td>
              </tr>
                
                <tr>
                <td   width="121" align="left" valign="middle" style="width: 220px;"> 
				  <span class="style1">*</span>學員姓名<br/> (身份證上的英文全名)
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
              <tr style="display: none;">
                <td align="left" valign="middle">
				  <span class="style1">*</span>身份證<br /><?php echo $event['full_id'] ? '':'(首四位數字)';?>
				</td>
                <td>
					<table border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td>
							<input name="student_id" type="text" class="textbox" id="textfield6" style="width:100px;" maxlength="<?php echo $event['full_id'] ? '10':'4';?>" placeholder="例：<?php echo $event['full_id'] ? 'A123456(1)':'1234';?>"
                                   value="<?php echo $event['full_id'] ? 'A000000(0)':'0000'; //echo $info['student_id'];?>" />
							<?php if(isset($error['student_id'])){?><span style="color:red"><?php echo $error['student_id']?></span><?php }?>
						</td>
					  </tr>
					</table>
				</td>
              </tr>
             
              <tr style="display: none;">
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
							<input name="student_tel" value="<?php echo $info['student_tel'];?>" type="text" class="textbox" id="tel_no" style="width:100px;" maxlength="8" placeholder="例：98765432" />
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
					<span class="style1">*</span>電郵
				</td>
                <td style="width: 600px;">
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
              <tr style="display: none;">
                <td align="left" valign="middle">
					<span class="style1">*</span>郵寄地址
				</td>
                <td>
					<table border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td>
<!--							<input name="student_address" value="<?php echo $info['student_address'];?>" type="text" class="textbox" id="textfield10" style="width:600px;" placeholder="" />

-->					
							<input name="student_address" value="地址欄不適用" type="text" class="textbox" id="textfield10" style="width:600px;" placeholder="" />
                          
                          </td>
						<td>
							<?php if(isset($error['student_address'])){?><span style="color:red"><?php echo $error['student_address']?></span><?php }?>
						</td>
					  </tr>
					</table>
				  </td>
              </tr>
    
                
                <tr>
					<td align="left" valign="middle" class="v-td"><span class="style1">*</span>選擇跟進網上報名服務地點</td>
					<td><label for="shop"></label>
					 
                                                <select name="shop" id="shop" style="width:200px; ">

                        <?php 
                        for($i=0;$i<sizeof($this->shop);$i++)
                        { 
                            $val = ($i==0) ? '0' : $this->shop[$i]['shop_name'];
                            $shop_email = ($i==0) ? '' : $this->shop[$i]['shop_email'];
                            $shop_address = ($i==0) ? '' : $this->shop[$i]['shop_address'];
                            $map = ($i==0) ? '' : $this->shop[$i]['map'];
                            $branch_type = ($i==0) ? '' : $this->shop[$i]['branch_type'];
                        
                            
                            echo ($i==0) ?   '<option data-branch-type="'.$branch_type.'" data-map="'.$map.'" data-address="'.$shop_address.'" value="'.$val.'"' :  '<option data-branch-type="'.$branch_type.'"  data-map="'.$map.'" data-address="'.$shop_address.'"  value="'.$val.'|'.$shop_email.'"';
               
                            
                            if($i==0 && !$info['shop'])
                            {
                                echo 'selected';
                            }
                            else if($info['shop'])
                            {
                                
                                $shop = explode("|", $info['shop']);
                                $shop = $shop[0];
                                echo $val==$shop ? 'selected' : '';
                            }
                                                    
                            echo'>'.$this->shop[$i]['shop_name'].'</option>';
                        }
                        ?>
                                                    											  </select>
                        
                        

                    
                        <?php if(isset($error['shop'])){?><span style="color:red"><?php echo $error['shop']?></span><?php }?>
                        
                        <div class="shop-address"></div>
                        <iframe class="iframe-map" src="" width="300" height="225" frameborder="0" style="border:0" allowfullscreen></iframe>
                        
<!--                        <a class="shop-info-link" href="https://www.hksm.com.hk/tc/contact_us.html" target="_blank">分店/駕駛中心資料</a>
-->                    </td>
        
                    <td></td>

                    
				  </tr>
                
                <tr>
					<td align="left" valign="middle"><span class="style1">*</span>聯絡時間</td>
					<td><label for="contact_timeslot"></label>
					
                        
                        <select name="contact_timeslot" id="contact_timeslot" style="width:200px; ">
						  <?php 
                        for($i=0;$i<sizeof($this->contact_timeslot);$i++)
                        { 
                            $val = ($i==0) ? '0' : $this->contact_timeslot[$i];
                            echo '<option value="'.$i.'"';
                            
                            if($i==0 && !$info['contact_timeslot'])
                            {
                                echo 'selected';
                            }
                            else if ($info['contact_timeslot']){
                                echo $val==$this->contact_timeslot[$info['contact_timeslot']] ? 'selected' : '';
                            }
                            
                            echo'>'.$this->contact_timeslot[$i].'</option>';
                        }
                        ?>
                        
                       <!--     
                            <option selected="selected">請選擇…</option>
												<option value="5">港島安全駕駛中心</option>
												<option value="6">沙田安全駕駛中心</option>
												<option value="4">元朗安全駕駛中心</option>-->
							
                        
                        
                        </select>
                    
                    
                                                <?php if(isset($error['contact_timeslot'])){?><span style="color:red"><?php echo $error['contact_timeslot']?></span><?php }?>

                        
                    
                    </td>
					  <td></td>
				  </tr>
                
                
                <tr>
                <td align="left" valign="middle" class="v-td" style="">
					備註
				</td>
                <td valign="middle">
										<textarea name="remark" id="remark" rows="4" cols="50"><?php echo $info['remark'];?></textarea>
				</td>
              </tr>
                
                
                <tr>
                <td align="left" valign="middle">
					<span class="style1">*</span>驗證碼<a class="reload-captcha-btn" href="javascript:void(0);">重組驗證碼</a>
				</td>
                <td valign="middle">
					<table border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td valign="middle">
							<span class="capcha-span"><?php echo $cap_img;?></span>
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


<style type="text/css">
    
    .final-cost-div-inner-old{
        display: none;
        font-size: 30px;
        color: #c7c7c7;
    }

    .final-cost-div{
        display: block;
        margin: 50px 0 0 0 ;
    }

    .final-cost-div-inner-old {
        font-size: 30px;
    }
    

    
    .final-cost-div-inner {
        font-size: 30px;
    }
    
    
    .final-cost-title {
        font-size: 20px;
    }
    
    .megclub-promote-statement span{

          border-radius: 6px;
    display: inline-block;
    color: #efa72a;
    font-size: 16px;
    font-weight: bold;
    /* background: #aa9167; */
    padding: 5px 0px;
        
    }
    
    a.join-megclub-btn-1,
    a.is-meg-club-member-btn
    {
      border-radius: 7px;
    padding: 5px 9px;
    background: #786666;
    color: #fff;
    font-weight: bold;
    font-size: 14px;
    cursor: pointer;
    box-shadow: 1px 1px;
    display: inline-block;
    /* box-shadow: 3px 3px 4px 1px #979595; */
    border: 0px solid #4f4646;
    font-family: "微軟正黑體", "arial";
    outline: 0;
    margin: 0 10px 0 0;
            border: 3px solid #4f4646;

    }
    
    a.join-megclub-btn-1:hover,
        a.is-meg-club-member-btn:hover,
    a.cancel-join-btn:hover,
        .popup-btns .btn:hover,
        a:hover,
        .popup-btns .join-btn.btn:hover
    ,.popup-btns .cancel-btn.btn:hover

    {
        background: #7e6f6f;
            	font-family:"微軟正黑體", "arial";
        text-decoration: none;

    }
    
    
    
    .white-popup {
  position: relative;
  background: #FFF;
  padding: 20px;
  width:auto;
  max-width: 500px;
  margin: 20px auto;
}
    
    .meg-club-block{
    display: block;
    margin: 0 0 60px 0;   
    
    }
    
    .meg-club-block-inner{
        font-weight: bold;
/*    border: 2px solid #efa72a;
*/    border-radius: 20px;
        font-size: 12px;
/*    padding: 20px;display: table;
*/        margin: 50px 0 0 0 ;
        
    }

            
    
    
    .megclub-tnc-textarea{
          width: 100%;  
        height: 400px;
        }
    
    .popup-btns{
        display: block;
            margin: 20px 0 0 0;
        text-align: center;
    }
    
    .popup-btns .btn{
        display: inline-block;
        margin: 0 10px;
    }
    
    
    
    .popup-btns .join-btn.btn{
         border-radius: 10px;
        padding: 5px 18px;
        background: #786666;
        color: #fff;
        font-weight: bold;
        font-size: 16px;
        border: 0px;
        cursor: pointer;
        box-shadow: 1px 1px;
        display: inline-block;
/*        box-shadow: 3px 3px 4px 1px #979595;
*/        border: 3px solid #4f4646;
    	font-family:"微軟正黑體", "arial";
        outline: 0;

    }

    
    .popup-btns .cancel-btn.btn{
         border-radius: 10px;
        padding: 5px 18px;
        background: #786666;
        color: #fff;
        font-weight: bold;
        font-size: 16px;
        border: 0px;
        cursor: pointer;
        box-shadow: 1px 1px;
        display: inline-block;
/*        box-shadow: 3px 3px 4px 1px #979595;
*/        border: 3px solid #4f4646;
    	font-family:"微軟正黑體", "arial";
        outline: 0;

    }
    
    a.cancel-join-btn{
        border-radius: 10px;
    padding: 3px 8px;
    background: #786666;
    color: #fff;
    font-weight: bold;
    font-size: 15px;
    border: 0px;
    cursor: pointer;
    box-shadow: 1px 1px;
    display: none;
    box-shadow: 1px 1px 2px 1px #979595;
    border: 4px solid #4f4646;
    font-family: "微軟正黑體", "arial";
    outline: 0;
    margin: 0 0 0 20px;
    }
    
    
    
    

    .megclub-btns-group-1,.megclub-btns-group-2{
        float: left;
/*        margin: 15px 0 50px 0 ;
*/ 
        margin: 15px 0 10px 0;
    }
    .megclub-btns-group-2{
        display: none;
    }
    
    .join-sentence
    {
        font-size: 23px;
    font-weight: bold;
    color: #4f4646;
        float: left;
    }
    
    .smile{
         background: url(img/smile.png) no-repeat;
        width: 25px;
        height: 25px;
        display: inline-block;
        background-size: 100%;
        position: relative;
        top: 3px;
        margin: 0 5px 0 0;
    }
    
    .final-cost-div{
        display: none;
    }
    
    .form-table td{
     /*   vertical-align: top;
        line-height: 50px;*/
    }
    
    select{
        margin:   8px  8px 8px 0;
    }
    
    .form-table-2{
        margin: 20px 0 0 0;
    }
    
    .megclub-logo{
        width: 80px;
    }
    
    .megclub-slogan{
        height: 32px;
    }
    
    .megclub-logo-div{
        display: block;
        margin: 0 0 10px 0;
    }
	
	
	 .expand-course-content  td{
padding: 15px;		 
        }
	
	
    @media all and (max-width:1007px){

        
  
    
    
        
    /*    a.join-megclub-btn-1, a.is-meg-club-member-btn {
        font-size: 20px; 
             
            
        }*/
        
        .form-table td{
            line-height: 35px;
        }
        
        .expand-course-content  td{
            line-height: 35px;
        }
        
        .course-content{
            line-height: 35px;
        }
        
        
    a.cancel-join-btn {
    margin: 10px 0 0 0;
}
        
        .smile{
        width: 22px;
            height: 22px;
        }
        .join-sentence {
    font-size: 20px;
    display: block;
    width: 100%;    }
        
        
        
        
 /*       .megclub-promote-statement span{
                 display: inline-block; 
    color: #fffd9d; 
    font-size: 22px; 
    font-weight: bold;
    background: #aa9167; 
    padding: 5px 10px;
            border-radius: 6px;
        }
        */
        a.shop-info-link{
            margin: 10px 0 20px 0;
        }
    }
    
    
    
    .capcha-span{
        margin: 0 10px 0 0;
    }
    
    .capcha-span img{
        height: 38px;
        float: left;
        margin: 8px 0 10px 0 ;
        
    }
    
    a.shop-info-link{
            display: inline-block;
    background: #727070;
    color: #fff;
    padding: 3px 10px;
    border-radius: 11px;
    font-size: 14px;
    border: 2px solid #000;
    font-weight: bold;
    box-shadow: 1px 1px 1px 1px #979595;
    }
    
    
    a.shop-info-link:hover{
            background: #8a8a8a;

    }
    
    a.reload-captcha-btn:link {
    font-family: "微軟正黑體", "arial";
    font-weight: bold;
    /* padding: 10px 50px 10px 50px; */
    background: #7b7b7b;
    color: #fff;
    font-size: 15px;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    /* text-shadow: 2px 1px 1px rgba(150, 150, 150, 0.83); */
    transition: transform 0.1s ease;
    /* display: block; */
    margin: 0 auto;
    padding: 5px;
    /* display: inherit; */
    text-decoration: none;
    border: 0px solid #000;
    margin: 0px 0 0 10px;
    border-radius: 7px;
    font-size: 14px;
}
    
    a.reload-captcha-btn:hover{
    background: #929292;
}
    .expand-course-content {
    font-size: 14px;
/*    border: 1px solid #AAA;
*/   /* padding: 2%;*/
/*    border-radius: 6px;
*/        float: left;
    line-height: 35px;
        margin: 20px  0  20px 0;
}

    .expand-course-content  ul {
        padding: 0 0 0 20px;
    }

    
    .expand-course-content  ul li{
        
    }
    
    
    .expand-course-content  p{
        margin: 0;
    }
    
    
    a.course-detail-btn:link,
    a.exam-flow-btn:link,
    a.enrollment-flow-btn:link,
	a.show-lesson-place-btn:link
	
    {
     font-family: "微軟正黑體", "arial";
    font-weight: bold;
    background: #012c6a;
    color: #fff;
    /* float: left; */
    font-size: 15px;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    transition: transform 0.1s ease;
    padding: 7px;
    padding: 5px;
    text-decoration: none;
    border: 3px solid #183e75;
    border-radius: 7px;
    font-size: 14px;
    position: relative;
    top: 2px;
    margin: 10px 0 10px 0;
    }
	
	a.show-lesson-place-btn:link{
		margin: 0 0 0 10px;
	}
    
    a.course-detail-btn:hover,
     a.exam-flow-btn:hover,
    a.enrollment-flow-btn:hover,
	a.show-lesson-place-btn:hover
    {
        
        background: #124692;
        
        
    }
     
    /*    a.enrollment-flow-btn:lin k
    {
        margin: 10px 5px  0 10px ;
    }
    */
    
    .flow-div{
          display: table-cell;
    width: 100%;
    /* float: left; */
    font-size: 14px;
   /* border: 1px solid #AAA;
    border-radius: 6px;*/
    line-height: 35px;
    margin: 0 auto;
        
    }
    
 
    
    .flow-div-outer{
        width: 100%;
        display: table-cell;
        margin: 30px auto 30px auto;
       /* padding: 10px;*/
    }
    
    .flow-div-oouter{
        display: table;
        float: left;
        width: 100%;
        margin: 0 0 10px 0;
    }
    
    .flow-menu{
        padding: 0;
        width: 100%;
		margin: 16px 0 16px 0;
    }
    
    .flow-menu li{
        display: inline-block;
    }
    #captcha{
        margin: 0 0 0 0;
    }
    
    .megclub-agree-table{
        margin: 10px 0 0 0;
    }
    .megclub-agree-table td{
    
        vertical-align: top;
        font-size: 14px;
    }
    
    
    
    .megclub-agree-table td input{
    
        width: 16px;
        height: 16px;
    }
    
    .page-wrap #form1 .it td.v-td
    {
        vertical-align: top;
        line-height: 50px;
    }
    
    
    .reg-enquiry-div br{
        display: none;
    }
    
    
    .reg-enquiry-div{
        margin: 20px 0 0 0;
        line-height: 20px;
    }
    
    
    
    .reg-enquiry-a:link{
font-family: "微軟正黑體", "arial";
    font-weight: bold;
    background: #ffffff;
    color: #5c2209;
    /* float: left; */
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    padding: 7px;
    padding: 5px;
    text-decoration: none;
    border: 1px solid #5c2209;
    border-radius: 7px;
    margin: 5px;
/*    padding: 5px 10px 5px 5px;
*/   
    padding: 5px 10px;
        transition: background-color 0.1s ease;
        background: #fff8af;

        
    }
    
    .reg-enquiry-a:hover{
/*        background: #fff8af;
*/    
        background: #fffbcf;
    
    }
    
    .reg-enquiry-a .check{
        display: none;
        padding: 5px;
    }
    
    
    .reg-enquiry-a .uncheck{
        display: inline;
       padding: 5px;
    }
    .reg-enquiry-a.active .check{
        display: inline;
    }
    
    .reg-enquiry-a.active .uncheck{
        display: none;
    }
    
    
    .reg-enquiry-a.active{
    background: #fee820;
        border: 1px solid #d59126;
    }
    
    
        @media all and (max-width:1007px){

			.page-wrap #form1 .it iframe.lesson-place-iframe-map{
				width: 300px;
				height: 225px;
				display: block;
			}
			
              a.course-detail-btn:link,
    a.exam-flow-btn:link,
    a.enrollment-flow-btn:link
    {
        float: left;
            }
            
            a.course-detail-btn:link{
                margin: 0 0 30px 0;
                line-height: normal;
            }

            .flow-div-outer{
                padding: 10px;
                
                }
            .flow-menu{
                margin: 0;
/*                margin: 0 0 0 10px;
*/            }
            
               .flow-div p{
        margin: 0;
    }
            
            
            
    .flow-menu li.first{
        margin: 0 0 0 10px;
    }
            
            
        .page-wrap #form1 .it td.v-td
    {
        vertical-align: top;
        line-height:normal;
    }
            
      .reg-enquiry-div br{
                display: block;
        }
            
            .reg-enquiry-a:link{
/*display: table;
    margin: 10px 0 0 0;  */          }
            
            
            
    
            
    }
    
    .shop-address{
            font-size: 14px;
            font-weight: bold;
    }
    
    .iframe-map{
        margin: 0 0 20px 0;
    }
	
	.lesson-place-show-td-row-name{
		vertical-align: top;
		line-height: 50px;
	}
	

    
    
</style>

<script type="text/javascript">
    
    
var megclub_discount =<? echo  MEGCLUB_DISCOUNT; ?>;
<?php //echo !$info['join_megclub'];?>
var inital_megclub_blk = <?php echo $info['join_megclub'] ? 1 : 0; ?>;


</script>