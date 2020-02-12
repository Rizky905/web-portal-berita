<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| CI Bootstrap 3 Configuration
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views 
| when calling MY_Controller's render() function. 
| 
| See example and detailed explanation from:
| 	/application/config/ci_bootstrap_example.php
*/

$config['ci_bootstrap'] = array(

	// Site name
	'site_name' => 'Berita Satu Media',

	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => 'Berita Satu',

	// Default meta data
	'meta_data'	=> array(
		'author'		=> '',
		'description'	=> '',
		'keywords'		=> ''
	),

	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
		),
		'foot'	=> array(
			//'assets/dist/frontend/lib.min.js',
			//'assets/dist/frontend/app.min.js',
			//'assets/dist/app.min.js'

			'assets/js/vendor/jquery-2.2.4.min.js',
			'assets/js/popper.min',
			'assets/js/vendor/bootstrap.min.js',
			'assets/js/google-font.js',
			'assets/js/jquery.ajaxchimp.min.js',
			'assets/js/owl.carousel.min.js',
			'assets/js/jquery.nice-select.min.js',
			'assets/js/jquery.magnific-popup.min.js',
			'assets/js/main.js',

			'assets/js/navbar.js'
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			//'assets/dist/frontend/lib.min.css',
			//'assets/dist/frontend/app.min.css',
			//'assets/dist/app.min.css'

			'assets/css/bootstrap.css',
			'assets/css/linearicons.css',
			'assets/css/owl.carousel.css',
			'assets/css/font-awesome.min.css',
			'assets/css/nice-select.css',
			'assets/css/magnific-popup.css',
			'assets/css/main.css',
			'assets/css/Linearicons-Free-v1.0.0/Web Font/style.css',

			'assets/css/navbar.css',
			'assets/css/footer.css',
			'assets/css/search-page.css',
			'assets/css/category.css',
			'assets/css/landing.css',
			'assets/css/home.css'
		)
	),

	// Default CSS class for <body> tag
	'body_class' => 'berita',
	
	// Multilingual settings
	'languages' => array(
		'default'		=> 'en',
		'autoload'		=> array('general'),
		'available'		=> array(
			'en' => array(
				'label'	=> 'English',
				'value'	=> 'english'
			),
			'zh' => array(
				'label'	=> '繁體中文',
				'value'	=> 'traditional-chinese'
			),
			'cn' => array(
				'label'	=> '简体中文',
				'value'	=> 'simplified-chinese'
			),
			'es' => array(
				'label'	=> 'Español',
				'value' => 'spanish'
			)
		)
	),

	// Google Analytics User ID
	'ga_id' => '',

	// Menu items
	'menu' => array(
		'home' => array(
			'name'		=> 'Home',
			'url'		=> '',
		),
	),

	// Login page
	'login_url' => '',

	// Restricted pages
	'page_auth' => array(
	),

	// Email config
	'email' => array(
		'from_email'		=> '',
		'from_name'			=> '',
		'subject_prefix'	=> '',
		
		// Mailgun HTTP API
		'mailgun_api'		=> array(
			'domain'			=> '',
			'private_api_key'	=> ''
		),
	),

	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
	),
);

/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'ci_session_frontend';