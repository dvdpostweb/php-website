<?php
  tep_session_close();
  //if($memcache_available===true)
  //{
	if(isset($memcache))
		$memcache->close();
  //}
	tep_db_close();
  if (STORE_PAGE_PARSE_TIME == 'true') {
    $parse_end_time = microtime();
    $time_start = explode(' ', PAGE_PARSE_START_TIME);
    $time_end = explode(' ', $parse_end_time);
    $parse_time = number_format(($time_end[1] + $time_end[0] - ($time_start[1] + $time_start[0])), 3);
    //error_log(strftime(STORE_PARSE_DATE_TIME_FORMAT) . ' - ' . getenv('REQUEST_URI') . ' (' . $parse_time . 's)' . "\n", 3, STORE_PAGE_PARSE_TIME_LOG);

    //if (DISPLAY_PAGE_PARSE_TIME == 'true') {
      echo '<span class="smallText"><font color=white>Parse Time: ' . $parse_time . 's</font></span>';
    //}
  }
?>