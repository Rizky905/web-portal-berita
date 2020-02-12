<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Headline extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_builder');
	}

	public function Index(){
		$crud = $this->generate_crud('articles');
		$crud->set_subject('Headline');
		//$crud->where('IS_HEADLINE','1');

		$crud->unset_delete();

		$crud->where('IS_HEADLINE','1');

		if ( $this->ion_auth->in_group(array('webmaster', 'admin','author')) ){
			$crud->add_action('Headline', '', 'admin/Headline/delete_headline','ui-icon-circle-minus');
		}

		$crud->columns('TITLE_ARTICLES','SUMMARY_ARTICLES','category_articles','media_articles','CREATED_DATE','IS_HEADLINE');

		$crud->set_relation_n_n('category_articles','articles_have_category','category','ID_ARTICLES','ID_CATEGORY','NAME_CATEGORY');
		$crud->set_relation_n_n('media_articles','articles_have_media','media','ID_ARTICLES','ID_MEDIA','URL_MEDIA');
		$crud->set_relation_n_n('tag_articles','articles_have_tag','tag','ID_ARTICLES','ID_TAG','TAG_NAME');
		$crud->set_relation_n_n('created_by','admin_create_articles','admin_users','ID_ARTICLE','ID','username');

		if('list'==$crud->getState()){
			$crud->callback_column('media_articles',array($this,'showImage'));
		}

		$crud->display_as('TITLE_ARTICLES','Title');
		$crud->display_as('SUMMARY_ARTICLES','Summary');
		$crud->display_as('BODY_ARTICLES','Body');
		$crud->display_as('category_articles','Category');
		$crud->display_as('tag_articles','Tag');
		$crud->display_as('media_articles','Media');
		$crud->display_as('Created_By','Created By');
		$crud->display_as('CREATED_DATE','Created Date');

		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_export();
		$crud->unset_print();

		$this->mPageTitle = 'Headline';
		$this->render_crud();
	}

	function showImage($value) {  
		$url = base_url('assets/uploads/files/'.$value);
    	return "<img src='" . $url . "' width=50>";
	}

	function delete_headline($primary_key){
		$this->db->set('IS_HEADLINE','0');
		$this->db->where('ID_ARTICLES',$primary_key);
		$this->db->update('articles');
		redirect('admin/headline');
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