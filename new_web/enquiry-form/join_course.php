<?php
require './config.php';
$lang = isset($_GET['lang']) && in_array($_GET['lang'], $_CONFIG['language_support']) ? htmlspecialchars($_GET['lang']) : 'zh';
require './resources/language/lang.'. $lang .'.php';
//require './resources/phpmailer/PHPMailerAutoload.php';
require './resources/classes/func.php';

require("PHPMailer_5.2.2/class.phpmailer.php");


if(!isset($_SESSION))
	session_start();

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$id = array_key_exists($id, $_LANG['apply_events']) ? $id : 0;

$events = $_LANG['apply_events'][$id];
$events_code = $_LANG['apply_events'][$id]['code'];

$course = $area = $age = $job = 0;
$phone = $name = $email = $comment = $identity_number = $verifier_number = '';
$sent = false;

if(isset($_POST['send'])){
	$pass = true;
	$errormsg = array(); 

	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$phone = htmlspecialchars($_POST['phone']);
	$identity_number = htmlspecialchars($_POST['identity_number']);
	$verifier_number = htmlspecialchars($_POST['verifier_number']);
	$course = is_numeric($_POST['course']) ? $_POST['course'] : 0;
    $shop = is_numeric($_POST['shop']) ? $_POST['shop'] : 0;
    $timeslot = is_numeric($_POST['timeslot']) ? $_POST['timeslot'] : 0;
    $gender = is_numeric($_POST['student_gender']) ? $_POST['student_gender'] : 0;
	$area = is_numeric($_POST['area']) ? $_POST['area'] : 0;
	$age = is_numeric($_POST['age']) ? $_POST['age'] : 0;
	$job = is_numeric($_POST['job']) ? $_POST['job'] : 0;
	$comment = htmlspecialchars($_POST['comment']);


	if(is_empty($course) && $course == 0){
		$errormsg['course'] = $_LANG['input_error']['empty']['course'];
		$pass = false;
	}

	if(is_empty($name)){
		$errormsg['name'] = $_LANG['input_error']['empty']['name'];
		$pass = false;
	}else if(!is_name($name)){
		$errormsg['name'] = $_LANG['input_error']['format']['name'];
		$pass = false;
	}

	if(is_empty($phone)){
		$errormsg['phone'] = $_LANG['input_error']['empty']['phone'];
		$pass = false;
	}else if(!is_phone($phone)){
		$errormsg['phone'] = $_LANG['input_error']['format']['phone'];
        		$pass = false;

	}

	if(!is_empty($email) && !is_email($email)){
		$errormsg['email'] = $_LANG['input_error']['format']['email'];
		$pass = false;
	}

	if(is_empty($shop) && $shop == 0){
		$errormsg['shop'] = $_LANG['input_error']['empty']['shop'];
		$pass = false;
	}
    
	if(is_empty($timeslot) && $timeslot == 0){
		$errormsg['timeslot'] = $_LANG['input_error']['empty']['timeslot'];
		$pass = false;
	}
    
	if(is_empty($course) && $course == 0){
		$errormsg['course'] = $_LANG['input_error']['empty']['course'];
		$pass = false;
	}
    
	/*if(is_empty($identity_number)){
		$errormsg['identity_number'] = $_LANG['input_error']['empty']['identity_number'];
		$pass = false;
	}*/

/*	if($area == 0){
		$errormsg['area'] = $_LANG['input_error']['empty']['area'];
		$pass = false;
	}

	if($age == 0){
		$errormsg['age'] = $_LANG['input_error']['empty']['age'];
		$pass = false;
	}

	if($job == 0){
		$errormsg['job'] = $_LANG['input_error']['empty']['job'];
		$pass = false;
	}*/

	if($verifier_number !== $_SESSION['verifier_number']){
		$errormsg['verifier_number'] = $_LANG['input_error']['format']['verifier_number'];
		$pass = false;
	}

	if($pass){
        //function emailToJoin($events_code, $course, $name, $phone, $email, $id, $area, $age, $job, $comment){
//		$sent = emailToJoin($events_code, $_LANG['courses'][$course], $name, $phone, is_empty($email) ? $_LANG['empty'] : $email, $identity_number, $_LANG['areas'][$area], $_LANG['ages'][$age], $_LANG['jobs'][$job], $comment );

   	$sent = emailToJoin($events_code, $_LANG['courses'][$course], $name, $phone, is_empty($email) ? $_LANG['empty'] : $email, $_LANG['shops'][$shop]['shop_name'],$_LANG['timeslots'][$timeslot],  $comment,$_LANG['genders'][$gender],$_LANG['shops'][$shop]['shop_email'] );

    }
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-hk" lang="zh-hk" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-language" content="zh-hk">
	<meta http-equiv="content-style-type" content="text/css">
	<meta http-equiv="content-script-type" content="text/javascript">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="./resources/static/css/main.css" type="text/css" media="all">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title><?php echo $_LANG['title'] ?></title>
</head>
<body>
<script type="text/javascript">
	$(function() {
	   $("#apply").click(function(){
	   		$("#apply").attr('disabled','disabled');
	   		$("#target")[0].submit();
	   });
	});
</script>
<div id="apply_form">
<?php if(!empty($errormsg)): ?>
	<div class="error">
		<p><?php echo $_LANG['input_error']['empty']['description'] ?></p>
		<ul>
		<?php foreach ($errormsg as $k => $e): ?>
			<li><p><?php echo $e; ?></p></li>
		<?php endforeach; ?>
		</ul>
	</div>
<?php endif ?>

<p class="hints" style="display:block;"><span class="st">*</span><?php echo $_LANG['apply_form_must'] ?> </p>
<form method="POST" id="target" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?lang=" . $lang . "&id=" . $id ?>" enctype="multipart/form-data" autocomplete="off">
<input type="hidden" name="send" value="1">
<table id="miyazaki" cellpadding="0" cellspacing="0">
<tbody>

<tr style="display: none;">
	<td><?php echo $_LANG['events_p_code'] ?>:</td>
	<td><?php echo $_LANG['apply_events'][$id]['code'] ?></td>
	</tr>
	<tr>
	<td><?php echo $_LANG['courses_name'] ?>:<span class="st">*</span></td>
	<td>
		<select id="course" name="course">
		<?php foreach ($_LANG['courses'] as $key => $value): ?>
		<?php echo "<option value='$key' ". ($key == $course ? "selected='selected'" : '') .">$value</option>"; ?>
		<?php endforeach;  ?>
		</select>
	</td>
	</tr>
	
	<tr>
	<td><?php echo $_LANG['gender_title'] ?>:<span class="st">*</span></td>
	<td>
	<!--	<input name="name" type="text" id="name" class="required" value="<?php echo $name ?>">
	-->	
		<?php // echo $student_gender;?>
		<?php foreach ($_LANG['genders'] as $key => $value): ?>
	<input type="radio" name="student_gender" value="<?php echo $key;?>" <?php echo ($key == $student_gender ? "checked='checked'" : '')?> ><?php echo $value;?>
		<?php //echo "<option value='$key' ". ($key == $area ? "selected='selected'" : '') .">$value</option>"; ?>
		<?php endforeach;  ?>
		
	<!--  <input type="radio" name="student_gender" value="1" checked="">先生(Mr.)
		<input style="margin: 0 5px 0 5px;" type="radio" name="student_gender" value="2">女士(Ms.)			
	-->	
		</td>
	</tr>
	
	
	<tr>
	<td><?php echo $_LANG['name_en'] ?>:<span class="st">*</span></td>
	<td><input name="name" type="text" id="name" class="required" value="<?php echo $name ?>"> <p class="hints"><?php echo $_LANG['same_with_id'] ?></p></td>
	</tr>
	<tr>
	<td><?php echo $_LANG['phone_number'] ?>:<span class="st">*</span></td>
	<td><input name="phone" type="text" id="phone" class="required" value="<?php echo $phone ?>"></td>
	</tr>
	<tr>
	<td><?php echo $_LANG['email_address'] ?>:</td>
	<td><input name="email" type="text" id="email" class="required" value="<?php echo $email ?>"></td>
	</tr>
	<!--<tr>
	<td><?php echo $_LANG['identity_number'] ?>:<span class="st">*</span></td>
	<td><input name="identity_number" type="text" id="identity_number" class="required" value="<?php echo $identity_number ?>"> <p class="hints"><?php echo $_LANG['set_with_id'] ?></p></td>
	</tr>-->
	<!--<tr>
	<td><?php echo $_LANG['area'] ?>:<span class="st">*</span></td>
	<td>
		<select id="area" name="area">
		<?php foreach ($_LANG['areas'] as $key => $value): ?>
		<?php echo "<option value='$key' ". ($key == $area ? "selected='selected'" : '') .">$value</option>"; ?>
		<?php endforeach;  ?>
		</select>
	</td>
	</tr>-->
	<!--<tr>
	<td><?php echo $_LANG['age'] ?>:<span class="st">*</span></td>
	<td>
		<select id="age" name="age">
		<?php foreach ($_LANG['ages'] as $key => $value): ?>
		<?php echo "<option value='$key' ". ($key == $age ? "selected='selected'" : '') .">$value</option>"; ?>
		<?php endforeach;  ?>
		</select>
	</td>
	</tr>-->
	<!--<tr>
	<td><?php echo $_LANG['job'] ?>:</td>
	<td>
		<select id="job" name="job">
		<?php foreach ($_LANG['jobs'] as $key => $value): ?>
		<?php echo "<option value='$key' ". ($key == $job ? "selected='selected'" : '') .">$value</option>"; ?>
		<?php endforeach;  ?>
		</select>
	</td>
		</tr>-->
    
    <tr>
	<td><?php echo $_LANG['shop'] ?>:<span class="st">*</span></td>
	<td>
		<select id="shop" name="shop">
	        
    	<?php foreach ($_LANG['shops'] as $key => $value): ?>
		<?php echo "<option data-branch-type='".$value['branch_type']."''  data-map='".$value['map']."'' data-address='".$value['shop_address']."' value='$key' ". ($key == $shop ? "selected='selected'" : '') .">".$value['shop_name']."</option>"; ?>
		<?php endforeach;  ?>
            
		</select>
		
		<div class="map-address-div"></div>
		<div class="map-iframe-div">
		<iframe class="form-map" src="" width="300" height="225" frameborder="0" style="border: 0px; display: inline-block;" allowfullscreen=""></iframe>
		</div>
		
	</td>
		</tr>
    
    <tr>
	<td><?php echo $_LANG['timeslot'] ?>:<span class="st">*</span></td>
	<td>
		<select id="timeslot" name="timeslot" disabled >
	
            
            	<?php foreach ($_LANG['timeslots'] as $key => $value): ?>
		<?php echo "<option value='$key' ". ($key == $timeslot ? "selected='selected'" : '') .">".$value."</option>"; ?>
		<?php endforeach;  ?>
            
		</select>
	</td>
		</tr>
    
    
    <tr>
	<td><?php echo $_LANG['comment'] ?>:</td>
	<td><textarea style="width:80%;height:100px;" name="comment" type="text" id="comment" class="required"><?php echo $comment ?></textarea></td>
	</tr>

	<tr>
	<td><?php echo $_LANG['verifier_number'] ?>:<span class="st">*</span></td>
	<td><input type="text" name="verifier_number" id="osolCatchaTxt0" class="inputbox required validate-captcha">
		<p class="captcha-p"><img src='./resources/classes/code.php' /></p>
		<a href="javascript:void(0);" class="reload-captcha-btn">重設驗證碼</a>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="button" name="apply" id="apply" value="<?php echo $_LANG['submit_apply'] ?>">
		</td>

	</tr>
	</tbody>
</table>
</form>
<?php if($sent): ?>
    
    <script type="text/javascript">

        $(function(){
           $('form').fadeOut(0);
            $('.hints').fadeOut(0);
            
                        $('#apply_form').css({'margin-top':'200px'});

            
            alert("已成功寄出！");
            window.top.location.href = "../enquiry"; 
/*            			$('body,html').stop().animate({scrollTop: $('#apply_form').offset().top},{duration:200} );
*/
            

			
		
 
            
        })
    
    </script>
<p class="sucess"> <?php echo $_LANG['send_sucessful'] ?></p>
<?php endif; ?>
</div>
	
	<script type="text/javascript">
	
		
		

function update_contact_time_list()
{
    
    
            var map_url = $( "#shop option:selected" ).attr('data-map');
            var shop_address = $( "#shop option:selected" ).attr('data-address');
            var branch_type =   $( "#shop option:selected" ).attr('data-branch-type');
			var branch_name =   $( "#shop option:selected" ).text();
	


	
		console.log(branch_name);
	
        console.log(branch_type);
		
        if(map_url === '')
            {
                 $('.shop-address').html('');
                $('.iframe-map').fadeOut(0);
               $('#timeslot').prop("disabled", true); // Element(s) are now enabled.
                
            }
        else{
                $('.shop-address').html(shop_address);
                $('.iframe-map').attr('src',map_url);
                $('.iframe-map').slideDown(200);
             //   prop("disabled", true);
               $('#timeslot').prop("disabled", false); // Element(s) are now enabled.
              
            }
        

        if(branch_type==='meg_shop')
            {
                for(i=0;i<$('#timeslot option').size();i++)
                    {
                        if($('#timeslot option').eq(i).text()==='09:00 - 11:30')
                            {
                             //   $('#contact_timeslot option').eq(i).fadeOut(0);
                                    $('#timeslot option').eq(i).attr("disabled","disabled").hide();
                            }
                            else{
                          //      $('#contact_timeslot option').eq(i).fadeIn(0);  
                                      $('#timeslot option').eq(i).removeAttr("disabled").show();
							}
			      }
				
				
				if(branch_name ==="MEG 觀塘分店")
					{
						$('#timeslot option').eq(1).removeAttr("disabled").show();

				                         $('#timeslot option').eq(4).attr("disabled","disabled").hide();
					}
				else{
					                                      $('#timeslot option').eq(i).removeAttr("disabled").show();

				}
				
				 
            }
	
	
        
        if(branch_type==='a1_shop')
            {
                for(i=0;i<$('#timeslot option').size();i++)
                    {
                        if($('#timeslot option').eq(i).text()==='18:00 - 20:30')
                            {
        //                        $('#contact_timeslot option').eq(i).fadeOut(0);
                                $('#timeslot option').eq(i).attr("disabled","disabled").hide();
                                
                                
                            }
                            else{
                               // $('#contact_timeslot option').eq(i).fadeIn(0);    
                                        $('#timeslot option').eq(i).removeAttr("disabled").show();

                            }
                    }
            }
        
        
        
    
    
    
}
		
		
		$(function(){
		  
		  
			var capcha_url = $('.captcha-p img').attr('src');
			$('.reload-captcha-btn').click(function(e){
				e.preventDefault();
				var new_img_url = capcha_url+'?t=<?php echo time();?>';
				$('.captcha-p img').attr('src',new_img_url);
			})
			
		
        
             $('.map-address-div').html('');
                $('.map-iframe-div').fadeOut(0);
        
        $('#shop').change(function(){
			
			update_contact_time_list();
			
            var map_url = $( "#shop option:selected" ).attr('data-map');
            var shop_address = $( "#shop option:selected" ).attr('data-address');
        if(map_url === '')
            {
                 $('.map-address-div').fadeOut(0).html('');
                $('.map-iframe-div').fadeOut(0);
//               $('#contact_timeslot').prop("disabled", true); // Element(s) are now enabled.
                
            }
        else{
                $('.map-address-div').fadeIn(0).html(shop_address);
                $('.form-map').attr('src',map_url);
                $('.map-iframe-div').slideDown(200);
   //            $('#contact_timeslot').prop("disabled", false); // Element(s) are now enabled.
            }
            
		
            
	        $("#timeslot").val($("#timeslot option:first").val());

			
//            console.log('aaa'+$('.error'));
        })
		
			
			if($('#timeslot').val()!=0 || $('#shop').val()!=0)
			{
				               $('#timeslot').prop("disabled", false); // Element(s) are now enabled.

			}
		
		  })
		
//		console.log($('.error').html());
	</script>
</body>
</html>