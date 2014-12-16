<?php

/**
 * @file
 * Page callbacks and form builder functions for administering products.
 */


/**
 * Menu callback: display a list of product key types that the user can create.
 */
function commerce_product_key_ui_add_page() {
  $item = menu_get_item();
  $content = system_admin_menu_block($item);

  // Bypass the admin/commerce/product-keys/add listing if only one product key type is
  // available.
  if (count($content) == 1) {
    $item = array_shift($content);
    drupal_goto($item['href']);
  }

  return theme('product_add_list', array('content' => $content));
}

/**
 * Displays the list of available product key types for product creation.
 *
 * @ingroup themeable
 */
function theme_product_key_add_list($variables) {
  $content = $variables['content'];
  $output = '';

  if ($content) {
    $output = '<dl class="commerce-product-key-type-list">';
    foreach ($content as $item) {
      $output .= '<dt>' . l($item['title'], $item['href'], $item['localized_options']) . '</dt>';
      $output .= '<dd>' . filter_xss_admin($item['description']) . '</dd>';
    }
    $output .= '</dl>';
  }
  else {
    if (user_access('administer sequences')) {
      $output = '<p>' . t('You have not created any sequences yet. Go to the <a href="@create-product-key-type">sequence creation page</a> to add a new sequence.', array('@create-product-key-type' => url('admin/commerce/product-keys/types/add'))) . '</p>';
    }
    else {
      $output = '<p>' . t('No Sequences have been created yet for you to use.') . '</p>';
    }
  }

  return $output;
}

function commerce_product_key_ui_product_html($product_key) {
  // Add the breadcrumb for the form's location.
  //print_r($product_key);

	$order = commerce_order_load($product_key->order_id);
	$order_wrapper = entity_metadata_wrapper('commerce_order', $order);
  foreach ($order_wrapper->commerce_line_items as $line_item_wrapper) {
    //get the line item produck id and quantity
    $pro = $line_item_wrapper->commerce_product->value();
    $quantity = $line_item_wrapper->quantity->value();
		$product['product_id'] = $pro->product_id;
		$product['title'] = $pro->title;
		$product['sku'] = $pro->sku;
		$product['quantity'] = (int) $quantity;
		$products[] = $product;
	}

	$profile = commerce_customer_profile_load($order->commerce_customer_billing['und'][0]['profile_id']);

	$query = new EntityFieldQuery();

	$query->entityCondition('entity_type', 'node')
	  ->entityCondition('bundle', 'concert')
	  ->fieldCondition('field_ticket', 'ticket_ids', $product['product_id'], 'CONTAINS');

	$result = $query->execute();

	$event = array();
	if (isset($result['node'])) {
		foreach ($result['node'] as $node) {
			$concert = node_load($node->nid);
		}
		$filename = $concert->field_promotor_logo['und'][0]['filename'];
		$image_uri = file_build_uri($filename);
		$event = array(
			'title' => $concert->title,
			'vanue' => $concert->field_vanue['und'][0]['safe_value'],
			'date' => $concert->field_date['und'][0]['safe_value'],
			'promoted_by' => theme('image_style', array('style_name' => 'large', 'path' => $image_uri)),
		);
	}
  $encoding = variable_get('barcode_encoding', 'CODE39');
  $barcode = theme('barcode_image', array(
    'barcode_value' => check_plain($order->order_id), 
    'encoding' => $encoding,
    'height' => 40,
    'scale' => 2,
    'bgcolor' => '#FFFFFF',
    'barcolor' => '#000000',
    'image_format' => 'jpg',
    ));
	return theme('commerce_product_key_ui_product_html', array(
		'barcode' => $barcode, 
		'order' => $order, 
		'product' => $products, 
		'profile' => $profile, 
		'event' => $event
	));
}

/**
 * Form callback wrapper: create or edit a product.
 *
 * @param $product_key
 *   The product object being edited by this form.
 *
 * @see commerce_product_key_ui_product_form()
 */
function commerce_product_key_ui_product_form_wrapper($product_key) {
  // Add the breadcrumb for the form's location.
  commerce_product_key_ui_set_breadcrumb();

  // Include the forms file from the Product Key module.
  module_load_include('inc', 'commerce_product_key', 'includes/commerce_product_key.forms');

  return drupal_get_form('commerce_product_key_ui_product_form', $product_key);
}

/**
 * Form callback wrapper: confirmation form for deleting a product key.
 *
 * @param $product_key
 *   The product object being deleted by this form.
 *
 * @see commerce_product_key_product_key_delete_form()
 */
function commerce_product_key_ui_product_delete_form_wrapper($product_key) {
  // Add the breadcrumb for the form's location.
  commerce_product_key_ui_set_breadcrumb();

  // Include the forms file from the Product Key module.
  module_load_include('inc', 'commerce_product_key', 'includes/commerce_product_key.forms');

  return drupal_get_form('commerce_product_key_ui_product_delete_form', $product_key);
}
