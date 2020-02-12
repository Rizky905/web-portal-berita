<?php $this->load->view('_partials/navbar'); ?>

<?php
$this->load->model('User_model');
$this->load->library('pagination');

$jumlah_data = $this->User_model->jumlah_data();
$config['base_url'] = base_url().'en/Home/index';
$config['total_rows'] = $jumlah_data;
$config['per_page'] = 5;
$from = $this->input->get('page');
$flag=$config['per_page'];
$from = $this->input->get('page');
if ($from<2){
	$from=$from;
}else{
	$from=$from*$flag-$flag;
}

$this->pagination->initialize($config);

$data=array(
	'resultsarticle'=>$this->User_model->show_article(),
	'user'=>$this->User_model->data($config['per_page'],$from)
);

$this->load->view($inner_view, $data);
?>

<?php $this->load->view('_partials/footer'); ?>