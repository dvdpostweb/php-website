<?php
require('../configure/application_top.php');
        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "http://localhost/ogone_process.php?orderID=p1212&ok=1"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 
        var_dump($output);
        // close curl resource to free up system resources 
        curl_close($ch);      


?>