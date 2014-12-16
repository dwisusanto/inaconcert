<?php 
global $base_url;
$img = $base_url . '/' .drupal_get_path('module', 'commerce_product_key') . '/theme/img/';
?>
<table width="400" style="margin:10px auto; background:#ffffff;" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="50" style="text-align:center; font-size:36px; font-weight:bold;"><?php print $event['title']; ?></td>
  </tr>
  <tr>
    <td style="text-align:center; font-size:24px; font-weight:bold;">
    	<?php print $event['date']; ?><br /><?php print $event['vanue']; ?>
    </td>
  </tr>
  <tr>
    <td>
    	<table width="400" border="0" cellspacing="0" cellpadding="4" style="margin:20px 0; font-size:14px;">
          <tr>
            <td width="115">Nama </td>
            <td width="5">:</td>
            <td width="280"><?php print $profile->commerce_customer_address['und'][0]['name_line'] ?></td>
          </tr>
          <tr>
            <td valign="top">Alamat </td>
            <td valign="top">:</td>
            <td>
							<?php print $profile->commerce_customer_address['und'][0]['thoroughfare'] ?><br>
							<?php print $profile->commerce_customer_address['und'][0]['premise'] ?><br>
							<?php print $profile->commerce_customer_address['und'][0]['locality'] ?><br>
							<?php print $profile->commerce_customer_address['und'][0]['administrative_area'] ?> 
							<?php print $profile->commerce_customer_address['und'][0]['postal_code'] ?>
						</td>
          </tr>
          <tr>
            <td>No. Tagihan</td>
            <td>:</td>
            <td><?php print $order->order_number; ?></td>
          </tr>
          <tr>
            <td>No. Tlpn </td>
            <td>:</td>
            <td><?php print @$profile->field_phone_number['und'][0]['safe_value'] ?></td>
          </tr>
          <tr>
            <td>No. Identitas</td>
            <td>:</td>
            <td><?php print @$profile->field_identity_id['und'][0]['safe_value'] ?></td>
          </tr>
        </table>

    </td>
  </tr>
  <tr>
    <td>
    	<table width="400" border="0" cellspacing="0" cellpadding="0" style="margin:0px auto; text-align:center;">
  <tr>
    <td height="90" colspan="3">
      <?php print $barcode; ?>
    </td>
    </tr>
<?php foreach ($product as $prod) { ?>
  <tr>
    <td width="175" align="right" style="font-size:18px; font-weight:bold; padding:10px;">
    	<?php print $prod['title']; ?> (<?php print $prod['sku']; ?>)
    </td>
    <td width="50">
    </td>
    <td width="175" align="left" style="font-size:18px; font-weight:bold;">
    	 <?php print $prod['quantity']; ?>
    </td>
  </tr>
<?php } ?>
</table>
    	
    </td>
  </tr>
  <tr>
    <td>
    	<table width="400" border="0" cellspacing="0" cellpadding="5"  style="margin:15px auto; text-align:center; font-size:18px;">
              <tr>
                <td width="200">Promoted By: </td>
                <td>Official Ticket Box:</td>
              </tr>
              <tr>
                <td width="200">
                	<img src="<?php print $event['promoted_by']; ?>" width="150" alt="tixbox" />
                </td>
                <td><img src="<?php print $img; ?>inaconcert.png" width="150" alt="tixbox" /></td>
              </tr>
            </table>

        
    </td>
  </tr>
  <tr>
    <td style="border-top:1px solid #000000;border-bottom:1px solid #000000; padding:10px; font-size:12px;">
    <b style="font-size:14px;">Ketentuan : </b>
    <ol style="margin-top:5px; line-height:18px;">            
        <li>Voucher ini berlaku untuk penukaran tiket asli</li>
        <li>Print Voucher ini untuk ditukarkan dengan tiket masuk.</li>
        <li>Voucher yang sudah dibeli tidak dapat dikembalikan.</li>
        <li>Inaconcerts.com tidak bertanggung jawab atas kehilangan voucher ini</li>
        <li>Penukaran voucher berlaku pada H-1 atau hari H</li>
        <li>Pemesan akan membebaskan promotor & ticketbox dari segala macam bentuk tuntutan hukum yang timbul karena kelalaian
        dan/atau kesalahan pemesan sendiri.</li>
	</ol>
    </td>
  </tr>
  <tr>
    <td style="text-align:center; font-size:12px; padding:10px 0;">
    <b>PT. Djwirya Multimedia Indonesia</b><br />
	Jl. Maritim No. 18 Cilandak Barat, Jakarta Selatan 12410. Tlp.021 75816045
    </td>
  </tr>
</table>