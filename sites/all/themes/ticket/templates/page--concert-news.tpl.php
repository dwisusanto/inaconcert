<?php
$image_path = $base_path . drupal_get_path('theme', 'ticket') . "/images/";
$theme_path = $base_path . drupal_get_path('theme', 'ticket') . "/";
?>
<?php include "header.tpl.php"; ?>
<div id="main-content" class="wrapper clearfix">
	<div class="two-third">
		<div class="container clearfix">
			<header class="entry-box-header clearfix"> 
				<h6 class="entry-box-title">CONCERTS</h6> 
			</header><!--end:entry-box-header-->
			<ul class="h-post-item">
<?php
$item_per_page = 7;
$view = views_get_view('concert_news');
$view->set_display('default');
$view->set_items_per_page($item_per_page);
$view->pre_execute();
$view->execute('default');

// pager option
$total_item = $view->total_rows;
$pages = ceil($total_item/$item_per_page);
$page = ($view->get_current_page() + 1);

foreach ($view->result as $data) {
?> 
				<li>
					<article> 
						<a href="<?php print url("node/" . $data->nid); ?>" class="h-image-wrap"> 
<?php $url = file_create_url($data->field_field_info_foto[0]['raw']['uri']); ?>
							<img alt="" src="<?php print $url; ?>" class="thumbnails h-image">
						</a>
						<div class="h-entry-content"> 
							<span class="entry-meta"><?php print date("Y/m/d", $data->node_created); ?>&nbsp;-&nbsp;</span><a class="entry-meta" href="<?php print url("node/" . $data->nid); ?>#comments"><?php print $data->node_comment_statistics_comment_count; ?> Comments</a>
							<h2 class="entry-title"><a href="<?php print url("node/" . $data->nid); ?>"><?php print $data->node_title; ?></a></h2>
							<p><?php print render($data->field_body); ?></p>
							<a href="<?php print url("node/" . $data->nid); ?>" class="more-link">Read more</a> 
						</div><!--end:entry-content--> 
					</article><!--end:post-item--> 
				</li>
<?php } ?>	
		  </ul>
			<div class="clear"></div>
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
	</div><!--two-third-->
  
	<?php include "side.tpl.php"; ?>
  </div><!--main-content-->
<?php include "footer.tpl.php"; ?>