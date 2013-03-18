<?php
//require('../configure/application_top.php');
require('../configure/configure.php');

foreach ($constants as $key => $value) {
  define ($key,$value);
}
require(DIR_WS_FUNCTIONS . 'sessions.php');
require(DIR_WS_FUNCTIONS . 'general.php');
require(DIR_WS_FUNCTIONS . 'database.php');
require(DIR_WS_CLASSES . 'class.phpmailer.php');

tep_db_connect() or die('Unable to connect to database server!');


	tep_mail('gs@dvdpost.be','gs@dvdpost.be','mail nl last chance','test','gs@dvdpost.be','gs@dvdpost.be');
	?>
