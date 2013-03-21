$(function() {
  $('#arrow_down').click(function() {
    goToByScroll("commentcamarche_content")
  });
  error_email = true;
  $('.form_step #password, .form_step  #password2').keyup(function() {
    if($(this).val().length<4)
		{
		  $(this).css({'background': 'url(/images/jb/red-tick.png) no-repeat center right white'});
			error_pass=true;

		}
		else if($(this).val().length>12)
		{
		  $(this).css({'background': 'url(/images/jb/red-tick.png) no-repeat center right white'});
			error_pass=true;
		}
		else
		{
		  $(this).css({'background': 'url(/images/jb/green-tick.png) no-repeat center right white'});
			error_pass=false;
		}
  });
  $('.form_step #submit_id,.form_step  #submit_id2').click(function() {
    if($(this).attr('id')=='submit_id')
    {
      string = '#email'
      string2 = '#password'
    }
    else
    {
      string = '#email2'
      string2 = '#password2'
    }
  	if(error_email ==true || error_pass==true)
  	{
  		// stop l envoi du formulaire en cas d'erreur
  		if(error_email==true)
  		{
  			$(string).focus();	
    	}
    	else if(error_pass==true)
  		{
  			$(string2).focus();	
  		}
  		return false;
  	}
  });
  $('.form_step #email, .form_step #email2').blur(function() {
    if($(this).attr('id')=='email')
    {
      string = '#email'
      error_id = '#login_error'
    }
    else
    {
      string = '#email2'
      error_id = '#login_error2'
    }
    $.ajax({
      url: '/ajax.action.php',
      data: 'email='+$(this).val(),
      dataType: 'html',
      type: 'POST',
      success: function(data) {
        	if(data=='ok')
        	{
        	  $(string).css({'background': 'url(/images/jb/green-tick.png) no-repeat center right white'});
        	  $(error_id).html('')
        		error_email=false;
        	}
        	else if(data=='error1')
        	{
        	  $(string).css({'background': 'url(/images/jb/red-tick.png) no-repeat center right white'});
        		email_error=$('#email_abo').html();
        		email_error=email_error.replace('_email_',$(string).val())
        		$(error_id).html(email_error)
        		error_email=true;

        	}
        	else if(data=='error3')
        	{
        	  $(string).css({'background': 'url(/images/jb/red-tick.png) no-repeat center right white'});
        		email_error=$('#email_not_abo').html();
        		email_error=email_error.replace('_email_',$(string).val())
        		$(error_id).html(email_error)
        		error_email=true;

        	}
        	else if(data=='error2')
        	{
        	  $(string).css({'background': 'url(/images/jb/red-tick.png) no-repeat center right white'});
        	  $(error_id).html('')
        		error_email=true;

        	}
        	
        }
    });
  });
  
})