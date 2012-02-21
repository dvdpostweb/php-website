<?
switch(WEB_SITE_ID){

		case 15:
			$bckgcolor="#DDE4ED";
			$buttongo="exell/button_go_search.jpg";
			break;
			
		case 20:
			$bckgcolor="#DDE4ED";
			$buttongo="exell/button_go_search.jpg";
			break;

		default:
			$bckgcolor="#C4C4C4";
			$buttongo="button_go_search.jpg";
		break;
		}

?>

<table width="731" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr >
    <td colspan="2" align="center"><img src="<?php echo DIR_WS_IMAGES;?>menu_black_line.jpg" width="731" height="3"></td>
  </tr>
  <tr>
    <td width="365" height="23" nowrap bgcolor="<? echo $bckgcolor ; ?>" Class="dvdpost_left_menu_title"><div align="left"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="30" height="3"><b><a class="dvdpost_right_menu_more" href="catalog.php"><font color="black"><? echo TEXT_CATALOG;?></font></a></b></div></td>
    <td width="366" align="right" nowrap bgcolor="<? echo $bckgcolor ; ?>" Class="dvdpost_left_menu_title"><table width="159" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <form name="quick_find2" action="advanced_search_result2_public.php" method="get" enctype="text/plain">
          <td width="115" height="23" valign="middle" bgcolor="<? echo $bckgcolor ; ?>"><div align="center">
              <input name="keywords" type="text" class="TYPO_PROMO" value="<? echo TEXT_MOTOR ;?>" size="40" onclick="quick_find2.keywords.value='';">
          </div></td>
          <td width="44" valign="bottom" bgcolor="<? echo $bckgcolor ; ?>"><input type="image" src="<?php echo DIR_WS_IMAGES;?><? echo $buttongo;?>" align="bottom"></td>
        </form>
      </tr>
    </table></td>
  </tr>
</table>