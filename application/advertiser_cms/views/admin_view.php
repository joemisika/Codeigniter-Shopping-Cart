<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<title><?=$title?></title>
<!--- OFFICIAL WEBFONTS --> 
<!--- CABIN  --> <link href='http://fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>
<!--- ANGIE  --><script type="text/javascript" src="http://use.typekit.com/kwa3cvc.js"></script>
<!--- ANGIE  --><script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<!--- JS MODULES INIT --> 
<script type='text/javascript' src='<?=base_url()?>js/jquery.js'></script>
<script type='text/javascript' src='<?=base_url()?>js/jquery-ui-1.8.js'></script>
<!--- CSS INIT --> 
<link rel="stylesheet" href="<?=base_url()?>css/style.css?ver='<?=rand();?>'"/>
</head>
<body>
<header class="h">
<h1>The Joe</h1>
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

</header>
this is the body design
<footer>
All rights reserved &copy; Joe Misika 2012</footer>
</body>
</html>