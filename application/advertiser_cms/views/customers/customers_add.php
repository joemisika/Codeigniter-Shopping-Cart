<?php echo form_open_multipart('customers/savenew');?>

<div class="msg"><?=$msg?></div>
<div>
<label>Title</label>
<select name="title" id="title">
<?php foreach ($titles as $a => $b) {?>
<option value="<?=$a?>"><?=$b?></option>
<?php } ?>
</select>
</div>
<div class="clear"></div>

<div>
<input type="text" class="field-text" value="" id="firstname" name="firstname">
</div>

<div class="clear"></div>

<div>
<input type="text" class="field-text" value="" id="lastname" name="lastname">
</div>

<div class="clear"></div>

<div>
<input type="text" class="field-text" value="" id="email" name="email">
</div>

<div class="clear"></div>

<div>
<input type="text" class="field-text" value="" id="username" name="username">
</div>

<div class="clear"></div>

<div>
<input type="password" class="field-text" value="" id="password" name="password">
</div>

<div class="clear"></div>

<div>
<input type="text" class="field-text" value="" id="cellphone" name="cellphone">
</div>

<div class="clear"></div>

<div>
<input type="text" class="field-text" value="" id="telephone" name="telephone">
</div>

<div class="clear"></div>

<div>
<textarea name="billingaddress" class="input_textarea_small"></textarea>
</div>

<div class="clear"></div>

<div>
<input type="text" class="field-text" value="" id="billingcode" name="billingcode">
</div>

<div class="clear"></div>

<div>
<textarea name="deliveryaddress" class="input_textarea_small"></textarea>
</div>

<div class="clear"></div>

<div>
<input type="text" class="field-text" value="" id="deliverycode" name="deliverycode">
</div>

<div class="clear"></div>

<div>
<input type="text" class="field-text" value="" id="city" name="city">
</div>

<div class="clear"></div>

<div>
<select name="province" id="province">
<?php foreach ($provinces as $a => $b) {?>
<option value="<?=$a?>"><?=$b?></option>
<?php } ?>
</select>
</div>

<div class="clear"></div>

<div>
<select name="country" id="country">
<?php foreach ($countries as $a => $b) {?>
<option value="<?=$a?>"><?=$b?></option>
<?php } ?>
</select>
</div>
<div>
<input type="submit" value="Submit">
</div>
<?php echo form_close(); ?>