<?php $this->load->view('templates/header') ?>
<article id="home" style="height:700px;">
<div class="section_header">Featured Products</div>
<div id="top_products">
<div id="home_right" style="width:650px; float:left; min-height: 500px;">

	<?php 
	foreach ($products as $product)
	{ 
	?>
	<div class="product_description">
		<a href="<?=base_url()?>products/product/<?=$product->urlid;?>/<?=$product->id;?>/<?=$product->code;?>">
			<div class="product_image"><img src="<?=base_url()?>uploads/<?=$product->thumbnail; ?>"></div>
			<div class="product_name"><?=$product->name; ?></div>
		</a>
		<div class="product_price"><?=$product->price;?></div>
		<div class="product_actions"><a href="<?=base_url()?>products/addtocart/<?=$product->id?>/"><input type="button" name="" value="add to cart"></a></div>
	</div>
	<?php 
	}
	?>

	<a href="<?=base_url()?>products" style="float:right; font-size:16px;margin-right: 15px;">View All Products</a>
</div>	

<div id="home_left" style="width:280px; float:right; padding:10px;">
<?php $this->load->view('home/home_sidebar') ?>

</div>	
</div>
</article>
<?php $this->load->view('templates/footer') ?>
