<?php $this->load->view('templates/header'); ?>

<table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
	<tr valign="top">
		<td width="165">
			<?php $this->load->view('categories/categories_left'); ?>
		</td>
	
		<td>
			<div id="message"><?=$msg?></div>

<?php echo form_open_multipart('categories/saveedit/'.$category->id);?>
<table>
	<tr>
		<td>
			<label>Parent</label></td>
		<td>
			<select name="parent_id" id="parent" style="width: 369px;">
			<option value="0">none</option>
			<?php foreach ($parents as $a) {?>
			<option <?php if ($a->id == $category->parent_id) { echo ' selected'; }?>
			value="<?=$a->id?>"><?=$a->category?></option>
			<?php } ?>
			</select>
		</td>
	</tr>
	<tr>
	<td>
	<label>Category</label></td>
	<td>
	<input type="text" class="input_text" id="category" name="category" value="<?=$category->category?>">
	</td>
	</tr>
	<tr>
	<td align="right" colspan="4"><input type="submit" value="Submit" style="float:right"></td>
	</tr>
</table>
<?php echo form_close(); ?>
	</td>
</tr>
</table>

<?php $this->load->view('templates/footer'); ?>