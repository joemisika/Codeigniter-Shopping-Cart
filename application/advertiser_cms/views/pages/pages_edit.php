<?php $this->load->view('templates/header'); ?>

<table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
	<tr valign="top">
		<td width="165">
			<?php $this->load->view('pages/pages_left'); ?>
		</td>
	
		<td>
			<div id="message"><?=$msg?></div>
			



<?php echo form_open_multipart('pages/saveedit/'.$page->id);?>
<table>

<tr>
<td>
<label>Title</label></td>
<td>
<input type="text" class="input_text" id="title" name="title" value="<?=$page->title;?>"></td>
</tr>

<tr>
<td>
<label>Product Name</label></td>
<td>
<textarea class="input_textarea_small" id="body" name="body"><?=$page->body;?></textarea>
</td>
</tr>

<tr>
<td align="right" colspan="4"><input type="submit" value="Submit" style="float:right"></td>
</tr>
</table>
<?php echo form_close(); ?>
</td>
</td>
</table>

<?php $this->load->view('templates/footer'); ?>