

<style>
	
	
	#top_menu_vodx img{
	
		
		padding-right:5px;
		border:0;
	
	
	}
	
	#top_menu_vodx {
	
		padding-top:8px;
		padding-bottom:25px;
	
	
	}
	
	
</style>

<div id="top_menu_vodx" align="right"><a href="/vodx.php"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/vodx/nouveaute_bouton.gif' ;?>" /></a><a href="/vodx_faq.php"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/vodx/aide_bouton.gif' ;?>" /></a></div>

<center>
<div class="vodx-round">
    <div class="top"><span></span></div>
    <div class="center-content">
		<?php
		$offer_id= ((empty($_GET['offer_id']))?'111813':$_GET['offer_id']);
		$droselia_price = tep_db_query("select products_price, 	products_title from products where products_type='ABO' and products_media='VOD' and products_id='".$offer_id."' ");
		$droselia_price_values = tep_db_fetch_array($droselia_price);
		echo TEXT_VALUES;
		
		echo $droselia_price_values['products_title']."<br/>".TEXT_PRICE_ROOT.' '.$droselia_price_values['products_price'].' &euro;</br><br>';
		 

		
		
		
		$ogone_orderID = $customer_id . date('YmdHis');
		$ogone_amount = $droselia_price_values['products_price'] * 100;
		//tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context,  site ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'droselia_credit', '" . WEB_SITE_ID . "')");
		$pspid = OGONE_PSPID;
		$textaliasusage = TEXT_ALIAS_USAGE; 
		echo TEXT_CONFIRM.'<br><br>';
		?> 
					<form action = "ogone_vod_redirect.php" method='get'>
					<input type='hidden' name="offer_id" value ='<?= $offer_id ?>'>
					<?php 
						switch ($languages_id) {
							case '1':
							?>
									<input align="center" type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language; ?>/images/buttons/button_vodx_confirm_buy.gif" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">			
								<?php 
								break;
							case '2':
								?>	
									<input align="center" type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language; ?>/images/buttons/button_vodx_confirm_buy.gif" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">			
								<?php 
								break;
							case '3':
								?>	
									<input align="center" type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language; ?>/images/buttons/button_vodx_confirm_buy.gif" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">			
								<?php 		
								break;
						}
						
						tep_db_query("delete from shopping_cart where customers_id=".$customer_id." AND products_type ='VOD'");
					?>
                    
                    <div class="footer_vodx_ogone"><?php echo TEXT_FOOTER_CONFIRM ;?></div> 
                    
				</form>
    </div>
    <div class="bottom"><span></span></div>
</div>

</center>
