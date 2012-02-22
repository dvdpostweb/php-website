<?php  
require('configure/application_top.php');

require 'authentification/src/authentification.php';
require 'authentification/examples/example2.php';
if (DEFAULT_LANGUAGE !='' || $language_id>0 ){
	tep_redirect(tep_href_link('default.php', '', 'NONSSL'));	
}
else
{
	$lang_browser = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	switch($lang_browser)
	{
		case 'fr':
		case 'nl':
		case 'en':
			tep_redirect(tep_href_link('default.php?language='.$lang_browser, '', 'NONSSL'));	
		break;
		default:
			tep_redirect(tep_href_link('default.php?language=en', '', 'NONSSL'));	
			
	}
}

?>

<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html dir="LTR" lang="fr">
<head>
<title>DVDPost - Online DVD rental</title>
<META NAME="description" lang="nl" content="">
<META NAME="description" lang="fr" content="DVDPost : Louez des DVDs de manière illimitée pour seulement 11.95 par mois. Frais de ports gratuits. Pas d'amende de retard. Pas de dare de retour. Choix de plus de 10000 titres.Essayez gratuitement.">
<META NAME="description" lang="en" content="DVDPost : Rent unlimited DVDs in Benelux for only 11.95 per month. All postage paid. No late fees. No due dates. Free trial period. More than 10000+ titles.">
<META NAME="keywords" content="dvd, dvd rental, dvd rent, movie rent, movie rental, movie rental online, online dvd rental, video rental, online video rental, rent movie, dvd club, dvd rental Belgium, movie rental Belgium, video rental Belgium, DVDPost, DVDPoste, www.dvdpost.be, www.dvdpost.com, dvd post, dvd poste, www/dvdpost.be,location dvd, location film, film a louer, location dvd internet, location dvd en ligne, location dvd belgique, location film Belgique, online videotheek, dvd verhuur, dvd huren, huurfilms, dvd verhuur Belgie, dvd huren Belgie">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">
<link rel="stylesheet" type="text/css" href="/stylesheet/stylesheet.css">
<style type="text/css">
<!--
a.language{text-decoration:none;
	font-size: 20px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight:bold;}
a.language:link {
	color: #FFFFFF; 
}
a.language:visited {
	color: #FFFFFF; 
}
a.language:hover {
	color: #EB0007; 
}
a.language:active {
	color: #990000; 
}
-->
</style>
</head>

<body>
<table width="697" height="600"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="middle"><table width="683" height="431" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="683" height="68"><img src="<?= $constants['DIR_DVD_WS_IMAGES'] ?>/home/header.gif" width="683" height="68"></td>
      </tr>
      <tr>
        <td height="63" background="<?= $constants['DIR_DVD_WS_IMAGES'] ?>/home/languages.jpg"><table width="683" height="19" border="0" cellpadding="0" cellspacing="0">
            <tr align="center" valign="middle">
              <td width="227" height="19"><span ><a class="language" href="default.php?language=fr">Fran&ccedil;ais</a></span></td>
              <td width="227" ><a class="language" href="default.php?language=nl">Nederlands</a></td>
              <td width="229" ><a class="language" href="default.php?language=en">English</a></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="300"><img src="<?= $constants['DIR_DVD_WS_IMAGES'] ?>/home/homepage.jpg" width="683" height="300"></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="15" class="invisible_form_txt" align="center">
			Découvrez la location de DVD par internet et recevez vos DVD par la poste. DVDPost, numéro 1 en location de DVD en Belgique, vous propose toutes le dernières nouveautés DVD et sorties DVD en ligne.
    </td>
  </tr>
  <tr>
    <td height="13" class="invisible_form_txt" align="center">
			Ontdek hoe gemakkelijk DVD verhuur is op onze online viedeotheek en ontvang uw huurfilms thuis. Dankzij DVDPost kan je de nieuwste film, tekenfilm, of andere op DVD huren.
	</td>
  </tr>
</table>
</body>
</html>

<!-- Google Analytics tag -->
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1121531-1";
urchinTracker();
</script>

</body>
</html>

<?php  
require('configure/application_bottom.php');
?>