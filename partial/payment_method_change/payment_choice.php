
<div style="margin-left:20px; width:690px;">


<?php
if($customers_value['customers_abo_payment_method']!=1 &&$customers_value['customers_abo_payment_method']!=2 ) 
{
	echo	'<p> '.TEXT_PAYMENT_METHOD_CHANGE.'</p>';
}
else if($customers_value['customers_abo_payment_method']!=2)
{
	echo	'<p> '.TEXT_PAYMENT_METHOD_CHANGE_OGONE.'</p><br />';
}
else if($customers_value['customers_abo_payment_method']!=1)
{
	echo '<p> '.TEXT_PAYMENT_METHOD_CHANGE_DOMICILIATION.'</p>'; 
}
?>
<form method='get'>
<?php 
	$init=0;
	if($customers_value['customers_abo_payment_method']!=1) {
	 
		$init=1;
?>
<div class='payment rose' id='payment_ogone' style="width:650px;">
   
 	<table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="margin-left:10px;">
		<tr>
        	<td>
		 	 	<input type='radio' value='ogone' name='payment' checked="checked" id ="payment_ogone_radio" /><img src="/images/dvdpost_public/step/credit_card.png" /> <?= TEXT_OGONE.'<br /><p class="f12">'.TEXT_OGONE_DESCRIPTION.'</p>'?>
			</td>			
        </tr>
	</table>
</div>
<?php } ?>
<?php 
if($customers_value['customers_abo_payment_method']!=2) {
?>

<br/>
	
<div class='payment <?= (($init==0) ?'rose':'');?>' id='payment_domiciliation' style="width:650px;">

     <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="margin-left:10px">
	 	<tr>
        	<td>
				<input type='radio' value='domiciliation' name='payment' id='payment_domiciliation_radio' <?= (($init==0)? 'checked="checked"':'');?> /><img src="/images/dvdpost_public/step/domiciliation.png" /> <?= TEXT_DOMICILIATION.'<br /><p class="f12">'.TEXT_DOMICILIATION_DESCRIPTION.'</p>'; ?>
			</td>			
     	</tr>
	 </table>
</div>

<?php } ?>
<div align="right" style="padding-right:8px;"><br /><input valign="middle" type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language; ?>/images/buttons/canvas/bouton_continuer.gif" /></div>
</form>
</div>