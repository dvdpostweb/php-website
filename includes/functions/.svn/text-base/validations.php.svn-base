<?php 
/*
  $Id: validations.php,v 1.7 2002/03/16 14:42:36 project3000 Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  ////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // Function    : tep_validate_email
  //
  // Arguments   : email   email address to be checked
  //
  // Return      : true  - valid email address
  //               false - invalid email address
  //
  // Description : function for validating email address that conforms to RFC 822 specs
  //
  //               This function is converted from a JavaScript written by 
  //               Sandeep V. Tamhankar (stamhankar@hotmail.com). The original JavaScript
  //               is available at http://javascript.internet.com
  //
  // Sample Valid Addresses:
  //
  //    first.last@host.com
  //    firstlast@host.to
  //    "first last"@host.com
  //    "first@last"@host.com
  //    first-last@host.com
  //    first.last@[123.123.123.123]
  //
  // Invalid Addresses:
  //
  //    first last@host.com
  //    
  //
  ////////////////////////////////////////////////////////////////////////////////////////////////
  function tep_validate_email($email) {
    $valid_address = true;
    
    $mail_pat = '^(.+)@(.+)$';
    $valid_chars = "[^] \(\)<>@,;:\.\\\"\[]";
    $atom = "$valid_chars+";
    $quoted_user='(\"[^\"]*\")';
    $word = "($atom|$quoted_user)";
    $user_pat = "^$word(\.$word)*$";
    $ip_domain_pat='^\[([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})\]$';
    $domain_pat = "^$atom(\.$atom)*$";
    
    if (eregi($mail_pat, $email, $components)) {
    
      $user = $components[1];
      $domain = $components[2];

      // validate user  
      if (eregi($user_pat, $user)) {
        // validate domain
        if (eregi($ip_domain_pat, $domain, $ip_components)) {
          // this is an IP address
      	  for ($i=1;$i<=4;$i++) {
      	    if ($ip_components[$i] > 255) {
      	      $valid_address = false;
      	      break;
      	    }
          }
        }
        else {
          // Domain is symbolic name
          if (eregi($domain_pat, $domain)) {
  
            /* domain name seems valid, but now make sure that it ends in a
               three-letter word (like com, net, org, gov, edu, int) or a two-letter word,
               representing country (ca, uk, nl), and that there's a hostname preceding 
               the domain or country. */
  
            $domain_components = explode(".", $domain);          
  
            // Make sure there's a host name preceding the domain.
            if (sizeof($domain_components) < 2)
              $valid_address = false;
            else {
              $top_level_domain = strtolower($domain_components[sizeof($domain_components)-1]);
              if (strlen($top_level_domain) < 2 || strlen($top_level_domain) > 6)
                $valid_address = false;
              elseif (strlen($top_level_domain) <= 6 && strlen($top_level_domain) >= 3) {
                switch ($top_level_domain) {
                  case 'com':
                  case 'net':
                  case 'org':
                  case 'gov':
                  case 'edu':
                  case 'int':
                  case 'biz':
                  case 'mil':
                  case 'info':
                  case 'name':
                  case 'aero':
                  case 'coop':
                  case 'museum':
                    break;
                  default:
                    $valid_address = false;
                    break;
                }
              }
            }
          }
          else {
      	    $valid_address = false;
      	  }
      	}
      }
      else {
        $valid_address = false;
      }
    }
    else
      $valid_address = false;

    if ($valid_address && ENTRY_EMAIL_ADDRESS_CHECK == 'true') {
      if (!checkdnsrr($domain, "MX") && !checkdnsrr($domain, "A")) {
        $valid_address = false;
      }
    }
    
    return $valid_address;
  }
?>