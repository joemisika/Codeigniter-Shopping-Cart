<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?=$title?></title>
	<link rel="stylesheet" href="<?=base_url()?>css/style.css?ver='<?=rand();?>'"/>
	<script type="text/javascript" src="<?= base_url(); ?>plugins/ckeditor/ckeditor.js" ></script>
	<script type="text/javascript" src="<?= base_url(); ?>plugins/ckeditor/adapters/jquery.js" ></script>
</head>
<body>
<div>
	<header class="h">
		<h1>The CMS</h1>
			<nav>
				<ul class="main">
					<li><a href="">Home</a></li>
					<li><a href="<?=base_url()?>products">Products</a></li>
					<li><a href="<?=base_url()?>categories">Categories</a></li>
					<li><a href="<?=base_url()?>customers">Customers</a></li>
					<li><a href="<?=base_url()?>orders">Orders</a></li>
					<li><a href="<?=base_url()?>pages">Pages</a></li>
					<li><a href="<?=base_url()?>users">Administrators</a></li>
				</ul>
				<span class="user">
				<span class="icon"></span>
				<?php $themainsite = $this->config->item('mainsite');?>
				Welcome <?php echo $this->session->userdata('firstname');?>, <a href="<?=base_url()?>/login/logout">Logout</a> &nbsp;|&nbsp; <a href="<?=$themainsite?>" target="_blank">Visit Main Site</a>
				</span>
			</nav>
	</header><br />
	<div id="section_header" style="margin-left: 25px; font-size:25px;"><?=$section_header;?></div>
	<div id="wrapper" style="width:95%;">
	