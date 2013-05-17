$(function() {
  // Ajax history, only works on the product.reviews for now
  $("#codePromo").live("click", function() {
    a = $(this);
    jQuery.facebox(function() {
      $.getScript(a.attr('href'), function(data) {
        jQuery.facebox(data);
      });
    });
    return false;
  });
  $("#retra").live("click", function() {
    a = $(this);
    jQuery.facebox(function() {
      $.getScript(a.attr('href'), function(data) {
        jQuery.facebox(data);
      });
    });
    return false;
  });
});
