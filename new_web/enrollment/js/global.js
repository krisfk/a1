var final_cost =0;
var megclub_member=false;

$(function(){
    

/*    
$('.reg-enquiry-a').click(function(e){
    e.preventDefault();
    
    window.open("https://www.hksm.com.hk/promo/payment_02.html");
    
})*/
    
    
    for(i=0;i<$('select#course option').size();i++)
    {
         var temp_str = $('#course option').eq(i).html();
         var cost = temp_str.split('$')[1];
        
            if(i>0)
            {
                $('#course option').eq(i).attr('data-cost',cost);
            }
            else{
                $('#course option').eq(i).attr('data-cost','0');
            }
    }
    
    if($("select#course option:selected" ).attr('data-cost')!=0)
        {                   
            show_final_cost();
        }
    
        if($('body').hasClass('index'))
        {
               if(inital_megclub_blk)
                {
                    joined_megclub();
                    
                }
            
            //initial course content text blk
            
           
            
            inital_text_content_position();
            
            
            //$('.iframe-map').fadeOut(0);
            
        //    $('#contact_timeslot').prop("disabled", true);
            
            
        }
    
    
    $('select#course').change(function(){
        show_final_cost();
		
    });
    
    
    $('.join-megclub-btn-1').click(function(e){
        e.preventDefault();
     //   joined_megclub();
    });
    
    $('.open-popup-link').magnificPopup({
  type:'inline',
  midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });

    
    $('.meg-club-block .join-btn').click(function(e){
        e.preventDefault();
            
        if($(".agree-checkbox").is(':checked'))
            {
                show_final_cost();
                joined_megclub();
            }
        else{
            alert ("請先同意條款及細則。\nPlease agree on the terms and conditions first.");
        }
        
    });
    
    $('.meg-club-block .cancel-btn').click(function(e){
        e.preventDefault();
        $.magnificPopup.close(); 
        $('.final-cost-div-inner-old').fadeOut(0);

        
    });
	
	
	
   /* $('.meg-club-block .cancel-join-btn').click(function(e){
        e.preventDefault();
        
        $('.megclub-btns-group-2').fadeOut(0);
        $('.megclub-btns-group-1').fadeIn(0);
        $('.final-cost-div-inner-old').fadeOut(0);

        
        megclub_member=false;
        $('.join_megclub').val('0');
        updatePrice();
    });*/
    
    
    $('.enrollment-flow-btn').click(function(e){
        e.preventDefault();
        
        $('.flow-div').fadeIn(0);
        $('.exam-flow').fadeOut(0);
        $('.enrollment-flow').slideDown(200);
		
        $(this).css({'opacity':'1'});
    //    $('.exam-flow-btn').css({'opacity':'0.9'});
    });
    
    $('.exam-flow-btn').click(function(e){
        e.preventDefault();

        $('.flow-div').fadeIn(0);
        $('.enrollment-flow').fadeOut(0);

        $('.exam-flow').slideDown(200);
        $(this).css({'opacity':'1'});
        
    //    $('.enrollment-flow-btn').css({'opacity':'0.9'});
        
        
    });
	
	$('.show-lesson-place-btn').click(function(e){
		e.preventDefault();
		
		$(this).toggleClass('active');
		
		 if($(this).hasClass('active'))
            {
                $('.show-lesson-place-btn').html('隱藏地圖');
			    $('.show-lesson-map-div').fadeOut(0).slideDown(200);

            }
        else{
                $('.show-lesson-place-btn').html('顯示地圖');
			  $('.show-lesson-map-div').slideUp(200);

            }
		
	//	$('.show-lesson-map-div').toggleClass('active');
		
//		if($('.show-lesson-map-div').hasClass('active'))
//		{
//		}
		
		
	});
    
	
	
      initial_course_content();

	
	if($('.show-lesson-place').size()>0)
		{
			   var val = $( "#course option:selected" ).attr('value');

				if(!val)
				{
								$('.lesson-place-show-td-row').fadeOut(0);
				}
		}

	
	$('#course').change(function(){
        
        initial_course_content();
        
		
		//
		
		
    });
    
    $('#shop').change(function(){
        update_contact_time_list();
          $("#contact_timeslot").val($("#contact_timeslot option:first").val());
    });
	
	
    
    $('.course-detail-btn').click(function(e){
        e.preventDefault();
        $('.expand-course-content').slideToggle(200);
        
        
        $(this).toggleClass('active');
        
        if($(this).hasClass('active'))
            {
                $('.course-detail-btn').html('隱藏課程內容');
            }
        else{
                $('.course-detail-btn').html('顯示課程內容');
            }
        
        
    });
	
	
    
    


    
/*    $('.reg-enquiry-a').click(function(e){
    e.preventDefault();

        $(this).toggleClass('active');
        
        if($(this).hasClass('active'))
            {
                        $('.reg_enquiry').val('1');
            }
        else{
                        $('.reg_enquiry').val('0');
            
        }
        
});
    */
    
    
  
	
	
});


function update_contact_time_list()
{
    
    
            var map_url = $( "#shop option:selected" ).attr('data-map');
            var shop_address = $( "#shop option:selected" ).attr('data-address');
            var branch_type =   $( "#shop option:selected" ).attr('data-branch-type');
        
		
        if(map_url === '')
            {
                 $('.shop-address').html('');
                $('.iframe-map').fadeOut(0);
               $('#contact_timeslot').prop("disabled", true); // Element(s) are now enabled.
                
            }
        else{
                $('.shop-address').html(shop_address);
                $('.iframe-map').attr('src',map_url);
                $('.iframe-map').slideDown(200);
             //   prop("disabled", true);
               $('#contact_timeslot').prop("disabled", false); // Element(s) are now enabled.
              
            }
        

        if(branch_type==='meg_shop')
            {
                for(i=0;i<$('#contact_timeslot option').size();i++)
                    {
                        if($('#contact_timeslot option').eq(i).text()==='09:00 - 11:30')
                            {
                             //   $('#contact_timeslot option').eq(i).fadeOut(0);
                                    $('#contact_timeslot option').eq(i).attr("disabled","disabled").hide();
                            }
                            else{
                          //      $('#contact_timeslot option').eq(i).fadeIn(0);  
                                      $('#contact_timeslot option').eq(i).removeAttr("disabled").show();

                            }
                    }
            }
        
        if(branch_type==='a1_shop')
            {
                for(i=0;i<$('#contact_timeslot option').size();i++)
                    {
                        if($('#contact_timeslot option').eq(i).text()==='18:00 - 20:30')
                            {
        //                        $('#contact_timeslot option').eq(i).fadeOut(0);
                                $('#contact_timeslot option').eq(i).attr("disabled","disabled").hide();
                                
                                
                            }
                            else{
                               // $('#contact_timeslot option').eq(i).fadeIn(0);    
                                        $('#contact_timeslot option').eq(i).removeAttr("disabled").show();

                            }
                    }
            }
        
        
        
    
    
    
}

function inital_text_content_position()
{

	
	
                $('.course-detail-btn').fadeOut(0);
                
                for(i=0;i<$('.course-content').size();i++)
                {
                    $('.expand-course-content').append($('.course-content').eq(0));
                }
                
                $('.course-content,.enrollment-flow,.exam-flow').css({'background':'#fff','border':'none','padding':'0'});
                $('.course-content,.expand-course-content').fadeOut(0);
    
                $('.flow-div').append($('.enrollment-flow'));
                $('.flow-div').append($('.exam-flow'));
    
                $('.enrollment-flow,.exam-flow,.flow-div').fadeOut(0);

                 if($("select#course option:selected" ).attr('data-cost')!=0)
                {                  
                        initial_course_content();
                }
    
                 if($("select#shop option:selected" ).attr('value')!=0)
                {                  
                        update_contact_time_list();
                }
                else{
                        $('.iframe-map').fadeOut(0);
                       $('#contact_timeslot').prop("disabled", true);

                }
	
	//need to show lesson place 
	if($('.show-lesson-place').size()>0)
		{
			$('.show-lesson-map-div').fadeOut(0);

			
			$('select option:contains("上課地點參照課程名稱")').prop('selected',true).closest('tr').fadeOut(0);
		
			
		
			for(i=0;i<$('.show-lesson-place').size();i++)
                {
                    $('.lesson-place-show-td').append($('.show-lesson-place').eq(0));
                }
			
			

		}

	
	$('.show-lesson-place').css({'border':'none','background':'none','padding':'0'});
	
	
    
    
}

function updatePrice(c)
{
    
    if($('body').hasClass('index'))
{
    
        $('.final-cost-div-inner-old .final-cost').html(c);

    
//	alert(megclub_member+ " "+coupon_discount);
        if(!c)
        {
             final_cost+=megclub_discount ;
        }
     	   
		if(coupon_discount!=0 && !megclub_member)
        {
            final_cost=c-coupon_discount ;
        }
	
	
        if(megclub_member && coupon_discount==0)
        {
            final_cost=c-megclub_discount ;
        }
	
	    if(megclub_member && coupon_discount!=0)
        {
            final_cost=c-megclub_discount-coupon_discount ;
        }
	
	
	/*
        if(coupon_discount!=0)
        {
            final_cost=c-coupon_discount ;
        }
	*/
	
	//coupon_discount
	
	
}
    
        $('.final-cost-div-inner .final-cost').html(final_cost);
    
    
}

function show_final_cost()
{
      final_cost =Number($("select#course option:selected" ).attr('data-cost'));
        
        if(final_cost==0)
            {
                    $('.final-cost-div').fadeOut(0);
                
            }
        else
            {
                    $('.final-cost-div').fadeIn(0);
            
                    updatePrice(final_cost);

            }
    
   
        $.magnificPopup.close(); 
}

function joined_megclub()
{
       $('.megclub-btns-group-1').fadeOut(0);
        $('.megclub-btns-group-2').fadeIn(0);
     
    
       $('.final-cost-div-inner-old').fadeIn(0);
    
    
        megclub_member=true;
        $('.join_megclub').val('1');
	    
	
		var c  =Number($("select#course option:selected" ).attr('data-cost'));

	
        updatePrice(c);
}




function initial_course_content()
{
	
        var val = $( "#course option:selected" ).attr('value');
		
	//	alert(val);
        if(val == '0')
        {
            $('.course-detail-btn,.expand-course-content').fadeOut(200);
			$('.lesson-place-show-td-row').fadeOut(0);
        }
        else
        {
            $('.course-detail-btn').fadeIn(200).css("display","inline");

            $('.course-content').fadeOut(0);
            $('.c'+val).fadeIn(0);
			
			if($('.show-lesson-place').size()>0)
			{
				$('.lesson-place-show-td-row').fadeIn(0);
				$('.show-lesson-place').fadeOut(0);

				$('.slp'+val).fadeIn(0);
			}

        }


	
    
	

	
	
}


		
function initial_use_coupon_status(coupon_discount)
{
							$('.use-coupon-code-txt-discount').html('-$'+coupon_discount);
									  $('.final-cost-div-inner-old').fadeIn(0);
									  $('#coupon_code_input').fadeOut(0);

									var inital_cost = Number($("select#course option:selected" ).attr('data-cost'));	

									$('.final-cost-div-inner-old .final-cost').html(inital_cost);
	
										updatePrice(inital_cost);

	
	
}



 



/* 
if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
    alert('Got here using the browser "Back" or "Forward" button.');
}
*/