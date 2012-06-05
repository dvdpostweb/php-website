<?php
$number='selection gold4000';
$number= preg_replace("/[^0-9]/i", "", $number);
$number = $number /100;
echo number_format($number, 2, ',', ' ');
$array = array("firstname" => 'lastname', "email"=>'email', "data" => array('lastname', 'email', 'phone'));
foreach ($array["data"] as $value) {
	var_dump($value);
	echo '<br />';
}
?>