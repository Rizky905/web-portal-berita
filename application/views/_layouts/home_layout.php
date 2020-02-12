<?php $this->load->view('_partials/navbar'); ?>

<?php
$this->load->model('User_model');

$data=array(
	'resultsheadline'=>$this->User_model->show_headline(),
	'resultsarticle'=>$this->User_model->show_article(),
	'resultsarticlecategory'=>$this->User_model->show_article_category()
);
$this->load->view($inner_view, $data);
?>


<?php $this->load->view('_partials/footer'); ?>