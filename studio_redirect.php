<?php
require('configure/application_top.php');
$studio=explode('_',$_GET['studio_id']);
$studio_id=$studio[0];
$studio_name=$studio[1];
header('Location: '.studios_link($lang_short,$studio_name,$studio_id));
require('configure/application_bottom.php');
?>