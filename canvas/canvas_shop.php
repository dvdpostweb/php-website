<?php 
if($current_page_name!='shop_offline.php')
	header('Location: /shop_offline.php');
if(${"REMOTE_ADDR"}== ADMINIP || $host== 'www' || $host== 'localhost'){
	echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';	
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?= $lang_short ?>" xml:lang="<?= $lang_short ?>">
<head>
<title><?php  echo TEXT_META_TITLE; ?></title>
<META NAME="description" content="<?php  echo TEXT_META_DESC; ?>">
<META NAME="keywords" content="<?php  echo TEXT_META_KEYWORDS; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Language" content="<?php  echo TEXT_META_LANGUAGE; ?>">
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('stylesheet/stylesheet_shop.css','.css'); ?>">
<LINK REL="SHORTCUT ICON" href="<?php  echo DIR_WS_IMAGES;?>/favicon.ico">
<?php  require('form_check.js.php'); ?>
<script type="text/javascript" src="<?php  echo HTTP_SERVER;?>/metriweb/mwTag.js"></script>
<?php
$script_available= array(0=>'/product_info_shop.php');
if(scriptAvailable($script_available)){
?>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="js/filterCapture.js.php?products_id=<?= $_GET['products_id']?>"></script>
<script type="text/javascript" src="js/TheFilterCaptureService.js"></script>
<?php
}
?>
</head>
<body LEFTMARGIN="0">

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
  <table name="squelette" width="1006" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td valign="bottom"><img src="<?php  echo DIR_WS_IMAGES;?>/corner_top_left.jpg" width="8" height="8"></td>
		<td width="10" valign="bottom"><img src="<?php  echo DIR_WS_IMAGES;?>/border_top.jpg" width="1006" height="8"></td>
		<td valign="bottom"><img src="<?php  echo DIR_WS_IMAGES;?>/corner_top_right.jpg" width="8" height="8"></td>
  	</tr>	

  	<tr>
    	<td nowrap background="<?php  echo DIR_WS_IMAGES;?>/border_left.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
    	<td valign="top">
			<table name="espace_superieur_vide_20px_height" width="990"  border="0" cellspacing="0" cellpadding="0">
				<tr>
            		<td height="20" valign="top"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
          		</tr>
       		</table>
			<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_1_shop.php')); ?>
			<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td  width="159" valign="top" id="left_menu"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_shop.php')); ?></td>
					<td width="801" align="right" valign="top" id="main_page" >
					 <table width="764" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_2_shop.php')); ?>             
							</td>
						</tr>
						<tr>
							<td>
								<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_3_shop.php')); ?>
							</td>
						</tr>
						<tr>
							<td>
							  <?php  require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
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
    		<div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>/nuancierborder2_shop.jpg" width="960" height="12"></div>
		</td>
		
    	<td nowrap background="<?php  echo DIR_WS_IMAGES;?>/border_right.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
    </tr>
  	<tr>
    	<td height="8" nowrap><img src="<?php  echo DIR_WS_IMAGES;?>/corner_bottom_left.jpg" width="8" height="8"></td>
    	<td height="8"><img src="<?php  echo DIR_WS_IMAGES;?>/border_bottom.jpg" width="1007" height="8"></td>
    	<td height="8" nowrap><img src="<?php  echo DIR_WS_IMAGES;?>/corner_bottom_right.jpg" width="8" height="8"></td>
  	</tr>
</table>
<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/footer/footer_shop.php')); ?>
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

$script_available= array(0=>'/shopping_complete.php');
if(scriptAvailable($script_available) && !empty($_GET['list']))
{
	$sql='select * from shopping_orders s 
	left join products_description pd on pd.products_id = s.products_id and pd.language_id = 3
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
		    "'.addSlashes($shop['products_name']).'", // Product Name
		    "sale", // Category
		    "'.$shop['price']/$shop['quantity'].'", // Price
		    "'.$shop['quantity'].'" // Quantity
		  );
';
		$total+=$shop['price'];
		$quantity+=$shop['quantity'];
		$city=$shop['entry_city'];
		$country=$shop['countries_name'];
		$country_id=$shop['entry_country_id'];
		
	}
	$decshipping_fee=shipping($country_id,$quantity);
	$total+=$decshipping_fee;
	echo 'pageTracker._addTrans(
	    "'.$_GET['id'].'", // Order ID
	    "", // Affiliation
	    "'.$total.'", // Total
	    "'.round(($total-($total*(1/1.21))),2).'", // Tax
	    "'.$decshipping_fee.'", // Shipping
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


	
    <!-- Woopra Code Start -->
    <script type="text/javascript">
    var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
    document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <!-- Woopra Code End -->


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
		var pageTracker = _gat._getTracker("UA-8474969-1");
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
			var pageTracker = _gat._getTracker("UA-7319107-1");
			pageTracker._trackPageview();



			} catch(err) {}</script>
	 		<?php
	 	break;		  	
	 }
	?>
</body>
</html>