<?php   
//BEN001 $countwl_query = tep_db_query("select count(wl_id) as countwl from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' ");
$countwl_query = tep_db_query("select count(wl_id) as countwl from wishlist w
join products p on p.products_id = w.product_id where customers_id = ".$customer_id." and wishlist_type = 'DVD_NORM' and products_status != -1; "); //BEN001
$countwl = tep_db_fetch_array($countwl_query);
$abo_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id='" . $customer_id . "'");
$abo = tep_db_fetch_array($abo_query);
if ($countwl['countwl'] < 20){
	?>
	
	<style type="text/css">
	<!--
	.wishlist_banner_title {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 16px;
		font-style: normal;
		font-weight: bold;
		color: #FFFFFF;
		padding-right: 25px;
		padding-left: 25px;
	}
	.wishlist_banner_text {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		font-style: normal;
		color: #FFFFFF;
		padding-right: 25px;
		padding-left: 25px;
	}
	-->
	</style>
	<br>
	
	<table border="0" width="761" cellspacing="0" cellpadding="0" align="center">
	  <tr>
	    <td><img src="<?php    echo DIR_WS_IMAGES;?>wishlist/banner_wishlist_top.gif"></td>
	  </tr>
	  <tr>
	    <td height="212" background="<?php    echo DIR_WS_IMAGES;?>wishlist/banner_wishlist_bckg.gif">
			
	    	<p class="wishlist_banner_title">
	    		<?php 
	    			if ($countwl['countwl'] < 6){ 
		    			echo TEXT_WISHLIST_MIN6 ; 
		    		}else{
			    		$wishlist_explain_title=TEXT_WISHLIST_MIN20;
			    		$wishlist_explain_title = str_replace('µµµnameµµµ',  $abo['customers_firstname'] , $wishlist_explain_title);
			    		echo $wishlist_explain_title ;
			    	}
			    ?>
	    		</p>
	    		<?php    
	    			if ($countwl['countwl'] < 6){ 
		    			echo TEXT_WISHLIST_EXPLAIN_MIN6 ; 
		    		}else{
			    		$wishlist_explain_it=TEXT_WISHLIST_EXPLAIN_MIN20;
			    		$wishlist_explain_it = str_replace('µµµcountµµµ',  $countwl['countwl'] , $wishlist_explain_it);
			    		echo $wishlist_explain_it ;
			    	}
			    ?>
		</td>
	  </tr>
	  <tr>
	    <td><img src="<?php    echo DIR_WS_IMAGES;?>wishlist/banner_wishlist_bottom.gif"></td>
	  </tr>
	</table>
<?php   	
	}
?>

<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="middle" height="40" class="TYPO_ROUGE_ITALIQUE"><?php    echo HEADING_TITLE; ?></td>    
  </tr>
  <tr>
    <td  height="15" valign="middle"><div align="center"><img src="<?php    echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="6"></div></td>
  </tr>
  
  <?php    
  include('includes/functions/isAdult.php'); //BEN001
  if ($w_faq==1){
	echo '<tr><td  valign="middle" height="30" align="left" class="TYPO_STD_GREY"><u><b>'.TEXT_WISHLIST2_FAQ_Q1.'</b></u></td></tr>';
	echo '<tr><td>'. TEXT_WISHLIST2_FAQ_R1 .'</td></tr>';
  }
  else {
  echo '<tr><td  valign="middle" height="30" align="left"><a href="mywishlist.php?w_faq=1" class="dvdpost_recom"><u>'.TEXT_WISHLIST2_FAQ_Q1.'</u></a></td></tr>';
  } 
  if ($w_faq==7){
	echo '<tr><td  valign="middle" height="30" align="left" class="TYPO_STD_GREY"><u><b>'.TEXT_WISHLIST2_FAQ_Q7.'</b></u></td></tr>';
	echo '<tr><td>'. TEXT_WISHLIST2_FAQ_R7 .'</td></tr>';
  }
  else {
  echo '<tr><td  valign="middle" height="30" align="left"><a href="mywishlist.php?w_faq=7" class="dvdpost_recom"><u>'.TEXT_WISHLIST2_FAQ_Q7.'</u></a></td></tr>';
  } 
  if ($w_faq==2){
	echo '<tr><td  valign="middle" height="30" align="left" class="TYPO_STD_GREY"><u><b>'.TEXT_WISHLIST2_FAQ_Q2.'</b></u><img src="'.DIR_WS_IMAGES.'wish_exp.gif" border="0" align="absmiddle"></td></tr>';
	echo '<tr><td>'. TEXT_WISHLIST2_FAQ_R2 .'</td></tr>';
  }
  else {
  echo '<tr><td  valign="middle" height="30" align="left"><a href="mywishlist.php?w_faq=2" class="dvdpost_recom"><u>'.TEXT_WISHLIST2_FAQ_Q2.'</u><img src="'.DIR_WS_IMAGES.'wish_exp.gif" border="0" align="absmiddle"></a></td></tr>';
  }  
  if ($w_faq==4){
	echo '<tr><td  valign="middle" height="30" align="left" class="TYPO_STD_GREY"><u><b>'.TEXT_WISHLIST2_FAQ_Q4.'</b></td></tr>';
	echo '<tr><td>'. TEXT_WISHLIST2_FAQ_R4 .'</td></tr>';
  }
  else {
  echo '<tr><td  valign="middle" height="30" align="left"><a href="mywishlist.php?w_faq=4" class="dvdpost_recom"><u>'.TEXT_WISHLIST2_FAQ_Q4.'</u></a></td></tr>';
  }
  if ($w_faq==5){
	echo '<tr><td  valign="middle" height="30" align="left" class="TYPO_STD_GREY"><u><b>'.TEXT_WISHLIST2_FAQ_Q5.'</b></td></tr>';
	echo '<tr><td>'. TEXT_WISHLIST2_FAQ_R5 .'</td></tr>';
  }
  else {
  echo '<tr><td  valign="middle" height="30" align="left"><a href="mywishlist.php?w_faq=5" class="dvdpost_recom"><u>'.TEXT_WISHLIST2_FAQ_Q5.'</u></a></td></tr>';
  }
  if ($w_faq==6){
	echo '<tr><td  valign="middle" height="30" align="left" class="TYPO_STD_GREY"><u><b>'.TEXT_WISHLIST2_FAQ_Q6.'</b></td></tr>';
	echo '<tr><td>'. TEXT_WISHLIST2_FAQ_R6 .'</td></tr>';
  }
  else {
  echo '<tr><td  valign="middle" height="30" align="left"><a href="mywishlist.php?w_faq=6" class="dvdpost_recom"><u>'.TEXT_WISHLIST2_FAQ_Q6.'</u></a></td></tr>';
  }   
  ?>
  <tr>
    <td  height="15" valign="middle"><div align="center"><img src="<?php    echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="3"></div></td>
  </tr>
</table>
<br>
<?php   
//remove pas utilisé
//$aboname_query = tep_db_query("select * from products_description where products_id='" . $abo['customers_abo_type'] . "' and language_id = '" . $languages_id . "'");
//$aboname = tep_db_fetch_array($aboname_query);
if ($abo['customers_abo'] == 0) {
    if ($abo['customers_abo_payment_method'] == 14 and $abo['offline_payment_status']<2) {
	    $dnv_payinfo = tep_db_query("select *  from dnv_payment where customers_id = '" . $customer_id . "' and status = 1");
		$dnv_payinfo_values = tep_db_fetch_array($dnv_payinfo);
	  	echo '<div class="SLOGAN_DETAIL">' . TEXT_DNV_PENDING . '</div><br>'; 
	}else{
	  //echo '<div class="SLOGAN_DETAIL">&nbsp;'. TEXT_NOABO .'</div><br>';
	  echo '<div class="SLOGAN_DETAIL">&nbsp;</div><br>';
	  $show_kiala=0;
    }
}
else {$show_kiala=1;}
?>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="bottom">
			<li class="SLOGAN_DETAIL">
				<?php    echo TEXT_NBR_DVD_HOME1 . ($abo['customers_abo_dvd_home_norm'] + $abo['customers_abo_dvd_home_adult']) . TEXT_NBR_DVD_HOME2; ?>
			</li>		
		  <li class="SLOGAN_DETAIL"><?php    echo TEXT_WLCOUNTA . $countwl['countwl'] . TEXT_WLCOUNTB; ?></li>
		  <li class="SLOGAN_DETAIL"><a class="red_slogan" href="myrentals.php"><?php    echo TEXT_SEE_RENTALS ?></a></li>
	</td>    
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
</table>

<?php   
  	if ($abo['customers_abo_dvd_home_norm'] + $abo['customers_abo_dvd_home_adult']>0) {
  ?>  
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="14"><img src="<?php    echo DIR_WS_IMAGES;?>img_recom/top_left_recom2.gif" width="14" height="25"></td>
      <td width="368" align="left"   background="<?php    echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border" >
	  	<B class="TYPO_STD_BLACK"><?php    echo TEXT_TITLE; ?></B>
	  </td>
	 <td width="26" align="center"   background="<?php    echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
		<B class="TYPO_STD_BLACK">&nbsp;</B>
	</td>
      <td width="97" align="center"   background="<?php    echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
	  	<B class="TYPO_STD_BLACK"><?php    echo TEXT_STATUS; ?></B>
	 </td>
      <td width="123" align="center"   background="<?php    echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif">
	  	<B class="TYPO_STD_BLACK"><?php    echo TEXT_DATE_SHIPPED; ?></B>
	</td>
      <td width="122" align="center" background="<?php    echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif">
		<img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="1">
	  </td>
      <td width="14" ><img src="<?php    echo DIR_WS_IMAGES;?>img_recom/top_right_recom2.gif" width="14" height="25"></td>
    </tr>
	<tr>
	<?php   

	  $dvdout_query = tep_db_query("select pd.products_name,products_media, op.products_id, o.orders_status, o.last_modified from orders o LEFT JOIN orders_products op on o.orders_id=op.orders_id LEFT JOIN products_description pd on op.products_id = pd.products_id and pd.language_id=" . $languages_id . " LEFT JOIN products p on pd.products_id=p.products_id where o.orders_id = op.orders_id and o.customers_id = " . $customer_id . " and o.orders_status in (1,2)   and op.products_id>49 order by o.orders_status"); //BEN001
	  $i=1;	
	  while ($dvdout = tep_db_fetch_array($dvdout_query)) {
		if ($i % 2 ==0){$bcolor='#F2F2F2'; }
		else {$bcolor='#FFFFFF'; }
		?>			
		<tr>
			<td height="30" width="14" background="<?php    echo DIR_WS_IMAGES.'img_recom/left_line_recom_transpa.gif';?>" bgcolor="<?php    echo $bcolor;?>">
					<img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="14">
			</td>
			<td width="368" class="slogan_detail" bgcolor="<?php    echo $bcolor;?>">
				<?php   
					if(empty($dvdout['products_media']))
						$dvdout['products_media']='DVD';
					if (SITE_IS_ADULT) {
						echo '<a class="basiclink" href="product_info.php?products_id=' . $dvdout['products_id'] . '">' . $dvdout['products_name'] . '</a>';	              
					}else{
						//BEN001 if ($dvdout['products_id']>9999){
						if (isAdult($dvdout['products_id'])){ //BEN001
							echo TEXT_TITEL_DVDXPOST;
						}else{
							echo '<a class="basiclink" href="product_info.php?products_id=' . $dvdout['products_id'] . '"><b>' . $dvdout['products_name'] . '</b></a>';
						}
					}
					//echo ($dvdout['products_id']>9999)? TEXT_TITEL_DVDXPOST : '<a href="product_info.php?products_id=' . $dvdout['products_id'] . '">' . $dvdout['products_name'] . '</a>';
				?>
			</td>
			<td class="slogan_detail" bgcolor="<?php    echo $bcolor;?>">
				<?= '<img src="'.DIR_WS_IMAGES.'canvas/'.$dvdout['products_media'].'.png" border="0" align="absmiddle" alt="'.strtolower($dvdout['products_media']).'" title="'.strtolower($dvdout['products_media']).'" width="26">'; ?>
			</td>
			<td width="123" align="center" class="slogan_detail" bgcolor="<?php    echo $bcolor;?>">
			  <?php   
				switch ($dvdout['orders_status']){
				  case 1:
					echo TEXT_STATUS_RFE;
				  break;
				  case 2:
					echo TEXT_STATUS_EXP;
				  break;
				  case 12:
					case 17:
					echo '<a class="red_slogan" href="custserdvdfinallyarrived.php">'.TEXT_FINALLY_ARRIVED.'</a>';
				  break;
				}
				?>
			</td>
			<td width="123" align="center" class="slogan_detail" bgcolor="<?php    echo $bcolor;?>">
				<?php   
				switch ($dvdout['orders_status']){
				  case 1:
					echo "&nbsp;";
				  break;
				  case 2:
					echo $dvdout['last_modified'];
				  break;
					case 12:
					case 17:
					
					echo "&nbsp;";
				  break;
				}
			   ?>
			</td>							  
			<td width="122" align="center" class="slogan_detail" bgcolor="<?php    echo $bcolor;?>">
				<a class="red_basiclink" href="custserproblemdvd.php"><?php    echo TEXT_REPORT_PROBLEM; ?></a>
			</td>
			<td width="14" background="<?php    echo DIR_WS_IMAGES.'img_recom/right_line_recom_transpa.gif';?>" bgcolor="<?php    echo $bcolor;?>">
				<img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="14">
			</td>
		</tr>				
		<?php   
		$i++;
		} // end while
		?>
	<tr>
      <td><img src="<?php    echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
      <td colspan="5" height="14" background="<?php    echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
      <td><img src="<?php    echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
    </tr>
	<tr>
    <td  colspan="7" align="center" height="35">&nbsp;</td>
  </tr>
</table>
<?php   
            } // end if
?>
</div>
<?php   
if ($countwl['countwl']>0) {
	echo '<p class="TYPO_STD_GREY"><font color="red"><b>'.TEXT_EXP_HIG_MED_LOW.'</b></font></p>';
	echo '	<form name="form1" action="mywishlistupdate3.php" method="post">
	  		<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
			  <tr>
				<td colspan="6" align="right" valign="middle" height="40">
					<input name="submit" type="image" src="'.DIR_WS_IMAGES_LANGUAGES . $language.'/images/buttons/list_update_w2.gif" align="middle" border="0">
				</td>
			  </tr>';
	wishlist_form($language,$languages_id,$customer_id);
	echo '<tr><td colspan="7" class="TYPO_STD_BLACK_15"><br />'.TEXT_NEXT.'<br /><br /></td></tr>';
	wishlist_form($language,$languages_id,$customer_id,'next');
	//wishlist_form('next');
  echo '	<tr>
		<td colspan="7" align="right" valign="middle" height="40">
			<input name="submit" type="image" src="'.DIR_WS_IMAGES_LANGUAGES . $language.'/images/buttons/list_update_w2.gif" align="middle" border="0">
		</td>
	</tr></table></form>';
    
   
}
else {
	?>
	<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr >
			<td align="center" width="14">
				<br>
				<a href="mydvdpost.php"><img src="<?php   echo DIR_WS_IMAGES_LANGUAGES . $language;?>/images/buttons/add_a_dvd_in_wl.gif" border="0"></a>
				<br>
			</td>
		</tr>
	</table>
	<?php   
}


?>