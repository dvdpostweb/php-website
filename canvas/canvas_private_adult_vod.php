<?php 
header('Location: http://private.dvdpost.com/'.$lang_short.'/adult');
#header('Cache-Control: private');
if(${"REMOTE_ADDR"}== ADMINIP || $host== 'www' || $host== 'localhost'){
	echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';	

}
?>
<html>
<head>
<title><?php  echo TEXT_META_TITLE; ?></title>
<meta name="verify-v1" content="PQdsGfiSvfFZFXwp5ZRxDgw37x89LYLkoOy2X5uD7tY=" /> 
<meta name="verify-v1" content="Fh6utipb6BPbYsezoaWU0qwP+ODl0ioypAFfh41Qbu0=" />
<META NAME="description" content="<?php  echo TEXT_META_DESC; ?>">
<META NAME="keywords" content="<?php  echo TEXT_META_KEYWORDS; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Language" content="<?php  echo TEXT_META_LANGUAGE; ?>">
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">
<link rel="stylesheet" type="text/css" href="<?php  echo (getenv('HTTPS') == 'on' ? HTTPS_SERVER : HTTP_SERVER) . '/' . getBestMatchToIncludeAny('stylesheet/stylesheet_adult.css?v=2','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo (getenv('HTTPS') == 'on' ? HTTPS_SERVER : HTTP_SERVER) . '/' . getBestMatchToIncludeAny('stylesheet/basic.css','.css'); ?>">
<LINK REL="SHORTCUT ICON" href="<?php  echo DIR_WS_IMAGES;?>/favicon.ico">
<?php  require('form_check.js.php'); ?>

<script type="text/javascript" src="<?php  echo HTTP_SERVER;?>/metriweb/mwTag.js"></script>
</head>
<body LEFTMARGIN="0" class="vodx">
<script type="text/javascript">
    var keyword="<?php  echo $current_page_name ; ?>";
    <?php 
	switch ($languages_id) {
	case '1':
	?>
	var extra="fr";
	<?php 
	break;
	case '2':
	?>
	var extra="nl";
	<?php 
	break;
	case '3':
	?>
	var extra="en";
	<?php 
	break;
	}
	?>
    metriwebTag ("dvdpost", keyword, extra);
</script>
<CENTER >
  <table name="squelette" width="1006" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
    	<td valign="top">
			<table name="espace_superieur_vide_20px_height" width="990"  border="0" cellspacing="0" cellpadding="0">
				<tr>
            		<td height="20" valign="top"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
          		</tr>
       		</table>
			<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_1_private_adult.php')); ?>
			<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td  width="159" valign="top" id="left_menu"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_adult_vod.php')); ?></td>
					<td width="801" align="right" valign="top" id="main_page" >
					 <table width="764" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_2_private_adult.php')); ?>             
							</td>
						</tr>
						<tr>
							<td>
								<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_3_private_adult.php')); ?>
							</td>
						</tr>
						<tr>
							<td>
							  <?php  require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include));?>
							</td>
						</tr>
					 </table>					 
					</td>
				</tr>
			</table>
                   	    <table name="espace_inferieur_vide_15px_height" width="990"  border="0" cellspacing="0" cellpadding="0">
          		<tr>
          			<td height="15"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
        		</tr>
      		</table>
    		<div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>/nuancierborder2.jpg" width="960" height="12"></div>
		</td>	
    </tr>
</table>
<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/footer/footer_private_adult.php')); ?>
</CENTER>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-1121531-1");
pageTracker._trackPageview();

<?php 
$script_available= array(0=>'/vod_order_conf.php');
if(scriptAvailable($script_available) && !empty($_GET['list']))
{
	$sql='select * from shopping_orders s 
	left join address_book a on a.customers_id = s.customers_id and address_book_id = 1
	left join country c on c.countries_id = a. entry_country_id
	where shopping_orders_id in ('.$_GET['list'].')';
	$query=tep_db_query($sql);
	$item='';
	$total=0;
	$quantity=0;
	
	while($shop = tep_db_fetch_array($query))
	{
		$item.='pageTracker._addItem(
		    "'.$_GET['id'].'", // Order ID
		    "'.$shop['products_id'].'", // SKU
		    "droselia '.$_GET['nb'].'", // Product Name
		    "droselia", // Category
		    "'.round($shop['price']/$_GET['nb'],2).'", // Price
		    "'.$_GET['nb'].'" // Quantity
		  );
';
		$total+=$shop['price'];
		$quantity+=$_GET['nb'];
		$city=$shop['entry_city'];
		$country=$shop['countries_name'];
		$country_id=$shop['entry_country_id'];
		
	}
	//$decshipping_fee=shipping($country_id,$quantity);
	//$total+=$decshipping_fee;
	echo 'pageTracker._addTrans(
	    "'.$_GET['id'].'", // Order ID
	    "", // Affiliation
	    "'.$total.'", // Total
	    "'.round(($total-($total*(1/1.21))),2).'", // Tax
	    "0", // Shipping
	    "'.addSlashes($city).'", // City
	    "", // State
	    "'.$country.'" // Country
	  );
';
echo $item;
echo 'pageTracker._trackTrans();';
}
?>

} catch(err) {}</script>
<!-- Google Analytics tag -->



<!-- Google Analytics tag -->
<?php
switch (WEB_SITE_ID){
 	case '101':		 	
 	?>
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	try {
	var pageTracker = _gat._getTracker("UA-8475402-1");
	pageTracker._trackPageview();
	} catch(err) {}</script>
 	<?php
 	break;
  	
 	default:
 		?>
		<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		try {
		var pageTracker = _gat._getTracker("UA-8475379-1");
		pageTracker._trackPageview();
		} catch(err) {}</script>
 		<?php
 	break;		  	
 }
?>

	
    <!-- Woopra Code Start -->
    <script type="text/javascript">
    var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
    document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <!-- Woopra Code End -->

<?php
if($google_conversion =='ok')
{
?>
<!-- Google Code for Droselia Confirmation Conversion Page -->
<script language="JavaScript" type="text/javascript">
<!--
var google_conversion_id = 1033549176;
var google_conversion_language = "en_US";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "ty8uCPCyjwEQ-Orq7AM";
if (6.0) {
  var google_conversion_value = 6.0;
}
//-->
</script>
<script language="JavaScript" src="https://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<img height="1" width="1" border="0" src="https://www.googleadservices.com/pagead/conversion/1033549176/?value=6.0&amp;label=ty8uCPCyjwEQ-Orq7AM&amp;guid=ON&amp;script=0"/>
</noscript>

<?php	
}
?>
</body>
</html>