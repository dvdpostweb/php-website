<?php   
	
	$most_popular_sql ="SELECT count(customers_abo_type) as cpt FROM customers WHERE customers_id='".$customers_id."' and  customers_abo_type=".$abo_passive_values['products_id']."  " ;

	$most_popular_query = tep_db_query($most_popular_sql);
	$most_popular_values = tep_db_fetch_array($most_popular_query);
	if($abo_passive_values['products_id']<$abo_active_values['products_id'] && $customer_locked_values['locked']==1)
		$option='disabled';
	else
		$option="enabled";
	if ($abo_next_active_values['products_id']==$abo_passive_values['products_id']){
		$bgcolor="#FEF7DF";
		$selected="checked";	
	}else{
		//echo $free_upgrade;
		if ($free_upgrade==1 ){
			$bgcolor="#FEF7DF";
			$free_upgrade=0;	
			$selected="checked";
			if($customer_locked_values['locked']==0)
				$explain='<b>>>>> FREE UPGRADE <<<<</b>';
		}else{
			$explain='';
			if ($most_popular_values['cpt']>0){
			//div choser
			$free_upgrade=1;
				
			}else{
				//div choser
				$bgcolor='#FFFFFF';	
				$selected="";	
				}
		}
	}
	
if ($most_popular_values['cpt']==0  ){
	if ($bgcolor!="#FEF7DF" ){
	?>
	<tr>
	<td bgcolor="<?php  echo $bgcolor ;?>" class="step90_table_top" width="150" ><img src="<?php  echo DIR_WS_IMAGES.'canvas/step/90/dvd'.$abo_passive_values['qty_credit'].'.gif'?>"></td>
	<td bgcolor="<?php  echo $bgcolor ;?>" class="step90_table_top" width="50" align="center" valign="middle"><span class="step90_DVD"><?php  echo $abo_passive_values['qty_credit'] ;?></span></td>
	<td bgcolor="<?php  echo $bgcolor ;?>" class="step90_table_top" width="140">
		<div id="step90_price">€<?php  echo $abo_passive_values['products_price'] ;?></div>
		<div class="step90_DVD_per_month"><?php  echo TEXT_DVD_PER_MONTH ;?></div>
		<div class="step90_DVD_shipped">
			<?php 
				$send_at_home= TEXT_DVD_SENT_AT_HOME2 ;
				$send_at_home=str_replace('µµµcountµµµ',  $abo_passive_values['qty_at_home'] , $send_at_home);
				echo $send_at_home;
			?>
		</div>
		
	</td>
	<td bgcolor="<?php  echo $bgcolor ;?>" class="step90_table_top_left" width="40" align="center">
		<?php if( $option=='disabled') {?>
			<input type="radio" name="products_id" DISABLED='DISABLED'>
		<?php } else {?>
			<input type="radio" name="products_id" value="<?php  echo $abo_passive_values['products_id'];?>" <?php  echo $selected ;?>>
		<?php }?>
	</td>
	</tr>
	<?php  
	}else{
	?>
	<tr>
	<td bgcolor="<?php  echo $bgcolor ;?>" class="step90_table_top" width="150"><img src="<?php  echo DIR_WS_IMAGES.'canvas/step/90/dvd'.$abo_passive_values['qty_credit'].'.gif'?>"></td>
	<td bgcolor="<?php  echo $bgcolor ;?>" class="step90_table_top" width="50" align="center" valign="middle"><span class="step90_DVD"><?php  echo $abo_passive_values['qty_credit'] ;?></span></td>
	<td bgcolor="<?php  echo $bgcolor ;?>" class="step90_table_top" width="140">
		<div id="step90_price">€<?php  echo $abo_passive_values['products_price'] ;?></div>
		<div class="step90_DVD_per_month"><?php  echo TEXT_DVD_PER_MONTH ;?></div>
		<div class="step90_DVD_shipped">
			<?php 
				$send_at_home= TEXT_DVD_SENT_AT_HOME2 ;
				$send_at_home=str_replace('µµµcountµµµ',  $abo_passive_values['qty_at_home'] , $send_at_home);
				echo $send_at_home;
			?>
		</div>
		
	</td>
	<td rowspan="2" bgcolor="<?php  echo $bgcolor ;?>" class="step90_table_top_left" width="40" align="center">
		<input type="radio" name="products_id" value="<?php  echo $abo_passive_values['products_id'];?>" <?php  echo $selected ;?>>
	</td>
	</tr>
	<tr>
	<td bgcolor="<?php  echo $bgcolor ;?>" align="center"  class="free_upgrade" colspan="3" ><?php  echo $explain ;?></td>
	</tr>
	<?php 
	}
}
?>
