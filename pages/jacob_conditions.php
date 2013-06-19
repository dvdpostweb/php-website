<link href="stylesheet/jb_styles.css" rel="stylesheet" type="text/css" />
<?php
$link = PRIVATE_SITE.'/'.$lang_short.'/wishlist_start?login=1';
$sponsorship_link = PRIVATE_SITE.'/'.$lang_short.'/sponsorships?login=1';

?>
<link href="stylesheet/jb_styles.css" rel="stylesheet" type="text/css" />
<div class="jbwrapper">
  <div class="jbcontainer">
    <div class="jblogo"><a href="/default.php">DVDPost.be</a></div>
    <div class="jbtopnav">
      <ul class="top-nav"><li class="retractation"><a href="/conditions.php"><?= TEXT_RETRA ?> </a></li><li class="langues"><a href="/step4.php?language=fr">FR</a></li>
        <li class="langues"><a href="/step4.php?language=nl">NL</a></li>
        <li class="langues"><a href="/step4.php?language=en">EN</a> </li>
        <li><a class="login" href="/login.php">Login membres</a></li>
      </ul>
      <div style="clear:both;"></div>
    </div>
    <div style="clear:both;"></div>
    <div class="breadcrumb"><a href="/default.php" class="link_selected">Home &gt;</a> <a href="" class="link_selected"><?= HEADING_TITLE ?></a> </div>
<div class="main-holder">

<table width="930" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  
  <tr>
    <td colspan="2"  class="SLOGAN_DETAIL"><br><?php  echo TEXT_INFORMATION; ?></td>    
  </tr>
<?php
switch($_GET['special'])
{
	case 'power':
		echo '<tr><td>'.TEXT_INFORMATION_POWER_SUMMER.'</td></tr>';
	break;
	
}
?>
</table>

</div></div></div>