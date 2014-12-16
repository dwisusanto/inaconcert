<?php
$image_path = $base_path . drupal_get_path('theme', 'ticket') . "/images/";
$theme_path = $base_path . drupal_get_path('theme', 'ticket') . "/";
?>
<?php include "header.tpl.php"; ?>
<div id="main-content" class="wrapper clearfix">
	<div class="two-third">
		<div class="container clearfix">
			<?php if ($messages): ?>
		    <div id="messages"><div class="section clearfix">
		      <?php print $messages; ?>
		    </div></div> <!-- /.section, /#messages -->
		  <?php endif; ?>
			<?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
			<?php if ($title): ?>
				<header class="entry-box-header clearfix">
					<h6 class="entry-box-title"><?php print $title; ?></h6>
				</header><!--end:entry-box-header-->
      <?php endif; ?>
			<div  class="inner-box">				
				<?php print render($page['content']); ?>
			</div><!--inner-box-->
		</div><!--container-->
  </div><!--two-third-->
	<?php include "side.tpl.php"; ?>
  </div><!--main-content-->
<?php include "footer.tpl.php"; ?>