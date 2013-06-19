<link href="stylesheet/jb_styles.css?v=4" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/question2.js?v=2"></script>

<div class="jbwrapper">
      <div class="jbcontainer">
        <div class="jblogo"><a href="/default.php">DVDPost.be</a></div>

        <div class="jbtopnav">
          <ul class="top-nav">
						<li class="retractation"><a href="/conditions.php"><?= TEXT_RETRA ?> </a></li>
            <li class="langues"><a href="/default.php?language=fr">FR</a></li>
            <li class="langues"><a href="/default.php?language=nl">NL</a></li>
            <li class="langues"> <a href="/default.php?language=en">EN</a> </li>
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
            <div class="promo"><?= TEXT_PROMO ?></div>
						<span>
							<a href="http://public.dvdpost.com/<?= $lang_short ?>/products?jacob=<?= $jacob ?>" class="browse_button"><?= EXPLORER ?></a>
						</span> 
            <span>
							<a href="step1.php" class="signup_button"><?= TEXT_SUB ?></a>
						</span> 
						<span>
							<a href="/promotion.php?jacob=1" id="codePromo" class="promo_code"><?= strtolower(TEXT_PROMO_CODE) ?>? 
								<span><?= TEXT_CLICK_HERE ?></span></a>
						</span>
						<p class="text_retraction"><?= TEXT_RETRA_LINK ?></p>
					</div>

         <? require('partial/default/jacob_questions.php') ?>
            <? if (1==0) {?>
		        	<div class="bannermpu_area"><img src="/images/jb/mpubanner.gif" /></div>
						<? } ?>
			      
          </div>
          <div class="content_jb">

            <div id="howdoesitworks"><img src="/images/jb/howdoesitworks_<?= $lang_short ?>.gif" /></div>
            <div><a href="how_public.php" class="moreabout"><?= MORE ?></a></div>
            <div style="clear:both;"></div>

            <div class="bannervod_<?= $lang_short ?>">
              <div class="signup_vod_<?= $lang_short ?>">
                <p><?= SUB_NOW ?></p>
                

              </div>
              <div class="buttonmoreabout"><a href="http://public.dvdpost.com/<?= $lang_short ?>/streaming_products/faq?jacob=<?= $jacob ?>" class="moreabout_vod"><?= MORE_VOD ?></a></div>
              <div style="clear:both;"></div>

            </div>

            <div class="notrialcopy"><img src="/images/jb/cards.png" /></div>
            <div class="notrial"></div>
            <div style="clear:both;"></div>
            <div class="liner"></div>
            <div class="facebook_area">
              <h2><?= FACEBOOK ?></h2>
							<div id="likebox" style="width: 508px; height: 200px; padding: 7px;">
								<div id="likebox-frame" style="width: 508px; height: 200px; overflow: hidden;">
							<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fdvdpost&amp;width=515&amp;colorscheme=light&amp;connections=9&amp;stream=false&amp;header=false&amp;height=200" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:515px; height:165px; background-color: #fff;margin: -1px -4px 0 -4px;"></iframe></div>
            </div></div>
						
						
						
          </div>
          <div style="clear:both;"></div>
        </div>
