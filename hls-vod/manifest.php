<?php
header("Content-type: application/text");
header("Content-Disposition: attachment; filename=".$token.".m3u8");
?>
#EXTM3U
#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=800000
http://akamai.dvdpost.be/hls-vod//<? echo $token; ?>_800k.f4v.m3u8
#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=3000000
http://akamai.dvdpost.be/hls-vod//<? echo $token; ?>_3000k.f4v.m3u8
#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=2200000
http://akamai.dvdpost.be/hls-vod//<? echo $token; ?>_2200k.f4v.m3u8
#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=1400000
http://akamai.dvdpost.be/hls-vod//<? echo $token; ?>_1400k.f4v.m3u8
