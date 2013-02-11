<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" >
<head>
<title>DVDPost - Online DVD rental</title>
<meta name="description" content="Rent your DVDs in Benelux for only 7.95 EUR a month. Free postage. No late fees ever. Choose between more than 27,000 titles. Start your free trial now!" />
<meta name="keywords" content="dvd, dvd rental, dvd rent, movie rent, movie rental, movie rental online, online dvd rental, video rental, online video rental, rent movie, dvd club, dvd rental Belgium, movie rental Belgium, video rental Belgium, DVDPost, DVDPoste, www.dvdpost.be, www.dvdpost.com, dvd post, dvd poste, www.dvdpost.be,
location dvd, location film, film a louer, location dvd internet, location dvd en ligne, location dvd belgique, location film Belgique, 
online videotheek, dvd verhuur, dvd huren, huurfilms, dvd verhuur Belgie, dvd huren Belgie" />
<meta name="y_key" content="6dad1b79d5decc74" />
<meta name="author" content ="Home Entertainment Services" />
<meta name="Revisit-after" content="14 days" />
<meta name="Robots" content="all" />
<link rel="SHORTCUT ICON" href="/favicon.ico" />
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link href="http://private.dvdpost.com/stylesheets/style.css?1322739542" media="all" rel="stylesheet" type="text/css" />
<link href="http://private.dvdpost.com/stylesheets/common.css?1322739542" media="all" rel="stylesheet" type="text/css" />
<link href="http://private.dvdpost.com/stylesheets/menu.css?1322739542" media="all" rel="stylesheet" type="text/css" />
<link href="http://private.dvdpost.com/stylesheets/facebox.css?1322739542" media="all" rel="stylesheet" type="text/css" />
<link href="http://private.dvdpost.com/stylesheets/messages.css?1322739542" media="all" rel="stylesheet" type="text/css" />
<link href="http://private.dvdpost.com/stylesheets/fonts.css?1322739542" media="all" rel="stylesheet" type="text/css" />
<link href="http://private.dvdpost.com/stylesheets/smoothness/jquery-ui-1.8.custom.css?1322739542" media="all" rel="stylesheet" type="text/css" />
<link href="http://www.dvdpost.be/images/relance012012/style.css" media="all" rel="stylesheet" type="text/css" />
<link href="http://private.dvdpost.com/stylesheets/jquery_custom.css?1322739542" media="all" rel="stylesheet" type="text/css" />

<script>
	$('.plus').live("click", function(){
		$('.abo').show()
		$('hid').show()
		$(this).hide()
		return false;
	});
	$('.check').live("click", function(){
		id = $(this).attr('id')
		$('#code').attr('value', id)
		$('.selected').removeClass('selected')
		$(this).parent().parent().addClass('selected')
		
		
		
	});
</script>
<script type="text/javascript">
//<![CDATA[
var AUTH_TOKEN = "g5vS/GqtPtnYx9bIc/ye9hrs8QVAT6P/ekq0jXbCbqw=";
//]]>
</script>
<!--[if IE 6]>
  <script src="/javascripts/DD_belatedPNG.js?1322739542" type="text/javascript"></script>
  <script src="/javascripts/ie6-dd-decl.js?1322739542" type="text/javascript"></script>
  <![endif]-->
</head>
<? 
switch($languages_id)
{
	case 2:
		$lang_test='_nl';
		break;
	case 3:
		$lang_test='_en';
		break;
	default:
		$lang_test='';
}
?>
<body style="background-color:#191e24;" >
<div id="wrap">
  <!--   ==============   HEADER   ==============   -->
  <div id="header_relance" >
    <h1> <a href="http://www.dvdpost.be" class="f-btn" style="">DVDPost - Online DVD rental</a> </h1>
    <div class="relancetopnav">
      <ul class="top-nav">
        <li class="retractation"><a href="/conditions.php#article3"><?= TEXT_RETRA ?> </a></li>
        <li class="langues <?= $languages_id == 1 ? 'selected' : '' ?>"><a href="?language=fr">FR</a></li>
        <li class="langues <?= $languages_id == 2 ? 'selected' : '' ?>"><a href="?language=nl">NL</a></li>
        <li class="langues <?= $languages_id == 3 ? 'selected' : '' ?>"> <a href="?language=en">EN</a> </li>
      </ul>
      <div style="clear:both;"></div>
    </div>
  </div>
  <!--   ==============   END HEADER   ==============   -->
  <div class="relance">
    <p><img src="../images/relance012012/header<?= $lang_test ?>.jpg" width="970" height="388" border="0" /></p>
    <p align="center" ><img src="../images/relance012012/offre_title_again<?= $lang_test ?>.jpg" width="969" height="88" border="0" /></p>
  
    <div id="pricing">
      <form action="login_code.php?force=1">
        <table width="790" cellspacing="0" cellpadding="0" border="0" align="center">
          <tbody>
          
          <tr>
              <td height="20" colspan="5">  <p><?= ALL_FORMULAT ?></p></td>
            </tr>
            <tr class="abo">
              <td width="41"><div class="check" id="BGC2"></div></td>
              <td width="240" align="center"><b><span class="title_pricing">2 films</span></b> <span class="month"><?= PER_MONTH ?></span> </td>
              <td width="20"></td>
              <td width="600" align="left"><strong>2 films</strong> VOD only</td>
              <td align="right"><img src="../images/relance012012/pricing2.png"></td>
             
            </tr>
           
            <tr class="abo">
              <td width="41"><div class="check" id="BGC3"></div></td>
              <td width="240" align="center"><b><span class="title_pricing">3 films</span></b> <span class="month"><?= PER_MONTH ?></span> </td>
              <td width="20"></td>
              <td width="600" align="left"><strong>2 films</strong> <?= ALL_FORMATS ?> <strong>+ 1 <?= IN_VOD?></strong></td>
              <td align="right"><img src="../images/relance012012/pricing3.png"></td>
            </tr>
          
           <tr class="abo">
             <td width="41"><div class="check" id="BGC4"></div></td>
             <td width="240" align="center"><b><span class="title_pricing">4 films</span></b> <span class="month"><?= PER_MONTH ?></span> </td>
             <td width="20"></td>
             <td width="600" align="left"><strong>2 films</strong> <?= ALL_FORMATS ?> <strong>+ 2 <?= IN_VOD?></strong> </td>
             <td align="right"><img src="../images/relance012012/pricing4.png"></td>
           </tr>
           
            <tr class="abo">
              <td width="41"><div class="check" id="BGC5"></div></td>
              <td width="240" align="center"><b><span class="title_pricing">5 films</span></b> <span class="month"><?= PER_MONTH ?></span> </td>
              <td width="20"></td>
              <td width="600" align="left"><strong>3 films</strong> <?= ALL_FORMATS ?> <strong>+ 2 <?= IN_VOD?></strong> </td>
              <td align="right"><img src="../images/relance012012/pricing5.png"></td>
            </tr>
         
            <tr class="abo selected">
              <td width="41"><div class="check" id="BGC6"></div></td>
              <td width="240" align="center"><b><span class="title_pricing">6 films</span></b> <span class="month"><?= PER_MONTH ?></span> </td>
              <td width="20"></td>
              <td width="600" align="left"><strong>4 films</strong> <?= ALL_FORMATS ?> <strong>+ 2 <?= IN_VOD?></strong> </td>
              <td align="right"><img src="../images/relance012012/pricing6.png"></td>
            </tr>
         
            <tr class="abo">
              <td width="41"><div class="check" id="BGC8"></div></td>
              <td width="240" align="center"><b><span class="title_pricing">8 films</span></b> <span class="month"><?= PER_MONTH ?></span> </td>
              <td width="20"></td>
              <td width="600" align="left"><strong>6 films</strong> <?= ALL_FORMATS ?> <strong>+ 2 <?= IN_VOD?></strong> </td>
              <td align="right"><img src="../images/relance012012/pricing8.png"></td>
            </tr>
            
            <tr class="abo" >
              <td width="41"><div class="check" id="BGC11"></div></td>
              <td width="240" align="center"><b><span class="title_pricing">11 films</span></b> <span class="month"><?= PER_MONTH ?></span> </td>
              <td width="20"></td>
              <td width="600" align="left"><strong>8 films</strong> <?= ALL_FORMATS ?> <strong>+ 3 <?= IN_VOD?></strong> </td>
              <td align="right"><img src="../images/relance012012/pricing11.png"></td>
            </tr>
            <tr class="hid" style="display:none">
              <td height="10" colspan="4"></td>
            </tr>
            <tr class="abo" style="display:none">
              <td width="41"><div class="check" id="BGC13"></div></td>
              <td width="240" align="center"><b><span class="title_pricing">13 films</span></b> <span class="month"><?= PER_MONTH ?></span> </td>
              <td width="20"></td>
              <td width="600" align="left"><strong>10 films</strong> <?= ALL_FORMATS ?> <strong>+ 3 <?= IN_VOD?></strong> </td>
              <td align="right"><img src="../images/relance012012/pricing13.png"></td>
            </tr>
            <tr class="hid" style="display:none">
              <td height="10" colspan="4"></td>
            </tr>
            <tr class="abo" style="display:none">
              <td width="41"><div class="check" id="BGC15"></div></td>
              <td width="240" align="center"><b><span class="title_pricing">15 films</span></b> <span class="month"><?= PER_MONTH ?></span> </td>
              <td width="20"></td>
              <td width="600" align="left"><strong>12 films</strong> <?= ALL_FORMATS ?> <strong>+ 3 <?= IN_VOD?></strong> </td>
              <td align="right"><img src="../images/relance012012/pricing15.png"></td>
            </tr>
            <tr class="hid" style="display:none">
              <td height="10" colspan="4"></td>
            </tr>
            
            <tr class="abo" style="display:none">
              <td width="41"><div class="check" id="BGC18"></div></td>
              <td width="240" align="center"><b><span class="title_pricing">18 films</span></b> <span class="month"><?= PER_MONTH ?></span> </td>
              <td width="20"></td>
              <td width="600" align="left"><strong>14 films</strong> <?= ALL_FORMATS ?> <strong>+ 4 <?= IN_VOD?></strong> </td>
              <td align="right"><img src="../images/relance012012/pricing18.png"></td>
            </tr>
            <tr class="hid" style="display:none">
              <td height="10" colspan="4"></td>
            </tr>
            
            <tr class="abo" style="display:none">
              <td width="41"><div class="check" id="BGC20"></div></td>
              <td width="240" align="center"><b><span class="title_pricing">20 films</span></b> <span class="month"><?= PER_MONTH ?></span> </td>
              <td width="20"></td>
              <td width="600" align="left"><strong>16 films</strong> <?= ALL_FORMATS ?> <strong>+ 4 <?= IN_VOD?></strong> </td>
              <td align="right"><img src="../images/relance012012/pricing20.png"></td>
            </tr>
            <tr class="hid" style="display:none">
              <td height="10" colspan="4"></td>
            </tr>
            
            <tr class="abo" style="display:none">
              <td width="41"><div class="check" id="BGC22"></div></td>
              <td width="240" align="center"><b><span class="title_pricing">22 films</span></b> <span class="month"><?= PER_MONTH ?></span> </td>
              <td width="20"></td>
              <td width="600" align="left"><strong>18 films</strong> <?= ALL_FORMATS ?> <strong>+ 4 <?= IN_VOD?></strong> </td>
              <td align="right"><img src="../images/relance012012/pricing22.png"></td>
            </tr>
            <tr>
              <td height="20" colspan="5"><p align="right"><a href="?show=1" class="plus"><img align="absmiddle" alt="Plus" src="../images/relance012012/plus.png"> <?= MORE_BTN ?></a></p></td>
            </tr>
          </tbody>
        </table>
        
   </div>
    <input type='hidden' name='code' id="code" value="BGC6">
		<input type='hidden' name='email' value="<?= $_GET['email'] ?>">
		<input name="force" type="hidden"  value="1">
		
    <p align="center"><input type="submit" class="button_relance" value="<?= CONFIRM_CHOICE ?>" name="sent"></p>
    <p align="center"><?= MORE_INFO ?></p>
  	</form>
  </div>
</div>
</div>
</body>
</html>
