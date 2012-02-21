			<link href="http://private.dvdpost.com/stylesheets/style.css?1322739542" media="all" rel="stylesheet" type="text/css" />
			<style>

			.offre {
			    background: url("../images/bg_offre.jpg") no-repeat scroll 0 13px transparent;
			    font-size: 20px;
			    height: 216px;
			    margin: 0 auto;
			    padding-top: 10px;
			    width: 803px;
				color:#232224;
			}

			.offre_end {
			    font-size: 17px;
			    margin: 0 auto;
			    padding-bottom: 4px;
			    width: 586px;
			}

			.offre_end a{

			color:#f92b06;
			text-decoration: underline;

			}
			.offre_verslavenir h1 {
			text-align:center;
			font-weight: normal;
			color:#232224;

			}
			.offre_verslavenir .catalogue {

			color:#f92b06;

			}

			#header {
			    height: 60px;
			    position: relative;
			    width: 100%;
			    z-index: 100;
			}

			#header h1 a {
			    background: url("http://www.dvdpost.be/images/relance012012/logoverslavenir.jpg") no-repeat scroll 0 0 transparent;
			    height: 65px;
			    width: 970px;
			}

			#header h1 {
			    float: left;
			    height: 47px;
			    margin: 4px 0 0 0;
			    width: 210px;
			}

			html, body {
			    background: #191e24 !important;

			    margin: 0;
			    padding: 0;
			    text-align: center;
			}

			.offre_verslavenir a{

			color:#f92b06;
			text-decoration: underline;

			}

			.offre_verslavenir {font-size:14px;
			padding-bottom:40px;

			}

			.button_versavenir {
			    background: url("http://www.dvdpost.be/images/relance012012/button.png") no-repeat scroll 0 0 transparent;
			    border: medium none;
			    color: white;
			    cursor: pointer;
			    font-size: 21px;
			    font-weight: bold;
			    height: 49px;
			    margin-bottom: 30px;
			    width: 299px;
			}
			#background
			{
				background: none;
			}
			</style>
			</head>
			<body style="background-color:#46a031;" >
				<div id="wrap">
				  <!--   ==============   HEADER   ==============   -->
				  <div id="header" >
				    <h1> <a href="/fr" class="f-btn" style="">DVDPost - Online DVD rental</a> </h1>
				  </div>
				  <!--   ==============   END HEADER   ==============   -->
				  <div class="container clearfix">
				  <div class="offre_verslavenir">


				    <p><img src="../images/relance012012/header<?= $lang_test ?>.jpg" width="970" height="388" border="0" /></p>
				    <p align="center" ><img src="../images/relance012012/offre_title<?= $lang_test ?>.jpg" width="969" height="115" border="0" /></p>
				     <div class="offre_end">
				      <p>A la fin de cette promotion exceptionnelle, si vous êtes charmé par notre service et que vous vous abonnez, <strong>vous bénéficierez de</strong>:
				      <p><img src="../images/relance012012/carre.gif" /> <strong>10% sur votre abonnement pendant 3 mois</strong>, sur la formule de votre choix.
				        <a href="">(voir tous nos prix)</a>. </p>
				      <p><img src="../images/relance012012/carre.gif" /> <strong>un câble VOD</strong> qui vous permettra de connecter votre ordinateur à votre TV. </p>
				      </p>
				    </div>
				    <p align="center">
							<form name="form1" method="post" action="activation_code_confirm.php" align="center">
								<input name="code" id="code" type="hidden"  value="verslavenir1">
								<input  class="button_versavenir" type="submit" name=sent value="<?= TRY_US ?>">
							</form>
						</p>
				    <p align="center"><?= MORE_INFO ?></p>
				    <p></p>
				  </div>


				  </div></div>
				</div>
		</body>