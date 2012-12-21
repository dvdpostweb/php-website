<?php   

$most_popular_sql ="SELECT count(products_id) as cpt FROM products_abo WHERE products_id=".$abo_passive_values['products_id']." AND most_popular_entity LIKE '%".ENTITY_ID."%' " ;
echo $most_popular_sql;
$most_popular_query = tep_db_query($most_popular_sql);
$most_popular_values = tep_db_fetch_array($most_popular_query);



	if ($most_popular_values['cpt']>0){
	//div choser
	$bgcolor="#FEF7DF";
	$selected="checked";
		
	}else{
		//div choser
		$bgcolor='#FFFFFF';	
		$selected="";	
		}
?>
<td bgcolor="<?php  echo $bgcolor ;?>" class="step90_table_top" width="30" align="center" valign="middle">
	<span class="step90_DVD"><?php  echo $abo_passive_values['qty_credit'] ;?></span>
</td>
<td bgcolor="<?php  echo $bgcolor ;?>" class="step90_table_top" width="140">
	<div id="step90_price">€<?php  echo $abo_passive_values['products_price'] ;?></div>
	<div class="step90_DVD_per_month"><?php  echo TEXT_DVD_PER_MONTH ;?></div>
	<div class="step90_DVD_shipped">
		<?= $abo_passive_values['qty_dvd_max'] ? $abo_passive_values['qty_dvd_max'] . ' films '.ALL_FORMATS.' +' : '' ?>
		<?= ($abo_passive_values['qty_credit']-$abo_passive_values['qty_dvd_max']) . " VOD" ?>
	</div>
</td>
<td bgcolor="<?php  echo $bgcolor ;?>" class="step90_table_top_left" width="40" align="center">
	<input type="radio" name="products_id" value="<?php  echo $abo_passive_values['products_id'];?>" <?php  echo $selected ;?>>
</td>