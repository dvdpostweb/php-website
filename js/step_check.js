function start(){
	//check email
	Event.observe($('visa'),"click",this.ogone.bind($('visa')));
	Event.observe($('amex'),"click",this.ogone.bind($('amex')));
	Event.observe($('master'),"click",this.ogone.bind($('master')));
	Event.observe($('paypal_id'),"click",this.paypal.bind($('paypal_id')));
	Event.observe($('phone_confirm'),"click",this.phone.bind($('phone_confirm')));
	Event.observe($('phone'),"click",this.phone_input.bind($('phone')));
	
  }
  function ogone()
  {
  	$('ogone').addClassName('active_verif');
    $('ogone').removeClassName('normal_verif');
    
  	$('bank').removeClassName('active_verif');
    $('bank').addClassName('normal_verif');

  	$('paypal').removeClassName('active_verif');
    $('paypal').addClassName('normal_verif');
    try
    {
      $('phone_info').addClassName('grey');
      $('phone_info').removeClassName('grey_select');
    }
    catch(e)
    {}
  }
  function phone()
  {
  	$('bank').addClassName('active_verif');
    $('bank').removeClassName('normal_verif');
    
  	$('ogone').removeClassName('active_verif');
    $('ogone').addClassName('normal_verif');
    
  	$('paypal').removeClassName('active_verif');
    $('paypal').addClassName('normal_verif');
    try
    {
      $('phone_info').addClassName('grey_select');
      $('phone_info').removeClassName('grey');
    }
    catch(e)
    {}
    
  }
  function paypal()
  {
  	$('paypal').addClassName('active_verif');
    $('paypal').removeClassName('normal_verif');
    
  	$('ogone').removeClassName('active_verif');
    $('ogone').addClassName('normal_verif');
    
  	$('bank').removeClassName('active_verif');
    $('bank').addClassName('normal_verif');
    try
    {
      $('phone_info').addClassName('grey_select');
      $('phone_info').removeClassName('grey');
    }
    catch(e)
    {}
    
  }

  function phone_input()
  {
  	phone()
  	$('phone_confirm').checked="checked";
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
