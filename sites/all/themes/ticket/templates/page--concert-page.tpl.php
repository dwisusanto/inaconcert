<?php
$image_path = $base_path . drupal_get_path('theme', 'ticket') . "/images/";
$theme_path = $base_path . drupal_get_path('theme', 'ticket') . "/";
?>
<?php include "header.tpl.php"; ?>
<div id="main-content" class="wrapper clearfix">
	<div class="two-third">
        <div class="container clearfix" style="border-top:none;">
            <header class="entry-box-header clearfix">
				<h6 class="entry-box-title">TICKETS</h6>
			</header><!--end:entry-box-header-->
<?php
$item_per_page = 6;
$view2 = views_get_view('concert_page');
$view2->set_display('default');
$view2->pre_execute();
$view2->execute('default');

// pager option
$total_item = $view2->total_rows;
$pages = ceil($total_item/$item_per_page);
$page = ($view2->get_current_page() + 1);

foreach ($view2->result as $data) {
?> 
			<div  class="inner-box">
			  <article class="first-col line-grs">
				<div class="entry-body clearfix">
					<div class="featured-image"> 
					<?php
					$url = file_create_url($data->field_field_foto[0]['raw']['uri']);;
					?>
						<a href="#"><img class="thumbnails" width="210" src="<?php print $url; ?>" alt=""></a>
						<div class="image-caption">
							<span><?php print $data->node_title; ?></span>
						</div>
					</div><!--end:featured-image-->
					<div class="entry-content">
						<h2 class="entry-title"><?php print $data->node_title; ?></h2>						
						<!--<p class="featured-news-text">Promoted By:
                        <h2 class="entry-title"><?php print render($data->field_field_promoted_by[0]['rendered']); ?></h2>
                         Venue:
                        <h2 class="entry-title"><?php print render($data->field_field_vanue[0]['rendered']); ?></h2> 
                        Date:
                        <h2 class="entry-title"><?php print render($data->field_field_date[0]['rendered']); ?></h2>
                        Information
                        <h2 class="entry-title"><?php print render($data->field_field_information[0]['rendered']); ?></h2>
					  </p>-->
						<a href="<?php print url("node/" . $data->nid); ?>" class="more-link">BUY TICKET</a> 
					</div><!--end:entry-content--> 
				</div><!--end:entry-body--> 
			</article><!--end:entry-content-->             
			</div><!--inner-box-->
<?php } ?>			
<?php if ($pages > 1) { ?>
			<ul class="pagination clearfix">
<?php
for ($i = 1; $i <= $pages; $i++) {
  if ($i == $page) {
?>
    <li class="current"><a href="#" class="paging"><?php print $i; ?></a></li>
<?php  } else { ?>
    <li><a class="page-numbers" href="?page=<?php print ($i - 1); ?>"><?php print $i; ?></a></li>
<?php
  }
}
?>
			</ul>
<?php } ?>
		</div><!--container-->
    </div><!--two-third-->
	<?php include "side.tpl.php"; ?>
  </div><!--main-content-->
<?php include "footer.tpl.php"; ?>