<?php

// Enqueue Styles & Scripts.

add_action( 'wp_enqueue_scripts', function() {

    wp_enqueue_style(
        'fortune-press-main-style',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        '5.0.0', 
    );

    wp_enqueue_style(
        'fortune-press-bootstrap',
        get_template_directory_uri() . '/assets/css/fortune-press-bootstrap.css',
        array(),
        '5.0.0', 
    );

});