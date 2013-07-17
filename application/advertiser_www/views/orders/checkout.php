<?php $this->load->view('templates/header');?>
<style>


</style>
<article id="checkout">

	<div id="page">
  <div id="logo">
    <a href="<?=base_url()?>"><img src="http://www.danifer.com/images/invoice_logo.jpg"></a>
  </div><!--end logo-->
  
  <div id="address">
    <h1 style="margin:0px;"><?=$this->config->item("company_name");?></h1>
    <a href="mailto:<?=$this->config->item("company_email");?>">
    <?=$this->config->item("company_email");?>
    </a>
    <br /><br />
   <!-- Transaction # xxx<br />-->
    Created on <?=date('d-m-Y')?><br />
    </h1>
  </div><!--end address-->

  <div id="content">
    <p>
      <strong>Customer Details</strong><br />
      Company: <?=$customer_company?><br />
      Vat No: <?=$customer_vat?> <br />		
      Name: <?=$customer_name?> <br />
      Email: <?=$customer_email?><br />
      Cell: <?=$customer_cell?>
      </p>
    <hr>
    <table>
      <tr>
      		<th><strong>#</strong></th>
		<th><strong>Code</strong></th>
		<th><strong>Name</strong></td>
		<th><strong>Unit Price</strong></th>
		<th><strong>Quantity</strong></th>
		<th><strong>Amount</strong></th>
      </tr>
      <?php 
	$i = 1; 
	foreach ($this->cart->contents() as $items): 
      ?>
      <tr>
      		<td><?= $i ?></td>
      		<td><?= $items['code'] ?></td>
      		<td><?= $items['name'] ?></td>
      		<td><?= $this->cart->format_number($items['price']) ?></td>
      		<td><?= $items['qty'] ?></td>
      		<td><?= $this->cart->format_number($items['subtotal']) ?></td>
      </tr>
      <?php 
	$i++; 
	endforeach; 
       ?>           
        
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><strong>Total</strong></td>
		<td><strong><?= $this->cart->format_number($this->cart->total()) ?></strong></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<?php 
		$thevat = (0.14 * $this->cart->total()); 
		$thenewvat = $this->cart->format_number((0.14 * $this->cart->total()));
		?>
		<td><strong>VAT</strong></td>
		<td><strong><?=$thenewvat?></strong></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<?php 
		$thetotal = $this->cart->format_number(($thevat + $this->cart->total())); 
		?>
		<td><strong>Total</strong></td>
		<td><strong><?=$thetotal?></strong></td>
	</tr>

    </table>
    <hr>
    	<ul class="placeOrder">
    		<li><a href="<?= base_url()?>orders/placeOrder">Confirm Order</a></li> |
    		<li><a href="<?= base_url()?>orders/cancelOrder">Cancel Order</a></li>
    	</ul>
    <!--<p>
      Thank you for your order!  This transaction will appear on your billing statement as "Your Company".<br />
      If you have any questions, please feel free to contact us at <a href="mailto:youremail@somewhere.com">youremail@somewhere.com</a>.
    </p>

    <hr>
    <p>
      <center><small>This communication is for the exclusive use of the addressee and may contain proprietary, confidential or privileged information. If you are not the intended recipient any use, copying, disclosure, dissemination or distribution is strictly prohibited.
      <br /><br />
      &copy; <?=$this->config->item("sitename");?> All Rights Reserved
      </small></center>
    </p>-->
  </div><!--end content-->
  </div><!--end page-->

</article>
<?php $this->load->view('templates/footer');?>