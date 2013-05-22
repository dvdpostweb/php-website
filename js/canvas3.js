$(function() {
  $('#form_step #submit_id3,#form_step2 #submit_id4').click(function() {
    if($(this).attr('id')=='submit_id3')
    {
      string = '.marketing3'
      string2 = '#code3'
    }
    else
    {
      string = '.marketing4'
      string2 = '#code4'
    }
  	if($(string2).val()=='')
  	{
  	  $(string2).focus()
  		return false;
  	}
  	else if($(string).attr('checked') == false)
  	{
  	  alert($('#text_error_conditions').html())
  	  return false;
  	}
  });
  
})