<?php
setlocale(LC_TIME, 'fr_FR.ISO_8859-1');
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');
define('BOX_LISTDVDS_5STARS', '5 étoiles <img  border=0 src="' . DIR_WS_IMAGES . '/starbar/stars_small_1_50.gif">');
define('BOX_LISTDVDS_DVDPPOSTCHOICE', 'Coup de coeur <img border=0 src="' . DIR_WS_IMAGES . '/coeur.gif">');
define('JS_REVIEW_TEXT', '* La critique doit comporter au moins ' . REVIEW_TEXT_MIN_LENGTH . ' caractères.');
define('JS_FIRST_NAME', '* Le prénom doit comporter au moins ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caractères.');
define('JS_LAST_NAME', '* Le nom doit comporter au moins ' . ENTRY_LAST_NAME_MIN_LENGTH . ' caractères.');
define('JS_EMAIL_ADDRESS', '* L\'adresse e-mail doit comporter au moins ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caractères.');
define('JS_ADDRESS', '* L\'adresse doit comporter au moins ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' caractères.');
define('JS_POST_CODE', '* Le code postal doit comporter au moins ' . ENTRY_POSTCODE_MIN_LENGTH . ' caractères.');
define('JS_CITY', '* La ville doit comporter au moins ' . ENTRY_CITY_MIN_LENGTH . ' caractères.');
define('JS_TELEPHONE', '* Le numéro de téléphone doit comporter au moins ' . ENTRY_TELEPHONE_MIN_LENGTH . ' caractères.');
define('JS_PASSWORD', '* Le mot de passe et la confirmation doivent être identiques et comporter au moins ' . ENTRY_PASSWORD_MIN_LENGTH . ' caractères.');
define('ENTRY_FIRST_NAME_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_LAST_NAME_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_LAST_NAME_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_EMAIL_ADDRESS_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_STREET_ADDRESS_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_POST_CODE_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_POSTCODE_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_CITY_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_CITY_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_TELEPHONE_NUMBER_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_TELEPHONE_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_PASSWORD_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_PASSWORD_MIN_LENGTH . ' chars</font></small>');
define('WARNING_INSTALL_DIRECTORY_EXISTS', 'Warning: Installation directory exists at: ' . dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/install. Please remove this directory for security reasons.');
define('WARNING_CONFIG_FILE_WRITEABLE', 'Warning: I am able to write to the configuration file: ' . dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php. This is a potential security risk - please set the right user permissions on this file.');
define('WARNING_SESSION_DIRECTORY_NON_EXISTENT', 'Warning: The sessions directory does not exist: ' . tep_session_save_path() . '. Sessions will not work until this directory is created.');
define('WARNING_SESSION_DIRECTORY_NOT_WRITEABLE', 'Warning: I am not able to write to the sessions directory: ' . tep_session_save_path() . '. Sessions will not work until the right user permissions are set.');
define('WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT', 'Warning: The downloadable products directory does not exist: ' . DIR_FS_DOWNLOAD . '. Downloadable products will not work until this directory is valid.');
?>