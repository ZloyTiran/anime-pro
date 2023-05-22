<?php
add_action('wp_enqueue_scripts', 'anime_scripts');

function anime_scripts() {
    wp_enqueue_style('bootstrap_styles', get_template_directory_uri() . '/assets/css/bootstrap.css');
    wp_enqueue_style('main_styles', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.js', array('jquery'), null, true);
}

show_admin_bar(false);