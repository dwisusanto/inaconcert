<?php
$image_path = $base_path . drupal_get_path('theme', 'ticket') . "/images/";
$theme_path = $base_path . drupal_get_path('theme', 'ticket') . "/";
?>
<?php include "header.tpl.php"; ?>
<div id="main-content" class="wrapper clearfix">
	<!--GALLERY began -->
	<div class="two-third">
<?php 
$other = FALSE;
if (arg(1) ) { 
$other = TRUE;
?>
		<div id="slider-wrapper" class="clearfix">        	
			<section class="sliderdua">			            
				<img class="loading-gif" src="images/slider/loading.png" alt=""/>
				<div class="flexslider">
					<ul class="slides">
					<?php
$view = views_get_view('gallery');
$view->set_arguments(array( arg(1) ));
$view->set_display('default');
$view->pre_execute();
$view->execute('default');
//print_r($view->result);
$gallery_title = "Gallery";
foreach ($view->result as $data) {
$gallery_title = $data->node_title;
$url = file_create_url($data->field_field_photos[0]['raw']['uri']);
?>
						<li>
              <img class="thumbnails"  src="<?php print $url; ?>" alt="" />							
						</li>
<?php } ?>				
					</ul>
					<article>
						<div class="#">
							<h1><a href="single.html"><?php print $gallery_title; ?></a></h1>
						</div>
					</article>
				</div><!--flexslider-->
      </section><!--end:slider-->
      <!--end:latest-news-->
            
    </div><!--end:slider-wrapper-->
<?php } ?>
    <section class="content-box clearfix">
      <header class="entry-box-header clearfix">
        <h6 class="entry-box-title"><?php print ($other ? 'Others Gallery': 'Gallery'); ?></h6>
      </header><!--end:entry-header-->
      <div class="list-carouseldua responsive">
				<ul id="">
<?php
$item_per_page = 12;
$view = views_get_view('gallery_list');
$view->set_display('default');
$view->pre_execute();
$view->execute('default');

// pager option
$total_item = $view->total_rows;
$pages = ceil($total_item/$item_per_page);
$page = $view->get_current_page();
//print_r($view->result);
foreach ($view->result as $data) {
$url = file_create_url($data->field_field_photos[0]['raw']['uri']);
?>
					<li>
						<article>
							<div class="feature-item clearfix">
								<a href="<?php print url("gallery/" . $data->tid); ?>"><img class="thumbnails" alt="" src="<?php print $url; ?>"></a>
								<div class="entry-content">
									<a href="<?php print url("gallery/" . $data->tid); ?>"><h6 class="entry-title black"><?php print $data->taxonomy_term_data_name; ?></h6></a>
								</div><!--end:entry-content-->                        
							</div><!--end:feature-item-->
						</article>
					</li>
<?php } ?>
				</ul>
				<div class="clearfix"></div>
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
			</div>
			
        </section><!--end:content-box-->
        					
		<!--end:content-box-->
    </div>
    
    
    <!--end of GALLERY-->
	<?php include "side.tpl.php"; ?>
  </div><!--main-content-->
<?php include "footer.tpl.php"; ?>