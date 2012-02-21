<?php
require('configure/application_top.php');

tep_db_query("UPDATE `shopping_orders_new` SET `status` = '3' WHERE  `shopping_orders_id` = '" . $order_id . "' and products_id ='" . $products_id . "'");

tep_db_query("insert into shopping_orders_new_status_history (shopping_orders_id, new_value, old_value, date_added ) values ('" . $order_id . "', 3,2,now()) ");

tep_redirect(tep_href_link('mydvdbought_adult.php', '', 'SSL'));



require('configure/application_bottom.php');

?>


