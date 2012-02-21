<?php
require('../configure/application_top.php');



$sql='SELECT * FROM quizz_creator q where quizz_id='.$_GET['quizz_id'].' and language_id ='.$_GET['lang'];

$products = tep_db_query($sql,'db_link',true);
function replace($txt)
{
	return str_replace('%C2%92','%27',$txt);
}

while($products_value = tep_db_fetch_array($products)){
	echo $products_value['question_id'];
	$q=replace(urlencode(utf8_encode($products_value['question'])));
	$r1=replace(urlencode(utf8_encode($products_value['r1'])));
	$r2=replace(urlencode(utf8_encode($products_value['r2'])));
	$r3=replace(urlencode(utf8_encode($products_value['r3'])));
	$r4=replace(urlencode(utf8_encode($products_value['r4'])));
?>
	<object 
		classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" 
		codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" 
		id="progressbar" 
		align="middle" height="262" width="302"> 
		<param name="allowScriptAccess" value="sameDomain" /> 
		<param name="movie" value="<?php  echo $flash_link ;?>" /> 
		<param name="quality" value="high" /> 
		<param name="menu" value="false" />
		<param name="bgcolor" value="#FFFFFF" />
		<embed src="view.swf?question=<?= $q ?>&r1=<?= $r1 ?>&r2=<?= $r2 ?>&r3=<?= $r3 ?>&r4=<?= $r4?>" menu="false" quality="high" bgcolor="#ffffff" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" align="center" height="262" width="302"> 
	</object><br />
<?php
}
?>