<?php
require('../../configure/application_top.php');

define('TEXT_META_TITLE1','dvdpost : ');
define('TEXT_META_TITLE2','faq summer power');

$content='<style type="text/css">
<!--
h1 {
text-align:center;
}


#lot td{

border:#666666 solid 1px;
padding: 5px 5px 5px 5px;

}
#text {
	margin:0 auto;
	color: #666666;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	width:900px;
}
-->
</style>
</head>

<body>
<table width="970" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr><td>
<div id="text">

<h1 align="center">FAQ</h1>


<h2>Combien de locations est-ce que je reçois ?</h2>
6 locations gratuites par mois pendant 2 mois soit jusqu\'à 12 locations gratuites sur 2 mois maximum, les locations non-utilisées seront reportées sur votre abonnement payant.


<h2>Est-ce vraiment gratuit ?</h2>
 Complètement, vous bénéficiez de  vos 12 locations gratuites pendant 2 mois sans être  facturé d\'un seul €.

<h2>Quand vais -je commencer à payer ?</h2>
Uniquement après votre période gratuite, soit 2 mois après l\'activation de votre promotion. Sauf si vous souhaitez être reconduit plus tôt.

<h2>Combien vais-je devoir payer ?</h2>
Vous serez reconduit sur la base de 6DVD par mois soit une montant de 19,95€, à tout moment vous pouvez augmenter ou diminuer le nombre de locations mensuelles.

Si je veux suspendre ou arrêter mon abonnement avant la période d\'un an d\'abonnement ?
L\'abonné peut  a tout moment suspendre son  abonnement pour une période de 3 mois maximum, dans ce cas la période de l\'abonnement payant sera prolongée au prorata de la période de suspension
Si l\'abonné désire arrêter son abonnement avant la date prévue (soit 12 mois complets à partir de l\'activation de son abonnement), HESsa-DVDpost demandera une indemnité de rupture équivalente à un mois de location pour 6 DVD soit 19,95€- L\'arrêt de l\'abonnement sera immédiat sauf si l\'abonné est encore en possession de DVD. Dans ce cas l\'arrêt effectif rentrera en vigueur le lendemain de la réception de DVD. <br /><br /><br />
</div></td></tr></table>';
include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_2009.php'));
?>
