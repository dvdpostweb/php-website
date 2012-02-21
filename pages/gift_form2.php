<style type="text/css">
<!--
.Xmas_black_style {	font-family: Arial, Helvetica, sans-serif;font-size: 13px;}
.Xmas_GREY_style {	font-family: Arial, Helvetica, sans-serif;font-size: 13px; color:#3D3C3C;BORDER-TOP: #000000 1px solid;}
.Xmas_GREY_no_border_style {	font-family: Arial, Helvetica, sans-serif;font-size: 13px; color:#3D3C3C;}



a.Xmas_red_link_style {	font-family: Arial, Helvetica, sans-serif;font-size: 13px; text-decoration:underline; color:#D71A21 ;}

a.Xmas_red2_link_style { font-family: Arial, Helvetica, sans-serif;font-size: 13px; color:#D71A21 ; text-decoration:none;}
a:hover.Xmas_red2_link_style{ text-decoration:underline;}

.Xmas_white_style {
	font-size: 15px;
	font-weight: bold;
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
}
.Xmas_black_32px {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 32px;
}

.Xmas_black_14px {font-family: Arial, Helvetica, sans-serif; font-size: 14px; }

-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<br>
<table width="731"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="500" height="298" rowspan="3" valign="top" background="<?php    echo DIR_WS_IMAGES;?>/txt_recom/bckgd_gift2.gif"><table width="450" border="0" align="right" cellpadding="0" cellspacing="0">
        <tr>
          <td height="40" colspan="4"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="20" height="40"></td>
        </tr>
        <tr>
          <td colspan="4"><span class="Xmas_black_32px"><?php    echo TEXT_XMAS_GIFT ;?></span></td>
        </tr>
        <tr>
          <td colspan="4"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="20" height="10"></td>
        </tr>
        <tr>
          <td width="83">&nbsp;</td>
          <td width="367" height="22" colspan="3"><span class="Xmas_black_14px"><b><?php   echo TEXT_OFFER_MOVIES ; ?></b></span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3" class="Xmas_black_14px"><?php    echo TEXT_U_BUY_IT_S_EASY ;?></td>
        </tr>
    </table></td>
    <td width="11" rowspan="3"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="15" height="8"></td>
    <td width="247" height="148"><p class="Xmas_black_style"><em>&quot;<?php    echo TEXT_SPEAK_ABOUT_GIFT1 ;?>&quot;</em><br>
            <br>
            <b>Sam, <?php    echo TEXT_LIEGE;?> </b></p></td>
  </tr>
  <tr>
    <td height="2" bgcolor="#000000"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="1" height="2"></td>
  </tr>
  <tr>
    <td height="148"><span class="Xmas_black_style"><em>&quot;<?php    echo TEXT_SPEAK_ABOUT_GIFT2 ;?>&quot;</em><br>
          <br>
          <b>Frédérique, Dinant</b></span></td>
  </tr>
</table>
<br />
<table width="731"  border="0" align="center" cellpadding="0" cellspacing="0">
<!--  <tr align="center">
    <td height="60" class="Xmas_black_style" align="center" valign="middle"><b><?php    echo TEXT_ACTIVATE_GIFT_A ;?><a href="mydvdpost.php" class="Xmas_red_link_style"><?php    echo TEXT_ACTIVATE_GIFT_B ;?></a></b></td>
  </tr>-->
  <tr bgcolor="#977D8A">
    <td height="30"><span class="Xmas_white_style"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="10" height="8"><?php    echo TEXT_CHOSE_GIFT_ABO ;?></span></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
  </tr>
  <tr>
    <td>
	<form name="cart_quantity" method="post" action="gift_confirm2.php">	
      <table width="614" border="0" cellspacing="0" cellpadding="0">
      	<?php   
		$abo_passive ='SELECT pa.products_id, p.products_price,p.products_model, pa.qty_credit, pa.qty_at_home, pa.most_popular_entity FROM products p ';
		$abo_passive .="LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_type = 'ABO' AND pa.allowed_public_entity LIKE '%".ENTITY_ID."%' order by pa.qty_credit ASC" ;
		$abo_passive_query = tep_db_query($abo_passive);
		$count=1;
		while ($abo_passive_values = tep_db_fetch_array($abo_passive_query)){
	    	echo '<tr valign="middle" class="Xmas_GREY_no_border_style" >';
			echo '<td width="40" align="center" ><input type="radio" name="products_id" value="'.$abo_passive_values['products_id'].'"></td>';
			echo '<td width="100" height="27"><b>'.$abo_passive_values['products_model'].'</b></td>';
			echo '<td width="142"><B>'.$abo_passive_values['qty_credit'].' </B>'.TEXT_DVD_PER_MONTH.'</td>';
			echo '<td width="172">'.TEXT_GARANTED_RENTALS.'</td>';
			echo '<td width="162"><b>'.$abo_passive_values['products_price'].'&euro;</b> </td>';
			echo '</tr>';
		}
		?>

        <tr>
          <td align="center">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4" align="left" class="Xmas_GREY_no_border_style"><?php    echo TEXT_DURATION_QUESTION ;?><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif">
            <span class="Xmas_GREY_style">
          	<select name="duration" size="1" >
              <option value="1" selected>1 <?php   echo TEXT_MONTH ;?></option>
              <?php   
				//echo '<option value="2">2 '.TEXT_MONTHS.'</option>';
				//echo '<option value="2">3 '.TEXT_MONTHS.'</option>';
				//echo '<option value="2">4 '.TEXT_MONTHS.'</option>';
				//echo '<option value="2">5 '.TEXT_MONTHS.'</option>';
				//echo '<option value="2">6 '.TEXT_MONTHS.'</option>';
				//echo '<option value="2">7 '.TEXT_MONTHS.'</option>';
				//echo '<option value="2">8 '.TEXT_MONTHS.'</option>';
				//echo '<option value="2">9 '.TEXT_MONTHS.'</option>';
				//echo '<option value="2">10 '.TEXT_MONTHS.'</option>';
				//echo '<option value="2">11 '.TEXT_MONTHS.'</option>';
				//echo '<option value="2">12 '.TEXT_MONTHS.'</option>';
			  ?>              
            </select>
			</span></td>
          <td align="center" valign="middle"><input name="imageField" type="image" src="<?php    echo DIR_WS_IMAGES ;?>languages/<?php    echo $language ;?>/images/buttons/button_next2.gif" border="0"></td>
        </tr>
      </table>
    </form>      </td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
  </tr>
  <tr bgcolor="#977D8A">
    <td height="30" class="Xmas_white_style"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="10" height="8"><?php    echo TEXT_GIFT_FAQ ;?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="Xmas_black_style"><div align="justify"><b><?php    echo TEXT_GIFT_FAQ_Q1 ;?></b><br>
      <?php    echo TEXT_GIFT_FAQ_R1; ?>
      <p><b><?php    echo TEXT_GIFT_FAQ_Q2 ;?></b><br>
        <?php    echo TEXT_GIFT_FAQ_R2; ?></p>
      <p><b><?php    echo TEXT_GIFT_FAQ_Q3 ;?></b><br>
        <?php    echo TEXT_GIFT_FAQ_R3; ?></p>
      <p><b><?php    echo TEXT_GIFT_FAQ_Q4 ;?></b><br>
		 <?php    echo TEXT_GIFT_FAQ_R4; ?> </p></div></td>
  </tr>
</table>
<br><br>
