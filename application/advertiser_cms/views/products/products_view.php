<?php $this->load->view('templates/header'); ?>
<table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
	<tr valign="top">
		<td width="165">
			<?php $this->load->view('products/products_left'); ?>
		</td>
		<td>
			<div id="message"></div>
			<table class="amazing_table" cellpadding="5" cellspacing="0" width="100%">
			<tr class="thead">
				<th>ID</th>
				<th>Code</th>
				<th>Name</th>
				<th>Price</th>
				<th>Created</th>
				<th></th>
			</tr>
			
			
			<?php 
			if(sizeof($products)){
			$x = 0;
			foreach($products as $theproduct){
			$x++;
			?>
				<tr>
				<td><?=$theproduct->id?></td>
				<td><?=$theproduct->code?></td>
				<td><?=$theproduct->name?></td>
				<td><?=$theproduct->price?></td>
				<td><?=date('d M, Y', strtotime($theproduct->createdate))?></td>
				<td>
				<ul class="edit_delete">
					<li><a href="<?=base_url()?>products/edit/<?=$theproduct->id?>"><img src="<?= base_url()?>images/cancel.png" /></a></li>  <li><a href="<?=base_url()?>products/delete/<?=$theproduct->id?>" onclick="return confirm('Are you sure you want to delete <?=$theproduct->name?> ');"><img src="<?= base_url()?>images/delete.png" /></a></li>
				</ul>
				
				</td>
				</tr>
			<?php } 
			} ?>
			</table>
			<div class="pager"> 
				<?php if(isset($pager)){echo $pager;} ?> 
			</div>
		</td>
	</tr>
</table>
<?php $this->load->view('templates/footer'); ?>