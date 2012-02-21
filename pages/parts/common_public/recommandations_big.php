<table border="0" style="padding:0;spacing:0;width:100%">
  <tr>
<?php
if (RECOMMANDATIONS_SHOW_SUBCATEGORIES) include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/subcategories.php'));
?>
<?php
include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/recommandations.php'));
?>
  </tr>
</table>