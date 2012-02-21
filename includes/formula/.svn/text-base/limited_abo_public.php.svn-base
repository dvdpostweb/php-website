<?php    

$most_popular_sql ="SELECT count(products_id) as cpt FROM products_abo WHERE products_id=".$abo_passive_values['products_id']." AND most_popular_entity LIKE '%".ENTITY_ID."%' " ;
$most_popular_query = tep_db_query($most_popular_sql);
$most_popular_values = tep_db_fetch_array($most_popular_query);



	if ($most_popular_values['cpt']>0){
	//div choser
	$top='formula_focus_top';
	$content='formula_focus_content';
	$bottom='formula_focus_bottom';
	$popular=TEXT_POPULAR2;
	$checked='checked';
		
	}else{
		//div choser
		$top='formula_std_top';
		$content='formula_std_content';
		$bottom='formula_std_bottom';
		$popular='';
		$checked='';		
		}
?>
<td align="center">
	<div id="<?php   echo $top;?>"><?php   echo $popular ;?></div>
	<div id="<?php   echo $content ;?>">
		<div class="dvd_price_per_dvd"><b><?php    echo $abo_passive_values['qty_credit'];?> <?php    echo TEXT_DVDS ;?></b></div>
		<div class="dvd_price_per_month"><?php   echo TEXT_PR_MONTH ;?></div>
		<div class="step_dvd_image"><img src="<?php   echo DIR_WS_IMAGES.'canvas/step/'.$abo_passive_values['qty_credit'].'.gif'?>"></div>
		<div class="dvd_price_per_dvd">
			<?php  
			$price_per_dvd=$abo_passive_values['products_price']/$abo_passive_values['qty_credit'];
			echo '<b>€ '.round($price_per_dvd, 1).'</b>/DVD';
			?>
		</div>
		<div class="dvd_price_per_month">
			<?php  
			$price=str_replace('.',  '<sup class="sup">.' , $abo_passive_values['products_price']);
			echo TEXT_OR.' &euro;'.$price.'</span></sup>';
			?>
		</div>
		<div class="dvd_shipped">
			<?php  
				$send_at_home= TEXT_DVD_SENT_AT_HOME2 ;
				$send_at_home=str_replace('µµµcountµµµ',  $abo_passive_values['qty_at_home'] , $send_at_home);
				echo $send_at_home;
			?>		
		</div>
		<?php    
			if ($_SERVER['PHP_SELF']!="/how.php"){ 
				echo '<input type="radio" name="products_id" value="'.$abo_passive_values['products_id'].'" '.$checked.'>';
	 		}
		?>
	</div>
	<div id="<?php   echo $bottom ;?>"></div>
</td>