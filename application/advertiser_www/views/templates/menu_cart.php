<ul class="topnav">
	<li>Welcome, <?php echo $this->session->userdata('customer_first_name');?></li> |
	<?php 
	if($this->cart->total_items() > 0)
	{
	?>
	<li><a href="<?= base_url() . 'products/checkout'; ?>">Checkout</a></li> |
	<?php } ?>
	<li><a href="<?= base_url() . 'products/cart'; ?>">My Cart</a></li> |
	<li><a href="<?= base_url() . 'accounts/register'; ?>">My Account</a></li> |
	<li><a href="<?= base_url() . 'accounts/logout'; ?>">Logout</a></li>
	
</ul>