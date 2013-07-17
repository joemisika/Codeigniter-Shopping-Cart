<?php $this->load->view('templates/header'); ?>

<table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
	<tr valign="top">
		<td width="165">
			<?php $this->load->view('users/users_left'); ?>
		</td>
	
		<td>
			<div id="message"><?=$msg?></div>
			



<?php echo form_open_multipart('users/saveedit/'.$theuser->id);?>
<table>

<tr>
<td>
<label>Firstname</label></td>
<td>
<input type="text" class="input_text" id="firstname" name="firstname" value="<?=$theuser->firstname;?>">
</td>
</tr>

<tr>
<td>
<label>Lastname</label></td>
<td>
<input type="text" class="input_text" id="lastname" name="lastname" value="<?=$theuser->lastname;?>">
</td>
</tr>

<tr>
<td>
<label>Email</label></td>
<td>
<input type="text" class="input_text" id="email" name="email" value="<?=$theuser->email;?>">
</td>
</tr>

<tr>
<td>
<label>Username</label></td>
<td>
<input type="text" class="input_text" id="username" name="username" value="<?=$theuser->username;?>">
</td>
</tr>

<tr>
<td>
<label>Password</label></td>
<td>
<input type="password" class="input_text" id="password" name="password">
</td>
</tr>

<tr>
<td>
<label>Confirm Password</label></td>
<td>
<input type="password" class="input_text" id="password2" name="password2">
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