<?php $this->load->view('templates/header');?>
<div id="reg_success">
<div class="success">Registration Complete</div>
<h3>Thank you for registering with <?php echo $this->config->item("sitename") ?></h3>
<p>We have sent an email to the address you supplied us with but our web administrator has to approve your account first before you can buy products off our website. <strong>IF</strong> the web master does approve you, you will be notified via email</p>

<strong>NB: If you do not receive a confirmation email, please check your Outlook junk mail folder or the spam folder on Gmail.</strong>

</div>
<?php $this->load->view('templates/footer');?>