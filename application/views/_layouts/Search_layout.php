<?php
$this->load->view('_partials/navbar');
?>

<?php
$this->load->model('user_model');
$this->load->library('pagination');

$search_term = $this->input->get('search');
$jumlah_data = $this->User_model->get_results($search_term);
$config['base_url'] = base_url().'en/Home/search';
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


$data['results'] = $this->user_model->give_results($flag,$from,$search_term);
$this->load->view($inner_view,$data);
?>

<?php $this->load->view('_partials/footer'); ?>