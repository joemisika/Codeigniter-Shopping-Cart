<html>
<head>
<meta charset="utf-8">
<title>The Shopping Cart - Order Invoice</title>
<style>
body { font-family: verdana, sans-serif;} 
img {
  	border:0;
}

#page {
  	/*width:100%;*/
  	width:600px;
  	margin:0 auto;
  	padding:15px;

}

#logo {
  	float:left;
  	margin:0;
}

#address {
  	height:181px;
  	margin-left:250px; 
}

table {
  	width:100%;
}

td {
	padding:5px;
}

tr.odd {
  	background-color:#e1ffe1;
}

tr:nth-child(even) {background-color: #CCCCCC;}
tr:nth-child(odd) {background-color: #FFFFFF;}

ul.placeOrder{
	list-style-type: none; 
	float: right;
	font-size:14px;
	font-weight:bold;
}
ul li {
	display: inline ;
	padding: 0px 3px 0px 3px ;
}
</style>

</head>
<body>
<div id="page">
  <div id="logo">
    <a href="<?=base_url()?>"><img src="http://www.danifer.com/images/invoice_logo.jpg"></a>
  </div><!--end logo-->
  
  <div id="address">
    <h1 style="margin:0px;"><?=$this->config->item("company_name");?></h1>
    <a href="mailto:<?=$this->config->item("company_email");?>">
    <?=$this->config->item("company_email");?>
    </a>
    <br /><br />
    Order No: #<?=$order_no?><br />
    Created on <?=date('d-m-Y')?><br />
    </h1>
  </div><!--end address-->

  <div id="content">
    <p>
      <strong>Customer Details</strong><br />
      Company: <?=$customer_company?><br />
      Company: <?=$customer_vat?><br />		
      Name: <?=$customer_name?> <br />
      Email: <?=$customer_email?><br />
      Cell: <?=$customer_cell?>
      </p>
    <hr>
    <table>
      <tr>
      		<th><strong>#</strong></th>
		<th><strong>Code</strong></th>
		<th><strong>Name</strong></td>
		<th><strong>Unit Price</strong></th>
		<th><strong>Quantity</strong></th>
		<th><strong>Amount</strong></th>
      </tr>
      <?php 
	$i = 1; 
	foreach ($this->cart->contents() as $items): 
      ?>
      <tr>
      		<td><?= $i ?></td>
      		<td><?= $items['code'] ?></td>
      		<td><?= $items['name'] ?></td>
      		<td><?= $this->cart->format_number($items['price']) ?></td>
      		<td><?= $items['qty'] ?></td>
      		<td><?= $this->cart->format_number($items['subtotal']) ?></td>
      </tr>
      <?php 
	$i++; 
	endforeach; 
       ?>           
        
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><strong>Total</strong></td>
		<td><strong><?= $this->cart->format_number($this->cart->total()) ?></strong></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<?php 
		$thevat = (0.14 * $this->cart->total()); 
		$thenewvat = $this->cart->format_number((0.14 * $this->cart->total()));
		?>
		<td><strong>VAT</strong></td>
		<td><strong><?=$thenewvat?></strong></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<?php 
		$thetotal = $this->cart->format_number(($thevat + $this->cart->total())); 
		?>
		<td><strong>Total</strong></td>
		<td><strong><?=$thetotal?></strong></td>
	</tr>

    </table>
    <hr>
    	<!--<ul class="placeOrder">
    		<li><a href="<?= base_url()?>orders/placeOrder">Confirm Order</a></li> |
    		<li><a href="<?= base_url()?>orders/cancelOrder">Cancel Order</a></li>
    	</ul>-->
    <p>
      Thank you for your order! Please note that all samples should be fully paid in advance before delivery to the account below. <br />
      If you have any questions, please feel free to contact us at <a href="mailto:<?=$this->config->item("company_email");?>"><?=$this->config->item("company_email");?></a> or call us on <?=$this->config->item("company_telephone");?>.
    </p>
     <hr>
    <p>
    <h3>Banking Details</h3>
	Account Name: <?=$this->config->item("account_name");?> <br />
	Account Num: <?=$this->config->item("account_number");?><br />
	Account type: <?=$this->config->item("account_type");?><br />
	Branch Name: <?=$this->config->item("branch_name");?><br />
	Branch Code: <?=$this->config->item("branch_code");?><br />
    </p>
    <hr>
    <p>
      <center><small>This communication is for the exclusive use of the addressee and may contain proprietary, confidential or privileged information. If you are not the intended recipient any use, copying, disclosure, dissemination or distribution is strictly prohibited.
      <br /><br />
      &copy; <?=$this->config->item("sitename");?> All Rights Reserved
      </small></center>
    </p>
  </div><!--end content-->
  </div><!--end page-->
</body>
</html>