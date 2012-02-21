<?php
/*
  $Id: counter.php,v 1.3 2001/09/20 19:27:19 mbs Exp $

  The Exchange Project - Community Made Shopping!
  http://www.theexchangeproject.org

  Copyright (c) 2000,2001 The Exchange Project

  Released under the GNU General Public License
*/

/*  $counter = tep_db_query("select startdate, counter from " . TABLE_COUNTER . "");

  if (!@tep_db_num_rows($counter)) {
    $date_now = date('Ymd');
    tep_db_query("insert into " . TABLE_COUNTER . " (startdate, counter) values ('" . $date_now . "', '1')");
    $counter_startdate = $date_now;
    $counter_now = 1;
  } else {
    tep_db_query("update " . TABLE_COUNTER . " set counter = counter +1");
  }

  $counter_startdate_formatted = strftime(DATE_FORMAT_LONG, mktime(0,0,0,substr($counter_startdate, 4, 2),substr($counter_startdate, -2),substr($counter_startdate, 0, 4)));*/
?>
