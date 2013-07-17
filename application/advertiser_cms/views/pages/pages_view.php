<?php $this->load->view('templates/header'); ?>
<table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
	<tr valign="top">
		<td width="165">
			<?php $this->load->view('pages/pages_left'); ?>
		</td>
		<td>
			<div id="message"></div>
			<table class="amazing_table" cellpadding="5" cellspacing="0" width="100%">
			<tr class="thead">
				<th>#</th>
				<th>Title</th>
				<th>Url ID</th>
				<th>Created</th>
				<!--<th>Created</th>-->
				<th></th>
			</tr>
			
			
			<?php 
			if(sizeof($pages)){
			$x = 0;
			foreach($pages as $thepage){
			$x++;
			?>
				<tr>
				<td><?=$x?></td>
				<td><?=$thepage->title?></td>
				<td><?=$thepage->urlid?></td>
				<!--<td><?//=$theuser->price?></td>-->
				<td><?=date('d M, Y', strtotime($thepage->createdate))?></td>
				<td>
				<ul class="edit_delete">
					<li><a href="<?=base_url()?>pages/edit/<?=$thepage->id?>"><img src="<?= base_url()?>images/cancel.png" /></a></li>  <li><a href="<?=base_url()?>pages/delete/<?=$thepage->id?>" onclick="return confirm('Are you sure you want to delete <?=$thepage->title?> ');"><img src="<?= base_url()?>images/delete.png" /></a></li>
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