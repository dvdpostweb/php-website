<?php
require('../configure/application_top.php');
$name='Vampire Knight (volume 1)';
$name= preg_replace("/\(disc .*\)/i", "", $name);
$name= preg_replace("/\(volume .*\)/i", "", $name);
echo $name;
?>