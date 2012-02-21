/********************************************************
For more info & download: http://www.ibegin.com/blog/p_ibox2.html
Created for iBegin.com - local search done right
MIT Licensed Style
*********************************************************/
var indicator_img_path = "/images/www3/indicator.gif";
var indicator_img_html = "<img name=\"ibox2_indicator\" src=\""+indicator_img_path+"\" alt=\"Loading...\" style=\"width:128px;height:128px;\"/>"; // don't remove the name

function init_ibox2() {
	var elem_wrapper = "ibox2";
	
	createibox2(document.getElementsByTagName("body")[0]); //create our ibox2

	//	elements here start the look up from the start non <a> tags
	//var docRoot = (document.all) ? document.all : document.getElementsByTagName("*");
	
	// Or make sure we only check <a> tags
	var docRoot = document.getElementsByTagName("a");
	var ibAttr = "rel"; 	// our attribute identifier for our ibox2 elements

	var e;
	for (var i = 0; i < docRoot.length - 1; i++) {
			e = docRoot[i];
			if(e.getAttribute(ibAttr)) {
				var t = e.getAttribute(ibAttr);
				if ((t.indexOf("ibox2") != -1)  ||  t.toLowerCase() == "ibox2") { // check if this element is an ibox2 element
						e.onclick = function() { // rather assign an onclick event
							var t = this.getAttribute(ibAttr);
							var params = parseQuery(t.substr(5,999));
							var url = this.href;
							if(this.target != "") {url = this.target} 
							var title = this.title;
							showBG();
							showibox2(url,title,params);	// show ibox2
							window.onscroll = maintPos;
							window.onresize = maintPos;
							return false;
						}; 
						
				}
			}
     }
}

showBG = function() {
	var box_w = getElem('ibox2_w');

	var opacity_level = 8;
	box_w.style.opacity = 0;
	box_w.style.filter = 'alpha(opacity=0)';

	setBGOpacity = setOpacity;
	for (var i=0;i<=opacity_level;i++) {setTimeout("setibox2Opacity('ibox2_w',"+i+")",70*i);} // from quirksmode.org
		
	box_w.style.display = "";
	var pagesize = new getPageSize();
	var scrollPos = new getScrollPos();
	var ua = navigator.userAgent;
	if(ua.indexOf("MSIE ") != -1) {box_w.style.width = pagesize.width+'px';} 
	else {box_w.style.width = pagesize.width-20+'px';}
	box_w.style.height = pagesize.height+scrollPos.scrollY+'px';
	selectVisibility("hidden");
}

/* Scrollbar hiding by Heidi http://liquidlead-art.com/ */
selectVisibility = function(v) {
	var selectElems = document.getElementsByTagName('select');	
	for(var i = 0; i < selectElems.length; ++i) {
		selectElems[i].style.visibility = v;
	}
}

hideBG = function() {
	var box_w = getElem('ibox2_w');
	box_w.style.display = "none";
	selectVisibility("visible");
}

var loadCancelled = false;
showIndicator = function() {
	var ibox2_p = getElem('ibox2_progress');
	ibox2_p.style.display = "";
	posToCenter(ibox2_p);
	ibox2_p.onclick = function() {hideibox2();hideIndicator();loadCancelled = true;}
}


hideIndicator = function() {
	var ibox2_p = getElem('ibox2_progress');
	ibox2_p.style.display = "none";
	ibox2_p.onclick = null;
}

createibox2 = function(elem) {
	// a trick on just creating an ibox2 wrapper then doing an innerHTML on our root ibox2 element
	var strHTML = "<div  id=\"ibox2_w\" style=\"display:none;\"></div>";	
	strHTML +=	"<div  id=\"ibox2_progress\" style=\"display:none;\">";
	strHTML +=  indicator_img_html;
	strHTML +=  "</div>";
	strHTML +=	"<div  id=\"ibox2_wrapper\"  style=\"display:none\">";
	strHTML +=  "<div id=\"ibox2_close\" align=\"right\" ><a class=\"shut\" id=\"ibox2_close_a\" href=\"javascript:void(null);\" >close <img src=\"/images/www3/close.gif\" border=\"0\" align=\"absmiddle\"></a></div>";
	strHTML +=	"<div  id=\"ibox2_footer_wrapper\">";
	strHTML +=	"<div id=\"ibox2_footer\">&nbsp;</div></div>";
	strHTML +=	"<div  id=\"ibox2_content_wrapper\">";
	strHTML +=	"<div  id=\"ibox2_content\"></div>";
	
	strHTML +=  "</div></div>";
	strHTML +=  "</div></div>";



	var docBody = document.getElementsByTagName("body")[0];
	var ibox2 = document.createElement("div");
	ibox2.setAttribute("id","ibox2");
	ibox2.style.display = '';
	ibox2.innerHTML = strHTML;
	elem.appendChild(ibox2);
}

var ibox2_w_height = 0;
showibox2 = function(url,title,params) {
var ibox2 = getElem('ibox2_wrapper');
var ibox2_type = 0;
												
	// set title here
	var ibox2_footer = getElem('ibox2_footer');
	if(title != "") {ibox2_footer.innerHTML = title;} else {ibox2_footer.innerHTML = "&nbsp;";}

	url = url.toLowerCase(); // have to lowercase
	
	// file checking code borrowed from thickbox
	var urlString = /\.jpg|\.jpeg|\.png|\.gif|\.html|\.htm|\.php|\.cfm|\.asp|\.aspx|\.jsp|\.jst|\.rb|\.txt/g;
	var urlType = url.match(urlString);
	
	if(urlType == '.jpg' || urlType == '.jpeg' || urlType == '.png' || urlType == '.gif'){
		ibox2_type = 0;

		
		showIndicator();
		
		var imgPreloader = new Image();
		
		imgPreloader.onload = function(){

			imgPreloader = resizeImageToScreen(imgPreloader);
			hideIndicator();

			getElem('ibox2_content').style.overflow = "hidden";

			var strHTML = "<a href=\"javascript:void(null);\"><img name=\"ibox2_img\" src=\""+url+"\" style=\"width:"+imgPreloader.width+"px;height:"+imgPreloader.height+"px;border:0;\"/></a>";
			
			if(loadCancelled == false) {
				// set width and height
				ibox2.style.height = imgPreloader.height+'px';
				ibox2.style.width = imgPreloader.width+'px';
				ibox2.style.display = "";
				ibox2.style.visibility = "hidden";
				posToCenter(ibox2); 	
				ibox2.style.visibility = "visible";
				setibox2Content(strHTML);
			}
				
		}
		
		loadCancelled = false;
		imgPreloader.src = url;
		

		
	} else if(url.indexOf("#") > 0) {
			var strHTML = "";
			ibox2_type = 1;

			if(params['height']) {ibox2.style.height = params['height']+'px';} 
			else {ibox2.style.height = '280px';}
			
			if(params['width']) {ibox2.style.width = params['width']+'px';} 
			else {ibox2.style.width = '450px';}

		
			ibox2.style.display = "";
			ibox2.style.visibility = "hidden";
			posToCenter(ibox2); 	
			ibox2.style.visibility = "visible";

			var elemSrcId = url.substr(url.indexOf("#") + 1,1000);
			var elemSrc = getElem(elemSrcId);
			
			if(elemSrc) {
				strHTML = elemSrc.innerHTML;
			}

			setibox2Content(strHTML);

	}else if(urlType=='.htm'||urlType=='.html'||urlType=='.php'||
			 urlType=='.asp'||urlType=='.aspx'||urlType=='.jsp'||
			 urlType=='.jst'||urlType=='.rb'||urlType=='.txt'||
			 urlType=='.cfm') {
			
	
			ibox2_type = 2;
	
			showIndicator();
			http.open('GET',url,true);
	
			http.onreadystatechange = function() {
				if(http.readyState == 4){
					hideIndicator();
					
					if(params['height']) {ibox2.style.height = params['height']+'px';} 
					else {ibox2.style.height = '280px';}
					
					if(params['width']) {ibox2.style.width = params['width']+'px';} 
					else {ibox2.style.width = '450px';}
		
					ibox2.style.display = "";
					ibox2.style.visibility = "hidden";
					posToCenter(ibox2); 	
					ibox2.style.visibility = "visible";

					var response = http.responseText;
					setibox2Content(response);
					
					
				}
			}
			
			http.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");
			http.send(null);

			
	} 
	
	ibox2.style.opacity = 0;
	ibox2.style.filter = 'alpha(opacity=0)';	
	var ibox2_op_level = 10;
	
	setibox2Opacity = setOpacity;
	for (var i=0;i<=ibox2_op_level;i++) {setTimeout("setibox2Opacity('ibox2_wrapper',"+i+")",30*i);}


	if(ibox2_type == 1 || ibox2_type == 2) {
		ibox2.onclick = null;getElem("ibox2_close_a").onclick = function() {hideibox2();}
	} else {
		ibox2.onclick = hideibox2;getElem("ibox2_close_a").onclick = null;
	}

}




setOpacity = function (elemid,value)	{
		var e = getElem(elemid);
		e.style.opacity = value/10;
		e.style.filter = 'alpha(opacity=' + value*10 + ')';
}

resizeImageToScreen = function(objImg) {
	
	
	var pagesize = new getPageSize();
	
	var x = pagesize.width - 100;
	var y = pagesize.height - 100;

	if(objImg.width > x) { 
		objImg.height = objImg.height * (x/objImg.width); 
		objImg.width = x; 
		if(objImg.height > y) { 
			objImg.width = objImg.width * (y/objImg.height); 
			objImg.height = y; 
		}
	} 

	else if(objImg.height > y) { 
		objImg.width = objImg.width * (y/objImg.height); 
		objImg.height = y; 
		if(objImg.width > x) { 
			objImg.height = objImg.height * (x/objImg.width); 
			objImg.width = x;
		}
	}
	
	return objImg;
}

maintPos = function() {
	var ibox2 = getElem('ibox2_wrapper');
	var box_w = getElem('ibox2_w');
	var pagesize = new getPageSize();
	var ua = navigator.userAgent;
	
	if(ua.indexOf("MSIE ") != -1) {box_w.style.width = pagesize.width+'px';} 
	else {box_w.style.width = pagesize.width-20+'px';}

	if(ua.indexOf("Opera/9") != -1) {box_w.style.height = document.body.scrollHeight+'px';}
	else {box_w.style.height = document.body.scrollHeight+50+'px';}
	posToCenter(ibox2);
	
}

hideibox2 = function() {
	hideBG();
	var ibox2 = getElem('ibox2_wrapper');
	ibox2.style.display = "none";

	clearibox2Content();
	window.onscroll = null;
}

posToCenter = function(elem) {
	var scrollPos = new getScrollPos();
	var pageSize = new getPageSize();
	var emSize = new getElementSize(elem);
	var x = Math.round(pageSize.width/2) - (emSize.width /2) + scrollPos.scrollX;
	var y = Math.round(pageSize.height/2) - (emSize.height /2) + scrollPos.scrollY;	
	elem.style.left = x+'px';
	elem.style.top = y+'px';	
}

getScrollPos = function() {
	var docElem = document.documentElement;
	this.scrollX = self.pageXOffset || (docElem&&docElem.scrollLeft) || document.body.scrollLeft;
	this.scrollY = self.pageYOffset || (docElem&&docElem.scrollTop) || document.body.scrollTop;
}

getPageSize = function() {
	var docElem = document.documentElement
	this.width = self.innerWidth || (docElem&&docElem.clientWidth) || document.body.clientWidth;
	this.height = self.innerHeight || (docElem&&docElem.clientHeight) || document.body.clientHeight;
}

getElementSize = function(elem) {
	this.width = elem.offsetWidth ||  elem.style.pixelWidth;
	this.height = elem.offsetHeight || elem.style.pixelHeight;
}

setibox2Content = function(str) {
	clearibox2Content();
	var e = getElem('ibox2_content');
	e.innerHTML = str;
	e.style.overflow = "auto";
}
clearibox2Content = function() {
	var e = getElem('ibox2_content');
	e.innerHTML = "";
	e.style.overflow = "hidden";
}


getElem = function(elemId) {
	return document.getElementById(elemId);	
}

// parseQuery code borrowed from thickbox, Thanks Cody!
parseQuery = function(query) {
   var Params = new Object ();
   if (!query) return Params; 
   var Pairs = query.split(/[;&]/);
   for ( var i = 0; i < Pairs.length; i++ ) {
      var KeyVal = Pairs[i].split('=');
      if ( ! KeyVal || KeyVal.length != 2 ) continue;
      var key = unescape( KeyVal[0] );
      var val = unescape( KeyVal[1] );
      val = val.replace(/\+/g, ' ');
      Params[key] = val;

   }
   
   return Params;
}

/********************************************************
 Make this IE7 Compatible ;)
 http://ajaxian.com/archives/ajax-on-ie-7-check-native-first
*********************************************************/
createRequestObject = function() {
	var xmlhttp;
		/*@cc_on
	@if (@_jscript_version>= 5)
			try {xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
					try {xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
					catch (E) {xmlhttp = false;}
			}
	@else
		xmlhttp = false;
	@end @*/
	if (!xmlhttp && typeof XMLHttpRequest != "undefined") {
			try {xmlhttp = new XMLHttpRequest();} catch (e) {xmlhttp = false;}
	}
	return xmlhttp;
}

var http = createRequestObject();

function addEvent(obj, evType, fn){ 
 if (obj.addEventListener){ 
   obj.addEventListener(evType, fn, false); 
   return true; 
 } else if (obj.attachEvent){ 
   var r = obj.attachEvent("on"+evType, fn); 
   return r; 
 } else { 
   return false; 
 } 
}
addEvent(window, 'load', init_ibox2);