<?php $this->load->view('templates/header');?>
<div id="thepages">
<div class="section_header"><?=$section_name;?></div>

<?= $pages->body; ?>

</div>
<?php $this->load->view('templates/footer');?>