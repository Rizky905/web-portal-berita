<?php
$this->load->view('_partials/navbar');
?>

<?php
$this->load->model('user_model');
$this->load->library('pagination');

$category_term = $this->input->get('category');
$jumlah_data = $this->User_model->sum_category($category_term);

$config['base_url'] = base_url().'en/Home/category';
$config['total_rows'] = $jumlah_data;
$config['per_page'] = 5;
$flag=$config['per_page'];
$from = $this->input->get('page');
if ($from<2){
	$from=$from;
}else{
	$from=$from*$flag-$flag;
}
$this->pagination->initialize($config);

$data=array(
	'results_category'=>$this->User_model->results_sum_category($flag,$from,$category_term),
	'results_side_category'=>$this->User_model->get_category_side($category_term)
);
$this->load->view($inner_view,$data);
?>

<?php $this->load->view('_partials/footer'); ?>