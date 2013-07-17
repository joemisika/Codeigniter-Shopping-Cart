<?php $this->load->view('templates/header'); ?>

<table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
	<tr valign="top">
		<td width="165">
			<?php $this->load->view('customers/customers_left'); ?>
		</td>
		<td>
			<div id="message"></div>
			<table class="amazing_table" cellpadding="5" cellspacing="0" width="100%">
				<tr class="thead">
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Created</th>
					<th>Last Login</th>
					<!--<th>Last Login</th>-->
					<th>Approved</th>
					<th></th>
				</tr>
				
				<?php 
				if(sizeof($customers)){
				$x = 0;
				foreach($customers as $thecustomer){
				$x++;
				?>
					<tr>
						<td><?=$x?></td>
						<td><?=$thecustomer->firstname .' '. $thecustomer->lastname?></td>
						<td><?=$thecustomer->email?></td>
						<td><?=date('d M, Y', strtotime($thecustomer->createdate))?></td>
						<td><?=date('d M, Y', strtotime($thecustomer->lastlogin))?></td>
						<?php if($thecustomer->approved == 1){ ?>
						<td><img src="<?=base_url()?>images/icon-on.png" alt="on"/></td>
						<?php } else { ?>
						<td><img src="<?=base_url()?>images/icon-off.png" alt="off"/></td>
						<?php } ?>
						<td>
							<ul class="edit_delete">
								<li><a href="<?=base_url()?>customers/edit/<?=$thecustomer->id?>"><img src="<?= base_url()?>images/cancel.png" /></a></li>  <li><a href="<?=base_url()?>customers/delete/<?=$thecustomer->id?>" onclick="return confirm('Are you sure you want to delete <?=$thecustomer->firstname?> ');"><img src="<?= base_url()?>images/delete.png" /></a></li>
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