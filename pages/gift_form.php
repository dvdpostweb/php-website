<table width="764" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="6"></div></td>
  </tr>
  <tr>
    <td>
		<table border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			  <td align="left" valign="bottom" class="SLOGAN_DETAIL"><img src="<?php  echo DIR_WS_IMAGES;?>cheque-cadeau_part_a.jpg" align="absbottom" ></td>
		  </tr>
		  <tr>
  <td valign="top" class="SLOGAN_DETAIL">
					<form name="cart_quantity" method="post" action="gift_confirm.php">
					<?php  echo TEXT_INTRO ; ?> <img src="<?php  echo DIR_WS_IMAGES;?>cheque-cadeau_part_b.jpg" >  
					<br><br><br>
					<ol>
					<li><?php  echo TEXT_CHOOSE_PRODUCTS ; ?>
					<br><input type="radio" name="products_id" value="5"><?php  echo TEXT_PRODUCTS5 ; ?>
					<br><input type="radio" name="products_id" value="6"><?php  echo TEXT_PRODUCTS6 ; ?>
					<br><input type="radio" name="products_id" value="7" checked><?php  echo TEXT_PRODUCTS7 ; ?>
					<br><input type="radio" name="products_id" value="8"><?php  echo TEXT_PRODUCTS8 ; ?>
					<br><input type="radio" name="products_id" value="9"><?php  echo TEXT_PRODUCTS9 ; ?>
					</li><br><BR><li><?php  echo TEXT_SELECT_NBRMONTH ; ?>
					<select name="duration">
					<option class="SLOGAN_DETAIL"  value="1">1 <?php  echo TEXT_MONTH ; ?>
					<option  class="SLOGAN_DETAIL" value="2">2 <?php  echo TEXT_MONTH ; ?>
					<option class="SLOGAN_DETAIL" value="3">3 <?php  echo TEXT_MONTH ; ?>
					<option class="SLOGAN_DETAIL" value="4">4 <?php  echo TEXT_MONTH ; ?>
					<option class="SLOGAN_DETAIL" value="5">5 <?php  echo TEXT_MONTH ; ?>
					<option class="SLOGAN_DETAIL" value="6">6 <?php  echo TEXT_MONTH ; ?>
					</select>
					</li>
					<br>
					<!--
					<BR><li><?php  echo TEXT_ABO_QUANTITY ; ?>
					<input style="width:20" type="quantity" name="quantity" value="1">

					</li><br><BR><li><?php  echo TEXT_GIFT_MATERIALISED ; ?>
					<br><input type="radio" name="gifttype" value="1"><?php  echo TEXT_GIFT_MATERIALISED1 ; ?>
					<br><input type="radio" name="gifttype" value="2"><?php  echo TEXT_GIFT_MATERIALISED2 ; ?> <?php  echo TEXT_GIFT_MATERIALISED_MOREINFO ; ?> 
					-->
					</li><br><BR><li><?php  echo TEXT_GIFT_RECIEVER ; ?>
					<br>
					<br>
					<table border="0">
					<tr><td class="SLOGAN_DETAIL"><?php  echo TEXT_GIFT_RECIEVER_FIRST ; ?></td><td><input type="text" name="firstname" value=""></td></tr>
					<tr><td class="SLOGAN_DETAIL"><?php  echo TEXT_GIFT_RECIEVER_LAST ; ?></td><td><input type="text" name="lastname" value=""></td></tr>
					</table>

					</li><br>
					<!--
					<li>
					<?php  echo TEXT_GIFT_GREETING ; ?>
					<textarea name="message" style="width:500"></textarea>
					</li>
						-->
					</ol>
					<br><BR><blockquote>
					<?php  echo TEXT_GIFT_END ; ?>
					</blockquote>

					<div align="center">
					<input type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ; ?>/images/buttons/button_continue.gif" border="0" alt="next" title=" Next ">			
					</div>
					</form>
					<br><br> 
		    </td>    
			</tr>

	  </table>
	</td>
  </tr>
</table>