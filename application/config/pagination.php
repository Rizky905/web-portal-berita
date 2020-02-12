<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| Pagination Settings
| -------------------------------------------------------------------
| Reference: http://www.codeigniter.com/user_guide/libraries/pagination.html
| */

// Customizing the Pagination
$config['uri_segment']					= 3;				// default: 3
$config['num_links']					= 2;				// default: 2
$config['prefix']						= '';				// default: ''
$config['suffix']						= '';				// default: ''
$config['use_global_url_suffix']		= FALSE;			// default: FALSE

// Customizing query string format
$config['use_page_numbers']				= TRUE;				// default: TRUE
$config['page_query_string']			= TRUE;				// default: TRUE
$config['enable_query_strings']			= TRUE;			// default: FALSE
$config['query_string_segment']			= 'page';		// default: 'per_page'
$config['reuse_query_string']			= TRUE;			// default: FALSE

//edit style pagination
$config['full_tag_open'] = '<div class="pagination justify-content-center text-xs-center"><nav class="page-content"><ul class="pagination">';
$config['full_tag_close'] = '</ul></nav></div>';
$config['attributes'] = ['class' => 'page-link'];
$config['first_link'] = false;
$config['last_link'] = false;
$config['first_tag_open'] = '<li class="page-item"><span class="page-link">>';
$config['first_tag_close'] = '</span></li>';
$config['prev_link'] = '&laquo';
$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
$config['prev_tag_close'] = '</span></li>';
$config['next_link'] = '&raquo';
$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
$config['next_tag_close'] = '</span></li>';
$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
$config['last_tag_close'] = '</span></li>';
$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
$config['num_tag_close'] = '</span></li>';

/*// Adding Enclosing Markup
$config['full_tag_open']				= '<ul class="pagination">';			// default: '<p>'
$config['full_tag_close']				= '</ul>';			// default: '</p>'

// Customizing the First Link
$config['first_link']					= '&laquo;';		// default: 'First'
$config['first_tag_open']				= '<li>';			// default: '<div>'
$config['first_tag_close']				= '</li>';			// default: '</div>'
$config['first_url']					= '';				// default: ''

// Customizing the Last Link
$config['last_link']					= '&raquo;';		// default: 'Last'
$config['last_tag_open']				= '<li>';			// default: '<div>'
$config['last_tag_close']				= '</li>';			// default: '</div>'

// Customizing the "Next" Link
$config['next_link']					= '&gt;';			// default: '&gt;'
$config['next_tag_open']				= '<li>';			// default: '<div>'
$config['next_tag_close']				= '</li>';			// default: '</div>'

// Customizing the "Previous" Link
$config['prev_link']					= '&lt;';			// default: '&lt;'
$config['prev_tag_open']				= '<li>';			// default: '<div>'
$config['prev_tag_close']				= '</li>';			// default: '</div>'

// Customizing the "Current Page" Link
$config['cur_tag_open']					= '<li class="active"><a href="#" onclick="return false;">';	// default: '<b>'
$config['cur_tag_close']				= '</a></li>';		// default: '</b>'

// Customizing the "Digit" Link
$config['num_tag_open']					= '<li>';			// default: '<div>'
$config['num_tag_close']				= '</li>';			// default: '</div>'*/

// Hiding the Pages
$config['display_pages']				= TRUE;				// default: FALSE

// Adding attributes to anchors
$config['attributes']					= array();			// default: array()

// Disabling the "rel" attribute
$config['attributes']['rel']			= FALSE;			// default: FALSE
