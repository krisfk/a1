var final_cost =0;
var megclub_member=false;

$(function(){
    
   

    
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
        }
    
    
    $('select#course').change(function(){
        show_final_cost();
    })
    
    
    $('.join-megclub-btn-1').click(function(e){
        e.preventDefault();
     //   joined_megclub();
    })
    
    $('.open-popup-link').magnificPopup({
  type:'inline',
  midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });

    
    $('.meg-club-block .join-btn').click(function(e){
        e.preventDefault();
      show_final_cost();
        joined_megclub();
    })
    
    $('.meg-club-block .cancel-btn').click(function(e){
        e.preventDefault();
        $.magnificPopup.close(); 
        
    })
    $('.meg-club-block .cancel-join-btn').click(function(e){
        e.preventDefault();
        
        $('.megclub-btns-group-2').fadeOut(0);
        $('.megclub-btns-group-1').fadeIn(0);
        megclub_member=false;
        $('.join_megclub').val('0');
        updatePrice();
    })
})


function updatePrice(c)
{
    
    
    if($('body').hasClass('index'))
{
        if(!c)
        {
             final_cost+=megclub_discount;
        }
        
        if(megclub_member)
        {
            final_cost=c-megclub_discount;
        }
}
    
        $('.final-cost').html(final_cost);
    
    
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
        megclub_member=true;
        $('.join_megclub').val('1');
        updatePrice(final_cost)
}

/* 
if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
    alert('Got here using the browser "Back" or "Forward" button.');
}
*/