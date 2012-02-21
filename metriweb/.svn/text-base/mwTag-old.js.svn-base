/* MetriWeb Javascript file */
/* Version 3.0.2 -- 2005-03-11 */

/* Please, do NEVER modify this monitored file! */

var mw=new Object();

mw.V="3.0";
mw.D=".metriweb.be";
mw.W=function(u)
{
	document.write('<sc'+'ript src="'+u+
		'" type="text/javascript"><\/sc'+'ript>');
}
mw.n=function(d)
{
	var k="0000";
	var t=d.split(".");
	if(parseInt(k+t[t.length-1]))mw.d=d;
	else mw.d="."+t[t.length-2]+"."+t[t.length-1];
	t="charCodeAt(0)";
	var c=(k+eval("\""+mw.d.split("").join("\"."+t+"+\"")+"\"."+t));
	t=k+k+k+k+new Date().getTime();
	t=t.substr(t.length-16,16);
	return t.substr(0,13)+"."+t.substr(13,3)+c.substr(c.length-3,3)+".5";
}
mw.g=function(s,f)
{
	var c;
	var o=document.cookie.indexOf(s+"=");
	if(o<0){
		c=f(document.domain);
		document.cookie=s+"="+c+"; domain="+mw.d+"; path=/; expires="+
			new Date(new Date().getTime()+365*24*3600000).toGMTString()+";";
	}else{
		var e=document.cookie.indexOf(";",o);
		if(e<0)e=document.cookie.length;
		c=document.cookie.substring(o+4,e);
	}
	return c;
}
mw.c=mw.g("mwc",mw.n);

function metriwebTag (tag,keyword,extra,refresh)
{
	mw.W('http://'+tag+mw.D+'/sd/'+tag+'/mw.cgi?page='+keyword+
		(extra?('&q='+extra):'')+(refresh?('&s='+refresh):'')+
		'&c='+mw.c+'&v='+mw.V+'&R='+Math.random());
}

/* (c) 2000-2005, MetriWeb */
