<link href="stylesheet/jb_styles.css" rel="stylesheet" type="text/css" />
<div class="jbwrapper">
  <div class="jbcontainer">
    <div class="jblogo"><a href="/default.php">DVDPost.be</a></div>

    <div class="jbtopnav">
      <ul class="top-nav"><li class="retractation"><a href="/conditions.php"><?= TEXT_RETRA ?> </a></li><li class="langues"><a href="/how.php?language=fr">FR</a></li>
        <li class="langues"><a href="/how.php?language=nl">NL</a></li>
        <li class="langues"> <a href="/how.php?language=en">EN</a> </li>
        <li><a class="login" href="/login.php">Login membres</a></li>

      </ul>
      <div style="clear:both;"></div>
    </div>
    <div style="clear:both;"></div>
    <? if (1==0) {?>
		<div class="bannerleaderbord_area"><img src="/images/jb/leaderboard.gif" /></div>
		<? }?>
    <div class="breadcrumb"><a href="default.php"><?= HOME ?></a></div>
    <div id="container">
      <div class="banner_title"><?= HUGE_CATALOG ?></div>
			

      <div class="banner" align="center">
        <p><?= TEXT_PROMO ?></p>
        <span>
					<a href="step1.php" class="signup_button"><?= TEXT_SUB ?></a>
				</span> 
				<span>
					<a href="catalog.php" class="browse_button"><?= EXPLORER ?></a>
				</span> 
				<span>
					<a href="/promotion.php?jacob=1" id="codePromo" class="promo_code"><?= strtolower(TEXT_PROMO_CODE) ?>? 
						<span><?= TEXT_CLICK_HERE ?></span></a>
				</span>
				<p class="text_retraction">Vous disposez d'un <a href="">d&eacute;lai de r&eacute;tractation de 15 jours</a> &agrave; partir de la date de votre inscription sur notre site. </p>
			</div>

     <? require('partial/default/jacob_questions.php') ?>
        <? if (1==0) {?>
        	<div class="bannermpu_area"><img src="/images/jb/mpubanner.gif" /></div>
				<? } ?>
	      
      </div>
        <div class="content_jb">
          <div class="page_how">
            <div class="vod_area"><img src="images/jb/vodtotv.gif" />
              <p><strong><?= TEXT_VOD ?></strong></p>
             
              <p class="text_intro"><?= TEXT_VOD_DESC ?></p>
              <p class="more_button" id="plus_vod"><?= TEXT_PLUS ?></p>
            </div>
          </div>
          <div class="dvd_area"><img src="images/jb/dvdbluray.gif" />
            <p><strong><?= TEXT_DVD2 ?></strong></p>
            
            <p class="text_intro"><?= TEXT_DVD_DESC ?></p>
            <p class="more_button" id="plus_location"><?= TEXT_PLUS ?></p>
          </div>
          <div style="clear:both;"></div>
          <div class="more_about">
						<span class="active">
            	<h3 id ='search_title'><?= TEXT_SEARCH ?></h3>
						</span>
            <div id='search_panel'>
            	<div class="content_left">
              <div class="text_explain"><img src="images/jb/icon_search.gif" />
                <p><?= TEXT_SEARCH_DESC ?></p>
              </div>
              <div class="text_explain"><img src="images/jb/icon_stars.gif"/>
                <p><?= TEXT_RATE ?></p>
              </div>
              <div class="text_explain"><img src="images/jb/icon_cinema.gif" />
                <p></p>
              </div>
            </div>
            	<div class="content_right">
              <div class="text_explain"><img src="images/jb/icon_books.gif"/>
                <p><?= TEXT_BOOK ?></p>
              </div>
              <div class="text_explain"><img src="images/jb/icon_check.gif" />
                <p><?= TEXT_FILTER ?></p>
              </div>
            </div>
							<div style="clear:both;"></div>
						</div>
						<span>
           	<h3 id ='vod_title'><?= TEXT_VOD_TITLE ?></h3>
						</span>
						<div id="vod_panel" style="display:none">
							<div class="content_left">
                <div class="text_explain"><img src="images/jb/icon48h.gif" />
                  <p><?= TEXT_VOD_TITLE_DESC ?></p>
                </div>
                <div class="text_explain"><img src="images/jb/icon_tv.gif" />
                  <p><?= TEXT_VOD_TV ?></p>
                </div>
              </div>
              <div class="content_right">
                <div class="text_explain"><img src="images/jb/iconvo.gif"/>
                  <p><?= TEXT_VOD_SUB?></p>
                </div>
              </div>
              <div style="clear:both;"></div>
						</div>
						<span>
            <h3 id ='location_title'><?= TEXT_LOC ?></h3>
						</span>
						<div id="location_panel" style="display:none">
							<div class="content_left">
                <div class="text_explain"><img src="images/jb/icon_ajouter.gif" />
                  <p><?= TEXT_ADD ?></p>
                </div>
                <div class="text_explain"><img src="images/jb/icon_truck.gif"/>
                  <p><?= TEXT_TRUCK ?></p>
                </div>
              </div>
              <div class="content_right">
                <div class="text_explain"><img src="images/jb/icon_enveloppe.gif"/>
                  <p><?= TEXT_LETTER ?></p>
                </div>
                <div class="text_explain"><img src="images/jb/icon_no.gif" />
                  <p><?= TEXT_ICONE ?></p>
                </div>
              </div>
              <div style="clear:both;"></div>
						</div>
						
          </div>
        </div>
				<div style="clear:both"></div>
      </div>
    </div>
    <div style="clear:both"></div>
  </div>
</div>
