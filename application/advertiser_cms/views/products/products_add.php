<?php $this->load->view('templates/header'); ?>

<table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
	<tr valign="top">
		<td width="165">
			<?php $this->load->view('products/products_left'); ?>
		</td>
	
		<td>
			<div id="message"><?=$msg?></div>
			



<?php echo form_open_multipart('products/savenew/');?>
<table>

<tr>
<td>
<label>Product Code</label></td>
<td>
<input type="text" class="input_text" id="code" name="code"></td>
</tr>

<tr>
<td>
<label>Product Name</label></td>
<td>
<input type="text" class="input_text" id="name" name="name"></td>
</tr>

<tr>
<td>
<label>Main Image</label></td>
<td>
<input type="file" class="input_text" id="file" name="file">
</td>
</tr>

<tr>
	<td>
	<label>Thumb Image</label></td>
	<td>
	(100px X 100px)<br />
	<input type="file" class="input_text" id="thumbnail" name="thumbnail">
	</td>
</tr>

<tr>
<td>
<label>Price</label></td>
<td>
(format = 9.00)<br />
<input type="text" class="input_text" id="price" name="price"></td>
</tr>

<tr>
<td>
<label>Short Description</label></td>
<td>

<textarea class="input_textarea_small" id="description" name="description"></textarea></td>
</tr>

<tr>
	<td>
		<label>Category</label>
	</td>
	<td>
		<select name="category_id" id="category_id">
		<?php foreach ($categories as $a) {?>
		<option value="<?=$a->id?>"><?=$a->category?></option>
		<?php } ?>
		</select>
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