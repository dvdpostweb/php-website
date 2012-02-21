<?
Header("content-type: application/x-javascript");
if(empty($customer_id))
	$customer_id=$_SESSION['customer_id'];
if(empty($customer_id))
	$customer_id=$_COOKIE['customers_id'];
$page=$_GET['page'];
?>function start(){
	page=<?php if(!empty($page))echo "'".$page."';"; else echo "getPage();"; ?>
	switch(page){
		case 'product_info_public.php':
			view_dvd_public();
			break;
		case 'product_info.php':
			view_dvd_private();
			rating('normal');
			break;
		case 'product_info_adult.php':
			view_dvd_private();
			rating('adult');
			break;
		
		case 'product_info_shop_adult.php':
			view_dvd_private();
			rating('adult');
			break;
		case 'product_info_shop.php':
			view_dvd_private();
			break;
		case 'product_info_shop_public.php':
			view_dvd_private();
			break;
			
		case 'rate_more.php':
			rating_list();
			break;
		case 'my_recommandation.php':
				rating_list();
				notinterested();
				
				break;
		case 'mydvdpost.php':
			rating_box();
			break;
	}
}
/////////////////////////////////
/////view description of dvd/////
/////////////////////////////////
function view_dvd_private()
{
	// view page of dvd
	products_id=getParamValue('products_id');
	language_id=$('filter').getAttribute('language');
	//alert(products_id+'+'+language_id+'+'+<?= $customer_id ?>);
	DPFilterCapture_ViewItemPage(products_id,<?= ((isset($customer_id))?$customer_id:'null') ?>,language_id);
}
function view_dvd_public()
{
	// view page of dvd
	products_id=<?= ((!empty($_GET['products_id']))?$_GET['products_id']:'0'); ?>;
	language_id=$('filter').getAttribute('language');
//	alert(products_id+'+'+language_id);
	DPFilterCapture_ViewItemPage(products_id,null,language_id);
}
///////////////////
//////rating///////
///////////////////
var _type;
function rating(type)
{
	//if img star exist not vot yet on this product
	_type=type;
	try {
		image_classic=$('img_star').getStyle('backgroundImage');
		$$('.star_rate').each(function(p){
				Event.observe(p,"mouseover",this.starOver.bind(p));				
				Event.observe(p,"mouseout",this.starOut.bind(p));
				Event.observe(p,"click",this.starClick.bind(p));
				
		});
	}
	catch(e){
		
	}
}
function rating_list()
{
	try {
		
		image_classic=$('img_star').getStyle('backgroundImage');
		$$('.star_rate').each(function(p){
				Event.observe(p,"mouseover",this.starOver.bind(p));				
				Event.observe(p,"mouseout",this.starOut.bind(p));
				Event.observe(p,"click",this.starClickList.bind(p));
				
		});
	
	}
	catch(e){
		
	}
}
function notinterested()
{
	try {
		
		
		$$('.interested').each(function(p){
				Event.observe(p,"click",this.interestedClickList.bind(p));
				
		});
	
	}
	catch(e){
		
	}
}
function rating_box()
{
	try {
		image_classic=$('img_star').getStyle('backgroundImage');
		$$('.star_rate').each(function(p){
				Event.observe(p,"mouseover",this.starOver.bind(p));				
				Event.observe(p,"mouseout",this.starOut.bind(p));
				Event.observe(p,"click",this.starClickBox.bind(p));
				
		});
	}
	catch(e){
		
	}
}
function starOver(event){
	
	nb_star=this.getAttribute('id');
	url='url(/images/www3/starbar/stars_2_'+nb_star+'0.gif)';
	this.up('.img_star').setStyle({backgroundImage:url});

}
function starOut(event){
	this.up('.img_star').setStyle({backgroundImage:image_classic});
}
function starClick(event){
	
	nb_star=this.getAttribute('id');
	products_id=getParamValue('products_id');
	var param = $H({'movieid': products_id,'products_id': products_id,'value':nb_star,'type':_type}).toQueryString();
	
	//////////////////
	///// filter /////
	//////////////////
	language_id=$('filter').getAttribute('language');
	DPFilterCapture_Rating(products_id,nb_star,<?= ((isset($customer_id))?$customer_id:'null') ?>,language_id);
	
	$('rating_all').innerHTML='<div style="margin:20px 0 20px 0"><img src="/images/ajax_loader.gif"></div>';
	
	send('/set_rating_ajax.php',param,'get',rate_result);
	
}
function interestedClickList(event){
	products_id =this.getAttribute('product');
	var param = $H({'products_id': products_id,'movieid': products_id}).toQueryString();
	send('/setuninterested.php',param,'post',interestedClickList_result);		
}
function interestedClickList_result()
{
		window.location.replace('my_recommandation.php');
}
function starClickList(event){
	
	nb_star=this.getAttribute('id');
	products_id=this.up('p').getAttribute('id');
	var param = $H({'movieid': products_id,'products_id': products_id,'value':nb_star,'type':'list'}).toQueryString();
	language_id=$('filter').getAttribute('language');
	window.location.replace('SetRating.php?movieid='+ products_id+'&value='+nb_star+'&lang='+$('filter').getAttribute('language')+'&url='+self.location.href);
}
function starClickBox(event){
	
	nb_star=this.getAttribute('id');
	products_id=$('filter').getAttribute('movie_id');
	language_id=$('filter').getAttribute('language');
	try{
		$('review_box').hide();
		$('rating_box').innerHTML='<div style="margin:20px 0 20px 0"><img src="/images/ajax_loader.gif"></div>';
	}
	catch(e){
		
	}
	window.location.replace('SetRating.php?movieid='+ products_id+'&value='+nb_star+'&lang='+$('filter').getAttribute('language')+'&url='+self.location.href);

	
}

function rate_result(requete){
	//alert(requete.responseText);
	$('rating_all').innerHTML=requete.responseText;
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
