



$(function() {
  

  $("#condition").live("click", function() {
    wishlist_item = $(this);
    jQuery.facebox(function() {
      $.getScript(wishlist_item.attr('href'), function(data) {
        jQuery.facebox(data);
      });
    });
    return false;
  });
  $("#login_code").live("click", function() {
    wishlist_item = $(this);
    window.location.href= wishlist_item.attr('href')+'&code='+$("#code").attr('value');
    return false;
  });
});
