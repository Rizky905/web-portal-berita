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
	'site_name' => 'Berita Satu',

	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => 'Berita Satu CMS',

	// Default meta data
	'meta_data'	=> array(
		'author'		=> '',
		'description'	=> '',
		'keywords'		=> ''
	),
	
	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
			'assets/dist/admin/adminlte.min.js',
			'assets/dist/admin/lib.min.js',
			'assets/dist/admin/app.min.js'
		),
		'foot'	=> array(
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'assets/dist/admin/adminlte.min.css',
			'assets/dist/admin/lib.min.css',
			'assets/dist/admin/app.min.css'
		)
	),

	// Default CSS class for <body> tag
	'body_class' => '',
	
	// Multilingual settings
	'languages' => array(
	),

	// Menu items
	'menu' => array(
		'home' => array(
			'name'		=> 'Dashboard',
			'url'		=> '',
			'icon'		=> 'fa fa-tachometer',
		),
		'Articles' => array(
			'name'		=> 'Articles',
			'url'		=> 'Article',
			'icon'		=> 'fa fa-archive',
		),
		'Headline' => array(
			'name'		=> 'Headline',
			'url'		=> 'headline',
			'icon'		=> 'fa fa-thumb-tack'
		),
		'Media' => array(
			'name'		=> 'Media',
			'url'		=> 'Media',
			'icon'		=> 'fa fa-caret-square-o-right',
		),
		'Tag' => array(
			'name'		=> 'Tag',
			'url'		=> 'Tag',
			'icon'		=> 'fa fa-tags',
		),
		'Category' =>array(
			'name'		=> 'Category',
			'url'		=> 'Category',
			'icon'		=> 'fa fa-hashtag',
		),
		'panel' => array(
			'name'		=> 'Admin Panel',
			'url'		=> 'panel',
			'icon'		=> 'fa fa-cog',
			'children'  => array(
				'Admin Users'			=> 'panel/admin_user',
				'Create Admin User'		=> 'panel/admin_user_create',
				'Admin User Groups'		=> 'panel/admin_user_group',
			)
		),
		'logout' => array(
			'name'		=> 'Sign Out',
			'url'		=> 'panel/logout',
			'icon'		=> 'fa fa-sign-out',
		)
	),

	// Login page
	'login_url' => 'admin/login',

	// Restricted pages
	'page_auth' => array(
		'panel'						=> array('webmaster', 'admin'),
		'panel/admin_user'			=> array('webmaster', 'admin'),
		'panel/admin_user_group'	=> array('webmaster', 'admin'),
	),

	// AdminLTE settings
	'adminlte' => array(
		'body_class' => array(
			'webmaster'	=> 'skin-red',
			'admin'		=> 'skin-red',
			'editor'	=> 'skin-blue',
			'author'	=> 'skin-blue',
		)
	),

	// Useful links to display at bottom of sidemenu
	'useful_links' => array(
		array(
			'auth'		=> array('webmaster', 'admin', 'editor', 'author'),
			'name'		=> 'Frontend Website',
			'url'		=> 'Home/home',
			'target'	=> '_blank',
			'color'		=> 'text-aqua'
		)
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
$config['sess_cookie_name'] = 'ci_session_admin';