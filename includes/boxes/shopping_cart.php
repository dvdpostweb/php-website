<?php 
?>
<!-- shopping_cart //-->
          <tr>
            <td>
<?php 
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => BOX_HEADING_SHOPPING_CART
                              );
  new infoBoxHeading($info_box_contents, false, true, tep_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'));

  $cart_contents_string = '';
  if ($cart->count_contents() > 0) {
    $cart_contents_string = '<table border="0" width="100%" cellspacing="0" cellpadding="0">';
    $products = $cart->get_products(); // $products[$i]['id'] .. $products[$i]['name'] .. $products[$i]['quantity']
    for ($i=0; $i<sizeof($products); $i++) {
      $cart_contents_string .= '<tr><td align="right" valign="top" class="infoBoxContents">';

      if ((tep_session_is_registered('new_products_id_in_cart')) && ($new_products_id_in_cart == $products[$i]['id'])) {
        $cart_contents_string .= '<span class="newItemInCart">'; // highlight product quantity
      } else {
        $cart_contents_string .= '<span class="infoBoxContents">';
      }

	  if ($products[$i]['id']<10){
      $cart_contents_string .= $products[$i]['quantity'] . '&nbsp;x&nbsp;</span></td><td valign="top" class="infoBoxContents"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO_OTHER, 'products_id=' . $products[$i]['id'], 'NONSSL') . '">';
	  }else{
      $cart_contents_string .= $products[$i]['quantity'] . '&nbsp;x&nbsp;</span></td><td valign="top" class="infoBoxContents"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id'], 'NONSSL') . '">';
	  }

      if ((tep_session_is_registered('new_products_id_in_cart')) && ($new_products_id_in_cart == $products[$i]['id'])) {
        $cart_contents_string .= '<span class="newItemInCart">'; // highlight product name
      } else {
        $cart_contents_string .= '<span class="infoBoxContents">';
      }

      $cart_contents_string .= $products[$i]['name'] . '</span></a></td></tr>';

      if ((tep_session_is_registered('new_products_id_in_cart')) && ($new_products_id_in_cart == $products[$i]['id'])) {
        tep_session_unregister('new_products_id_in_cart');
      }
    }
    $cart_contents_string .= '</table>';
  } else {
    $cart_empty = 1;
    $cart_contents_string .= BOX_SHOPPING_CART_EMPTY;
  }

  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => $cart_contents_string
                              );

  if (!$cart_empty) {
    $info_box_contents[] = array('align' => 'left',
                                 'text' => tep_draw_separator()
                           );
    $info_box_contents[] = array('align' => 'right',
                                 'text'  => $currencies->format($cart->show_total())
                                );
  }

  new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- shopping_cart_eof //-->
