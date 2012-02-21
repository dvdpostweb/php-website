<?php 
switch ($current_page_name) {
		   case 'subscription_change2.php':
			   $class= 'SLOGAN_DETAIL';
			   break ;	
		   default:
			   $class= 'formula_desc';
			   break;
	   }
	   
	   
		$products_abo_query = tep_db_query("select * from products_abo where products_id = " . $HTTP_GET_VARS['products_id']);
		$products_abo = tep_db_fetch_array($products_abo_query);
		$DVD_at_home= $products_abo['qty_at_home'];
		$DVD_credit= $products_abo['qty_credit'];
		
		$products_abo_name_query = tep_db_query("select  products_name,  products_image_big  from products_description where products_id = " . $HTTP_GET_VARS['products_id']." AND  language_id=".$languages_id);
		$products_abo_name = tep_db_fetch_array($products_abo_name_query);
		$bgcolor=$products_abo_name['products_image_big'];
?>

<table width="109" height="129" align="center" cellpadding="0" cellspacing="0" bgcolor="#E3E3E3" class="<?php  echo $class ;?>">
        <tr>
          <td width="109" height="32" align="center" valign="middle" bgcolor="#<?php  echo $bgcolor;?>" class="TYPO_BLANC_IT"><?php  echo $products_abo_name['products_name'] ;?></td>
        </tr>
        <tr>
          <td height="27" align="center" valign="middle" bgcolor="<?php  echo $bgcolor;?>"><img src="<?php  echo DIR_WS_IMAGES;?>prepay/<?php echo $DVD_at_home;?>.png" width="93" height="27"></td>
        </tr>
        <tr>
          <td align="center" valign="middle" bgcolor="<?php  echo $bgcolor;?>">
			<span class="TYPO_BLANC_IT">
			<?php  
				echo $DVD_at_home.' ';
				if ($DVD_at_home>1){
					echo TEXT_DVD ;
				}else{
					echo 'DVD' ;
				}
			?>
			</span><br>
            <span  class="formula_desc_blanc">
				<?php  echo TEXT_AT_HOME;?>
				<br>
				<?php 
				if ($DVD_credit>0){
					echo $DVD_credit.' '.TEXT_PER_MONTH;
				}else{
					echo TEXT_ABO_UNLIMITED ;
				}
				?>
			</span></td>
        </tr>
</table>
