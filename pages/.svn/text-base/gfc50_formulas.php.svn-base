<style type="text/css">
<!--
.redtext {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 18px;
	font-weight: bold;
	color: #c8433a;
}

.text {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #777777;	
}

.minitext {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #777777;	
}

.minitext3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #777777;
	text-decoration: line-through;		
}
.minitext0 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #ffffff;
		
}

.minitext1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #ffffff;
	text-decoration: line-through;	
}

.minitext2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #222222;
	font-weight:bold;
}
.border_price {
border:#777777 solid 1px;
padding-top:10px;
padding-bottom:10px;


}
-->
</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<br>
<table id="Table_01" width="727" height="700" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr> 
    <td height="183" colspan="4"> <img src="<?php  echo DIR_WS_IMAGES.'languages/'.$language ;?>/images/gfc50/GFC_01.jpg" width="727" height="237" alt=""></td>
  </tr>
  <tr> 
    <td height="39" colspan="4"></td>
  </tr>
  <tr> 
    <td width="15" rowspan="2"></td>
    <form action="gfc50_confirm.php" method="post" name="subscription_change">
	<td width="493" rowspan="2" bgcolor="#ffffff"  valign="top" align="center"><br>
      <?php  echo '<span class="redtext" align="center">'. TEXT_CHOSE_FORMULA .'</span>' ;?><br><br>      
      <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="border_price">
        <tr>
          <td height="50" valign="middle" class="text" align="left"><?php  echo TEXT_MEMBERSHIP ;?></td>
          <td height="50" valign="middle" class="text" align="center" width="85"><?php  echo TEXT_FST_MONTH ;?></td>
          <td height="50" valign="middle"class="text" align="center" width="85"><?php  echo TEXT_SCD_MONTH ;?></td>
          
        </tr>
        <tr>
        <?php 
          $abo_next_active ='SELECT pa.products_id, p.products_model, p.products_price FROM products p ';
		  $abo_next_active .='LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_id = 17' ;
		  $abo_next_active_query = tep_db_query($abo_next_active);
		  $abo_next_active_values = tep_db_fetch_array($abo_next_active_query);
				
		  $abo50 = round($abo_next_active_values['products_price']-($abo_next_active_values['products_price']/100)*50, 2);
		  echo '<tr bgcolor="#777777" ><td class="minitext0" align="left" height="40" valign="middle"><input type="radio" name="products_id" value="'.$abo_next_active_values['products_id'].'">'.$abo_next_active_values['products_model'].'   </td>';
		  echo '<td class="minitext1" align="center" width="85">'.$abo_next_active_values['products_price'].'€</td>';
		  echo '<td class="minitext2" align="center" width="85">'.$abo50.'€</td></tr>';
		  
		  $abo_next_active ='SELECT pa.products_id, p.products_model, p.products_price FROM products p ';
		  $abo_next_active .='LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_id = 18' ;
		  $abo_next_active_query = tep_db_query($abo_next_active);
		  $abo_next_active_values = tep_db_fetch_array($abo_next_active_query);
				
		  $abo50 = round($abo_next_active_values['products_price']-($abo_next_active_values['products_price']/100)*50, 2);
		  $abo30 = round($abo_next_active_values['products_price']-($abo_next_active_values['products_price']/100)*30, 2);
		  $abo20 = round($abo_next_active_values['products_price']-($abo_next_active_values['products_price']/100)*20, 2);
		  echo '<tr><td class="minitext" align="left" height="40" valign="middle"><input type="radio" name="products_id" checked value="'.$abo_next_active_values['products_id'].'">'.$abo_next_active_values['products_model'].'   </td>';
		  echo '<td class="minitext3" align="center" width="85">'.$abo_next_active_values['products_price'].'€</td>';
		  echo '<td class="minitext2" align="center" width="85">'.$abo50.'€</td></tr>';
		  
		  $abo_next_active ='SELECT pa.products_id, p.products_model, p.products_price FROM products p ';
		  $abo_next_active .='LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_id = 20' ;
		  $abo_next_active_query = tep_db_query($abo_next_active);
		  $abo_next_active_values = tep_db_fetch_array($abo_next_active_query);
				
		  $abo50 = round($abo_next_active_values['products_price']-($abo_next_active_values['products_price']/100)*50, 2);
		  $abo30 = round($abo_next_active_values['products_price']-($abo_next_active_values['products_price']/100)*30, 2);
		  $abo20 = round($abo_next_active_values['products_price']-($abo_next_active_values['products_price']/100)*20, 2);
		  echo '<tr bgcolor="#777777"><td class="minitext0" align="left" height="40" valign="middle"><input type="radio" name="products_id" value="'.$abo_next_active_values['products_id'].'">'.$abo_next_active_values['products_model'].'   </td>';
		  echo '<td class="minitext1" align="center" width="85">'.$abo_next_active_values['products_price'].'€</td>';
		  echo '<td class="minitext2" align="center" width="85">'.$abo50.'€</td></tr>';
		  
		  $abo_next_active ='SELECT pa.products_id, p.products_model, p.products_price FROM products p ';
		  $abo_next_active .='LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_id = 22' ;
		  $abo_next_active_query = tep_db_query($abo_next_active);
		  $abo_next_active_values = tep_db_fetch_array($abo_next_active_query);
				
		  $abo50 = round($abo_next_active_values['products_price']-($abo_next_active_values['products_price']/100)*50, 2);
		  $abo30 = round($abo_next_active_values['products_price']-($abo_next_active_values['products_price']/100)*30, 2);
		  $abo20 = round($abo_next_active_values['products_price']-($abo_next_active_values['products_price']/100)*20, 2);
		  echo '<tr><td class="minitext" align="left" height="40" valign="middle"><input type="radio" name="products_id" value="'.$abo_next_active_values['products_id'].'">'.$abo_next_active_values['products_model'].'   </td>';
		  echo '<td class="minitext3" align="center" width="85">'.$abo_next_active_values['products_price'].'€</td>';
		  echo '<td class="minitext2" align="center" width="85">'.$abo50.'€</td></tr>';
		  
		  $abo_next_active ='SELECT pa.products_id, p.products_model, p.products_price FROM products p ';
		  $abo_next_active .='LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_id = 24' ;
		  $abo_next_active_query = tep_db_query($abo_next_active);
		  $abo_next_active_values = tep_db_fetch_array($abo_next_active_query);
				
		  $abo50 = round($abo_next_active_values['products_price']-($abo_next_active_values['products_price']/100)*50, 2);
		  $abo30 = round($abo_next_active_values['products_price']-($abo_next_active_values['products_price']/100)*30, 2);
		  $abo20 = round($abo_next_active_values['products_price']-($abo_next_active_values['products_price']/100)*20, 2);
		  echo '<tr bgcolor="#777777"><td class="minitext0" align="left" height="40" valign="middle"><input type="radio" name="products_id" value="'.$abo_next_active_values['products_id'].'">'.$abo_next_active_values['products_model'].'   </td>';
		  echo '<td class="minitext1" align="center" width="85">'.$abo_next_active_values['products_price'].'€</td>';
		  echo '<td class="minitext2" align="center" width="85">'.$abo50.'€</td></tr>';
		?>        
      </table>
      <br><br><br><br>
      <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        	<td align="center">
        		<input type="hidden" name="discount_code" value="325">
				<input name="imageField" type="image" src="<?php  echo DIR_WS_IMAGES.'languages/'.$language ;?>/images/gfc50/button.gif" border="0">
        	</td>
        </tr>
      </table>      
      </td>
	  </form>
    <td height="258" colspan="2"></td>
  </tr>
  <tr> 
    <td height="182"  colspan="2" bgcolor="#210505" align="right"></td>
  </tr>
  <tr> 
    <td height="38" colspan="4"></td>
  </tr>
</table>
<br>
