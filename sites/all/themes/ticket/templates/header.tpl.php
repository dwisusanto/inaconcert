<header id="header">

	<div id="header-top">

		<div class="wrapper clearfix">

			<div class="topitis">

        <i>it's all about concerts</i>

      </div>

			<ul class="clearfix social-links">

				<li class="rss-icon">

					<a target="_blank" title="RSS" href="<?php print url("rss.xml"); ?>">

						<img src="<?php print $image_path; ?>icons/rss-icon.png" alt="">                        

					</a>

				</li>

				<li class="twitter-icon">

					<a target="_blank" title="Twitter" class="twitter" href="http://www.twitter.com/inaconcerts">

						<img src="<?php print $image_path; ?>icons/twitter-icon.png" alt="">                        

					</a>

				</li>

				<li class="facebook-icon">

					<a target="_blank" title="Facebook" class="facebook" href="http://www.facebook.com/inaconcerts">

						<img src="<?php print $image_path; ?>icons/facebook-icon.png" alt="">

					</a>

				</li> 

                <li class="gplus-icon">

                    <a target="_blank" title="Instagram" href="http://www.instagram.com/inaconcerts">

                        <img src="<?php print $image_path; ?>icons/gplus-icon.png" alt="">                        

                    </a>

                </li>               

			</ul><!--end:social-links-->	

		</div><!--wrapper--> 

	</div>

    <!--header-top-->

	<div class="wrapper">

		<h1 id="logo-image" class="left"><a href="<?php print url(); ?>"><img src="<?php print $theme_path; ?>placeholders/logo.png" alt="logo"></a></h1>
        <div class="top-banner">
                <script type="text/javascript"><!--
				google_ad_client = "ca-pub-2985260428327422";
				/* inacon-2 */
				google_ad_slot = "3670220049";
				google_ad_width = 468;
				google_ad_height = 60;
				//-->
				</script>
				<script type="text/javascript"
				src="//pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
            </div>
            <div class="clear"></div>

	</div><!--end:wrapper-->

	<div id="header-bottom" class="wrapper clearfix ">

		<nav id="main-menu">			

			<ul class="clearfix" id="main-nav">

				<li class="current-menu-item"><a href="<?php print url("");?>">HOME</a></li>
				<li><a href="<?php print url("concert-page");?>">TIXBOX</a></li>
                <li><a href="<?php print url("news-page");?>">CONCERTS NEWS</a></li>
				<li><a href="<?php print url("music-news");?>">MUSIC NEWS</a></li>				
				<li><a href="<?php print url("concert-news");?>">PROMO EVENT</a></li>
				<li><a href="<?php print url("gallery");?>">GALLERY</a></li>
                <!--
				<li><a href="<?php print url("node/add/payment-confirm"); ?>">PAYMENT CONFIRMATION</a></li>
                -->
				<li><a href="<?php print url('node/add/contact-us'); ?>">CONTACT</a></li>

			</ul><!--end:main-nav-->

		</nav>

		<div class="search-box">

			<?php $block = module_invoke('search', 'block_view', 'form'); ?>

			<?php print render($block['content']); ?>

		</div><!--end:search-box-->

	</div><!--header-bottom--> 

</header><!--header-->