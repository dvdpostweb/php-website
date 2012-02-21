<?php  
/*
  $Id: studio.php,v 1.16 2002/05/27 13:25:51 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2001 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- studio //-->

<?php  
  $studio_query = tep_db_query("select studio_id,  studio_name from studio where studio_type='DVD_ADULT' order by studio_name");
  
  if (tep_db_num_rows($studio_query) <= MAX_DISPLAY_studio_IN_A_LIST) {
// Display a list
    $studio_list = '';

    
while ($studio_values = tep_db_fetch_array($studio_query)) {
	
		if(SITE_ACCESS=='PUBLIC')
		{
			$url=studios_link($lang,$studio_values['studio_name'],$studio_values['studio_id']);
			 $studio_list .= '<a href="' . $url . '">' . substr($studio_values['studio_name'], 0, 25) . '</a><br>';
		}
		else
		{
				$url='listing_category_adult.php';
      $studio_list .= '<a href="' . tep_href_link($url, 'studio_id=' . $studio_values['studio_id'], 'NONSSL') . '">' . substr($studio_values['studio_name'], 0, 25) . '</a><br>';
	    }
    }

    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'left',
                                 'text'  => $studio_list								 
								 );
  } else {
// Display a drop-down
    $select_box = '<select class="TYPO_DROP_DOWN" name="studio_id" onChange="this.form.submit();" size="1" style="width: 100%">';
    if (MAX_studio_LIST < 2) {
      $select_box .= '<option value="">' . PULL_DOWN_DEFAULT . '</option>';
    }
    while ($studio_values = tep_db_fetch_array($studio_query)) {

		if(SITE_ACCESS=='PUBLIC')
		{
			$url='studio_redirect.php';
			$select_box .= '<option value="' . $studio_values['studio_id'].'_'.$studio_values['studio_name'] . '"';
		    if ($HTTP_GET_VARS['studio_id'] == $studio_values['studio_id']) 
				$select_box .= ' SELECTED';
		    $select_box .= '>' . substr($studio_values['studio_name'], 0, 25) . '</option>';
		}
		else
		{
			$url='studio_adult.php';
		 	$select_box .= '<option value="' . $studio_values['studio_id']. '"';
		    if ($HTTP_GET_VARS['studio_id'] == $studio_values['studio_id']) 
				$select_box .= ' SELECTED';
		    $select_box .= '>' . substr($studio_values['studio_name'], 0, 25) . '</option>';
		}
    }
    $select_box .= "</select>";
    $select_box .= tep_hide_session_id();

    $info_box_contents = array();
    $info_box_contents[] = array('form'  => '<form name="studio" method="get" action="/'.$url.'">',
                                 'align' => 'left',
								 'text'  => $select_box
								 );
  }

  new infoBox($info_box_contents);
?>
<!-- studio_eof //-->