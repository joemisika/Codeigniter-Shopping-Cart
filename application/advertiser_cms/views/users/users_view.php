<?php $this->load->view('templates/header'); ?>
<table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
	<tr valign="top">
		<td width="165">
			<?php $this->load->view('users/users_left'); ?>
		</td>
		<td>
			<div id="message"></div>
			<table class="amazing_table" cellpadding="5" cellspacing="0" width="100%">
			<tr class="thead">
				<th>#</th>
				<th>Name</th>
				<th>Username</th>
				<th>Registered</th>
				<!--<th>Created</th>-->
				<th></th>
			</tr>
			
			
			<?php 
			if(sizeof($users)){
			$x = 0;
			foreach($users as $theuser){
			$x++;
			?>
				<tr>
				<td><?=$theuser->id?></td>
				<td><?=$theuser->firstname .' '. $theuser->lastname?></td>
				<td><?=$theuser->username?></td>
				<!--<td><?//=$theuser->price?></td>-->
				<td><?=date('d M, Y', strtotime($theuser->createdate))?></td>
				<td>
					<ul class="edit_delete">
						<li><a href="<?=base_url()?>users/edit/<?=$theuser->id?>"><img src="<?= base_url()?>images/cancel.png" /></a></li>  <li><a href="<?=base_url()?>users/delete/<?=$theuser->id?>" onclick="return confirm('Are you sure you want to delete <?=$theuser->firstname?> ');"><img src="<?= base_url()?>images/delete.png" /></a></li>
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