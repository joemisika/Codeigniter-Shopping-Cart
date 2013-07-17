<?php $this->load->view('templates/header');?>
<div class="section_header"><?=$section_name;?></div>
<div id="products">
	<div id="products_right" style="width:650px;">
		<div id="product_half" style="height:680px">
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
		</div>
	<!--<div id="pagination">-->
		<div class="pager" style="margin: 0pt auto 0pt 310px; font-size:13px;"><?php if(isset($pager)){echo $pager;} ?> </div>
	<!--</div>-->
	</div>
	
	<div id="products_left" style="width:300px; border:0px; margin-top:0px;">
	<?php $this->load->view('products/sidebar_view');?>
	</div>
	
	
	
	
</div>
<?php $this->load->view('templates/footer');?>