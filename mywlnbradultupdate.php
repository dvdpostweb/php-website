<?php
require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
$navigation->set_snapshot(array('mode' => 'SSL', 'page' => FILENAME_MYWISHLIST ));
tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

$abo_query = tep_db_query("select * from customers where customers_id = '" . $customer_id . "' ");
$abo = tep_db_fetch_array($abo_query);

$a=$abo['customers_abo_dvd_norm'];
$b=$abo['customers_abo_dvd_adult'];
$e=$abo['customers_abo_dvd_home_norm'];
$f=$abo['customers_abo_dvd_home_adult'];
$x=$HTTP_POST_VARS['wlDVDadult'];
//echo $x;

//a = abo - x = a + b - x
tep_db_query("update customers set customers_abo_dvd_norm = '" . $a . "' + '" . $b . "' - '" . $x . "' where customers_id =  '" . $customer_id  . "' ");
//b = x
tep_db_query("update customers set customers_abo_dvd_adult = '" . $x . "' where customers_id =  '" . $customer_id  . "' ");


tep_redirect(tep_href_link('mydvdxpost.php', '', 'SSL'));
?>