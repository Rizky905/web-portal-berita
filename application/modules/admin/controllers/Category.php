<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Panel management, includes: 
 * 	- Admin Users CRUD
 * 	- Admin User Groups CRUD
 * 	- Admin User Reset Password
 * 	- Account Settings (for login user)
 */
class Category extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_builder');
	}

	public function Index(){
		$crud = $this->generate_crud('category');
		$crud->set_subject('Category');

		$crud->columns('NAME_CATEGORY','ID_PARENT_CATEGORY','DESCRIPTION_CATEGORY','SLUG_CATEGORY','STATUS_CATEGORY');

		$crud->fields('NAME_CATEGORY','ID_PARENT_CATEGORY','DESCRIPTION_CATEGORY','SLUG_CATEGORY','STATUS_CATEGORY');

		$crud->add_action('Status On', '', 'admin/category/turn_on_category','ui-icon-bullet');
		$crud->add_action('Status Off', '', 'admin/category/turn_off_category','ui-icon-radio-off');

		$crud->set_relation('ID_PARENT_CATEGORY','category','NAME_CATEGORY',array('ID_PARENT_CATEGORY ='=>NULL));

		$crud->display_as('NAME_CATEGORY','Name');
		$crud->display_as('ID_PARENT_CATEGORY','Parent Category');
		$crud->display_as('SLUG_CATEGORY','Slug');
		$crud->display_as('STATUS_CATEGORY','Status');
		$crud->display_as('DESCRIPTION_CATEGORY','Description');

		$crud->unique_fields('NAME_CATEGORY');
		$crud->required_fields('NAME_CATEGORY','STATUS_CATEGORY');

		$crud->callback_before_insert(function ($post_array)  {
			if (empty($post_array['SLUG_CATEGORY'])) {
				$flag=$post_array['NAME_CATEGORY'];
				$slug_flag = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $flag)));
				$post_array['SLUG_CATEGORY'] = $slug_flag;
			}
		return $post_array;
		});
		$crud->callback_before_update(function ($post_array)  {
			if (empty($post_array['SLUG_CATEGORY'])) {
				$flag=$post_array['NAME_CATEGORY'];
				$slug_flag = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $flag)));
				$post_array['SLUG_CATEGORY'] = $slug_flag;
			}
		return $post_array;
		});

		$crud->callback_before_delete(array($this,'delete_category'));
		$crud->callback_before_delete(array($this,'delete_category_child'));

		$crud->field_type('SLUG_CATEGORY','invisible');
		$crud->callback_field('NAME_CATEGORY',array($this,'NAME_CATEGORY'));

		$crud->callback_add_field('DESCRIPTION_CATEGORY',array($this,'DESCRIPTION_CATEGORY'));
		$crud->callback_edit_field('DESCRIPTION_CATEGORY',array($this,'DESCRIPTION_CATEGORY'));

		$crud->unset_export();
		$crud->unset_print();
		$this->mPageTitle = 'Category';
		$this->render_crud();
	}

	function NAME_CATEGORY($value){
		return '<input type="text" maxlength="50" value="'.$value.'" name="NAME_CATEGORY"> Maks. 50 Karakter';
	}

	function DESCRIPTION_CATEGORY($value){
		return '<textarea type="text" maxlength="100" name="DESCRIPTION_CATEGORY"></textarea> Maks. 100 Karakter';
	}

	function turn_on_category($primary_key){
		$this->db->set('STATUS_CATEGORY','1');
		$this->db->where('ID_CATEGORY',$primary_key);
		$this->db->update('category');
		redirect('admin/category');
	}

	function turn_off_category($primary_key){
		$this->db->set('STATUS_CATEGORY','0');
		$this->db->where('ID_CATEGORY',$primary_key);
		$this->db->update('category');
		redirect('admin/category');
	}

	function delete_category($primary_key){
		$this->db->where('ID_CATEGORY =',$primary_key);
		$this->db->delete('articles_have_category');
	}

	function delete_category_child($primary_key){
		$this->db->where('ID_PARENT_CATEGORY =',$primary_key);
		$this->db->delete('category');
	}

	/**
	 * Logout user
	 */
	public function logout(){
		$this->ion_auth->logout();
		redirect($this->mConfig['login_url']);
	}
}