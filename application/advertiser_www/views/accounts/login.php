<?php $this->load->view('templates/header');?>
<style>
.login-window { background: #fff; padding: 30px 30px 60px 30px; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; border: solid 1px #ddd; -webkit-box-shadow: 0px 2px 5px rgba(0,0,0,0.25); -moz-box-shadow: 0px 2px 5px rgba(0,0,0,0.25); box-shadow: 0px 2px 5px rgba(0,0,0,0.25); position: relative; }

#loginBtn{
	background-color: #2694E4;
    	background-image: -moz-linear-gradient(center top , #26ADE4, #266EE4);
    	background-repeat: repeat-x;
    	border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    	width: 190px;
    	/*height:30px;*/
    	margin: 20px auto 0px auto;
    	
    	border-radius: 5px 5px 5px 5px;
    	font-size: 15px;
    	line-height: normal;
    	padding: 9px 14px;
}


</style>

<div id="login">

	<div class="login-window" style="margin:50px auto 0 auto; width:400px; height:210px;">
						
			<div id="header">
				<div class="error"><?=$msg?></div>
				<h1>LOGIN</h1>
			</div>
			
			<form class="login-form awesome" id="login-form" method="post">
			<input type="hidden" name="processlogin" value="1" />
			<div>
				<input name="email" id="email" value="Email Address" autocorrect="off" type="text"/> 
			</div>	
			<div style="margin-top: 10px;">
				<input name="password" id="loginpassword" value="" autocorrect="off" type="password"/> 
			</div>
			<div>
				<input type="submit" id="loginBtn" value="LOGIN &raquo;">
			</div>
			<div style="margin-top: 15px;">
			<a href="<?= base_url() ?>accounts/forgot_password/">Forgot Password</a> | New Customer?&nbsp;<a href="<?= base_url() ?>accounts/register/">Register Here</a> 
			</div>
			</form>
	</div>



<!--<form id="frm_login" method="post">
	<input type="hidden" name="processlogin" value="1" />
	<label class="signupLabel" for="email">Email</label><br />
	<input type="input" size="30" name="email" id="email" class="form_input"/>	
	<br /><br />
	<label class="signupLabel" for="password">password</label><br />
	<input type="password" size="30" name="password" id="password" class="form_input"/>	
	<br /><br />
	<input type="submit" name="submit" value="Submit" class="signupSubmit">
	<br /><br />
	<a href="<?= base_url() ?>accounts/forgot_password/">Forgot Password</a> | New Customer?&nbsp;<a href="<?= base_url() ?>accounts/register/">Register Here</a> 
</form>-->
</div>

<?php $this->load->view('templates/footer');?>
