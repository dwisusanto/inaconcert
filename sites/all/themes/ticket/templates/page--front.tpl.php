<?php
$image_path = $base_path . drupal_get_path('theme', 'ticket') . "/images/";
$theme_path = $base_path . drupal_get_path('theme', 'ticket') . "/";
?>
<?php include "header.tpl.php"; ?>
<?php if ($messages): ?>
	<div id="messages"><div class="section clearfix">
		<?php print $messages; ?>
	</div></div> <!-- /.section, /#messages -->
<?php endif; ?>
<div class="wrapper clearfix" id="main-content">
	<div class="two-third">
		<div id="slider-wrapper" class="clearfix">
        	<section id="latest-news">
            	<header>
                	<h6>TICKETS CORNER</h6>
                    <span id="triangle">&nbsp;</span>
                    <span id="arrow">&nbsp;</span>
                </header>
								<ul>
                    <li>
                    	<article>                            
<?php
$block = module_invoke('quick_ticket', 'block_view', 'quick_ticket');
print render($block);
?>				           
                        </article>
                    </li>
                    						
                </ul>
     
            </section>
			<section class="slider">
            	<h2 class="breaking-news">Recent Concerts</h2>  				            
				<img class="loading-gif" src="<?php print $image_path; ?>slider/loading.png" alt=""/>
				<div class="flexslider">
					<ul class="slides">
<?php
$view2 = views_get_view('concert_news');
$view2->set_display('page_1');
$view2->pre_execute();
$view2->execute();
//print_r($view->result);
foreach ($view2->result as $data) { 
	$url = file_create_url($data->field_field_info_foto[0]['raw']['uri']);
?>
						<li>
							<article>
								<img class="thumbnails"  src="<?php print $url; ?>" alt="<?php print $url; ?>" />
								<div class="slide-content">
									<h1><a href="<?php print url("node/" . $data->nid); ?>"><?php print $data->node_title; ?></a></h1>
									<span class="entry-meta">On: <?php print date("M d, Y", $data->node_created); ?></span>
									<p class="slider-text">
									<?php print render($data->field_body[0]['rendered']); ?>
									</p>
								</div>
								<a href="<?php print url("node/" . $data->nid); ?>" class="more-link">More</a> 
							</article>
						</li>
<?php } ?>
												
					</ul>
				</div><!--flexslider-->
            </section><!--end:slider-->
            <!--end:latest-news-->
            
        </div><!--end:slider-wrapper-->
        <!--
        <section class="content-box clearfix">
        	<div class="banner-vert">
            	<a href="#" target="_blank"><img src="http://inaconcerts.com/img-partner/inaconcert_.gif" alt="img" /></a>
            </div>
        </section>
        -->
        <section class="content-box clearfix">
            <header class="entry-box-header clearfix">
                <h6 class="entry-box-title">CONCERTS NEWS</h6>
            </header><!--end:entry-header-->
            <div class="list-carousel responsive">
				<ul id="feature-news">
<?php
$view = views_get_view('news_page');
$view->set_display('default');
$view->pre_execute();
$view->execute('default');
//print_r($view->result);
foreach ($view->result as $data) {
$url = file_create_url($data->field_field_image[0]['raw']['uri']);
?>
					<li>
						<article>
							<div class="feature-item clearfix">
								<a href="<?php print url("node/" . $data->nid); ?>"><img class="thumbnails" alt="" src="<?php print $url; ?>"></a>
								<div class="entry-content">
									<span class="entry-meta"><?php print date("M d, Y", $data->node_created); ?> </span>
									<a class="entry-meta" href="#">, <?php print $data->node_comment_statistics_comment_count; ?> Comments</a>
									<a href="<?php print url("node/" . $data->nid); ?>">
										<h6 class="entry-title black"><?php print $data->node_title; ?></h6>
									</a>
								</div><!--end:entry-content-->                        
							</div><!--end:feature-item-->
						</article>
					</li>
<?php } ?>
				</ul>
				<div class="clearfix"></div>
				<a id="prev1" class="prev" href="#">&nbsp;</a>
				<a id="next1" class="next" href="#">&nbsp;</a>
			</div>			
        </section><!--end:content-box-->
        
        <section class="content-box clearfix"><!--news music-box-->
			
            	<header class="entry-box-header clearfix">            					
                    <h6 class="entry-box-title">MUSIC NEWS</h6>
                    <a href="<?php print url('music-news'); ?>" class="view-all">View all</a>
                </header>
            
			
<?php
$entry_list = "";
$view = views_get_view('news_page');
$view->set_display('page_1');
$view->set_items_per_page(4);
$view->pre_execute();
$view->execute();
//print_r($view->result);
$count = 0;
foreach ($view->result as $data) {
$count ++;
$url = file_create_url($data->field_field_image[0]['raw']['uri']);
if ($count == 1) {
$author = user_load($data->node_uid);
?>
			<div class="one-column box-first">
				<div class="entry-body clearfix">
					<div class="entry-content">
                    	<img alt="" src="<?php print $url; ?>" class="thumbnails h-image">
						<h2 class="entry-title"><a href="<?php print url("node/" . $data->nid); ?>"><br /><?php print $data->node_title; ?></a></h2>
                        <span class="entry-meta"><?php print date("M d, Y", $data->node_created); ?> </span>                        
                    	<a class="entry-meta" href="#">, <?php print $data->node_comment_statistics_comment_count; ?> Comments</a>									
					</div>
                    <a href="<?php print url("node/" . $data->nid); ?>" class="more-link">More</a>  
				</div> 
			</div>
<?php } else {
				$entry_list .= '<li class="clearfix other-news-top">
					<article>
						<h5 class="entry-title"><a href="' . url("node/" . $data->nid) . '">' . $data->node_title . '</a></h5>
						<span class="entry-meta">' . date("M d, Y", $data->node_created) . '</span>
					</article>
			  </li>';
		} } ?>
			<div class="one-column">
			<ul class="entry-list">
				<?php print $entry_list; ?>
			</ul>
		  </div>
<?php
$entry_list = "";
$view2 = views_get_view('concert_news');
$view2->set_display('default');
$view2->set_items_per_page(4);
$view2->pre_execute();
$view2->execute();
//print_r($view->result);
foreach ($view2->result as $data) { 
				$entry_list .= '<li class="clearfix other-news-top">
					<article>
						<h5 class="entry-title"><a href="' . url("node/" . $data->nid) . '">' . $data->node_title . '</a></h5>
						<span class="entry-meta">' . date("M d, Y", $data->node_created) . '</span>
					</article>
			  </li>';
}
?>
      <div class="one-column">
          	
			<ul class="entry-list">
				<?php print $entry_list; ?>
			</ul>
		  </div>
		</section><!-- end:news music-->
        
		<section class="content-box clearfix">
            <header class="entry-box-header clearfix">
                <h6 class="entry-box-title">GALLERY</h6>
            </header><!--end:entry-header-->
            <div class="list-carousel responsive">
				<ul id="feature-gallery">
<?php
$view = views_get_view('gallery_list');
$view->set_display('default');
$view->pre_execute();
$view->execute('default');
//print_r($view->result);
foreach ($view->result as $data) {
$url = file_create_url($data->field_field_photos[0]['raw']['uri']);
?>
					<li>
						<article>
							<div class="feature-item clearfix">
								<a href="<?php print url("gallery/" . $data->tid); ?>"><img class="thumbnails" alt="" src="<?php print $url; ?>"></a>
								<div class="entry-content">
									<a href="<?php print url("gallery/" . $data->tid); ?>">
										<h6 class="entry-title black"><?php print $data->taxonomy_term_data_name; ?></h6>
									</a>
								</div><!--end:entry-content-->                        
							</div><!--end:feature-item-->
						</article>
					</li>
<?php } ?>
				</ul>
				<div class="clearfix"></div>
				<a id="prev2" class="prev" href="#">&nbsp;</a>
				<a id="next2" class="next" href="#">&nbsp;</a>
			</div>
			
        </section><!--end:content-box-->
      <!--end:content-box-->
    </div><!--two-third-->
	<?php include "side.tpl.php"; ?>	
  </div><!--wrapper-->
<?php include "footer.tpl.php"; ?>