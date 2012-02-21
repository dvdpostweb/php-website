/* MetriWeb Javascript file */
/* Version 4.5.5 -- 2008-05-06 */

/* Please, do NEVER modify this monitored file! */

var mw=new Object();

mw.V="4.5.5";
mw.i=new Image();
mw.p=0;
mw.l=0;
mw.D=".metriweb.be";
mw.r=function(u1,u2)
{
	if(mw.i.width){
		if(mw.i.width>1){
			var nS=document.createElement("script");
			nS.setAttribute("src", u1+"td"+u2+"&w="+mw.i.width);
			document.getElementsByTagName("head").item(0).appendChild(nS);
		}
	}
	else
		setTimeout("mw.r('"+u1.replace(/'/,"\\'")+"','"+u2.replace(/'/,"\\'")+"')",1000);
}
mw.W=function(u1,u2)
{
	if(mw.l){
		if(mw.l++>1){
			var nS=document.createElement("script");
			nS.setAttribute("src", u1+"sd"+u2);
			document.getElementsByTagName("head").item(0).appendChild(nS);
		}else mw.r(u1,u2)
	}else{
		mw.i.src=u1+"dyn"+u2;
		if(!mw.p){
			if(window.addEventListener)window.addEventListener('load',function(){mw.l++;mw.W(u1,u2)},false);
			else if(window.attachEvent)window.attachEvent('onload',function(){mw.l++;mw.W(u1,u2)});
		}
	}
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
mw.H=function()
{
	document.getElementById("metriwebLayer").style.visibility="hidden";
}
mw.c=mw.g("mwc",mw.n);

function metriwebTag (tag,keyword,extra,refresh)
{
/*
	mw.W('http://'+tag+mw.D+'/','/'+tag+'/mw.cgi?page='+keyword+
		(extra?('&q='+extra):'')+(refresh?('&s='+refresh):'')+
		'&c='+mw.c+'&v='+mw.V+'&p='+mw.p+'&d='+new Date().getTime()+'&R='+Math.random());
	mw.p++;
*/
}

/* (c) 2000-2008, DouWère */
