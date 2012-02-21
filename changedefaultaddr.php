<?php
require('configure/application_top.php');

$current_page_name = FILENAME_CHANGE_DEFAULT_ADDR;

if (!tep_session_is_registered('customer_id')) {
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

tep_db_query("update customers set customers_default_address_id = '" . $HTTP_GET_VARS['customers_default_address_id'] . "' where customers_id = '" . $customer_id . "' ");

tep_redirect(tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'));

?>