<?php 
require('configure/application_top.php');
$trailer_id=intval($HTTP_GET_VARS['trailers_id']);
//phpinfo();
$trailer_query = tep_db_query("select trailer,broadcast from products_trailers where trailers_id=" . $trailer_id);
$trailer = tep_db_fetch_array($trailer_query);
$dm_link=$trailer['trailer'];
switch ($trailer['broadcast']){
	case 'DAYLYMOTION':
		$value="http://www.dailymotion.com/swf/".$dm_link;
		echo '<div><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="425" height="335"><param name="movie" value="'.$value.'"></param><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param><embed src="'.$value.'" type="application/x-shockwave-flash" width="425" height="335" allowFullScreen="true" allowScriptAccess="always" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed></object><br><br>';
		break;
		
	case 'YOUTUBE':
		$value='http://www.youtube.com/v/'.$dm_link;	
		echo '<div><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" <param name="movie" value="'.$value.'"></param><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param><embed src="'.$value.'" type="application/x-shockwave-flash" width="401" height="335" allowFullScreen="true" allowScriptAccess="always" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed></object><br><br>';
		break;
			
	case 'TRUVEO':	
	$value='http://xml.truveo.com/eb/i/'.$dm_link.'/a/4c86ff7dda1f7b769d520f50a4658f1d/p/1';
	echo '<embed src="'.$value.'" FlashVars="autoplay=true&assetId=video:asset:pmms:1764678&playerId=player653" quality="high" width=" 401" height=" 335" name="player653"  allowScriptAccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"  wmode="transparent"></embed>';
	break;
	
	case 'COMMEAUCINEMA':
		echo '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"  width="375" height="350" codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab"><param name="movie" value="http://www.commeaucinema.com/flvplayerprx.php" /><param name="quality" value="high" /><param name="wmode" /><param name="allowScriptAccess" value="always" /><param name="flashvars" value="id='.$dm_link.'" /><embed src="http://www.commeaucinema.com/flvplayerprx.php" quality="high" 	width="375" height="350" name="FLVPlayer" align="middle" wmode="transparent" 	play="true" 	loop="false" 	quality="high" 	allowScriptAccess="always" 	flashvars="id='.$dm_link.'" 	type="application/x-shockwave-flash" 	pluginspage="http://www.adobe.com/go/getflashplayer"></embed></object><br />';
		break;
	
}
	
	
require('configure/application_bottom.php');
?>

