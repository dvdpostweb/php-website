<?
require('configure/application_top.php');
$current_page_name = 'default.php';
include(DIR_WS_INCLUDES . 'translation.php');
?>
<style>
.title_prices {
	color:#000;
	font-family:Arial, Helvetica, sans-serif;
	font-size:17px;
	font-weight:bold;
	padding-left:4px;
	padding-top:5px;
}
.banner_promo_prices {
	font-size: 17px;
	font-weight: bold;
	line-height: 20px;
	text-align: left;
	border: #000000 solid 1px;
	width:513px;
	margin-top:10px;
}
.red_font {
	color: #C01713;
}
a.signup_button2 {
	color: #FFFFFF;
	text-decoration: none;
	text-transform: uppercase;
}
.signup_button2 {
	color: #FFFFFF;
	display: block;
	font-size: 9pt;
	height: 42px;
	line-height: 42px;
	padding-left: 43px;
	right: 35px;
	text-decoration: none;
	text-transform: uppercase;
	width: 151px;
	background-image: url(<?php echo DIR_WS_IMAGES ;?>button_calltoaction_abo.gif);
}
.txt_left {
	float:left;
	padding-left:30px;
}
.txt_right {
	float:right;
	padding-right:10px;
}
</style>
		<p style="margin:0">
	      <p class="title_prices"><?= TEXT_FORMULA ?></p>
	      <p style="margin: 0pt;"> </p>
	      <a href="/step1.php"><img src="<?php echo DIR_WS_IMAGES ;?>prices_<?= $lang_short ?>.gif" border="0" align="center" /></a>
	      <div class="banner_promo_prices" align="center">
	        <p class="txt_left"><?= TEXT_PROMO ?></p>
	        <p class="txt_right"> <a href="/step1.php" target="_blank" class="signup_button2"><?= TEXT_SUB_PRICE ?></a></p>
	        <div style="clear:both;"></div>
	      </div>
	    </div>
		</p>
