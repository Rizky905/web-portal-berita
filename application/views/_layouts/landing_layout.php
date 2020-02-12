<?php
$this->load->view('_partials/navbar');
?>

<?php
$this->load->model('User_model');
$landing_term = $this->input->get('id');
$category_term = $this->input->get('category');
$data=array(
	'results_select_article'=>$this->User_model->select_article($landing_term),
	'results_side_category'=>$this->User_model->get_category_side($category_term),
	'results_berita_terkini'=>$this->User_model->berita_terkini_landing()
);
$this->load->view($inner_view,$data);
?>

<?php $this->load->view('_partials/footer'); ?>