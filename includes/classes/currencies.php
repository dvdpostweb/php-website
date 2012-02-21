<?php
/*
  $Id: currencies.php,v 1.11 2002/05/16 15:33:25 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/
// WebMakers.com Added: FREE-CALL FOR PRICE-COMING SOON ETC. v2.1
// Add case statements to handle what is returned to all programs for the price
// definitions in free_call_for_price.php

////
// Class to handle currencies
// TABLES: currencies
  class currencies {
    var $currencies;

// class constructor
    function currencies() {
      $this->currencies = array();
      $currencies_query = tep_db_query("select code, title, symbol_left, symbol_right, decimal_point, thousands_point, decimal_places, value from " . TABLE_CURRENCIES);
      while ($currencies = tep_db_fetch_array($currencies_query)) {
	    $this->currencies[$currencies['code']] = array('title' => $currencies['title'],
                                                       'symbol_left' => $currencies['symbol_left'],
                                                       'symbol_right' => $currencies['symbol_right'],
                                                       'decimal_point' => $currencies['decimal_point'],
                                                       'thousands_point' => $currencies['thousands_point'],
                                                       'decimal_places' => $currencies['decimal_places'],
                                                       'value' => $currencies['value']);
      }
    }

// class methods
    function format($number, $calculate_currency_value = true, $currency_type = '', $currency_value = '') {
      global $currency;

      if ($currency_type == '') {
        $currency_type = $currency;
      }

      if ($calculate_currency_value) {
        $rate = ($currency_value) ? $currency_value : $this->currencies[$currency_type]['value'];
        $format_string = $this->currencies[$currency_type]['symbol_left'] . number_format($number * $rate, $this->currencies[$currency_type]['decimal_places'], $this->currencies[$currency_type]['decimal_point'], $this->currencies[$currency_type]['thousands_point']) . $this->currencies[$currency_type]['symbol_right'];
// if the selected currency is in the european euro-conversion and the default currency is euro,
// the currency will displayed in the national currency and euro currency
        if ( (DEFAULT_CURRENCY == 'EUR') && ($currency_type == 'DEM' || $currency_type == 'BEF' || $currency_type == 'LUF' || $currency_type == 'ESP' || $currency_type == 'FRF' || $currency_type == 'IEP' || $currency_type == 'ITL' || $currency_type == 'NLG' || $currency_type == 'ATS' || $currency_type == 'PTE' || $currency_type == 'FIM' || $currency_type == 'GRD') ) {
          $format_string .= ' <small>[' . $this->format($number, true, 'EUR') . ']</small>';
        }
      } else {
        $format_string = $this->currencies[$currency_type]['symbol_left'] . number_format($number, $this->currencies[$currency_type]['decimal_places'], $this->currencies[$currency_type]['decimal_point'], $this->currencies[$current_type]['thousands_point']) . $this->currencies[$currency_type]['symbol_right'];
      }

      return $format_string;
    }

    function get_value($code) {
      return $this->currencies[$code]['value'];
    }


    function display_price($products_price, $products_tax, $quantity = 1) {
// BOF: WebMakers.com Added: FREE-CALL FOR PRICE-COMING SOON ETC. v2.1
// Handles FREE and Call for Price and Coming Soon, etc., Otherwise return the regular prices
// Original: //      return $this->format(tep_add_tax($products_price, $products_tax) * $quantity);

      global $product_info_values, $my_products_name, $my_products_price, $my_specials_new_products_price;

      switch (true) {

      case ($products_price>=999999):
        if (CALL_IMAGE_ON=='1') {
          return CALL_IMAGE;
        } else {
          return CALL_TEXT;
        }
        break;

      case ($products_price==888888):
        if (SOON_IMAGE_ON=='1') {
          return SOON_IMAGE;
        } else {
          return SOON_TEXT;
        }
        break;

      case ($products_price==777777):
        if (SHOWROOM_IMAGE_ON=='1') {
          return SHOWROOM_IMAGE;
        } else {
          return SHOWROOM_TEXT;
        }
        break;

      case ($products_price==555553):
        if (VISIT_OTHER3_IMAGE_ON=='1') {
          return VISIT_OTHER3_IMAGE;
        } else {
          return VISIT_OTHER3_TEXT;
        }
        break;

      case ($products_price==555552):
        if (VISIT_OTHER2_IMAGE_ON=='1') {
          return VISIT_OTHER2_IMAGE;
        } else {
          return VISIT_OTHER2_TEXT;
        }
        break;

      case ($products_price==555551):
        if (VISIT_OTHER1_IMAGE_ON=='1') {
          return VISIT_OTHER1_IMAGE;
        } else {
          return VISIT_OTHER1_TEXT;
        }
        break;

      case ($products_price==0):
        if (FREE_IMAGE_ON=='1') {
          return FREE_IMAGE;
        } else {
          return FREE_TEXT;
        }
        break;

      case ( strstr($product_info_values['products_name'],BLOW_OUT_CODE) or strstr($my_products_name,BLOW_OUT_CODE) ):
        if ( strstr($_SERVER['PHP_SELF'],'checkout') ) {
          return $this->format(tep_add_tax($products_price, $products_tax) * $quantity);
        } else {
          if (BLOW_OUT_IMAGE_ON=='1') {
            return BLOW_OUT_IMAGE . '<BR>' . $this->format(tep_add_tax($products_price, $products_tax) * $quantity);
          } else {
            return BLOW_OUT_TEXT . '<BR>' . $this->format(tep_add_tax($products_price, $products_tax) * $quantity);
          }
        }
        break;

      case ( strstr($product_info_values['products_name'],TODAY_ONLY_CODE) or strstr($my_products_name,TODAY_ONLY_CODE)  ):
        if (TODAY_ONLY_IMAGE_ON=='1') {
          return TODAY_ONLY_IMAGE . '<BR>' . $this->format(tep_add_tax($products_price, $products_tax) * $quantity);
        } else {
          return TODAY_ONLY_TEXT . '<BR>' . $this->format(tep_add_tax($products_price, $products_tax) * $quantity);
        }
        break;

      case ( strstr($product_info_values['products_name'],THREE_DAYS_ONLY_CODE) or strstr($my_products_name,THREE_DAYS_ONLY_CODE)  ):
        if (THREE_DAYS_ONLY_IMAGE_ON=='1') {
          return THREE_DAYS_ONLY_IMAGE . '<BR>' . $this->format(tep_add_tax($products_price, $products_tax) * $quantity);
        } else {
          return THREE_DAYS_ONLY_TEXT . '<BR>' . $this->format(tep_add_tax($products_price, $products_tax) * $quantity);
        }
        break;

      case ( strstr($product_info_values['products_name'],LIMITED_TIME_ONLY_CODE) or strstr($my_products_name,LIMITED_TIME_ONLY_CODE) ):
        if (LIMITED_TIME_ONLY_IMAGE_ON=='1') {
          return LIMITED_TIME_ONLY_IMAGE . '<BR>' . $this->format(tep_add_tax($products_price, $products_tax) * $quantity);
        } else {
          return LIMITED_TIME_ONLY_TEXT . '<BR>' . $this->format(tep_add_tax($products_price, $products_tax) * $quantity);
        }
        break;

      default:
        return $this->format(tep_add_tax($products_price, $products_tax) * $quantity);
        break;
      }    
// EOF: WebMakers.com Added: FREE-CALL FOR PRICE-COMING SOON ETC. v2.1
    }
  }
?>