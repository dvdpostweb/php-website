<?php
  // Mouseflow Proxy Script, PHP edition      //
  // Copyright (c) 2010, All rights reserved  //

  $url = 'http://a.mouseflow.com/b.gif';
  $data = 'website='.urlencode($_POST['website']).'&session='.urlencode($_POST['session']).'&page='.urlencode($_POST['page']).'&encoding='.urlencode($_POST['encoding']).'&host='.urlencode($_SERVER['HTTP_HOST']).'&html='.urlencode(stripslashes($_POST['html'])).'&ajax='.urlencode(stripslashes($_POST['ajax'])).'&sequence='.urlencode(stripslashes($_POST['sequence']));
  if ($_GET['test'] == '1') $data = 'website=test';

  if(function_exists("curl_init")) {
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,6);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    $result = curl_exec($ch);
    curl_close($ch);
  }
  else
  {
    $params = array('http' => array( 'method' => 'POST', 'content' => $data ));
    $ctx = stream_context_create($params);
    if (!$fp = @fopen('http://a.mouseflow.com/b.gif', 'rb', false, $ctx)) exit('ERROR');
    echo @stream_get_contents($fp);
  }
?>