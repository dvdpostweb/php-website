function start(){
	//check email
	Event.observe($('firstname'),"keyup",this.firstname_keyup.bind($('firstname')));
	Event.observe($('lastname'),"keyup",this.lastname_keyup.bind($('lastname')));
	Event.observe($('day'),"change",this.birth_change.bind($('day')));
	Event.observe($('month'),"change",this.birth_change.bind($('month')));
	Event.observe($('year'),"change",this.birth_change.bind($('year')));
	Event.observe($('country'),"change",this.country_change.bind($('country')));
	Event.observe($('street_address'),"keyup",this.street_address_keyup.bind($('street_address')));
	Event.observe($('street_address'),"blur",this.street_address_blur.bind($('street_address')));
	Event.observe($('postcode'),"keyup",this.postcode_keyup.bind($('postcode')));
	Event.observe($('city'),"keyup",this.city_keyup.bind($('city')));
	Event.observe($('phone'),"keyup",this.phone_keyup.bind($('phone')));
	if(!$('check_firsname').hasClassName('step_input_ok') && !$('check_firsname').hasClassName('step_input_error'))
		firstname_keyup();	
	if(!$('check_lastname').hasClassName('step_input_ok') && !$('check_lastname').hasClassName('step_input_error'))
		lastname_keyup();
	if(!$('check_street').hasClassName('step_input_ok') && !$('check_street').hasClassName('step_input_error'))
		street_address_keyup();
	if(!$('check_zip').hasClassName('step_input_ok') && !$('check_zip').hasClassName('step_input_error'))
		postcode_keyup();
	if(!$('check_city').hasClassName('step_input_ok') && !$('check_city').hasClassName('step_input_error'))
		city_keyup();
	if(!$('check_phone').hasClassName('step_input_ok') && !$('check_phone').hasClassName('step_input_error'))
		phone_keyup();
	if($F('day')==0 || $F('month')==0  || $F('year')==0 )
	{}
	else{
		$('check_birthday').className='step_input_ok';
		$('check_birthday').down('div').innerHTML=' ';
	}
	if($('check_firsname').hasClassName('step_input_ok') || $('check_lastname').hasClassName('step_input_ok') || $('check_street').hasClassName('step_input_ok') || $('check_zip').hasClassName('step_input_ok') || $('check_city').hasClassName('step_input_ok') || $('check_phone').hasClassName('step_input_ok') || $('check_birthday').hasClassName('step_input_ok'))
	{
		$('check_country').className='step_input_ok';
		$('check_country').down('div').innerHTML=' ';
	}
}
function firstname_keyup(event)
{
	if($F('firstname')!='')
	{
			if($F('firstname').length<2)
			{
				$('check_firsname').className='step_input_error';
				$('check_firsname').down('div').innerHTML=$('error_first_text').innerHTML;
			}
			else
			{
				$('check_firsname').className='step_input_ok';
				$('check_firsname').down('div').innerHTML=' ';
			
			}
	}
	else
	{
		$('check_firsname').className='step_input_none';
		$('check_firsname').down('div').innerHTML='';	
	}
	
}
function lastname_keyup(event)
{
	if($F('lastname')!='')
	{
			if($F('lastname').length<2)
			{
				$('check_lastname').className='step_input_error';
				$('check_lastname').down('div').innerHTML=$('error_last_text').innerHTML;
			}
			else
			{
				$('check_lastname').className='step_input_ok';
				$('check_lastname').down('div').innerHTML=' ';
			
			}
	}
	else
	{
		$('check_lastname').className='step_input_none';
		$('check_lastname').down('div').innerHTML='';	
	}
	
}
function street_address_keyup(event)
{
	if($F('street_address')!='')
	{
			if($F('street_address').length<6)
			{
				$('check_street').className='step_input_error';
				$('check_street').down('div').innerHTML=$('error_address_text').innerHTML;
			}
			else
			{
				$('check_street').className='step_input_ok';
				$('check_street').down('div').innerHTML=' ';
			}
	}
	else
	{
		$('check_street').className='step_input_none';
		$('check_street').down('div').innerHTML='';	
	}
	
}
function street_address_blur(event)
{
	
	var myRegExp = new RegExp("([0-9])","g"); 
	number=myRegExp.test($F('street_address'));
	
	if(number==false)
	{
		alert($('error_street_number').innerHTML);
	}
}
function postcode_keyup(event)
{
	if($F('postcode')!='')
	{
			if($F('postcode').length<4)
			{
				$('check_zip').className='step_input_error';
				$('check_zip').down('div').innerHTML=$('error_zip_text').innerHTML;
			}
			else
			{
				$('check_zip').className='step_input_ok';
				$('check_zip').down('div').innerHTML=' ';
			
			}
	}
	else
	{
		$('check_zip').className='step_input_none';
		$('check_zip').down('div').innerHTML='';	
	}
	
}
function city_keyup(event)
{
	if($F('city')!='')
	{
			if($F('city').length<3)
			{
				$('check_city').className='step_input_error';
				$('check_city').down('div').innerHTML=$('error_zip_text').innerHTML;
			}
			else
			{
				$('check_city').className='step_input_ok';
				$('check_city').down('div').innerHTML=' ';
			
			}
	}
	else
	{
		$('check_city').className='step_input_none';
		$('check_city').down('div').innerHTML='';	
	}
	
}
function phone_keyup(event)
{
	if($F('phone')!='')
	{
			var re=/^(\+)?[0-9 -./]+$/;
			var myRegExp = new RegExp("([^0-9])","g"); 
			phone=$F('phone').replace(myRegExp ,'');
			if( !re.test($F('phone')) || phone.length < 9)
			{
				$('check_phone').className='step_input_error';
				$('check_phone').down('div').innerHTML=$('error_phone_text').innerHTML;
			}
			else
			{
				$('check_phone').className='step_input_ok';
				$('check_phone').down('div').innerHTML=' ';
			
			}
	}
	else
	{
		$('check_phone').className='';
		$('check_phone').down('div').innerHTML='';	
	}
	
}
function birth_change(event)
{
	if($F('day')==0 || $F('month')==0  || $F('year')==0 )
	{
		$('check_birthday').className='step_input_error';
		$('check_birthday').down('div').innerHTML=$('error_birth_text').innerHTML;
	}
	else
	{
		$('check_birthday').className='step_input_ok';
		$('check_birthday').down('div').innerHTML=' ';
	
	}
}
function country_change(event)
{
	$('check_country').className='step_input_ok';
	$('check_country').down('div').innerHTML=' ';
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
