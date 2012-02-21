String.prototype.trim = function() {
return this.replace(/^\s+|\s+$/g, "");
}
function start(){
	
	//check email
	Event.observe($('whereboxoffice'),"change",this.office.bind($('whereboxoffice')));
	Event.observe($('wherezip'),"change",this.zip.bind($('wherezip')));
	zip();
}
function zip(event)
{
	if($F('wherezip')>0)
	{
		if($F('whereboxoffice')==1)
		{
			$('redbox_div').innerHTML='<br><table width=100% bgcolor=#fce3c6><tr><td width= 100%><br /><img src="/images/ajax_loader.gif"><br /><br /></td></tr></table>';
			send('ajax.action.php','page=custserdvdnotyetret.php&action=redbox&wherezip='+$F('wherezip'),'get',office_back)
		}
	}
}
function office(event)
{
	if(this.value==1)
	{
		if($F('wherezip')>0)
		{
			$('redbox_div').innerHTML='<br><table width=100% bgcolor=#fce3c6><tr><td width= 100%><br /><img src="/images/ajax_loader.gif"><br /></td></tr></table>';
			send('ajax.action.php','page=custserdvdnotyetret.php&action=redbox&wherezip='+$F('wherezip'),'get',office_back)
		}
	}else
	{
		$('redbox_div').innerHTML="";	
	}
}
function office_back(requete)
{
	$('redbox_div').innerHTML=requete.responseText
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
