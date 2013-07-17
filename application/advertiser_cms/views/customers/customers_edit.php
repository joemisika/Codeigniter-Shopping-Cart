<?php $this->load->view('templates/header'); ?>

<table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
	<tr valign="top">
		<td width="165">
			<?php $this->load->view('customers/customers_left'); ?>
		</td>
		<td>
			<div id="message"></div>
			



<?php echo form_open_multipart('customers/saveedit/'.$customer->id);?>
<table>
<!--<div class="msg"><?=$msg?></div>-->
<tr>
	<td>
		<label>Title</label>
	</td>
	<td>
		<select name="title" id="title">
		<?php foreach ($titles as $a => $b) {?>
		<option value="<?=$a?>"><?=$b?></option>
		<?php } ?>
		</select>
	</td>
</tr>


<tr>
<td>
<label>Firstname</label></td>
<td>
<input type="text" class="input_text" value="<?=$customer->firstname;?>" id="firstname" name="firstname"></td>
</tr>


<tr>
<td><label>Lastname</label></td>
<td><input type="text" class="input_text" value="<?=$customer->lastname;?>" id="lastname" name="lastname"></td>
</tr>


<tr>
<td><label>Email</label></td>
<td><input type="text" class="input_text" value="<?=$customer->email;?>" id="email" name="email"></td>
</tr>


<tr>
<td><label>Username</label></td>
<td><input type="text" class="input_text" value="<?=$customer->username;?>" id="username" name="username">
</tr>


<tr>
<td><label>Password</label></td>
<td><input type="password" class="input_text" value="<?=$customer->password;?>" id="password" name="password"></td>
</tr>

<tr>
<td><label>Cellphone</label></td>
<td><input type="text" class="input_text" value="<?=$customer->cellphone;?>" id="cellphone" name="cellphone"></td>
</tr>


<tr>
<td><label>Telephone</label></td>
<td><input type="text" class="input_text" value="<?=$customer->telephone;?>" id="telephone" name="telephone"></td>
</tr>


<tr>
<td><label>Billing Address</label></td>
<td><textarea name="billingaddress" class="input_textarea_small"><?=$customer->billingaddress;?></textarea></td>
</tr>


<tr>
<td><label>Billing Code</label></td>
<td><input type="text" class="input_text" value="<?=$customer->billingcode;?>" id="billingcode" name="billingcode"></td>
</tr>


<tr>
<td><label>Delivery Address</label></td>
<td><textarea name="deliveryaddress" class="input_textarea_small"><?=$customer->deliveryaddress;?></textarea></td>
</tr>


<tr>
<td><label>Delivery Code</label></td>
<td><input type="text" class="input_text" value="<?=$customer->deliverycode;?>" id="deliverycode" name="deliverycode"></td>
</tr>


<tr>
<td><label>City</label></td>
<td><input type="text" class="input_text" value="<?=$customer->city;?>" id="city" name="city"></td>
</tr>


<tr>
<td><label>Province</label></td>
<td><select name="province" id="province">
<?php foreach ($provinces as $a => $b) {?>
<option value="<?=$a?>"><?=$b?></option>
<?php } ?>
</select></td>
</tr>


<tr>
<td><label>Country</label></td>
<td><select name="country" id="country">
<?php foreach ($countries as $a => $b) {?>
<option value="<?=$a?>"><?=$b?></option>
<?php } ?>
</select></td>
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