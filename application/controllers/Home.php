<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Home extends MY_Controller {

	public function __construct()    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('image_moo');
    }

    public function no_page(){
    	$this->render('no_page','no_page_layout');
    }

	public function home(){
		$this->render('home','home_layout');
	}

	public function category(){
		$this->render('category','category_layout');
	}

	public function search(){
		$this->render('search','search_layout');
	}

	public function landing_page(){
		$this->render('landing_page','landing_layout');
	}

	public function index(){
		$this->render('index_terkini','index_terkini_layout');
	}

	public function tag(){
		$this->render('tag_page','tag_page_layout');
	}
}
