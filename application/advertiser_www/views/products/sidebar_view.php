<!--<div id="sidebar">
<div class="category_header">Categories</div>
<ul>
<?php foreach($categories as $category){ ?>
<li><a href="<?=base_url()?>products/category/<?=$category->urlid?>"><?=$category->category?></a></li>
<?php } ?>
</ul>

</div>-->

<div class="category_header" style="font-size:16px; border-bottom: 1px #ccc solid; padding-bottom: 20px;">Browse Our Products by Section</div>
<ul class="" style="padding-left: 0px; list-style: none outside none;
    margin: 0;
    padding: 10px 5px;">
<?php foreach($categories as $category){ ?>
<li style="font-size:16px;">
	<a href="<?=base_url()?>products/category/<?=$category->urlid?>"><?=$category->category?></a>
</li><br />
<?php } ?>
</ul>

</div>