<?php

$post_data = "email=";
$post_data .= $customers_values['customers_email_address'];
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://dvdpost.qualifio.com/webservices/call.cfm");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$page = curl_exec($curl);
curl_close($curl);
$xml=simplexml_load_string(utf8_encode($page));
$qualifio_gender=$xml->contact->gender;
$qualifio_lastname=$xml->contact->lastname;
$qualifio_firstname=$xml->contact->firstname;
$qualifio_birthday=explode('/',$xml->contact->bidthday);
$qualifio_address=$xml->contact->adress;
$qualifio_postcode=$xml->contact->postode;
$qualifio_town=$xml->contact->town;
$qualifio_phone=$xml->contact->phone;
if(empty($lastname))
{
	$lastname = utf8_decode($qualifio_lastname);
	if($qualifio_gender=="Monsieur")
	{
		$gender = "m";
	}
	else
	{
		$gender = "f";
	}
}
if (empty($day))
{
	$day = $qualifio_birthday[0];
}
if (empty($month))
{
	$month = $qualifio_birthday[1];
}
if (empty($year))
{
	$year = $qualifio_birthday[2];
}
if(empty($firstname))
{
	$firstname = utf8_decode($qualifio_firstname);
}	
if(empty($street_address))
{
	$street_address = utf8_decode($qualifio_address);
}	
if(empty($city))
{
	$city = utf8_decode($qualifio_town);
}
if(empty($postcode))
{
	$postcode = $qualifio_postcode;
}
if(empty($phone))
{
	$phone = $qualifio_phone;
}

?>