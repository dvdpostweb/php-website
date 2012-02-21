<?php Header("content-type: application/x-javascript");
require('../configure/application_top.php');
?>    preload_image_object = new Image();
      image_url = new Array();
      image_link_url = new Array();
	title=new Array();
	  <?php
	  $sql='SELECT * FROM droselia_catalog_stream d where trash="NO" order by catalog_id desc limit 50';
	  $x_query = tep_db_cache($sql,14400,20);
	  $i=0;
	  foreach($x_query as  $x)	
	  {
	  	echo "image_url[$i] = '".$x['directory_thumbs'].'250/5.jpg'."';\n";
        echo "image_link_url[$i] = 'vodx_detail.php?id=".$x['catalog_id']."';\n";
        echo "title[$i] = '".truncate(addslashes($x['name']),34,'...')."';\n";
		$i++;
	  }
      ?>
      var i = 0;
      var slideshow_current_frame = 0;
      for(i=0; i<<?= $i?>; i++) preload_image_object.src = image_url[i];

     function slide_a() {
	   slideshow_current_frame = (slideshow_current_frame+1)%5;
       $('chart_slideshow_b').src = image_url[slideshow_current_frame]
       $('slideshow_link').href = image_link_url[slideshow_current_frame]
	$('vodx_title').innerHTML=title[slideshow_current_frame]
	$('chart_slideshow_b').appear();
	$('chart_slideshow_a').fade();
	   setTimeout("slide_b()", 5000);
     }
       
     function slide_b() {
       slideshow_current_frame = (slideshow_current_frame+1)%5;
       $('chart_slideshow_a').src = image_url[slideshow_current_frame]
       $('slideshow_link').href = image_link_url[slideshow_current_frame]
	$('vodx_title').innerHTML=title[slideshow_current_frame]

       //new effect.Appear("chart_slideshow_a",{});
       //new effect.Fade("chart_slideshow_b",{});
	$('chart_slideshow_a').appear();
	$('chart_slideshow_b').fade();
	
       setTimeout("slide_a()", 5000);
      }
function start()
{
	slide_a();
}
Event.observe(window,"load",start);