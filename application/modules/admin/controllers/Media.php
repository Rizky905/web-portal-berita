<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Panel management, includes: 
 * 	- Admin Users CRUD
 * 	- Admin User Groups CRUD
 * 	- Admin User Reset Password
 * 	- Account Settings (for login user)
 */
class Media extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_builder');
	}

	public function Index(){
		$crud = $this->generate_crud('media');
		$crud->set_subject('Media');
		$crud->columns('TITLE_MEDIA','DESCRIPTION_MEDIA','URL_MEDIA','CAPTION_MEDIA');
		
		$crud->fields('TITLE_MEDIA','DESCRIPTION_MEDIA','URL_MEDIA','CAPTION_MEDIA');
		$crud->display_as('TITLE_MEDIA','Title Media');
		$crud->display_as('CAPTION_MEDIA','Caption Media');
		$crud->display_as('URL_MEDIA','Url Media');
		$crud->display_as('DESCRIPTION_MEDIA','Description');

		$crud->set_field_upload('URL_MEDIA','assets/uploads/files');

		$crud->callback_add_field('DESCRIPTION_MEDIA', function () {
		return '<textarea type="text" maxlength="255" value="DESCRIPTION_MEDIA" name="DESCRIPTION_MEDIA" placeholder="Maks. 255 karakter"></textarea>';
		});

		$crud->callback_before_delete(array($this,'delete_image'));
		//$crud->callback_after_upload(array($this,'resize_image'));

		$crud->required_fields('TITLE_MEDIA','URL_MEDIA');
		$crud->field_type('DESCRIPTION_MEDIA','string');
		$crud->unique_fields(array('TITLE_MEDIA','URL_MEDIA'));

		$crud->callback_column('URL_MEDIA',array($this,'showImage'));

		$crud->callback_field('TITLE_MEDIA',array($this,'TITLE_MEDIA'));

		/*
		if ('edit' == $crud->getState()) {
			$crud->set_field_upload('URL_MEDIA',array($this,'showImage'));
		}

		$crud->callback_read_field('URL_MEDIA', function($value, $primaryKey) {
    		$url = base_url('assets/uploads/files/'.$value);
        	return "<img src='" . $url . "' width=100>";
		});
		*/

		$crud->unset_export();
		$crud->unset_print();

		$this->mPageTitle = 'Media';
		$this->render_crud();
	}

	function TITLE_MEDIA($value){
		return '<input type="text" maxlength="50" value="'.$value.'" name="TITLE_MEDIA"> Maks. 50 Karakter';
	}

	/*function resize_image($uploader_response,$field_info, $files_to_upload){
		$this->load->library('image_moo');
 
	    //Is only one file uploaded so it ok to use it with $uploader_response[0].
	    $file_uploaded = $field_info->upload_path.'/'.$uploader_response[0]->name; 
	 
	    $this->image_moo->load($file_uploaded)->resize(400,400)->save($file_uploaded,true);
	 
	    return true;
	}*/

	function showImage($value) {  
		$url = base_url('assets/uploads/files/'.$value);
    	return "<img src='" . $url . "' width=50>";
	}

	function delete_image($primary_key){
		$this->db->where('ID_MEDIA',$primary_key);
		$this->db->delete('articles_have_media');
	}

	/**
	 * Logout user
	 */
	public function logout(){
		$this->ion_auth->logout();
		redirect($this->mConfig['login_url']);
	}
}