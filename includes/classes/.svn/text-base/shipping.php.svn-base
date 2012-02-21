<?php
/*
  $Id: shipping.php,v 1.13 2002/05/27 18:19:55 dgw_ Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  class shipping {
    var $modules;

// class constructor
    function shipping() {
      global $shipping_count, $language;

      $shipping_count = 0;
      if (MODULE_SHIPPING_INSTALLED) {
        $this->modules = explode(';', MODULE_SHIPPING_INSTALLED); // get array of accepted modules
        reset($this->modules);
        while (list(, $value) = each($this->modules)) {
          include(DIR_WS_LANGUAGES . $language . '/modules/shipping/' . $value);
          include(DIR_WS_MODULES . 'shipping/' . $value);

          $class = substr($value, 0, strrpos($value, '.'));
          $GLOBALS[$class] = new $class;
        }
      }
    }

// class methods
    function selection() {
      $selection_string = '';
      if (MODULE_SHIPPING_INSTALLED) {
        reset($this->modules);
        while (list(, $value) = each($this->modules)) {
          $class = substr($value, 0, strrpos($value, '.'));
          if ($GLOBALS[$class]->enabled) {
            $selection_string .= $GLOBALS[$class]->selection();
          }
        }
        $selection_string .= tep_draw_hidden_field('shipping_quote_all', '0');
      }

      return $selection_string;
    }

    function quote() {
      global $total_weight, $shipping_weight, $shipping_quoted, $shipping_num_boxes;

      if (MODULE_SHIPPING_INSTALLED) {
        $shipping_quoted = '';
        $shipping_num_boxes = 1;
        $shipping_weight = $total_weight;

        if ($total_weight > SHIPPING_MAX_WEIGHT) { // Split into many boxes
          $shipping_num_boxes = ceil($total_weight/SHIPPING_MAX_WEIGHT);
          $shipping_weight = $total_weight/$shipping_num_boxes;
        }

        if ($shipping_weight < SHIPPING_BOX_WEIGHT*SHIPPING_BOX_PADDING/100) {
          $shipping_weight = $shipping_weight+SHIPPING_BOX_WEIGHT;
        } else {
          $shipping_weight = $shipping_weight + ($shipping_weight*SHIPPING_BOX_PADDING/100);
        }

        reset($this->modules);
        while (list(, $value) = each($this->modules)) {
          $class = substr($value, 0, strrpos($value, '.'));
          if ($GLOBALS[$class]->enabled) {
            $GLOBALS[$class]->quote();
          }
        }
      }
    }

    function cheapest() {
      if (MODULE_SHIPPING_INSTALLED) {
        reset($this->modules);
        while (list(, $value) = each($this->modules)) {
          $class = substr($value, 0, strrpos($value, '.'));
          if ($GLOBALS[$class]->enabled) {
            $GLOBALS[$class]->cheapest();
          }
        }
      }
    }

    function display() {
      $display_string = '';
      if (MODULE_SHIPPING_INSTALLED) {
        reset($this->modules);
        while (list(, $value) = each($this->modules)) {
          $class = substr($value, 0, strrpos($value, '.'));
          if ($GLOBALS[$class]->enabled) {
            $display_string .= $GLOBALS[$class]->display();
          }
        }
      }

      return $display_string;
    }

    function confirm() {
      if (MODULE_SHIPPING_INSTALLED) {
        reset($this->modules);
        while (list(, $value) = each($this->modules)) {
          $class = substr($value, 0, strrpos($value, '.'));
          if ($GLOBALS[$class]->enabled) {
            $GLOBALS[$class]->confirm();
          }
        }
      }
    }
  }
?>