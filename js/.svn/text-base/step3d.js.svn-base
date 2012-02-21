function start(){
	
	Event.observe($('option_confirm1'),"click",this.option_confirm1_click.bind($('option_confirm1')));
	Event.observe($('option_confirm2'),"click",this.option_confirm2_click.bind($('option_confirm2')));
	
	Event.observe($('all_option1'),"click",this.all_confirm1_click.bind($('all_option1')));
	Event.observe($('all_option2'),"click",this.all_confirm2_click.bind($('all_option2')));
	
	
}
function option_confirm1_click()
{
	$('all_option1').addClassName('rose');
	$('all_option2').removeClassName('rose');

}
function option_confirm2_click()
{
	$('all_option2').addClassName('rose');
	$('all_option1').removeClassName('rose');
}
function all_confirm1_click()
{
	$('option_confirm1').checked="checked";
	option_confirm1_click()
}
function all_confirm2_click()
{
	$('option_confirm2').checked="checked";
	option_confirm2_click()
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
