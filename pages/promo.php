<style>

input{
font-size:15px;
vertical-align:middle;
}
.rouge {
font-size:17px;
text-align:left;
background:transparent url(/images/www3/languages/french/images/sodaclub/attention.gif) no-repeat ;
padding-top:8px;
padding-left:45px;
}

.font {
	background:transparent url(/images/www3/languages/french/images/sodaclub/home_finish.gif) no-repeat ;
	font-size:18px;
	height:276px;
	padding-left:25px;
	text-align:left;
	
	
	}

</style>

<br />
<div class='font' align="center">
<?php
if(!empty($_GET['finish']))
{
?>

<?= '<br /><br />'.PROMO_SODA_FINISH ?>
<?php
$sql='select customers_abo_dvd_credit from customers where customers_id = '.$customer_id ;
$query=tep_db_query($sql);
//echo $sql;
$value=tep_db_fetch_array($query);
//echo '<br /><br />'.str_replace('[credit]',$value['customers_abo_dvd_credit'],TEXT_CREDIT);
//echo $value['customers_abo_dvd_credit'];

}
else
{
?>
<br />
<p align="left" style='margin-top:1px'><?= PROMO_SODA_EXPLAIN. ' *'?></p>

<form method="post">
	<input type='text'  class="inputs_codes" value='' size="20" name='code'>
	<input type='image' src="/images/www3/promo/bouton_go.gif" border="0" value='<?= TEXT_SUBMIT ?>' align="bottom">
</form>

<?php
if($error==true && !empty($error_text)){
	echo '<span class="rouge">'.$error_text.'</span><br /><br />';
}
echo "<span class='small'>".TEXT_STAR."</span>";
}
?>

</div>

<map name="Map"><area shape="rect" coords="18,103,423,209" href="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/sodaclub/sodaclub_reglement.pdf' ;?>" target="_blank" /><area shape="rect" coords="262,239,789,275" href="images/www3/languages/french/images/sodaclub/sodaclub_dvdpost.pdf" target="_blank">
</map>