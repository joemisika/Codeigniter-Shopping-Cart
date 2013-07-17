<?php $this->load->view('templates/header');?>
<?php session_start() ?>
<!--http://buildinternet.com/live/jqueryform/jqueryform1.php?status=Type+something+here-->
<div class="section_header">Register<?//=$section_name;?></div>
<p>Sign up to our shopping cart</p>
<div class="error">
<?php if(isset($msg)){?>
<?=$msg;?>
<?php } ?>
</div>
<div id="registration">
<form id="register" name="register" method="POST" action="<?=base_url()?>accounts/save_registration">
<?php $session_id =  $this->session->userdata('session_id');?>
<input type="hidden" value="<?=$session_id?>" name="authenticity_token">
<div>
<input name="email" id="email" value="Email Address" autocorrect="off" type="text"/> 
</div>

<div style="margin-top: 10px;">
<input name="password" id="password" value="Password" autocorrect="off" type="text"/>  <input name="password2" id="password2" value="Confirm Password" autocorrect="off" type="text"/> 
</div>

<div style="margin-top: 10px;">Personal Details</div>
<div style="margin-top: 10px;">
<input name="company" id="company" value="Company" autocorrect="off" type="text"/>  <input name="vatno" id="vatno" value="VAT NO" autocorrect="off" type="text"/> 
</div>

<div style="margin-top: 10px;">
<input name="firstname" id="firstname" value="Firstname" autocorrect="off" type="text"/>  <input name="lastname" id="lastname" value="Lastname" autocorrect="off" type="text"/> 
</div>

<div style="margin-top: 10px;">
<input name="cellphone" id="cellphone" value="Cellphone" autocorrect="off" type="text"/>  <input name="telephone" id="telephone" value="Telephone" autocorrect="off" type="text"/> 
</div>

<div style="margin-top: 10px;">
<textarea id="address" name="billingaddress" rows="4" cols="30" class="idleField">Address</textarea>
</div>
<div style="margin-top: 10px;">
<input name="billingcode" id="billingcode" value="Zip Code" autocorrect="off" type="text"/>  </div>

<div style="margin-top: 10px;">
<input name="city" id="city" value="City" autocorrect="off" type="text"/>  <input name="country" id="country" value="Country" autocorrect="off" type="text"/> 
</div>
<div style="margin-top: 10px; margin-left: 40px;">
By clicking the button below you agree to <br />
<?=$this->config->item("company_name");?>'s <a href="<?=base_url()?>pages/terms-of-service">Terms of Service</a>

</div>
<div style="margin-top: 10px;">
<input type="submit" id="primary-button" class="button" value="Register" style="width:376px; height:30px;"/>
<!--<input type="submit" value="Register">-->
</div>
</form>

</form>
<?php $this->load->view('templates/footer');?>