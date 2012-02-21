<?php
/*
  $Id: address_book_details.php,v 1.2 2002/06/19 02:56:24 harley_vb Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr>
    <td class="SLOGAN_GRIS_13px"><?php echo CATEGORY_PERSONAL; ?></td>
  </tr>
  <tr>
    <td><table border="0" width="100%" cellspacing="0" cellpadding="2" class="formArea">
      <tr>
        <td><table border="0" cellspacing="0" cellpadding="2">
<?php
  if (ACCOUNT_GENDER == 'true') {
    $male = ($entry['entry_gender'] == 'm') ? true : false;
    $female = ($entry['entry_gender'] == 'f') ? true : false;
?>
          <tr>
            <td class="SLOGAN_DETAIL">&nbsp;<?php echo ENTRY_GENDER; ?></td>
            <td class="SLOGAN_DETAIL">&nbsp;
<?php
    if ($process) {
      if ($gender_error) {
        echo tep_draw_radio_field('gender', 'm', $male) . '&nbsp;&nbsp;' . MALE . '&nbsp;&nbsp;' . tep_draw_radio_field('gender', 'f', $female) . '&nbsp;&nbsp;' . FEMALE . '&nbsp;' . ENTRY_GENDER_ERROR;
      } else {
        echo ($gender == 'm') ? MALE : FEMALE;
        echo tep_draw_hidden_field('gender');
      }
    } else {
      echo tep_draw_radio_field('gender', 'm', $male) . '&nbsp;&nbsp;' . MALE . '&nbsp;&nbsp;' . tep_draw_radio_field('gender', 'f', $female) . '&nbsp;&nbsp;' . FEMALE . '&nbsp;' . ENTRY_GENDER_TEXT;
    }
?></td>
          </tr>
<?php
  }
?>
          <tr>
            <td class="SLOGAN_DETAIL">&nbsp;<?php echo ENTRY_FIRST_NAME; ?></td>
            <td class="SLOGAN_DETAIL">&nbsp;
<?php
  if ($process) {
    if ($firstname_error) {
      echo tep_draw_input_field('firstname') . '&nbsp;' . ENTRY_FIRST_NAME_ERROR;
    } else {
      echo $firstname . tep_draw_hidden_field('firstname');
    }
  } else {
    echo tep_draw_input_field('firstname', $entry['entry_firstname']) . '&nbsp;' . ENTRY_FIRST_NAME_TEXT;
  }
?></td>
          </tr>
          <tr>
            <td class="SLOGAN_DETAIL">&nbsp;<?php echo ENTRY_LAST_NAME; ?></td>
            <td class="SLOGAN_DETAIL">&nbsp;
<?php
  if ($process) {
    if ($lastname_error) {
      echo tep_draw_input_field('lastname') . '&nbsp;' . ENTRY_LAST_NAME_ERROR;
    } else {
      echo $lastname . tep_draw_hidden_field('lastname');
    }
  } else {
    echo tep_draw_input_field('lastname', $entry['entry_lastname']) . '&nbsp;' . ENTRY_LAST_NAME_TEXT;
  }
?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
<?php
  if (ACCOUNT_COMPANY == 'true') {
?>
  <tr>
    <td class="SLOGAN_GRIS_13px"><br><?php echo CATEGORY_COMPANY; ?></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL"><table border="0" width="100%" cellspacing="0" cellpadding="2" class="formArea">
      <tr>
        <td class="SLOGAN_DETAIL"><table border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td class="SLOGAN_DETAIL">&nbsp;<?php echo ENTRY_COMPANY; ?></td>
            <td class="SLOGAN_DETAIL">&nbsp;
<?php
    if ($process) {
      if ($company_error) {
        echo tep_draw_input_field('company') . '&nbsp;' . ENTRY_COMPANY_ERROR;
      } else {
        echo $company . tep_draw_hidden_field('company');
      }
    } else {
      echo tep_draw_input_field('company', $entry['entry_company']) . '&nbsp;' . ENTRY_COMPANY_TEXT;
    } 
?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
<?php
  }
?>
  <tr>
    <td class="SLOGAN_GRIS_13px"><br><?php echo CATEGORY_ADDRESS; ?></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL"><table border="0" width="100%" cellspacing="0" cellpadding="2" class="formArea">
      <tr>
        <td class="SLOGAN_DETAIL"><table border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td class="SLOGAN_DETAIL">&nbsp;<?php echo ENTRY_STREET_ADDRESS; ?></td>
            <td class="SLOGAN_DETAIL">&nbsp;
<?php
  if ($process) {
    if ($street_address_error) {
      echo tep_draw_input_field('street_address') . '&nbsp;' . ENTRY_STREET_ADDRESS_ERROR;
    } else {
      echo $street_address . tep_draw_hidden_field('street_address');
    }
  } else {
    echo tep_draw_input_field('street_address', $entry['entry_street_address']) . '&nbsp;' . ENTRY_STREET_ADDRESS_TEXT;
  } 
?></td>
          </tr>
<?php
  if (ACCOUNT_SUBURB == 'true') {
?>
          <tr>
            <td class="SLOGAN_DETAIL">&nbsp;<?php echo ENTRY_SUBURB; ?></td>
            <td class="SLOGAN_DETAIL">&nbsp;
<?php
    if ($process) {
      echo $suburb . tep_draw_hidden_field('suburb');
    } else {
      echo tep_draw_input_field('suburb', $entry['entry_suburb']) . '&nbsp;' . ENTRY_SUBURB_TEXT;
    } 
?></td>
          </tr>
<?php
  }
?>
          <tr>
            <td class="SLOGAN_DETAIL">&nbsp;<?php echo ENTRY_POST_CODE; ?></td>
            <td class="SLOGAN_DETAIL">&nbsp;
<?php
  if ($process) {
    if ($postcode_error) {
      echo tep_draw_input_field('postcode') . '&nbsp;' . ENTRY_POST_CODE_ERROR;
    } else {
      echo $postcode . tep_draw_hidden_field('postcode');
    }
  } else {
    echo tep_draw_input_field('postcode', $entry['entry_postcode']) . '&nbsp;' . ENTRY_POST_CODE_TEXT;
  } 
?></td>
          </tr>
          <tr>
            <td class="SLOGAN_DETAIL">&nbsp;<?php echo ENTRY_CITY; ?></td>
            <td class="SLOGAN_DETAIL">&nbsp;
<?php
  if ($process) {
    if ($city_error) {
      echo tep_draw_input_field('city') . '&nbsp;' . ENTRY_CITY_ERROR;
    } else {
      echo $city . tep_draw_hidden_field('city');
    }
  } else {
    echo tep_draw_input_field('city', $entry['entry_city']) . '&nbsp;' . ENTRY_CITY_TEXT;
  }
?></td>
          </tr>
          <tr>
            <td class="SLOGAN_DETAIL">&nbsp;<?php echo ENTRY_COUNTRY; ?></td>
            <td class="SLOGAN_DETAIL">&nbsp;
<?php
  if ($process) {
    if ($country_error) {
      echo tep_get_country_list('country') . '&nbsp;' . ENTRY_COUNTRY_ERROR;
    } else {
      echo tep_get_country_name($country) . tep_draw_hidden_field('country');
    }
  } else {
    echo tep_get_country_list("country", $entry['entry_country_id']) . '&nbsp;' . ENTRY_COUNTRY_TEXT;
  }
?></td>
          </tr>
<?php
  if (ACCOUNT_STATE == 'true') {
?>
          <tr>
            <td class="SLOGAN_DETAIL">&nbsp;<?php echo ENTRY_STATE; ?></td>
            <td class="SLOGAN_DETAIL">&nbsp;
<?php
    $state = tep_get_zone_name($country, $zone_id, $state);
    if ($process) {
      if ($entry_state_error) {
        if ($entry_state_has_zones) {
          $zones_array = array();
          $zones_query = tep_db_query("select zone_name from " . TABLE_ZONES . " where zone_country_id = '" . tep_db_input($country) . "' order by zone_name");
          while ($zones_values = tep_db_fetch_array($zones_query)) {
            $zones_array[] = array('id' => $zones_values['zone_name'], 'text' => $zones_values['zone_name']);
          }
          echo tep_draw_pull_down_menu('state', $zones_array) . '&nbsp;' . ENTRY_STATE_ERROR;
        } else {
          echo tep_draw_input_field('state') . '&nbsp;' . ENTRY_STATE_ERROR;
        }
      } else {
        echo $state . tep_draw_hidden_field('zone_id') . tep_draw_hidden_field('state');
      }
    } else {
      echo tep_draw_input_field('state', tep_get_zone_name($entry['entry_country_id'], $entry['entry_zone_id'], $entry['entry_state'])) . '&nbsp;' . ENTRY_STATE_TEXT;
    } 
?></td>
          </tr>
<?php
  }
?>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<br><br>