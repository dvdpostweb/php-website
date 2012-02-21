<?php
  class payment {
    var $modules;

// class constructor
    function payment() {
      global $language;

      if (MODULE_PAYMENT_INSTALLED) {        
	    $this->modules = explode(';', 'ogone.php;ogoneamex.php;domiciliation.php'); // get array of installed/active modules

        reset($this->modules);
        while (list(, $value) = each($this->modules)) { // get module defines
          include(DIR_WS_LANGUAGES . $language . '/modules/payment/' . $value);
          include(DIR_WS_MODULES . 'payment/' . $value);

          $class = substr($value, 0, strrpos($value, '.'));
          $GLOBALS[$class] = new $class;
        }
      }
    }

// class methods
    function javascript_validation() {
      $javascript_validation_string = '';
      if (MODULE_PAYMENT_INSTALLED) {
        reset($this->modules);
        while (list(, $value) = each($this->modules)) {
          $class = substr($value, 0, strrpos($value, '.'));
          if ($GLOBALS[$class]->enabled) {
            $javascript_validation_string .= $GLOBALS[$class]->javascript_validation();
          }
        }
      }

      return $javascript_validation_string;
    }

    function selection() {
      $selection_string = '';
      if (MODULE_PAYMENT_INSTALLED) {
        reset($this->modules);
        while (list(, $value) = each($this->modules)) {
          $class = substr($value, 0, strrpos($value, '.'));
          if ($GLOBALS[$class]->enabled) {
            $selection_string .= '<table border="0" cellspacing="0" cellpadding="0" width="100%">' . "\n" .
                                 '  <tr class="payment-odd">' . "\n" .
                                 '    <td class="main-removed">' . $GLOBALS[$class]->title . '</td>' . "\n" .
                                 '    <td align="right" class="main-removed">';
// display radio button option if more than 1 payment module is installed
            if (tep_count_payment_modules() > 1) {
              $selection_string .= tep_draw_radio_field('payment', $GLOBALS[$class]->code);
            } else {
              $selection_string .= tep_draw_hidden_field('payment', $GLOBALS[$class]->code);
            }
            $selection_string .= '&nbsp;</td>' . "\n" .
                                 '  </tr>' . "\n" .
                                 '  <tr class="payment-even">' . "\n" .
                                 '    <td colspan="2">';
            $selection_string .= $GLOBALS[$class]->selection();
            $selection_string .= '&nbsp;</td>' . "\n" .
                                 '  </tr>' . "\n" .
                                 '</table>' . "\n";
          }
        }
      }

      return $selection_string;
    }

    function pre_confirmation_check() {
      global $payment;

      if (MODULE_PAYMENT_INSTALLED) {
        $payment_module_selected = false;
        reset($this->modules);
        while (list(, $value) = each($this->modules)) {
          $class = substr($value, 0, strrpos($value, '.'));
          if ( ($GLOBALS[$class]->code == $payment) && ($GLOBALS[$class]->enabled) ) {
            $payment_module_selected = true;
            $GLOBALS[$class]->pre_confirmation_check();
          }
        }

        if (!$payment_module_selected) {
          tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode(ERROR_NO_PAYMENT_MODULE_SELECTED), 'SSL'));
        }
      }
    }

    function confirmation() {
      global $payment;

      $confirmation_string = '';
      if (MODULE_PAYMENT_INSTALLED) {
        reset($this->modules);
        while (list(, $value) = each($this->modules)) {
          $class = substr($value, 0, strrpos($value, '.'));
          if ( ($GLOBALS[$class]->code == $payment) && ($GLOBALS[$class]->enabled) ) {
            $confirmation_string .= '<table border="0" cellspacing="0" cellpadding="0" width="100%">' . "\n" .
                                    '  <tr>' . "\n" .
                                    '    <td class="main-removed">' . $GLOBALS[$class]->title . '</td>' . "\n" .
                                    '  </tr>' . "\n" .
                                    '</table>' . "\n";
            $confirmation_string .= $GLOBALS[$class]->confirmation();
          }
        }
      }

      return $confirmation_string;
    }

    function process_button() {
      global $payment;

      $process_button_string = '';
      if (MODULE_PAYMENT_INSTALLED) {
        reset($this->modules);
        while (list(, $value) = each($this->modules)) {
          $class = substr($value, 0, strrpos($value, '.'));
          if ( ($GLOBALS[$class]->code == $payment) && ($GLOBALS[$class]->enabled) ) {
            $process_button_string .= $GLOBALS[$class]->process_button();
          }
        }
      }

      return $process_button_string;
    }

    function before_process() {
      global $payment;

      if (MODULE_PAYMENT_INSTALLED) {
        reset($this->modules);
        while (list(, $value) = each($this->modules)) {
          $class = substr($value, 0, strrpos($value, '.'));
          if ( ($GLOBALS[$class]->code == $payment) && ($GLOBALS[$class]->enabled) ) {
            $GLOBALS[$class]->before_process();
          }
        }
      }
    }

    function after_process() {
      global $payment;

      if (MODULE_PAYMENT_INSTALLED) {
        reset($this->modules);
        while (list(, $value) = each($this->modules)) {
          $class = substr($value, 0, strrpos($value, '.'));
          if ( ($GLOBALS[$class]->code == $payment) && ($GLOBALS[$class]->enabled) ) {
            $GLOBALS[$class]->after_process();
          }
        }
      }
    }

    function show_info() {
      global $order;

      $show_info_string = '';
      if (MODULE_PAYMENT_INSTALLED) {
        reset($this->modules);
        while (list(, $value) = each($this->modules)) {
          $class = substr($value, 0, strrpos($value, '.'));
          if ($GLOBALS[$class]->code == $order['payment_method']) {
            $payment_text = $GLOBALS[$class]->title;
          }
        }
        $show_info_string .= '          <tr>' . "\n" .
                             '            <td class="main-removed">' . $payment_text. '</td>' . "\n" .
                             '          </tr>' . "\n";
      }

      return $show_info_string;
    }

    function output_error() {
      global $HTTP_GET_VARS;

      $output_error_string = '';
      if (MODULE_PAYMENT_INSTALLED) {
        reset($this->modules);
        while (list(, $value) = each($this->modules)) {
          $class = substr($value, 0, strrpos($value, '.'));
          if ($GLOBALS[$class]->code == $HTTP_GET_VARS['payment_error']) {
            $output_error_string .= $GLOBALS[$class]->output_error();
          }
        }
      }

      return $output_error_string;
    }

  }
?>
