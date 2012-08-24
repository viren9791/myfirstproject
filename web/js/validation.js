 /**
 * Executes tweet function
 *
 * @author viren   <virendav.vitrainee@gmail.com>    
 * @access public
 * @return none
 *
*/ 
function show(val)
{  
  if(val == 'en')
  {
    $('#en').show();
	$('#fi').hide();
  }
  else
  {
    $('#fi').show();
	$('#en').hide();
  }
}
/**
 * Executes tweet function
 *
 * @author viren   <virendav.vitrainee@gmail.com>    
 * @access public
 * @return none
 *
*/ 
function tweet()
{  
	$('#tw_fb_wall_div').html('');
	if(jQuery.trim($('#message').val()) == '')
	{
		$('#message').focus();
		$('#tw_fb_wall_div').html('Enter somthing to post on you wall');
		return false;
	}
	else
	{
		$('#frm_wall').submit();
	}
}
/**
 * Executes div_toggle function
 *
 * @author viren   <virendav.vitrainee@gmail.com>    
 * @access public
 * @return none
 *
*/ 
function div_toggle()
{  
	$('#sub_category').toggle();
}
 
/**
 * Executes sorting function
 *
 * @author viren   <virendav.vitrainee@gmail.com>    
 * @access public
 *
*/ 
function sorting(order)
{  
	$.ajax({
    type: "POST",
    url: 'listSuccess.php?sortBy='+order,
    data: " "
    }).done(function( ssMsg ) {
    $('#listing').html(ssMsg);
	alert('');
    });
	alert(order);
}

/**
 * Executes ProductImage function
 *
 * @author viren   <virendav.vitrainee@gmail.com>    
 * @access public
 *
*/ 
function ProductImage(id)
{  
    var pid = id;
    var value = $('#'+id).val();
      $.ajax({
      type: "POST",
      url: '/category/list',
      data: " "
      }).done(function( ssMsg ) {
      $('#image_'+pid).html(ssMsg);
      });
	  alert('');
	
}

/**
 * Executes registration function
 *
 * @author viren   <virendav.vitrainee@gmail.com>    
 * @access public
 *
*/ 
function registration()
{
    $('#position1').html('');
	if(jQuery.trim($('#position').val()) == '')
	{
		$('#position').focus();
		$('#position1').html('Enter Position');
		return false;
	}
	
	if(jQuery.trim($('#company').val()) == '')
	{   
		$('#company').focus();
		$('#company1').html('Enter company');
		return false;
	}
	if(jQuery.trim($('#url').val()) == '')
	{   
		$('#url').focus();
		$('#url1').html('Enter url');
		return false;
	}
	if(jQuery.trim($('#description').val()) == '')
	{   
		$('#description').focus();
		$('#description1').html('Enter description');
		return false;
	}
	
	else
	{
	  $('#frm_addJob').submit();
	}
}

$(document).ready(function()
{       
  $("#frm_content").ready(
    function() 
    {
      $("#fi").hide();
	  
    }
  );
}
);
