<?php
$this->load->view('_partials/navbar');
?>

<?php
$this->load->model('user_model');
$this->load->library('pagination');

$tag_term = $this->input->get('tag');
$jumlah_data = $this->User_model->sum_tag($tag_term);

$config['base_url'] = base_url().'en/Home/tag_page';
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
	'results_tag'=>$this->User_model->results_sum_tag($flag,$from,$tag_term),
	'results_side_tag'=>$this->User_model->get_tag_side($tag_term)
);
$this->load->view($inner_view,$data);
?>

<?php $this->load->view('_partials/footer'); ?>