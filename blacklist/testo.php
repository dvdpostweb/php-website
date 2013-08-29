<?php
require('../configure/application_top.php');
        // create curl resource
        $urltopost = ('http://localhost:3000/ogone');
        $ch = curl_init ($urltopost);
        curl_setopt ($ch, CURLOPT_POST, true);
        curl_setopt ($ch, CURLOPT_POSTFIELDS, 'orderID=1212');
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        $returndata = curl_exec ($ch);
        var_dump($returndata);
   


?>