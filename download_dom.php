<?php
require('configure/application_top.php');
 $file=str_replace('/www','',DIR_WS_COMMON).'images/pdf_dom70/dom_form_'.$lang_short.'.pdf';
 ob_clean();
 header("Cache-Control: must-revalidate, post-check=0, pre-check=0" );
 header("content-type: application/octet-stream" );
 header("Content-Length: ".filesize($file));
 header("Content-Disposition: attachment; filename=".basename($file));
 flush();
 readfile($file);
?>