<div class="one-third last" id="sidebar">
	<?php $block = module_invoke('user', 'block_view', 'login'); ?>
	<?php $link = @$block['content']['links']; ?>
	<?php $block['content']['links'] = ""; ?>
	<?php if (!$logged_in) : ?>
	<aside class="widget">
		<h6 class="widget-title">MEMBER LOGIN</h6>
		<div class="newsletter">
			<div class="wpcf7">
				<?php print render($block['content']); ?>
			</div>	
			<?php print render($link); ?>
		</div>
	</aside>
	<?php else: ?>
	<aside class="widget">
		<h6 class="widget-title">Hai, <a href="<?php print url("user"); ?>"><?php print $user->name; ?></a> <a href="<?php print url("user/logout"); ?>" class="form-submit">Log out</a></h6>
	</aside>
	<?php endif; ?>
    	<aside>
			<div class="adv-300-250 clearfix">
				<a href="http://www.djakartawarehouse.com" target=""><img src="<?php print $theme_path; ?>images/DWP14-300x250.jpg" alt=""></a>
            </div>
        </aside>
        <aside>
			<div class="adv-300-250 clearfix">
				<a href="#" target=""><img src="<?php print $theme_path; ?>placeholders/jgtc.gif" alt=""></a>
            </div>
        </aside>
		<aside>
			<div class="adv-300-250 clearfix">
				<script type="text/javascript"><!--
				google_ad_client = "ca-pub-2985260428327422";
				/* inacon-1 */
				google_ad_slot = "5729682841";
				google_ad_width = 300;
				google_ad_height = 250;
				//-->
				</script>
				<script type="text/javascript"
				src="//pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
            </div>
        </aside>
        
        
        <aside>
            <div class="adv-300-250 clearfix">
               Space Available <br />
               marketing@inaconcerts.com<br />
               hotline : 021-75816045
            </div>
		</aside>
        
		
        
	<!--end:widget-->
		<aside class="widget">
			<h6 class="widget-title">NEWSLETTER</h6>
				<div class="newsletter">
					<div class="wpcf7">
			<form class="wpcf7-form" method="post" action="#">
						<p>
							<?php $block = module_invoke('simplenews', 'block_view', '1'); ?>
                            <?php print render($block['content']); ?>
						</p>
			</form>
					</div>
				</div>
		</aside>         

</div><!--one-third-->