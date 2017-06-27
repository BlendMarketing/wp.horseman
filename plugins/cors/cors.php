<?php
/* Plugin Name: Allow CORS
Plugin URI: https://horseman.io/
Description: Allow CORS 
Version: 1.0
Author: Marc Tanis 
Author URI: https://blendimc.com/
License: GPLv2 or later */


add_filter( 'allowed_http_origins', 'add_allowed_origins' );
function add_allowed_origins( $origins ) {
    $origins[] = 'http://blend.horseman.dev';
    $origins[] = 'https://blend.horesman.io';
    $origins[] = 'http://reacttraining.dev';
    return $origins;
}


