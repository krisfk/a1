<!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="50" align="right" valign="middle" style="background: #000000;">
		<table border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="10%" class="style3"><a name="top" id="top"></a></td>
			<td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/meg_logo.png" alt="gc_logo" width="87" height="50" border="0" /></a></div></td>
			--><!--td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/hksm_logo.png" alt="gc_logo" width="78" height="50" border="0" /></a></div></td>
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
				  <tr>
					<td align="left" valign="middle">活動名稱</td>
					<td width="316">
						<input name="name" type="text" class="textbox" id="name" value="<?php echo $event['name'];?>" readonly="readonly" style="width:350px"/>
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
						<select name="course" id="course" style="width:500px;">
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
					  <select name="location" id="location" style="width:200px; ">
						<option selected="selected">請選擇…</option>
						<?php foreach($event['location_list'] as $val){?>
						<option value="<?php echo $val['id'];?>" <?php echo $val['id']==$info['location'] ? 'selected' : '';?> ><?php echo $val['name'];?></option>
						<?php }?>
					  </select>
                      <?php if(isset($error['location'])){?><span style="color:red"><?php echo $error['location']?></span><?php }?>
                      </td>
					  <td></td>
				  </tr>
                    
                    
                    

                    

				</table>
                
                <div class="final-cost-div">
                      <span class="final-cost-title" >付款金額：</span>
                        <span class="final-cost-div-inner">$<span class="final-cost">xxxx</span></span>
                </div>
                
                <?php
                
                if($event['ask_megclub'])
                {
                    
                ?>
                <div class="meg-club-block">
                    
                    
                    <div class="meg-club-block-inner">
                        
                        <div class="megclub-logo-div">
                        <img class="megclub-logo" src="img/megclub-logo.jpg">
                        <img src="img/megclub-slogan.png">
                        
                        </div>
                    MEG Club ，一個屬於你的一站式生活品味學習平台。<br/>

我們的使命是將樂趣，驚喜及刺激融入你的生活環節。<br/>

立即加入我們，體驗最新嘅玩樂課程及享受會員專屬優惠!<br/><br/>


MEG Club, your one-stop portal to exciting and classy lifestyle learning experience.<br/>

Our mission is to enrich your daily life and get you to know how living can be filled with more WOW and FUN.<br/>

Join us now and stay tuned for our latest activities and exclusive member privileges!<br/><br/>

                   
                    
                <div class="megclub-promote-statement"><span>加入 MEG CLUB 會員可獲額外減$200 優惠！</span></div>
                
                            
                    <span class="megclub-btns-group-1">
                <a href="#megclub-popup" class="open-popup-link join-megclub-btn-1"> JOIN MEG CLUB </a>
<!--<a href="javascript:void(0);" class="is-meg-club-member-btn">已是會員？</a>-->
</span>
                        
                       
                    
            
                
                    
                    <span class="megclub-btns-group-2">
                        <span class="join-sentence"><span class="smile" ></span>已選擇加入MEG CLUB</span>
                        <a href="javascript:void(0);" class="cancel-join-btn">取消加入</a>
                        
                    </span>
                        
                          </div>
                    
	            
                
                <div id="megclub-popup" class="white-popup mfp-hide">
                    <h2>Member Terms and Conditions (MEG)</h2>
    
                    <textarea name="textfield4" cols="107" rows="7" class="megclub-tnc-textarea" readonly="">Copyright MEG Club 2018

Membership of the MEG Club is subject to and governed by the following terms and conditions.
1. Definitions
1.1 In these Terms, unless the context otherwise requires, the following words and expressions shall
have the following meanings:
(a) “Agreement” means the agreement on the rights and obligations on the Club between MEG and
a Member on these Terms.
(b) “MEG” means MEG Club.
(c) “Benefits Providers” means collectively MEG and the Merchants.
(d) “Benefits” means the benefits made available to the Members from time to time as published by
MEG in its website or publication.
(e) “Bonus Points Scheme” means the MEG Bonus Points Scheme operated and administered by MEG
as referred to in clause 8.
(f) “Bonus Points Scheme Transactions” means transactions or tasks in relation to which Points will
be awarded as referred to in clause 8.2.
(g) “Card” means the MEG Club membership card issued by MEG to the Member or such other card
MEG may issue to a Member in relation to the Club and/or the Bonus Points Scheme from time to
time.
(h) “Club” means the program “MEG Club” operated and administered by MEG pursuant to the Terms.
(i) “Pre-payment” means the pre-payment paid by the Member pursuant to clause 4, where
applicable, as reduced by deduction from time to time.
(j) “Member” means a person referred to in clause 2.1.
(k) “Membership” means the Member's membership of the MEG Club.
(l) “Merchant” means a third party who has agreed to offer certain Benefits to Members from time
to time.
(m) “Points” means the points to be awarded by MEG pursuant to the Bonus Points Scheme.
(n) “Account” means the account maintained by the Member with MEG pursuant to the Terms and
Conditions for MEG.
(o) “Terms” means these terms and conditions as amended pursuant to clause 15.1 from time to time.
1.2 In these Terms, unless the context otherwise requires:
(a) references to Clauses are to clauses of these Terms;
(b) words denoting one gender shall include all other genders;
(c) words denoting the singular shall include the plural and vice versa; and
(d) the word “person” includes an individual, partnership, corporation or unincorporated body and
government department.
1.3 In these Terms, reference to any information, amendment or amount as published by MEG means
the information, amendment or amount as published by MEG in its website at www.megclub.com.hk.
2. Membership
2.1 A person who has subscribed to any service of MEG has agreed to these Terms in such manner

MEG may accept, and paid the Pre-payment (where applicable) shall be a Member.
2.2 A person shall be deemed to have agreed to these Terms by applying for Membership, activating
the membership or account, presenting the Card or quoting the membership number to a Benefit
Provider or accessing the personal account via any service points of MEG.
2.3 Membership shall commence when clause 2.1 has been complied with and shall continue for 2
years. Thereafter, membership shall be automatically renewed for one year until it is terminated in
accordance with these Terms.
2.4 The Member acknowledges and agrees that the Club is a contractual relationship between the
Member and MEG on these Terms and the Member has no right other than as expressly set out in
these Terms.
2.5 Membership is non-transferable.
2.6 For the purpose of the Terms and Conditions for MEG, this Agreement is a Related Agreement as
referred to in the Terms and Conditions for MEG under which debit can be made to the Prepaid
Account.
2.6 MEG may refuse application of Membership from any person without giving any reason.
3. Membership Card
3.1 The Card may be in a physical or electronic form and remains the property of MEG and shall be
returned immediately to MEG upon the termination of the Membership.
3.2 The Card shall only be used by the Member to whom the Card is issued. If the Card is lost or stolen
or damaged or if the name of the Member is changed, such shall be reported immediately to MEG
and a replacement Card shall be issued by MEG upon the payment of the relevant charge as published
by MEG.`
3.3 The Member shall be responsible for the safe keeping of the Card and the Member shall be liable
for any use of the Card by any third party whether authorised by him or otherwise.
3.4 The Member shall not tamper with the Card, including but not limited to the software and the
data recorded on the Card.
4. Pre-payment
4.1 MEG shall be entitled to require a person to pay the Pre-payment before becoming a Member or
before redeeming any Benefits.
4.2 The Pre-payment shall be the amount as published by MEG from time to time.
4.3 MEG shall be entitled (but not obliged) to deduct any amount due from the Member to MEG of
whatever nature from the Pre-payment.
5. Member's Benefits
5.1 The Member will be eligible to enjoy the Benefits subject to these Terms and the related terms
during the continuation of his Membership.
5.2 All Benefits are subject to availability and a Benefit Provider may withdraw or suspend any Benefit
without notice.
5.3 The Benefits may be subject to other terms and conditions, registration and/or approval which
may be imposed by the Benefit Providers and communicated to the Member. Unless otherwise stated,
no Benefit may be claimed in conjunction with any other offer from the relevant Benefit Provider.
5.4 The Benefits are available to the Member personally and shall not be sold, transferred, assigned
or use for any commercial purpose unless otherwise stated in writing.
5.5 To claim a Benefit, the Member must produce the Card or quote the membership number to the
Benefit Provider or prove his Membership in any other way as the Benefit Provider may request failing
which the Benefit Provider may refuse to provide the Benefit.
5.6 All descriptions and information on the Benefits from Merchants as published by MEG are based
on information supplied by the Merchants and MEG shall not be liable to the Member for any
information provided by the Merchants or other third parties.
6. Exclusion of Liability
6.1 The Merchants are not agents of MEG and have no authority, express or implied, to bind MEG or
to make any representations, warranties or statements on MEG’s behalf.
6.2 MEG is not a party to any transaction entered into between the Member and a Merchant and has
no authority, express or implied, to bind the Merchants or to make any representations, warranties
or statements on their behalf.
6.3 In case of dispute on any Benefit, the decisions of the relevant Benefit Provider shall be final and
binding on the Member.
6.4 To the extent permissible by law, MEG shall not be liable to the Member for any loss, damage or
injury whatsoever which the Member may suffer as a direct or indirect result of any act, omission or
default of MEG in relation to the Agreement howsoever caused or arisen (other than those caused or
arisen as a direct result of fraud on the part of MEG) to the Member.
6.5 MEG makes no warranty, whether express or implied and whether arising under legislation or
otherwise, nor shall MEG be liable in any way, in respect of the condition, suitability, quality, fitness
or safety of any goods or services offered or supplied to the Member by a Merchant.
6.6 The Member acknowledges that MEG is not responsible for any suspension or withdrawal of any
Benefit by a Merchant, the condition, suitability, quality, fitness, safety or availability of any Benefit
from a Merchant or any act or omission of any Merchant or a failure by any Merchant to comply with
the terms of any transaction entered into between the Merchant and the Member and to the extent
permitted by law, MEG shall not be liable to the Member in relation thereto.
7. Membership Fee and Disbursements
7.1 MEG may impose a membership fee (amount subject to review from time to time) on the Member
for its provision of the Benefits at such rate and on such terms as it may determine from time to time.
7.2 A charge may be imposed by MEG for disbursement of its costs or expenses incurred in the
provision and/or delivery of any information or document requested by the Member.
7.3 The membership fee, any charge and any other amount of whatever nature payable by the
Member to MEG pursuant to this Agreement shall be paid by debiting the Prepaid Account or by such
credit card or other payment means as MEG may accept from time to time and the Member hereby
irrevocably authorises such debit or credit without notice to or further authority or consent from the
Member.
8. Bonus Points Scheme
8.1 Unless otherwise opted out, the Member shall be entitled to participate in the Bonus Points
Scheme on the terms and conditions set out in this clause.
8.2 Points will be awarded to the Member
(a) upon the completion of specific tasks as published by MEG from time to time; or
(b) based on the amount he spends on the relevant transactions as published by MEG from time to
time and the number of Points the Member shall receive for each Hong Kong Dollar of spending shall
be as published by MEG from time to time provided that no Point will be awarded for part of HK$1.
8.3 MEG shall publish from time to time the goods and services available for redemption by Members,
the Points required to redeem those goods and services and the manner of redemption.
8.4 Each Point awarded to the Member will have a valid period (except otherwise in writing) of 24
months and if such Point is not redeemed at the end of such 24 months, such Point will expire and
will be deducted from the then accumulated Points which have not been used for redemption.
8.5 Points awarded shall not be transferred to other person or between different accounts of a
Member or exchanged for cash or used in any way other than as expressly set out in these Terms and
any other related terms.
8.6 In the event that any amount of whatever nature is outstanding from the Member to MEG, MEG
shall be entitled to suspend his membership of the Bonus Points Scheme until the outstanding
amount has been paid in full. During the suspension of the Member’s membership of the Bonus
Points Scheme, no Points will be awarded to the Member for any Bonus Points Scheme Transaction
and he shall not be able to redeem any goods or services. MEG shall have the right at any time at its
absolute discretion to determine the calculation of the Bonus Points.
8.7 MEG may from time to time introduce new and/or cancel existing Bonus Points Scheme
Transactions or amend the ways Points are awarded to the Member or amend or impose any relevant
condition without prior notice by publishing such introduction, cancellation or amendments.
8.8 The redemption of any particular goods or services shall be subject to :-
(a) the Member having the relevant accumulated valid and unredeemed Points required to redeem
such goods or services and the availability of such goods and services; and
(b) any specific term or condition of MEG in relation thereto and/or the terms and conditions of the
supplier of such goods or services as published by MEG from time to time or as communicated to the
Member.
8.9 MEG shall be entitled to withdraw any goods or services from redemption or to change the
number of Points required to redeem any particular goods or services without prior notice by
publishing such withdrawal or changes.
8.10 In the event of any dispute between MEG and the Member on the awarding of Points, the
redemption of goods and services and the operation of the Bonus Points Scheme generally, the
decision of MEG shall be final and binding on the Member.
8.11 MEG may at any time by notice to the Member terminate the Member’s membership of the
Bonus Points Scheme if the Member has in the opinion of MEG breached these Terms or upon the
termination of the Member’s membership of the Club for whatever reason.
8.12 Upon the termination of the Member’s membership of the Bonus Points Scheme for whatever
reason, all the Member’s accumulated Points as at the date of termination shall be become invalid
and the Member shall cease to have any right under the Bonus Points Scheme.
8.13 MEG shall have the right at any time at its absolute discretion without giving any reason publish
a notice to terminate the operation of the Bonus Points Scheme and upon termination of the Bonus
Points Scheme, all the Member’s rights under the Bonus Points Scheme shall cease forthwith and all
his accumulated Points at the time will be invalid.
8.14 The Member shall have no claim against MEG for the invalidity of any accumulated Points or for
the termination of his membership of the Bonus Points Scheme or for the termination of the Bonus
Points Scheme.
9. Access to Website, Mobile Application and Other Online Platforms
9.1 The Member shall be provided with an account number and password or other codes or devices
to gain access to restricted portions of the website, mobile applications and other online platforms
of MEG in respect of the Club and in that connection, the Member agrees and confirms that the
information contained in such restricted area is confidential to MEG, and is provided to the Member
for his personal use only and the Member undertakes to keep these information and content
confidential.
9.2 The Member shall keep his user name, account number and password or other codes or devices
referred to in clause 9.1 confidential and shall not allow other parties to use the same. The Member
shall be responsible for all activities at the website, mobile applications and other online platform of
MEG conducted using his user name, account number and password whether such activity is
conducted by the Member, with the Member’s authority or otherwise.
9.3 MEG reserves its right to prohibit the use of the account number, password, code or device
provided by MEG to the Member where MEG determines that such use interferes with the operation
of its website, mobile applications and other online platforms or results in commercial benefits for
other entities to the detriment of MEG.
10. Termination of Membership
10.1 The Member may resign from his Membership by notice in writing to that effect to MEG.
10.2 MEG may at any time by notice to the Member terminate the Membership of the Member
without reason and without liability to the Member.
10.3 Upon termination, the Member shall cease to have any right, benefit or privilege of the
Membership and shall no longer have any right to receive and enjoy the Benefits.
11. Termination of Operation of the Club
11.1 MEG shall have the right at any time at its absolute discretion to publish a notice without giving
any reason to terminate the operation of the Club.
11.2 Upon termination of the operation of the Club, all Membership rights and privileges shall cease
and no claim or demand of whatsoever nature and howsoever arising shall be made or capable of
being made by the Member against MEG, the employees, the directors, the shareholders or the
management of MEG in connection with the termination of the operation of the Club.
11.3 Clause 12 and any other clause which due to its nature shall continue to apply after the
termination of the Agreement or the operation of the Club shall survive the termination of the Club
and this Agreement and shall continue to have effect thereafter.
12. Indemnity
12.1 Without prejudice to any other indemnity from the Member to MEG under any other agreement,
the Member shall keep MEG indemnified and shall hold MEG harmless at all times from and against
any and all damage, loss, costs, expenses, liability or claims arising from or as a result of:-
(a) the use of the Card by the Member or any other person or persons with or without his
authorisation or knowledge; or
(b) any breach of any provision of these Terms on the part of the Member.
13. Force Majeure
13.1 MEG shall not be liable for any loss or damage suffered or incurred by the Member arising from
the delay in fulfilling or failure to fulfill or otherwise discharge any of its obligations under the contract,
to the extent that such delay or failure is caused by reason of acts of God, wars, revolution, civil
commotion, acts, of public enemy, embargo, acts of government in its sovereign capacity, hacker
attacks or any other circumstances beyond the reasonable control and not involving any fault or
negligence of MEG.
14. Notice
14.1 Unless otherwise specified in these Terms, any notice or document from MEG to the Member in
accordance with the Agreement shall be sent in any of the methods set out below at the option of
MEG:
(a) prepaid post to the address of the Member as provided for the provision of the services of MEG
which shall be deemed to have been received by the Member two days after the date of posting;
(b) facsimile transmission to the facsimile number provided by the Member for this purpose which
shall be deemed to have been received by the Member upon dispatch; or
(c) email to the email address provided by the Member for this purpose which shall be deemed to
have been received by the Member upon dispatch and the Member accepts the transmission and
security risk associated with communication by email.
(d) electronic messages to the phone number or associated mobile applications provided by the
Member for this purpose which shall be deemed to have been received by the Member upon dispatch
and the Member accepts the transmission and security risk associated with mobile communications.
14.2 Any notice from the Member to MEG may be sent by fax, email, post or personal delivery to the
fax number, email address or address as prescribed by MEG for this purpose and published in its
website and all notices to MEG shall be considered as received upon its actual receipt by MEG.
15 Miscellaneous
15.1 MEG may from time to time:
(a) amend the terms of these Terms;
(b) add, replace and reduce the list of Benefits and the Benefit Providers;
(c) determine or change fees or charges payable under or in connection with these Terms; and
(d) change the ways for award of Points and/or the redemption of goods and services with the Points
under the Bonus Points Scheme by publishing such not later than 30 days before the relevant effective
date and such shall be binding on such effective date.
15.2 If any of these Terms is or become invalid, illegal or unenforceable in any respect under any law,
the validity, legality and enforceability of the remaining provisions of these Terms shall not in any way
be affected or impaired and such remaining provisions shall remain in full force and effect.
15.3 Any waiver by MEG of any breach of these Terms shall be effective only in the instance and for
the purpose for which it is given and no failure or delay by MEG in exercising or enforcing any right
under these Terms shall operate as a waiver thereof.
15.4 The Member shall notify MEG promptly in writing of any change in the statements or information
provided by the Member to MEG for the purpose of the Club.
13.5 In the event of any inconsistency between the Chinese version and the English version of these
Terms, the English version shall prevail.
16 Governing Law
16.1 These Terms shall be governed by and construed in accordance with the laws of Hong Kong.
16.2 The parties submit to the non-exclusive jurisdiction of the courts of Hong Kong.
16.3 In the event of any dispute arising out of or in connection with the Agreement, the parties agree
in the first instance to discuss and consider referring the dispute to mediation.

</textarea>
                    
                    
                    <div class="popup-btns">
                    <a href="javascript:void(0);" class="btn join-btn">加入</a>
                    <a href="javascript:void(0);" class="btn cancel-btn">取消</a>
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
			<table border="0" cellspacing="0" cellpadding="0" width="100%" class="form-table form-table-2">
              
                 <tr>
                <td align="left" valign="middle">
					<span class="style1">*</span>稱呼
				</td>
                <td>
                  <input type="radio" name="student_gender" value="<?php echo MALE;?>" <?php echo $info['student_gender']==MALE || $info['student_gender']==0 ? 'checked' : '';?> /><?php echo $this->gender[MALE]['name'];?>
				<input style="margin: 0 5px 0 5px;" type="radio" name="student_gender" value="<?php echo FEMALE;?>" <?php echo $info['student_gender']==FEMALE ? 'checked' : '';?> /><?php echo $this->gender[FEMALE]['name'];?>
				</td>
              </tr>
                
                <tr>
                <td   width="121" align="left" valign="middle" style="width: 180px;"> 
				  <span class="style1">*</span>學員姓名 (英文全名)
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
					<td align="left" valign="middle"><span class="style1">*</span>選擇分店/駕駛中心</td>
					<td><label for="shop"></label>
					 
                                                <select name="shop" id="shop" style="width:200px; ">

                        <?php 
                        for($i=0;$i<sizeof($this->shop);$i++)
                        { 
                            $val = ($i==0) ? '0' : $this->shop[$i]['shop_name'];
                            $shop_email = ($i==0) ? '' : $this->shop[$i]['shop_email'];
                            //    echo '<option value="'.$i.'"';
                            
                            echo ($i==0) ?   '<option value="'.$val.'"' :  '<option value="'.$val.'|'.$shop_email.'"';
               
                            
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
                    </td>
        
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
                <td align="left" valign="middle">
					<span class="style1">*</span>驗證碼
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
    

    .final-cost-div{
        display: block;
        margin: 20px 0 0 0 ;
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
    color: #fffd9d;
    font-size: 30px;
    font-weight: bold;
    background: #aa9167;
    padding: 5px 20px;
        
    }
    
    a.join-megclub-btn-1,
    a.is-meg-club-member-btn
    {
        border-radius: 10px;
        padding: 6px 18px;
        background: #786666;
        color: #fff;
        font-weight: bold;
        font-size: 26px;
        border: 0px;
        cursor: pointer;
        box-shadow: 1px 1px;
        display: inline-block;
        box-shadow: 3px 3px 4px 1px #979595;
        border: 4px solid #4f4646;
    	font-family:"微軟正黑體", "arial";
        outline: 0;
        margin: 0 10px 0 0 ;

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
    border: 2px solid #efa72a;
    border-radius: 20px;
    padding: 20px;display: table;
        margin: 50px 0 0 0 ;
        
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
        padding: 0 18px;
        background: #786666;
        color: #fff;
        font-weight: bold;
        font-size: 22px;
        border: 0px;
        cursor: pointer;
        box-shadow: 1px 1px;
        display: inline-block;
        box-shadow: 3px 3px 4px 1px #979595;
        border: 4px solid #4f4646;
    	font-family:"微軟正黑體", "arial";
        outline: 0;

    }

    
    .popup-btns .cancel-btn.btn{
         border-radius: 10px;
        padding: 0 18px;
        background: #786666;
        color: #fff;
        font-weight: bold;
        font-size: 22px;
        border: 0px;
        cursor: pointer;
        box-shadow: 1px 1px;
        display: inline-block;
        box-shadow: 3px 3px 4px 1px #979595;
        border: 4px solid #4f4646;
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
    display: inline-block;
    box-shadow: 1px 1px 2px 1px #979595;
    border: 4px solid #4f4646;
    font-family: "微軟正黑體", "arial";
    outline: 0;
    margin: 0 0 0 20px;
    }
    
    
    
    
{
                    background: #7e6f6f;

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
        
    }
    
    select{
        margin:   8px  8px 8px 0;
    }
    
    .form-table-2{
        margin: 20px 0 0 0;
    }
    
    .megclub-logo{
        width: 110px;
    }
    
    .megclub-logo-div{
        display: block;
        margin: 0 0 10px 0;
    }
    @media all and (max-width:1007px){

        a.join-megclub-btn-1, a.is-meg-club-member-btn {
        font-size: 20px;
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
        
        
        
        
        .megclub-promote-statement span{
                 display: inline-block;
    color: #fffd9d;
    font-size: 22px;
    font-weight: bold;
    background: #aa9167;
    padding: 5px 10px;
            border-radius: 6px;
        }
    }
    
    .capcha-span{
        margin: 0 10px 0 0;
    }
    
    .capcha-span img{
        height: 38px;
    }
</style>

<script type="text/javascript">
var megclub_discount =<? echo  MEGCLUB_DISCOUNT; ?>;
<?php //echo !$info['join_megclub'];?>
var inital_megclub_blk = <?php echo $info['join_megclub'] ? 1 : 0; ?>;


</script>