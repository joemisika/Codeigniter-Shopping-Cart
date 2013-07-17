<?php $this->load->view('templates/header'); ?>

<table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
	<tr valign="top">
		<td width="165">
			<?php $this->load->view('products/products_left'); ?>
		</td>
	
		<td>
			<div id="message"><?=$msg?></div>
			



<?php echo form_open_multipart('products/saveedit/'.$product->id);?>
<table>

<tr>
<td>
<label>Product Code</label></td>
<td>
<input type="text" class="input_text" id="code" name="code" value="<?=$product->code;?>"></td>
</tr>

<tr>
<td>
<label>Product Name</label></td>
<td>
<input type="text" class="input_text" id="name" name="name" value="<?=$product->name;?>"></td>
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
	<img src="<?=base_url()?>/uploads/thumbs/<?=$product->thumbnail?>" width="100" height="100"/><br />
	(100px X 100px)<br />
	<input type="file" class="input_text" id="thumbnail" name="thumbnail">
	</td>
</tr>

<tr>
<td>
<label>Price</label></td>
<td>
(format = 9.00)<br />
<input type="text" class="input_text" id="price" name="price" value="<?=$product->price;?>"></td>
</tr>
<tr>
<td>
<label>Short Description</label></td>
<td>
<textarea class="input_textarea_small" id="description" name="description"><?=$product->description;?></textarea></td>
</tr>
<tr>
	<td>
		<label>Category</label>
	</td>
	<td>
		<select name="category_id" id="input_dropdown">
			<?php foreach ($categories as $a): ?>
            		<option<?php if ($a->id == $product->category_id) { echo ' selected'; } ?> value="<?=$a->id?>"><?=$a->category?></option>
		<?php endforeach; ?>	
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