<?php
/*
  $Id: split_page_results.php,v 1.8 2002/04/20 09:48:19 project3000 Exp $

  The Exchange Project - Community Made Shopping!
  http://www.theexchangeproject.org

  Copyright (c) 2000,2001 The Exchange Project

  Released under the GNU General Public License
*/

  class splitPageResults {

/*
NOTE: the constructor (also) builds an sql query that counts the total records from $sql_query..
      this value is then saved as $query_num_rows (which does not have to be set before
      creating an instance of this class.
      Please note the function references (&$variable) - please read up on this in the PHP documentation.
*/

/* class constructor */

    function splitPageResults(&$current_page_number, $max_rows_per_page, &$sql_query, &$query_num_rows) {
	  $pos_limit = strrpos($sql_query, ' limit');
	  if($pos_limit !==false)
	  	tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','sql limit page',$sql_query,'bugreport@dvdpost.be','bugreport@dvdpost.be');
      if (empty($current_page_number)) $current_page_number = 1;

      $pos_to = strlen($sql_query);
      $pos_from = strpos($sql_query, ' from', 0);

      $pos_group_by = strrpos($sql_query, ' group by', $pos_from);
      if (($pos_group_by < $pos_to) && ($pos_group_by != false)) $pos_to = $pos_group_by;

      $pos_having = strrpos($sql_query, ' having', $pos_from);
      if (($pos_having < $pos_to) && ($pos_having != false)) $pos_to = $pos_having;

      $pos_order_by = strrpos($sql_query, ' order by', $pos_from);
      if (($pos_order_by < $pos_to) && ($pos_order_by != false)) $pos_to = $pos_order_by;

      //$pos_limit = strrpos($sql_query, ' limit', $pos_from);
      //if (($pos_limit < $pos_to) && ($pos_limit != false)) $pos_to = $pos_limit;

      $pos_procedure = strrpos($sql_query, ' procedure', $pos_from);
      if (($pos_procedure < $pos_to) && ($pos_procedure != false)) $pos_to = $pos_procedure;

      $offset = ($max_rows_per_page * ($current_page_number - 1));
      $sql_query .= " limit " . $offset . ", " . $max_rows_per_page;

      $reviews_count_query = tep_db_query("select count(*) as total " . substr($sql_query, $pos_from, ($pos_to - $pos_from)));
      $reviews_count = tep_db_fetch_array($reviews_count_query);
      $query_num_rows = $reviews_count['total'];
    }

/* class functions */

// display split-page-number-links
    function display_links($query_numrows, $max_rows_per_page, $max_page_links, $current_page_number, $parameters = '') {
      global $PHP_SELF;

      $class = 'class="pageResults"';

      if ($parameters != '') $parameters .= '&';

// calculate number of pages needing links 
      $num_pages = intval($query_numrows / $max_rows_per_page);

// $num_pages now contains int of pages needed unless there is a remainder from division 
      if ($query_numrows % $max_rows_per_page) $num_pages++; // has remainder so add one page 

// first button - not displayed on first page
//      if ($current_page_number > 1) echo '<a href="' . tep_href_link(basename($PHP_SELF),  $parameters . 'page=1', 'NONSSL') . '" ' . $class . ' title=" ' . PREVNEXT_TITLE_FIRST_PAGE . ' ">' . PREVNEXT_BUTTON_FIRST . '</a>&nbsp;';

// previous button - not displayed on first page
      if ($current_page_number > 1) echo '<a class="basiclink" href="' . tep_href_link(basename($PHP_SELF), $parameters . 'page=' . ($current_page_number - 1), 'NONSSL') . '" ' . $class . ' title=" ' . PREVNEXT_TITLE_PREVIOUS_PAGE . ' "><u>' . PREVNEXT_BUTTON_PREV . '</u></a>&nbsp;&nbsp;';

// check if num_pages > $max_page_links
      $cur_window_num = intval($current_page_number / $max_page_links);
      if ($current_page_number % $max_page_links) $cur_window_num++;

      $max_window_num = intval($num_pages / $max_page_links);
      if ($num_pages % $max_page_links) $max_window_num++;

// previous window of pages
      if ($cur_window_num > 1) echo '<a class="basiclink" href="' . tep_href_link(basename($PHP_SELF), $parameters . 'page=' . (($cur_window_num - 1) * $max_page_links), 'NONSSL') . '" ' . $class . ' title=" ' . sprintf(PREVNEXT_TITLE_PREV_SET_OF_NO_PAGE, $max_page_links) . ' ">...</a>';

// page nn button
      for ($jump_to_page = 1 + (($cur_window_num - 1) * $max_page_links); ($jump_to_page <= ($cur_window_num * $max_page_links)) && ($jump_to_page <= $num_pages); $jump_to_page++) {
        if ($jump_to_page == $current_page_number) {
          echo '&nbsp;<b>' . $jump_to_page . '</b>&nbsp;';
        } else {
          echo '&nbsp;<a class="basiclink" href="' . tep_href_link(basename($PHP_SELF), $parameters . 'page=' . $jump_to_page, 'NONSSL') . '" ' . $class . ' title=" ' . sprintf(PREVNEXT_TITLE_PAGE_NO, $jump_to_page) . ' "><u>' . $jump_to_page . '</u></a>&nbsp;';
        }
      }

// next window of pages
      if ($cur_window_num < $max_window_num) echo '<a class="basiclink" href="' . tep_href_link(basename($PHP_SELF), $parameters . 'page=' . (($cur_window_num) * $max_page_links + 1), 'NONSSL') . '" ' . $class . ' title=" ' . sprintf(PREVNEXT_TITLE_NEXT_SET_OF_NO_PAGE, $max_page_links) . ' ">...</a>&nbsp;';

// next button
      if (($current_page_number < $num_pages) && ($num_pages != 1)) echo '&nbsp;<a class="basiclink" href="' . tep_href_link(basename($PHP_SELF), $parameters . 'page=' . ($current_page_number + 1), 'NONSSL') . '" ' . $class . ' title=" ' . PREVNEXT_TITLE_NEXT_PAGE . ' "><u>' . PREVNEXT_BUTTON_NEXT . '</u></a>&nbsp;';

// last button
//      if (($current_page_number < $num_pages) && ($num_pages != 1)) echo '<a href="' . tep_href_link(basename($PHP_SELF), $parameters . 'page=' . $num_pages, 'NONSSL') . '" ' . $class . ' title=" ' . PREVNEXT_TITLE_LAST_PAGE . ' ">' . PREVNEXT_BUTTON_LAST . '</a>&nbsp;';
    }

// display number of total products found
    function display_count($query_numrows, $max_rows_per_page, $current_page_number, $text_output) {

      $to_num = ($max_rows_per_page * $current_page_number);
      if ($to_num > $query_numrows) $to_num = $query_numrows;
      $from_num = ($max_rows_per_page * ($current_page_number - 1));
      if ($to_num == 0) {
        $from_num = 0;
      } else {
        $from_num++;
      }

      return sprintf($text_output, $from_num, $to_num, $query_numrows);
    }
  }
?>
