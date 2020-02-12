<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Panel management, includes: 
 * 	- Admin Users CRUD
 * 	- Admin User Groups CRUD
 * 	- Admin User Reset Password
 * 	- Account Settings (for login user)
 */
class Tag extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_builder');
	}

	public function Index(){
		$crud = $this->generate_crud('tag');
		$crud->set_subject('Tag');

		$crud->fields('TAG_NAME','SLUG');
		$crud->display_as('TAG_NAME','Tag');
		$crud->display_as('SLUG','Slug');
		$crud->required_fields('TAG_NAME');
		$crud->unique_fields('TAG_NAME');
		$crud->callback_before_insert(function ($post_array)  {
			if (empty($post_array['SLUG'])) {
				$flag=$post_array['TAG_NAME'];
				$slug_flag = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $flag)));
				$post_array['SLUG'] = $slug_flag;
			}
		return $post_array;
		});

		$crud->callback_before_delete(array($this,'delete_tag'));

		$crud->field_type('SLUG','invisible');

		$crud->callback_field('TAG_NAME',array($this,'TAG_NAME'));

		$crud->unset_export();
		$crud->unset_print();

		$this->mPageTitle = 'Tags';
		$this->render_crud();
	}

	function TAG_NAME($value){
		return '<input type="text" maxlength="50" value="'.$value.'" name="TAG_NAME"> Maks. 50 Karakter';
	}

	function delete_tag($primary_key){
		$this->db->where('ID_TAG',$primary_key);
		$this->db->delete('articles_have_tag');
	}

	/**
	 * Logout user
	 */
	public function logout(){
		$this->ion_auth->logout();
		redirect($this->mConfig['login_url']);
	}
}