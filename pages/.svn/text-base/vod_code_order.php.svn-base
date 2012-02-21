<?php  
?>

<style>
	
	
		
	
	
	
	#prix_vodx {
		background:url(<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/vodx/prix.gif?v=2' ;?>);
		background-repeat:no-repeat;
		width:650px;
	
	}
	
	.bouton_buy_vodx {
		margin:0 0 0 9px;
		padding-top:170px;
		text-align:left;
	}
	

	.footer_prix_vodx {
	padding-top:45px;
	width:650px;
	margin-left:30px;
	font-family: Arial, Helvetica, sans-serif;
	font-size:12px;
	text-align:left;
	}
	
	#top_menu_vodx img{
	
		
		padding-right:5px;
		border:0;
	
	
	}
	#top_menu_vodx {
	
		padding-top:8px;
		padding-bottom:25px;
	
	
	}
	.btn_vodx
	{
		margin:0 31px 0 0;
		text-decoration:none;
	}
	
	.text_vodx {
	font-family:Arial, Helvetica, sans-serif;
	text-align:left;
	margin-left:30px;
	}
	
	
</style> 

<div id="top_menu_vodx" align="right"><a href="/vodx.php"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/vodx/nouveaute_bouton.gif' ;?>" /></a><a href="/vodx_faq.php"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/vodx/aide_bouton.gif' ;?>" /></a></div>


	<center>
<div class="vodx-round">
    <div class="top"><span></span></div>
    <div class="center-content" align="center">
	
    <p class="text_vodx"><?php echo TEXT_VODX ;?></p>

<div id="prix_vodx">
<div class="bouton_buy_vodx">

<?php
  // remove all the previously created code from the table.
  tep_db_query("delete from shopping_cart where products_type='VOD' and customers_id=".$customers_id);
  
?>

<?php
$droselia_price	 = tep_db_query("select products_id, products_title, products_price from products where products_type='ABO' and products_media='VOD' order by products_price ASC ");
	while ($droselia_price_values = tep_db_fetch_array($droselia_price))
	{
			$class_value = str_replace(' ','_',$droselia_price_values['products_title']);
	 		echo "<a href='/vod_code_process.php?offer_id=".$droselia_price_values['products_id']."' class='btn_vodx'>
						<img src='".DIR_WS_IMAGES_LANGUAGES . $language."/images/vodx/buy.gif' border ='0' t/></a>";
	}
?>
</div>
</div>
<div class="footer_prix_vodx">
<?php echo TEXT_VODX_FOOTER ;?>
</div>

  </div>
    <div class="bottom"><span></span></div>
</div>

</center>

