function start(){
	
	Event.observe($('payment_ogone_radio'),"click",this.option_confirm1_click.bind($('payment_ogone_radio')));
	Event.observe($('payment_domiciliation_radio'),"click",this.option_confirm2_click.bind($('payment_domiciliation_radio')));
	
	Event.observe($('payment_domiciliation'),"click",this.all_confirm1_click.bind($('payment_domiciliation')));
	Event.observe($('payment_ogone'),"click",this.all_confirm2_click.bind($('payment_ogone')));
	
	
}
function option_confirm1_click()
{
	$('payment_ogone').addClassName('rose');
	$('payment_domiciliation').removeClassName('rose');
}
function option_confirm2_click()
{
	$('payment_domiciliation').addClassName('rose');
	$('payment_ogone').removeClassName('rose');
}
function all_confirm1_click()
{
	$('payment_domiciliation_radio').checked="checked";
	option_confirm2_click()
}
function all_confirm2_click()
{
	$('payment_ogone_radio').checked="checked";
	option_confirm1_click()
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
