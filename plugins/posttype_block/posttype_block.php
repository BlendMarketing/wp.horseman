<?php
/* Plugin Name: PostType Block 
Plugin URI: https://horseman.io/
Description: Block Posttype for Horseman 
Version: 1.0
Author: Marc Tanis 
Author URI: https://blendimc.com/
License: GPLv2 or later */

//Fix the ACF Issue
add_action('init', "initHook", 0);
function initHook() {
    if(function_exists('acf')) {
        acf()->settings["dir"] = WP_CONTENT_URL."/plugins/advanced-custom-fields/";
    }
}

add_action( 'init', 'create_block' );
function create_movie_review() {
    register_post_type( 'block',
        array(
            'labels' => array(
                'name' => 'Blocks',
                'singular_name' => 'Block',
            ),
            'public' => true,
            'show_in_rest' => true,
            'menu_position' => 20,
            'supports' => array( 'title', 'editor', 'custom-fields' ),
        )
    );
}
define( 'ACF_LITE', true );
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_post-group',
		'title' => 'Post Group',
		'fields' => array (
			array (
				'key' => 'field_590de81db5d00',
				'label' => 'Person',
				'name' => 'person',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


