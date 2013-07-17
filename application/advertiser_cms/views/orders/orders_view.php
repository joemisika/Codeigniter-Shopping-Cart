<?php $this->load->view('templates/header'); ?>
<table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
	<tr valign="top">
		<td width="165">
			<?php $this->load->view('orders/orders_left'); ?>
		</td>
		<td>
			<div id="message"></div>
			<table class="amazing_table" cellpadding="5" cellspacing="0" width="100%">
			<tr class="thead">
				<th>Order ID</th>
				<th>Order Ref</th>
				<th>Customer Name</th>
				<th>Grand Total</th>
				<th>Created</th>
				<th></th>
			</tr>
			
			
			<?php 
			if(sizeof($orders)){
			$x = 0;
			foreach($orders as $theorder){
			$x++;
			?>
				<tr>
				<td><?=$theorder->theOrder?></td>
				<td><?=$theorder->order_ref?></td>
				<td><?=$theorder->firstname.' '.$theorder->lastname?></td>
				<td><?=$theorder->grand_total?></td>
				<td><?=date('d M, Y', strtotime($theorder->created_at))?></td>
				<td>
				<a href="<?=base_url()?>orders/view_order/<?=$theorder->theOrder?>">View Order</a>
				</td>
				</tr>
			<?php } 
			} ?>
			</table>
		</td>
	</tr>
</table>
<?php $this->load->view('templates/footer'); ?>