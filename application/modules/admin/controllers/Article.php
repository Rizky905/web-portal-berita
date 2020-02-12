<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_builder');
	}

	public function index(){
		$crud = $this->generate_crud('articles');

		$crud->set_subject('Article');

		$crud->columns('TITLE_ARTICLES','SUMMARY_ARTICLES','tag_articles','category_articles','media_articles','CREATED_DATE','IS_HEADLINE');

		if ( $this->ion_auth->in_group(array('webmaster', 'admin','author')) ){
			$crud->add_action('Headline', '', 'admin/article/add_headline','ui-icon-circle-plus');
		}

		$crud->fields('TITLE_ARTICLES','category_articles','SUMMARY_ARTICLES','BODY_ARTICLES','tag_articles','media_articles','created_by','CREATED_DATE');
		$crud->required_fields('TITLE_ARTICLES','SUMMARY_ARTICLES','BODY_ARTICLES');
		$crud->unique_fields('TITLE_ARTICLES');

		$crud->edit_fields('TITLE_ARTICLES','category_articles','SUMMARY_ARTICLES','BODY_ARTICLES','tag_articles','media_articles','created_by');

		$crud->callback_field('CREATED_DATE',array($this,'date_time_stamp'));

		$crud->set_relation_n_n('category_articles','articles_have_category','category','ID_ARTICLES','ID_CATEGORY','NAME_CATEGORY',NULL,array('STATUS_CATEGORY'=>'1'/*,'ID_PARENT_CATEGORY !='=>'NULL'*/));
		$crud->set_relation_n_n('media_articles','articles_have_media','media','ID_ARTICLES','ID_MEDIA','URL_MEDIA');
		$crud->set_relation_n_n('tag_articles','articles_have_tag','tag','ID_ARTICLES','ID_TAG','TAG_NAME');
		$crud->set_relation_n_n('created_by','admin_create_articles','admin_users','ID_ARTICLE','ID','username',NULL,array('CAN_CREATE'=>1,'admin_users.active'=>1));

		$crud->callback_column('media_articles',array($this,'showImage'));

		$crud->callback_before_insert(array($this,'parent_check'));

		$crud->display_as('TITLE_ARTICLES','Title');
		$crud->display_as('IS_HEADLINE','Status Headline');
		$crud->display_as('SUMMARY_ARTICLES','Summary');
		$crud->display_as('BODY_ARTICLES','Body');
		$crud->display_as('category_articles','Category');
		$crud->display_as('tag_articles','Tag');
		$crud->display_as('media_articles','Media');
		$crud->display_as('Created_By','Created By');
		$crud->display_as('CREATED_DATE','Created Date');

		$crud->callback_field('SUMMARY_ARTICLES',array($this,'summary_box'));
		$crud->callback_field('TITLE_ARTICLES',array($this,'title_article'));

		$crud->unset_export();
		$crud->unset_print();

		$this->mPageTitle = 'Articles';
		$this->render_crud();
	}

	function date_time_stamp($value){
		date_default_timezone_set('Asia/Bangkok');
		$value = date("Y-m-d H:i:s");
		return '<input type="text" name="CREATED_DATE" value="'.$value.	'" readonly>';
	}

	function summary_box($value){
		return '<input type="text" maxlength="100" value="'.$value.'" name="SUMMARY_ARTICLES"> Maks. 100 Karakter';
	}

	function title_article($value){
		return '<input type="text" maxlength="50" value="'.$value.'" name="TITLE_ARTICLES"> Maks. 50 Karakter';
	}

	function showImage($value) {  
		$url = base_url('assets/uploads/files/'.$value);
    	return "<img src='" . $url . "' width=50>";
	}

	function add_headline($primary_key){
		$this->db->set('IS_HEADLINE','1');
		$this->db->where('ID_ARTICLES',$primary_key);
		$this->db->update('articles');
		redirect('admin/Article');
	}

	/**
	 * Logout user
	 */
	public function logout(){
		$this->ion_auth->logout();
		redirect($this->mConfig['login_url']);
	}
}
?>