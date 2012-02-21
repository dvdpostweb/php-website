<table border="0" width="90%">
    <TR>
        <TD class="TYPO_STD_BLACK_bold" height="20"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="8" height="3">
        <?php 
		$data_avg_count=avg_count_fct($product_info_values['rating_users'] ,$product_info_values['rating_count'] );
		$stars=$jsrate=$data_avg_count['avg'];
		echo TEXT_AVERAGE_RATING .'<img src="'.DIR_WS_IMAGES.'/starbar/stars_1_'.$stars.'.gif" border=0  style="padding-left:10px" align="absmiddle" title="'.$jsrate.'/5">&nbsp;&nbsp; (<b>' . ($jsrate/10).'</b>/5)<br>';
        
		?>
		</TD>
	</TR>	
</table>
<?php 
	include(DIR_WS_COMMON . 'pages/parts/product_info_public/rating_graph.php'); 
?>