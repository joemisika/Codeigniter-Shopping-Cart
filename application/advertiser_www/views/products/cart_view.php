<?php $this->load->view('templates/header');?>
<div id="thecart" style="width: 850px; margin-top: 50px;">
<form id="" method="POST" action="<?= base_url() ?>products/update_cart/">
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
	//print_r('<pre>' .$items. '</pre>');
      ?>
      <tr>
      		<input type="hidden" name="<?= $i. '[rowid]' ?>" value="<?= $items['rowid'] ?>" /> 
      		<td><?= $i ?></td>
      		<td><?= $items['code'] ?></td>
      		<td><?= $items['name'] ?></td>
      		<td><?= $this->cart->format_number($items['price']) ?></td>
      		<td><input class="update_qty" type="text" name="<?=  $i . '[qty]' ?>" value="<?= $items['qty'] ?>" maxlength="3" style="width: 50px;"/></td>
      		<td>
      		<?= $this->cart->format_number($items['subtotal']) ?>
      		<br />
      		<a href="<?= base_url() ?>products/remove_from_cart/<?=$items['rowid'] ?>/" onclick="return confirm('Remove <?= $items['name'] ?> from cart?');">Remove</a>
      		</td>
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
		<td class="action"><input type="submit" name="btn_update" value="Save" /></td> 
		<td>&nbsp;</td>
	</tr>
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
    		<li><a href="<?=base_url()?>products">Continue</a></li> |
		<li><a href="<?=base_url()?>orders/checkout">Checkout</a></li> |
		<li><a href="<?=base_url()?>products/empty_cart">Clear Cart</a></li>
    	</ul>
</div>
<?php $this->load->view('templates/footer');?>