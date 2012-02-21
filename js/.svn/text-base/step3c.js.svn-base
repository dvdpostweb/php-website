function start(){
	
	Event.observe($('phone'),"keyup",this.phone_keyup.bind($('phone')));
	Event.observe($('portable'),"keyup",this.portable_keyup.bind($('portable')));
	Event.observe($('code_portable'),"keyup",this.code_portable_keyup.bind($('code_portable')));

	Event.observe($('code_portable'),"change",this.code_portable_keyup.bind($('code_portable')));
	Event.observe($('phone'),"change",this.phone_keyup.bind($('phone')));
	Event.observe($('portable'),"change",this.portable_keyup.bind($('portable')));
	Event.observe($('send_sms'),"click",this.send_sms_click.bind($('send_sms')));
	Event.observe($('phone_confirm'),"click",this.phone_confirm_click.bind($('phone_confirm')));
	Event.observe($('portable_confirm'),"click",this.sms_confirm_click.bind($('portable_confirm')));
	
	/*phone=$F('portable');
	if(phone!=""){
		portable_keyup('start')
	}*/
}
function phone_confirm_click()
{
	$('all_phone').addClassName('rose');
	$('all_sms').removeClassName('rose');
	$('phone_btn').show();
	$('sms_btn').hide();
	$('send_sms').hide();

}
function sms_confirm_click()
{
	$('all_sms').addClassName('rose');
	$('all_phone').removeClassName('rose');
	$('phone_btn').hide();
	$('sms_btn').show();
	$('send_sms').show();
}
function phone_keyup()
{
	$('phone_confirm').checked="checked";
	phone_confirm_click()
}
function code_portable_keyup()
{
	$('portable_confirm').checked="checked";
	sms_confirm_click()
}
function portable_keyup(exeption)
{
	//if(exeption!='start')
	//	$('portable_confirm').checked="checked";
	code_portable_keyup();
	phone=$F('portable');
	phone = phone.replace(/^\+/,"");
	phone = phone.replace(/^(32|0032|032|0)/,"");
	phone = phone.replace(/([^0-9])/,"");
	
	prefix=phone.substring(0,2);
	error=false;
	if(prefix!='47' && prefix!='48' && prefix!='49')
	{
		$('error_portable').show();
		$('explain_portable').hide();
	}else
	{
		if(phone.length!=9)
		{
			
			$('error_portable').show();
			$('explain_portable').hide();
			$('send_sms').removeClassName('btn_sms_bottom');
			$('send_sms').addClassName('btn_sms_top');
			$('input_link').hide()
		}
		else
		{
			check_num()	
		}
	}
}	
function send_sms_click()
{
	if(this.hasClassName('btn_sms_bottom'))
	{
		bol=confirm($('sms_verif').innerHTML)
		if(bol==true){
			$('input_star').hide();
			url='/gateway/send_sms.php';
			phone=$F('portable');
			phone = phone.replace(/^\+/,"");
			phone = phone.replace(/^(32|0032|032|0)/,"");
			phone = phone.replace(/([^0-9])/,"");
			phone='32'+phone;
			var param = $H({'number': phone}).toQueryString();
			method='get';
			fct=send_sms_click_return;
			send(url,param,method,fct);
		}	
	}
	else
	{
		portable_keyup();
		$('portable').focus();
	}
}
function check_num()
{
	url='/ajax.action_step3c.php';
	phone=$F('portable');
	phone = phone.replace(/^\+/,"");
	phone = phone.replace(/^(32|0032|032|0)/,"");
	phone = phone.replace(/([^0-9])/,"");
	$('error_portable').hide();
	$('explain_portable').hide();
	phone='32'+phone;
	var param = $H({'number': phone}).toQueryString();
	method='get';
	fct=check_num_return;
	send(url,param,method,fct);
}
function check_num_return(requete)
{
	if(requete.responseText=='EMPTY')
	{
		$('error_portable').hide();
		$('explain_portable').show();
		$('send_sms').addClassName('btn_sms_bottom');
		$('send_sms').removeClassName('btn_sms_top');
		
	}
	else if(requete.responseText=='USED'){

		$('input_code').hide();
		$('input_form').show();
		$('input_link').show();
		
	}	
}

function send_sms_click_return(requete){
	if(requete.responseText=='error' || requete.responseText=='')
	{
		//show_input_code();
	}
	else
	{
		show_input_code();
	}
}
function show_input_code(){
	$('input_form').hide();
	$('pending').show();
	timer=setInterval("check_sms()", 3000);
}
function check_sms(){
	url='/gateway/check_sms.php';
	phone=$F('portable');
	phone = phone.replace(/^\+/,"");
	phone = phone.replace(/^(32|0032|032|0)/,"");
	phone = phone.replace(/([^0-9])/,"");
	phone='32'+phone;
	var param = $H({'number': phone}).toQueryString();
	method='get';
	fct=check_sms_return;
	send(url,param,method,fct)
}
function check_sms_return(requete)
{
	if(requete.responseText=='hanset')
	{
		$('pending').hide();
		$('input_code').show();
		clearInterval(timer);
	}
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
