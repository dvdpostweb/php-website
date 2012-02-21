function CPValue(s) {
    return (typeof(CP$value) != "undefined" && CP$value[s]) ? CP$value[s] : 0;
}

function PopUpMessage() {
    window.status="";
}

var doRatingsPopup = "false";
var b_popup = (CPValue("*popup*") != 0);
var b_member = (CPValue("*member*") != 0);
var b_show800 = true; // site flag.
var s_titlecount = '12,000'; // constant.
var s_librange = '2-8'; // constant.
var s_maxlib = '8';   // constant.
var s_maxout = (CPValue("*maxout*") == 0) ? '3' : (''+CPValue("*maxout*"));
var s_shippingtime = '2-4'; // days - constant.
// var s_titlecount = '<font color=red size=+2>11,000</font>'; // constant.
// var s_librange = '<font color=red size=+2>2-8</font>'; // constant.
// var s_maxlib = '<font color=red size=+2>8</font>';   // constant.
// var s_maxout = '<font color=red size=+2>3</font>';
// var s_shippingtime = '<font color=red size=+2>2-4</font>'; // days - constant.

// Rent button size constants, also defined in class netflix.util.MovieFormatter
var RENT_BUTTON_SMALL   = 0;
var RENT_BUTTON_MEDIUM  = 10;
var RENT_BUTTON_LARGE   = 20;
var RENT_BUTTON_JUMBO   = 30;

window.name = '_nfk';


function ratingsPop(link) {
    if (doRatingsPopup == "true") {
        showRatingsPop();
    } else {
        window.location.href = link;
    }
}    

function showRatingsPop() {
    if (window.location.pathname.indexOf("/RateMovies") == -1) {
        window.open("/Popup?id=5143",
                    'poppage1',
                    'toolbars=0,scrollbars=0,location=0,statusbars=0,menubars=0,resizable=0,width=350,height=460');
    } 
    doRatingsPopup = "false";
    
}







if ((typeof IMAGE_ROOT) == "undefined") {
    IMAGE_ROOT = "http://image.netflix.com/NetFlix_Assets/";
}

// Preload "clicked" rent and save buttons.
var rentButtonPath = IMAGE_ROOT + "pages/rent/";



//commerce popups

var queuePopUpTargetName = "nfQPop";

function rent(imgName, popupUrl) {
    // rbflip(imgName);
    checkForQueueAddCookie(0, popupUrl);
    return true;
}



function checkForQueueAddCookie(cyclesWaited, url) {
    var version = parseFloat(navigator.appVersion);

    var windowParams = "toolbars=0,scrollbars=1,location=0,statusbars=0,menubars=0,resizable=1,width=585,height=650";
    
    if (navigator.appName == "Netscape" && version >= 4 && version < 5) {
        // Skip cookie checks for Netscape 4.x, it doesn't work with the 204 technique.
        window.setTimeout("window.open('" + url + "', '" + queuePopUpTargetName + "', '" + windowParams + "');", 150);
    } else {
        if (typeof cyclesWaited == "undefined" || cyclesWaited == null) { 
            cyclesWaited = 0;
        }
        var cookies = document.cookie;
        var cookieName = "lastQAddResult";
        var theCookiePosition = cookies.indexOf(cookieName);
        var theCookieValuePostion = theCookiePosition + cookieName.length + 1; // Add one for the equals sign!
        var statusChar = "";
        if (theCookieValuePostion < cookies.length) {
            statusChar = cookies.charAt(theCookieValuePostion);            
        }
        var hasCookie = (theCookiePosition != -1 && (statusChar == "0" || statusChar == "1" || statusChar == "2" || statusChar == "3" || statusChar == "-" )); // Possible add status numbers, "-" covers all negative values.        
        if (hasCookie) { 
            // Since we have *a* cookie, check to see if it's the *right* one.
            var start = url.indexOf("movieid=") + 8;
            var end = url.indexOf("&", start);
            if (end == -1) {
                end = url.length;
            }
            var movieId = url.substring(start, end);
            if (cookies.indexOf(movieId, theCookieValuePostion) == -1) {
                hasCookie = false;
            }
        }
        if (hasCookie) {
            window.open(url, queuePopUpTargetName, windowParams);
        } else if (cyclesWaited < 60) {
            window.setTimeout("checkForQueueAddCookie(" + (cyclesWaited + 1) + ", '" + url + "');", 50);
        }
    }
}

function privPop(whereto) {
    window.open(whereto, 'nf_static_popup', 'toolbars=0,scrollbars=1,location=0,statusbars=0,menubars=0,resizable=0,width=366,height=450,left=1,top=1');
}
	
function addressPop(whereto) {
    window.open(whereto, 'address_popup2', 'toolbars=0,scrollbars=0,location=0,statusbars=0,menubars=0,resizable=0,width=350,height=440,left=1,top=1');
}	

function cobrandPrivPop(whereto) {
	window.open(whereto, 'poppage_cobrand_link', 'toolbars=0,scrollbars=1,location=0,statusbars=0,menubars=0,resizable=0,width=600,height=450,left=400,top=1');
} 


function stateAddress(whereto) {
    window.open(whereto, 'memberaddressedit', 'toolbars=0,scrollbars=1,location=0,statusbars=0,menubars=0,resizable=0,width=425,height=690');
}  

function popupTermsandConditions(whereto) {
    window.open(whereto, "NF_Marquee_Terms_And_Conditions", "height=470,width=400,menubar=no,location=no,resizable=yes,scrollbars=yes,status=yes,toolbar=no");
}    

function safePop(whereto) {
    window.open(whereto, 'poppop', 'toolbars=0,scrollbars=1,location=0,statusbars=0,menubars=0,resizable=0,width=367,height=450,left=1,top=1');
}

function lhcNavCheck(lhcForm) {
    
    var selIndex = document.forms[lhcForm].page.selectedIndex;
    var selValue = document.forms[lhcForm].page.options[selIndex].value;
    
    if (selValue == 0) {
        // A placeholder option was selected.
        if (selIndex == (document.forms[lhcForm].page.length - 1)) {
            // Final item, the dashed doodah. Stay here.
            document.forms[lhcForm].page.selectedIndex = 0;
        } else {
            // Fallback case for malformed items not at beginning or end.
            document.forms[lhcForm].page.selectedIndex = 0;
        }
    } else if ((selValue == "Recs") && (doRatingsPopup == "true")) {
        showRatingsPop();
    } else if (selIndex == 0) {
        // Title item. Proceed to generic page.
        document.forms[lhcForm].submit();
    } else {
        document.forms[lhcForm].submit();
    }
}

function searchCheck(searchForm) {

    var selValue = document.forms[searchForm].searchTxt.value;
    if (selValue == "") {
        document.location="http://www.netflix.com/CustomerService?id=1132";
    } else {
        document.forms[searchForm].submit();   
    }
}

var dontFocus = "";
function focusAddressFormField() {

    if (document.login_form && (dontFocus == "")) {   
    document.login_form.email.focus();
    }

    else if (document.register_form && (dontFocus == "")) {   
    document.register_form.email.focus();
    }

    else if (document.addressEntry && (dontFocus == "")) {   
    document.addressEntry.fname.focus(); 
    }
    
}

function load_main(whereto) {
    if (! b_popup) {
        window.location.href = whereto;   
    } else if (window.opener) {
      window.opener.top.location.href = whereto; 		
      window.opener.focus();
      self.close();
  } else {
      window.open(whereto, '_nfk')
  }

}

function swapImage(imageName, newImage) {
    document.images[imageName].src = newImage;
}

function NF_preloadImages() {
  var d=document; if(d.images){ if(!d.NF_p) d.NF_p=new Array();
    var i,j=d.NF_p.length,a=NF_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.NF_p[j]=new Image; d.NF_p[j++].src=a[i];}}
}

function changeWindowTitle(title) {
    if (CP$value["*member*"]) {
        var t = "Netflix: " + title;
        document.title = t;
    }
}

function oopPop() {
    window.open("/Popup?id=5170",
                'oopPop',
                'toolbars=0,scrollbars=0,location=0,statusbars=0,menubars=0,resizable=0,width=350,height=250');
}

function ooppop() {
	oopPop();
}

button1 = new Image();
button1.src = IMAGE_ROOT + "buttons/one_moment_please.gif";
button2 = new Image();
button2.src = IMAGE_ROOT + "buttons/one_moment_please_small.gif";
var theForm;
var requestSubmitted = false;  

function disableButton(btn,form,buttonType) {
   if (!requestSubmitted){
        if (buttonType != null) {
           var buttonName = buttonType;
           btn.src = buttonName.src; // image swap happens here
        } else {
           var submitMessage = "  Please Wait...  ";
           btn.value = submitMessage;
        }
        theForm = form;
        btn.disabled = true;
        requestSubmitted = true;
        setTimeout("submitIt()", 250);
   } else {
        return false;
   }
}
function submitIt() {
    theForm.submit();
    return false;
}
function checkandsubmit(submitForm) {
    if(requestSubmitted == true) {
         return false;
    } else {
    requestSubmitted = true;
    submitForm.submit();
    return false;
    }
}

function popupTimer() {
    setTimeout("self.close()",120000);
}
