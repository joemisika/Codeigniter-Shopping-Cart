<?php $this->load->view('templates/header'); ?>
<table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
	<tr valign="top">
		<td width="165">
			<?php $this->load->view('categories/categories_left'); ?>
		</td>
		<td>
			<div id="message"></div>
			<table class="amazing_table" cellpadding="5" cellspacing="0" width="100%">
			<tr class="thead">
				<th>#</th>
				<th>Category</th>
				<th>Url ID</th>
				<th>Created</th>
				<!--<th>Approved</th>-->
				<th></th>
			</tr>
			
			
			<?php 
			if(sizeof($categories)){
			$x = 0;
			foreach($categories as $thecategory){
			$x++;
			?>
				<tr>
				<td><?=$x?></td>
				<td><?=$thecategory->category?></td>
				<td><?=$thecategory->urlid?></td>
				<td><?=date('d M, Y', strtotime($thecategory->createdate))?></td>
				<td>
				<ul class="edit_delete">
					<li><a href="<?=base_url()?>categories/edit/<?=$thecategory->id?>"><img src="<?= base_url()?>images/cancel.png" /></a></li>  <li><a href="<?=base_url()?>categories/delete/<?=$thecategory->id?>" onclick="return confirm('Are you sure you want to delete <?=$thecategory->category?> ');"><img src="<?= base_url()?>images/delete.png" /></a></li>
				</ul>
				</td>
				</tr>
			<?php } 
			} ?>
			</table>
		</td>
	</tr>
</table>
<?php $this->load->view('templates/footer'); ?>