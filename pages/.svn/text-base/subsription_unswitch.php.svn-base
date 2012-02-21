<?php 
$product_info_sql ='SELECT p.products_id FROM products p ';
$product_info_sql .='LEFT JOIN customers c ON c.customers_abo_type = p.products_id WHERE c.customers_id ='.$customer_id ;
$product_info = tep_db_query($product_info_sql);
$product_info_values = tep_db_fetch_array($product_info);

//preserve actual membership
tep_db_query("update customers set customers_next_abo_type  = ".$product_info_values['products_id']." where customers_id = '" . $customer_id . "'");
//SELECT products_id FROM products WHERE products_id >16 AND products_type = 'ABO' AND products_id NOT LIKE 20 
?>
	
<table width="677" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="left"> 
    <td colspan="3" height="50" valign="bottom" class="limitedexplain">&nbsp;</td>
  </tr>
  <tr> 
    <td width="169" rowspan="6" align="left" valign="middle" class="limitedexplain"> 
		
		<?php 
		$products_abo_query = tep_db_query("select * from products_abo where products_id = " . $product_info_values['products_id']);
		$products_abo = tep_db_fetch_array($products_abo_query);
		$DVD_at_home= $products_abo['qty_at_home'];
		$DVD_credit= $products_abo['qty_credit'];
		
		$products_abo_name_query = tep_db_query("select  products_name,  products_image_big  from products_description where products_id = " . $product_info_values['products_id']." AND  language_id=".$languages_id);
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
		
		
		
	
	</td>
    <td width="24" rowspan="3" align="left" valign="middle">&nbsp;</td>
    <td width="484" height="20" class="limitedathome">&nbsp;</td>
  </tr>
  <tr> 
    <td height="142" class="limitedathome" valign="middle"> 
      	<span class="limitedexplain" ><strong><?php  echo TEXT_YOUR_ACTUAL_FORMULA ;?></strong></span><br><br>
        <?php  
      	echo TEXT_PRESERVE_EXPLAIN ;					
		?>
      	<br><br>
      	<a href="mydvdpost.php" class="infolink"><?php  echo TEXT_CONTINUE ;?></a> </td>
  </tr>
</table>
<br><br>
<table width="677" height="100" border="0" cellpadding="0" align="center" cellspacing="0" bgcolor="#D7E4F4">
	        <tr align="center" valign="middle"> 
	          <td width="26" height="110"></td>
	          <td width="52"><img src="<?php  echo DIR_WS_IMAGES ;?>info_question.gif" width="52" height="52"></td>
	          <td width="247" height="100" align="center"> <table width="80%" border="0" cellspacing="0" cellpadding="0">
	              <tr> 
	                <td height="22" valign="middle" class="infotitle"><?php  echo TEXT_INFO_TITLE1 ;?></td>
	              </tr>
	              <tr> 
	                <td height="20"><a href="mydvdpost.php" class="infolink"><?php  echo TEXT_INFO_LINK1 ;?></a></td>
	              </tr>
	              <tr> 
	                <td height="20"><a href="how.php" class="infolink"><?php  echo TEXT_INFO_LINK2 ;?></a></td>
	              </tr>
	              <tr> 
	                <td height="20"><a href="faq.php" class="infolink"><?php  echo TEXT_INFO_LINK3 ;?></a></td>
	              </tr>
	            </table></td>
	          <td width="53"><img src="<?php  echo DIR_WS_IMAGES ;?>info_line.gif" width="2" height="85"></td>
	          <td width="52"><img src="<?php  echo DIR_WS_IMAGES ;?>info_phone.gif" width="52" height="52"></td>
	          <td width="247" align="center"><table width="80%" border="0" cellspacing="0" cellpadding="0">
	              <tr> 
	                <td height="22" valign="top" class="infotitle"><?php  echo TEXT_INFO_TITLE2 ;?></td>
	              </tr>
	              <tr> 
	                <td class="infotext"><?php  echo TEXT_INFO_PHONE ;?> 
	                <td> </tr>
	              <tr> 
	                <td height="20" class="infotext"><?php  echo TEXT_INFO_MAIL ;?></td>
	              </tr>
	            </table></td>
	        </tr>
	      </table>
