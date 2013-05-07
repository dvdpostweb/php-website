<?php 
////
// The HTML href link wrapper function
  function tep_href_link($page = '', $parameters = '', $connection = 'NONSSL', $add_session_id = true, $convertable = true) {

    // build URL thats points to $page
    //tep_mail('gs@dvdpost.be','gs@dvdpost.be','page tep_href',$page.'--->'.$parameters.'.'.$connection.'.'.$add_session_id.'.'.$add_session_id,'gs@dvdpost.be','gs@dvdpost.be');
	if (empty($page)) {
		if(!empty($_COOKIE['customers_id']))
			$page='mydvdpost.php';
		else
			$page='default.php';
	}
	if (empty($page)) {
			$data='<br /><br />session<br />';
			$data.='host -> '.$_SERVER['HTTP_HOST'].'<br />';
			$data.='user agent -> '.$_SERVER['HTTP_USER_AGENT'].'<br />';
			$data.='current page -> '.$_SERVER['SCRIPT_FILENAME'].'<br />';
			$data.='referer -> '.$_SERVER['HTTP_REFERER'].'<br />';
			$data.='query string -> '.$_SERVER['QUERY_STRING'].'<br />';
			if(!empty($_COOKIE['customers_id']))
				$data.=$_COOKIE['customers_id'].'<br />';
        	tep_mail('gs@dvdpost.be','gs@dvdpost.be','redirect error prod','<font color="#000000"><b>enable to determine the page link!<br><br></b><br />'.$data.'</font>','gs@dvdpost.be','gs@dvdpost.be');
		//die('</td></tr></table></td></tr></table><br><br><font color="#ff0000"><b>Error!</b></font><br><br><b>Unable to determine the page link!<br><br>');
    }
    if ($connection == 'NONSSL') {
      $link = HTTP_SERVER . DIR_WS_CATALOG;
    } elseif ($connection == 'SSL') {
      if (ENABLE_SSL) {
        $link = HTTPS_SERVER . DIR_WS_CATALOG;
      } else {
        $link = HTTP_SERVER . DIR_WS_CATALOG;
      }
    } else {
	  	$data='<br /><br />session<br />';
		$data.='host -> '.$_SERVER['HTTP_HOST'].'<br />';
		$data.='user agent -> '.$_SERVER['HTTP_USER_AGENT'].'<br />';
		$data.='current page -> '.$_SERVER['SCRIPT_FILENAME'].'<br />';
		$data.='referer -> '.$_SERVER['HTTP_REFERER'].'<br />';
		$data.='query string -> '.$_SERVER['QUERY_STRING'].'<br />';
		if(!empty($_COOKIE['customers_id']))
			$data.=$_COOKIE['customers_id'].'<br />';
    	#tep_mail('gs@dvdpost.be','gs@dvdpost.be','sql error prod','<font color="#000000"><b>Unable to determine connection method on a link!<br><br>Known methods: NONSSL SSL<br><br></b><br />'.$data.'</font>','gs@dvdpost.be','gs@dvdpost.be');
      //die('</td></tr></table></td></tr></table><br><br><font color="#ff0000"><b>Error!</b></font><br><br><b>Unable to determine connection method on a link!<br><br>Known methods: NONSSL SSL</b><br><br>');
    }
    if ($parameters == '') {
      $link = $link . $page;
      $separator = '?';
    } else {
      $link = $link . $page . '?' . $parameters;
      $separator = '&';
    }
    while ( (substr($link, -1) == '&') || (substr($link, -1) == '?') ) $link = substr($link, 0, -1);

    // find out the session id based on the constant SID
    // There is a special case when these are true: 
    //   1) using cookies to propagate the session id 
    //   2) changing servers (ie from nonSSL to SSL)
    // We then put session id manually in the URL to keep propagating it across servers
    $sess = '';
    if ( (ENABLE_SSL) && ($connection == 'SSL') && ($add_session_id) ) {
      $sess = tep_session_name() . '=' . tep_session_id();
    } elseif ($add_session_id) {
      $sess = SID;
    }

    // Substitute key symbols with slashes
    if ( (SEARCH_ENGINE_FRIENDLY_URLS == 'true') && ($convertable == true) ) {
      while (strpos($link, '&&')) {
        $link = str_replace("&&", "&", $link);
      }
      $link = str_replace("?", "/", $link);
      $link = str_replace("&", "/", $link);
      $link = str_replace("=", "/", $link);
      $separator = '?';
    }

    // Append the session id string to the URL
    if ($sess) {
		if(strpos($link,'?')!==false)
		{
			$sess = '&' . $sess;
		}
		else
		{
			$sess = '?' . $sess;
		}
    }
    $link .= $sess;

    return $link;
  }

////
// The HTML image wrapper function
  function tep_image($src, $alt = '', $width = '', $height = '', $params = '') {

    if ( (($src == '') || ($src == DIR_WS_IMAGES)) && (IMAGE_REQUIRED == 'false') ) {
      return '';
    }

    $image = '<img src="' . $src . '" border="0" alt="' . htmlspecialchars($alt) . '"';
    if (tep_not_null($alt)) {
      $image .= ' title=" ' . htmlspecialchars($alt) . ' "';
    }

    if ( (CONFIG_CALCULATE_IMAGE_SIZE == 'true') && ((!$width) || (!$height)) ) {
      if ($image_size = @getimagesize($src)) {
        if ( (!$width) && ($height) ) {
          $ratio = $height / $image_size[1];
          $width = $image_size[0] * $ratio;
        } elseif ( ($width) && (!$height) ) {
          $ratio = $width / $image_size[0];
          $height = $image_size[1] * $ratio;
        } elseif ( (!$width) && (!$height) ) {
          $width = $image_size[0];
          $height = $image_size[1];
        }
      } elseif (IMAGE_REQUIRED == 'false') {
        return '';
      }
    }

    if ( ($width) && ($height) ) {
      $image .= ' width="' . $width . '" height="' . $height . '"';
    }

    if ($params != '') {
      $image .= ' ' . $params;
    }

    $image .= '>';

    return $image;
  }

////
// The HTML form submit button wrapper function
// Outputs a button in the selected language
  function tep_image_submit($image, $alt) {
    global $language;

    $image_submit = '<input type="image" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/' . $image . '" border="0" alt="' . htmlspecialchars(clean_html_comments($alt)) . '"';
    if (tep_not_null($alt)) {
      $image_submit .= ' title=" ' . htmlspecialchars($alt) . ' ">';
    }

    return $image_submit;
  }

////
// Output a function button in the selected language
  function tep_image_button($image, $alt = '', $params = '') {
    global $language;

    return tep_image(DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/' . $image, clean_html_comments($alt), '', '', $params);
  }

////
// Output a separator either through whitespace, or with an image
  function tep_draw_separator($image = 'pixel_black.gif', $width = '100%', $height = '1') {
    return tep_image(DIR_WS_IMAGES . $image, '', $width, $height);
  }

////
// Creates a pull-down list of countries
// Parameters:
// name:       the name of the pull-down list
// selected:   the default selected item
// javascript: javascript for the pull-down list (ie, onChange="this.form.submit()")
// size:       pull-down list size
  function tep_get_country_list($name, $selected = '', $javascript = '', $size = 1) {
    $result = '<select name="' . $name . '"';

    if ($size != 1) $result .= ' size="' . $size . '"';

    if ($javascript != '') $result .= ' ' . $javascript;

    $result .= '><option value="">' . PULL_DOWN_DEFAULT . '</option>';

    $countries = tep_get_countries();
    for ($i=0; $i<sizeof($countries); $i++) {
      $result .= '<option value="' . $countries[$i]['countries_id'] . '"';
      if ($selected == $countries[$i]['countries_id']) $result .= ' SELECTED';
      $result .= '>' . $countries[$i]['countries_name'] . '</option>';
     }
    $result .= '</select>';

    return $result;
  }

////
// Creates a pull-down list of states and provinces
// Parameters:
// popup_name:   the name of the pull-down list
// country_code: the default selected item
// selected:     the default selected item
// javascript:   javascript for the pull-down list (ie, onChange="this.form.submit()")
// size:         pull-down list size
// TABLES: zones
  function tep_get_zone_list($popup_name, $country_code = '', $selected = '', $javascript = '', $size = 1) {
    $result = '<select name="' . $popup_name . '"';

    if ($size != 1) $result .= ' size="' . $size . '"';

    if ($javascript) $result .= ' ' . $javascript;

    $result .= '>';

    // Preset the width of the drop-down for Netscape
    if ( (!tep_browser_detect('MSIE')) && (tep_browser_detect('Mozilla/4')) ) {
      for ($i=0; $i<53; $i++) $result .= '&nbsp;';
    }

    $state_prov_result = tep_db_query("select zone_id, zone_name from " . TABLE_ZONES . " where zone_country_id = '" . $country_code . "' order by zone_name");
    if (tep_db_num_rows($state_prov_result)) {
      $result .= '<option>' . PULL_DOWN_DEFAULT . '</option>';
    } else {
      $result .= '<option>' . TYPE_BELOW . '</option>';
    }

    $populated = 0;
    while ($state_prov_values = tep_db_fetch_array($state_prov_result)) {
      $populated++;
      $result .= '<option value="' . $state_prov_values['zone_id'] . '"';
      if ($selected == $state_prov_values['zone_id']) $result .= ' SELECTED';
      $result .= '>' . $state_prov_values['zone_name'] . '</option>';
    }

    // Create dummy options for Netscape to preset the height of the drop-down
    if ($populated == 0) {
      if ( (!tep_browser_detect('MSIE')) && (tep_browser_detect('Mozilla/4')) ) {
        for ($i=0; $i<9; $i++) {
          $result .= '<option></option>';
        }
      }
    }

    $result .= '</select>';

    return $result;
  }

////
// Hide form elements
  function tep_hide_session_id() {
    $result = '';
    if (SID) {
      $result = '<input type="hidden" name="' . tep_session_name() . '" value="' . tep_session_id() . '">';
    }

    return $result;
  }

////
// Output a form
  function tep_draw_form($name, $action, $method = 'post', $parameters = '') {
    $form = '<form name="' . $name . '" action="' . $action . '" method="' . $method . '"';
    if ($parameters) $form .= ' ' . $parameters;
    $form .= '>';

    return $form;
  }

////
// Output a form input field
  function tep_draw_input_field($name, $value = '', $parameters = '', $type = 'text', $reinsert_value = true) {
    $field = '<input class="inputs_codes" type="' . $type . '" name="' . $name . '"';
    if ( ($GLOBALS[$name]) && ($reinsert_value) ) {
      $field .= ' value="' . trim($GLOBALS[$name]) . '"';
    } elseif ($value != '') {
      $field .= ' value="' . trim($value) . '"';
    }
    if ($parameters != '') {
      $field .= ' ' . $parameters;
    }
    $field .= '>';

    return $field;
  }

////
// Output a form password field
  function tep_draw_password_field($name, $value = '', $parameters = '') {
    //$field = tep_draw_input_field($name, $value, 'maxlength="40"', 'password', false);
    $field = tep_draw_input_field($name, $value, $parameters . ' maxlength="40"' , 'password', false);
    return $field;
  }

////
// Output a selection field - alias function for tep_draw_checkbox_field() and tep_draw_radio_field()
  function tep_draw_selection_field($name, $type, $value = '', $checked = false) {
    $selection = '<input type="' . $type . '" name="' . $name . '"';
    if ($value != '') {
      $selection .= ' value="' . $value . '"';
    }
    if ( ($checked == true) || ($GLOBALS[$name] == 'on') || ($value && $GLOBALS[$name] == $value) ) {
      $selection .= ' CHECKED';
    }
    $selection .= '>';

    return $selection;
  }

////
// Output a form checkbox field
  function tep_draw_checkbox_field($name, $value = '', $checked = false) {
    return tep_draw_selection_field($name, 'checkbox', $value, $checked);
  }

////
// Output a form radio field
  function tep_draw_radio_field($name, $value = '', $checked = false) {
    return tep_draw_selection_field($name, 'radio', $value, $checked);
  }

////
// Output a form textarea field
  function tep_draw_textarea_field($name, $wrap, $width, $height, $text = '', $reinsert_value = true) {
    $field = '<textarea name="' . $name . '" wrap="' . $wrap . '" cols="' . $width . '" rows="' . $height . '">';
    if ( ($GLOBALS[$name]) && ($reinsert_value) ) {
      $field .= $GLOBALS[$name];
    } elseif ($text != '') {
      $field .= $text;
    }
    $field .= '</textarea>';

    return $field;
  }

////
// Output a form hidden field
  function tep_draw_hidden_field($name, $value = '') {
    $field = '<input type="hidden" name="' . $name . '" value="';
    if ($value != '') {
      $field .= trim($value);
    } else {
      $field .= trim($GLOBALS[$name]);
    }
    $field .= '">';

    return $field;
  }

////
// Output a form pull down menu
  function tep_draw_pull_down_menu($name, $values, $default = '', $parameters = '', $required = false) {
    $field = '<select name="' . $name . '"';
    if ($parameters) $field .= ' ' . $parameters;
    $field .= '>';
    for ($i=0; $i<sizeof($values); $i++) {
      $field .= '<option value="' . $values[$i]['id'] . '"';
      if ( ($GLOBALS[$name] == $values[$i]['id']) || ($default == $values[$i]['id']) ) {
        $field .= ' SELECTED';
      }
      $field .= '>' . $values[$i]['text'] . '</option>';
    }
    $field .= '</select>';

    if ($required) $field .= TEXT_FIELD_REQUIRED;

    return $field;
  }
?>
