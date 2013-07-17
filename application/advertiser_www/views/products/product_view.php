<?php $this->load->view('templates/header');?>
<div class="section_header"><?=$section_name;?></div>
<div id="product" >
	<div class="single_product" style=" float:left; margin-top: 15px; padding:20px 20px 20px 0px; height:400px; width:640px;">
		<div class="product_image" style="float:left; width:320px;">
			<a id="example2" href="<?=base_url()?>uploads/<?= $product->mainimage ?>">
				<img src="<?=base_url()?>uploads/<?=$product->mainimage?>" width="300px" height="300px"/>
			</a>
		</div>
		<div class="product_info">
			<div class="product_name" style="font-size:16px;"><?=$product->name?></div>
			<div class="product_code"><?//=$product->code?></div>
			<div class="product_price" style="font-size:16px;">R <?=$product->price?></div>
			<div class="product_desc" style="margin-top: 35px;"><?=$product->description?></div>
		</div>
	</div>
	<div class="sidebar" style="width:250px; float:right; margin-top: 15px; padding:10px; height:420px;">
	<?php $this->load->view('products/product_sidebar'); ?>
	</div>
</div>

<!--style="margin-top: 15px; padding:20px; height:400px; background:red;"-->
 <?php $this->load->view('templates/footer');?>