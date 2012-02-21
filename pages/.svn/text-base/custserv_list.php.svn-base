<table width="731" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan=2 height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
    <td  height="6"  valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.gif" width="731" height="6"></div></td>
  </tr>
  <?php
  	//echo  '<tr><td align="left" class="SLOGAN_DETAIL">'.TEXT_PHONE_PROBLEM.'</td></tr>';
  ?>
  <tr>
    <td  class="SLOGAN_DETAIL"> <br>
        <?php  echo INTRO; ?> </td>
  </tr>
  	<td align="center" class="SLOGAN_DETAIL">
  		<br>
    	<a href="custserv.php"><img border=0 src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language;?>/images/buttons/custserv_question.gif"></a>
  	    <br><br>
	</td>
  </tr>
  <tr>
    <td align="center" class="SLOGAN_DETAIL"><table width="731" border="0" cellspacing="0" cellpadding="0">
      <tr align="center">
        <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom3.gif" width="14" height="35"></td>
        <td width="100"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border" ><B class="TYPO_STD_BLACK">ID</B></td>
        <td width="342"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border"><B class="TYPO_STD_BLACK"><?php  echo TEXT_CS_CAT; ?></B></td>
        <td width="100"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border"><B class="TYPO_STD_BLACK"><?php  echo TEXT_CS_DATE; ?></B></td>
        <td width="80"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border"><B class="TYPO_STD_BLACK"><?php  echo TEXT_CS_ANSWER; ?></B></td>
        <td width="80"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif"><B class="TYPO_STD_BLACK"><?php  echo TEXT_CS_DETAIL; ?></B></td>
        <td width="14" ><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom3.gif" width="14" height="35"></td>
      </tr>
      <tr>
        <td  rowspan="2"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
		<td colspan="5" bgcolor="#FFFFFF"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="10"></td>
		<td  rowspan="2"background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
      </tr>
      <tr>
	  	<TD colspan="5" bgcolor="#FFFFFF">
			<table width="100%">
	          	<?php 
				$custserv_query = tep_db_query("select * from " . TABLE_CUSTSERV . " c left join products p on p.products_id = c.products_id where customers_id = '" . $customer_id . "' order by custserv_id desc ");
	
				//echo "select * from " . TABLE_CUSTSERV . " c left join products p on p.products_id = c.products_id where customers_id = '" . $customer_id . "' order by custserv_id desc ";
				while ($custserv = tep_db_fetch_array($custserv_query)){
					echo '<tr align="center">';	           
					echo '<td width="100">';
					echo '<a class="red_slogan" href="custserv_detail.php?custserv_id=' . $custserv['custserv_id'] . '"><u>' . $custserv['custserv_id'] . '</u></a>';	           
					echo '</td>';	           
					echo '<td align="left" class="SLOGAN_BLACK" width="345">';
					$custserv_cat_query = tep_db_query("select * from " . TABLE_CUSTSERV_CAT . " where custserv_cat_id = '" . $custserv['custserv_cat_id'] . "' and language_id = '" . $languages_id . "' ");
					$custserv_cat_values = tep_db_fetch_array($custserv_cat_query);
					echo '<b>' . $custserv_cat_values['custserv_cat_name'] . '</b>';		
					echo ' : ';
					echo $custserv['subject'];
					$tableSuffix = '';
					if ($custserv['products-type']=='DVD_ADULT') {
					    $tableSuffix='_adult';
					}
					//BEN001 $products_query = tep_db_query("select * from products_description" . $tableSuffix . " where products_id = '" . $custserv['products_id'] . "' and language_id = '" . $languages_id . "' ");
					$products_query = tep_db_query("select * from products_description where products_id = '" . $custserv['products_id'] . "' and language_id = '" . $languages_id . "' "); //BEN001
					$products_values = tep_db_fetch_array($products_query);						
					echo $products_values['products_name'];		
					echo '</td>';	           
					echo '<td class="SLOGAN_BLACK" width="131">';
					echo tep_date_short($custserv['customer_date']);
					echo '</td>';	           
					echo '<td class="SLOGAN_BLACK" width="80">';
					if (strlen($custserv['admindate'])>1){
					echo '<img src="' . DIR_WS_IMAGES . '/checkcustserv.gif">';	  
					}		 
					echo '</td>';	           
					echo '<td class="SLOGAN_BLACK" width="80">';
					echo '<a class="red_slogan" href="custserv_detail.php?custserv_id=' . $custserv['custserv_id'] . '" ><img src="' . DIR_WS_IMAGES . '/detailcustserv.gif" bordercolor="white" border="0"></a>';
					echo '</td>';	           
					echo '</tr>';	           
				} 	
        	?>
			</table>
		</TD>
      </tr>
      <tr>
        <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
        <td colspan="5" background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
        <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
      </tr>
    </table>
	<?php  
	$emails_q = tep_db_query("select count(customers_id) as count from emails where customers_id = '" . $customer_id . "' and date_sent > '2005-08-01' order by emails_id desc ");
	$email = tep_db_fetch_array($emails_q);
	if ($email['count']>0){
	  ?><br><br>	
	  <p><u><?php  echo TEXT_MAIL_SENT_TO_DVDPOST;?></u></p>
	  <table width="764" border="0" cellspacing="0" cellpadding="0">
        <tr align="center">
          <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom2.gif" width="14" height="25"></td>
          <td width="100"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border" ><B class="TYPO_STD_BLACK">ID</B></td>
          <td width="345"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border"><B class="TYPO_STD_BLACK"><?php  echo ' '//TEXT_EMAILS_SUBJECT; ?></B></td>
          <td width="131"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border"><B class="TYPO_STD_BLACK"><?php  echo TEXT_CS_DATE; ?></B></td>
          <td width="80"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border"><B class="TYPO_STD_BLACK"><?php  echo TEXT_CS_ANSWER; ?></B></td>
          <td width="80"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif"><B class="TYPO_STD_BLACK"><?php  echo TEXT_CS_DETAIL; ?></B></td>
          <td width="14" ><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom2.gif" width="14" height="25"></td>
        </tr>
        <tr>
          <td  rowspan="2"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
          <td colspan="5"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="10"></td>
          <td  rowspan="2"background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
        </tr>
        <tr>
          <TD colspan="5"><table width="100%">
<?php 
				$emails_query = tep_db_query("select * from emails where customers_id = '" . $customer_id . "' and date_sent > '2005-08-01' order by emails_id desc ");
				
				while ($emails = tep_db_fetch_array($emails_query)){
					echo '<tr >';	           
					echo '<td class="SLOGAN_BLACK">';
					echo '<a class="red_slogan" href="emails_detail.php?emails_id=' . $emails['emails_id'] . '"><u>' . $emails['emails_id'] . '</u></a>';	           
					echo '</td>';	           
					echo '<td class="SLOGAN_BLACK">';
					echo $emails['subject'];
					echo '</td>';	           
					echo '<td class="SLOGAN_BLACK">';
					echo tep_date_short($emails['date_sent']);
					echo '</td>';	           
					echo '<td class="SLOGAN_BLACK" align=center>';
					if (strlen($emails['admindate'])>1){
					echo '<img src="' . DIR_WS_IMAGES . '/checkcustserv.gif">';	  
					}		 
					echo '</td>';	           
					echo '<td class="SLOGAN_BLACK"  align=center>';
					echo '<a class="red_slogan" href="emails_detail.php?emails_id=' . $emails['emails_id'] . '" ><img src="' . DIR_WS_IMAGES . '/detailcustserv.gif" bordercolor="white" border="0"></a>';
					echo '</td>';	           
					echo '</tr>';	           
				} 	
        	?>
          </table></TD>
        </tr>
        <tr>
          <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
          <td colspan="5" background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
          <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
        </tr>
      </table>
	  <?php  } ?>
	</td>
  </tr>
</table>
<br><br>

