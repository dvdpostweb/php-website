String.prototype.trim = function() {
return this.replace(/^\s+|\s+$/g, "");
}
function start(){
	email_blur();
	pass_change('start');
	
	if( $F('password')=='' || $('check_pass').hasClassName('step1_input_error'))	
	{
		error_pass=true;
		$('password').focus();		
	}
	else
	{
		error_pass=false;
	}
	if($F('email')=='' || $('check_email').hasClassName('step1_input_error'))
	{
		error_email=true;
		$('email').focus();
	}
	else
	{
		error_email=false;
	}
	if(error_email==false && error_pass==false)
	{
		try{
			if($('check_code').hasClassName('step1_input_error'))
			{
				
		
				$('nombre').focus();
			}
		}
		catch(e){}
	}
	//check email
	Event.observe($('email'),"blur",this.email_blur.bind($('email')));
	Event.observe($('email'),"focus",this.email_focus.bind($('email')));
	//check pass
	Event.observe($('password'),"keyup",this.pass_change.bind($('password')));
	Event.observe($('password'),"focus",this.pass_focus.bind($('password')));
	Event.observe($('password'),"blur",this.pass_blur.bind($('password')));
	//check submit
	
	Event.observe($('form_step'),"submit",this.form_submited.bind($('form_step')));
	
}
//////////////////
// check submit //
//////////////////

function form_submited(event)
{
	if(error_email ==true || error_pass==true)
	{
		// stop l envoi du formulaire en cas d'erreur
		if(error_email==true)
		{
			$('email').focus();	
			
		}else if(error_pass==true)
		{
			$('password').focus();	
		}
		Event.stop(event);	
		
	}
	
}
/////////////////
// check email //
/////////////////
function email_blur(event)
{
	if($F('email')!='')
	{
		//$('check_email').show();
		var param = $H({'email': $F('email').trim()}).toQueryString();
		$('check_email').className='step1_input_check';
		$('check_email').down('div').innerHTML='check...';
		send('/ajax.action.php',param,'post',email_return)
	}
	else
	{
		//$('check_email').hide();
		$('check_email').className='step1_input_info';
		$('check_email').down('div').innerHTML=$('info_email').innerHTML;

	}
}
function email_return(requete)
{
	if(requete.responseText=='ok')
	{
		$('check_email').className='step1_input_ok';
		$('check_email').down('div').innerHTML=' ';
		error_email=false;
	}
	else if(requete.responseText=='error1')
	{
		$('check_email').className='step1_input_error step1_input_error_big_h text_big';
		email_error=$('email_not_abo').innerHTML;
		email_error=email_error.replace('_email_',$F('email'))
		$('check_email').down('div').innerHTML=email_error;
		error_email=true;
		
	}
	else if(requete.responseText=='error3')
	{
		$('check_email').className='step1_input_error step1_input_error_big_h text_big';
		email_error=$('email_not_abo').innerHTML;
		email_error=email_error.replace('_email_',$F('email'))
		$('check_email').down('div').innerHTML=email_error;
		error_email=true;
		
	}
	else if(requete.responseText=='error2')
	{
		$('check_email').className='step1_input_error';
		$('check_email').down('div').innerHTML=$('error_emaail2').innerHTML;
		error_email=true;

	}
	else
	{
		$('check_email').className='step1_input_error';
		$('check_email').down('div').innerHTML='erreur';
		error_email=true;
	}
}
function email_focus(event)
{
	if($F('email')=='')
	{
		//$('check_email').show();
		$('check_email').className='step1_input_info';
		$('check_email').down('div').innerHTML=$('info_email').innerHTML;
	}	
}
//////////////////
//check password//
//////////////////
function pass_change(event)
{
	if(event != 'start')
	{
			if($F('password').length<4)
			{
				$('check_pass').className='step1_input_error';
				$('check_pass').down('div').innerHTML=$('error_pass_short').innerHTML;
				error_pass=true;

			}
			else if($F('password').length>12)
			{
				$('check_pass').className='step1_input_error';
				$('check_pass').down('div').innerHTML=$('error_pass_long').innerHTML;
				error_pass=true;
			}
			else
			{
				$('check_pass').className='step1_input_ok';
				$('check_pass').down('div').innerHTML=' ';
				error_pass=false;
			}
	}
}
function pass_change2()
{
			if($F('password').length<4)
			{
				$('check_pass').className='step1_input_error';
				$('check_pass').down('div').innerHTML=$('error_pass_short').innerHTML;
				error_pass=true;

			}
			else if($F('password').length>12)
			{
				$('check_pass').className='step1_input_error';
				$('check_pass').down('div').innerHTML=$('error_pass_long').innerHTML;
				error_pass=true;
			}
}
function pass_focus(event)
{
  pass_change2()
}
function pass_blur(event)
{
	//if($F('password')=='')
	//{
	//	$('check_pass').hide();
	//}
}


////////////////////////
/////main function//////
////////////////////////
function getPage()
{
	URL=self.location.href;
	
	if (URL.lastIndexOf("\\") >-1)
	separateur=URL.lastIndexOf("\\");
	else if (URL.lastIndexOf("/") >-1)
	separateur=URL.lastIndexOf("/");
	if (URL.indexOf("?") >-1)
		fin=URL.indexOf("?");
	else
		fin=URL.length;
	page=URL.substring(separateur+1,fin);
	return page;
}
function getParamValue(param,url)
{
    var u = url == undefined ? document.location.href : url;
    var reg = new RegExp('(\\?|&|^)'+param+'=(.*?)(&|$)');
    matches = u.match(reg);
    return matches[2] != undefined ? decodeURIComponent(matches[2]).replace(/\+/g,' ') : '';
}

function send(url,param,method,fct)
{
	o_options = new Object();
	if(method=='get')
	{
		o_options = {method: 'get',parameters: param,onComplete:eval(fct)};
	}
	else
	{
		o_options = {method: 'post',postBody: param,onComplete:eval(fct)};	
	}
	
	var laRequete = new Ajax.Request(url,o_options); 
	
}


Event.observe(window,"load",start);
