<?php
if($_GET['test']=='1')
{
	$url = 'http://staging.public.dvdpost.com/'.$_GET['lang'].'/chronicles/'.$_GET['id'];
}
else
{
	$url = 'http://public.dvdpost.com/'.$_GET['lang'].'/chronicles/'.$_GET['id'];
}
#echo $url;
#echo ' <a href="'.$url.'">ici</a>';
header('Location: '.$url );	

?>