<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?=$title?></title> <!--| Simple shopping cart for low income businesses</title>-->
<meta content = "" name="description">
<meta content = "" name="keywords">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<!--<script type="text/javascript" src="http://use.typekit.com/eqp1oco.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>-->


<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" media="all" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script>
<script src="http://gsgd.co.uk/sandbox/jquery/easing/jquery.easing.1.3.js"></script>
<script src="<?=base_url()?>js/gov_slider.js"></script>-->

<script src="<?=base_url()?>js/jquery.js"></script>
<script src="<?=base_url()?>js/fancy.js"></script>

<script src="<?=base_url()?>js/javascript.js"></script>
<script type="text/javascript">
$(document).ready(function() {
		$('input[type="text"], textarea, input[type="password"]').addClass("idleField");
       		$('input[type="text"], textarea, password').focus(function() {
       			$(this).removeClass("idleField").addClass("focusField");
    		    if (this.value == this.defaultValue){ 
    		    	this.value = '';
				}
				if(this.value != this.defaultValue){
	    			this.select();
	    		}
    		});
    		$('input[type="text"], textarea, password').blur(function() {
    			$(this).removeClass("focusField").addClass("idleField");
    		    if ($.trim(this.value) == ''){
			    	this.value = (this.defaultValue ? this.defaultValue : '');
				}
    		});
    		
    		$('#address').focus(function() {
       			$(this).removeClass("idleField").addClass("focusField");
    		    if (this.value == this.defaultValue){ 
    		    	this.value = '';
				}
				if(this.value != this.defaultValue){
	    			this.select();
	    		}
    		});
    		$('#address').blur(function() {
    			$(this).removeClass("focusField").addClass("idleField");
    		    if ($.trim(this.value) == ''){
			    	this.value = (this.defaultValue ? this.defaultValue : '');
				}
    		});
		});	
</script>		

<!--css-->
<link rel="stylesheet" href="<?=base_url()?>/css/style.css">
<!--<link rel="stylesheet" href="<?=base_url()?>/css/input.css">-->
<style>

 #email{
    	width:350px;
    	padding:10px;
    	height:14px;
    	outline:none;
    }
    
    #password{
    	width:160px;
    	padding:10px;
    	height:14px;
    	outline:none;
    }
    #loginpassword{
    	width:350px;
    	padding:10px;
    	height:14px;
    	outline:none;
    }
    
    #password2{
    	width:160px;
    	padding:10px;
    	height:14px;
    	outline:none;
    }
    
    #company{
    	width:160px;
    	padding:10px;
    	height:14px;
    	outline:none;
    }
    
    #vatno{
    	width:160px;
    	padding:10px;
    	height:14px;
    	outline:none;
    }
    
    #firstname{
    	width:160px;
    	padding:10px;
    	height:14px;
    	outline:none;
    }
    
    #lastname{
    	width:160px;
    	padding:10px;
    	height:14px;
    	outline:none;
    }
    
    #cellphone{
    	width:160px;
    	padding:10px;
    	height:14px;
    	outline:none;
    }
    
    #telephone{
    	width:160px;
    	padding:10px;
    	height:14px;
    	outline:none;
    }
    
    #address{
    	width:350px;
    	padding:10px;
    	outline:none;
    	/*background:#FFF;
    	color: #6F6F6F;
	border: solid 2px #DFDFDF;*/
    }
    #billingcode{
    	width:160px;
    	padding:10px;
    	height:14px;
    	outline:none;
    }
    
    #city{
    	width:160px;
    	padding:10px;
    	height:14px;
    	outline:none;
    }
    
    #country{
    	width:160px;
    	padding:10px;
    	height:14px;
    	outline:none;
    }
    
    .focusField{
    	border:solid 2px #73A6FF;
    	background:#EFF5FF;
    	color:#000;
    }
    .idleField{
    	/*background:#EEE;*/
    	background:#FFF;
    	color: #6F6F6F;
	border: solid 2px #DFDFDF;
    }		
    
    .button {
	-moz-border-bottom-colors: none;
	-moz-border-image: none;
	-moz-border-left-colors: none;
	-moz-border-right-colors: none;
	-moz-border-top-colors: none;
	background: -moz-linear-gradient(#FFFFFF, #C9C9C9) repeat scroll 0 0 transparent;
	border-color: #DEDEDE #C8C8C8 #B0B0B0;
	border-style: solid;
	border-width: 1px;
	box-shadow: none;
	text-shadow: 0 1px #FFFFFF;
	}

    #primary-button {
	background: -moz-linear-gradient(#34BFF3, #074AA2) repeat scroll 0 0 transparent;
	border-color: #34BFF3 rgba(0, 0, 0, 0.05) #003C8B;
	box-shadow: 0 1px #60CBFA inset;
	color: #FFFFFF;
	text-shadow: 0 -1px rgba(0, 0, 0, 0.5);
    }
    
    .info {
color: #00529B;
background-color: #BDE5F8;
background-image: url('info.png');
}
.success {
color: #4F8A10;
background-color: #DFF2BF;
background-image:url('success.png');
}
.warning {
color: #9F6000;
background-color: #FEEFB3;
background-image: url('warning.png');
}
.error {
color: #D8000C;
background-color: #FFBABA;
background-image: url('error.png');
/*padding: 10px;*/
margin-bottom: 15px;
/*display:hidden;*/
}
    
</style>
</head>
<body>

<!-- Header -->
<header id="top">
	<div id="cart">
		
		<div class="logo scrollBtn" title="Joe Misika"></div>
		<div id="smallmenu" style="float:right;  height: 15px; width: 436px;"><!--hello! menu-->
		<?php $this->load->view('templates/' . $menu); ?>
		</div>
		<nav>
			<a href="<?=base_url()?>" class="scrollBtn">Home</a> |
			<a href="<?=base_url()?>products" class="scrollBtn">Products</a> |
			<a href="<?=base_url()?>products/cart" class="scrollBtn">Shopping Cart</a> | 
			<a href="<?=base_url()?>pages/about-us" class="scrollBtn">About Us</a> |
			<a href="<?=base_url()?>pages/contact-us" class="scrollBtn">Contact Us</a> <!--|
			<a href="#" class="scrollBtn blog black" rev="Coming Soon!">Blog</a>-->
		</nav>
	</div>
</header>
<!-- //Header -->
<!--<header id="mh">
	<div>
		<a id="b">Tradaculator</a>
		<p>Calculating game trade-in values from across the web</p>
		<form>
			<input type="search" id="s" placeholder="search&hellip;" />
		</form>
	</div>
</header>-->
<section>
<div id="content">
