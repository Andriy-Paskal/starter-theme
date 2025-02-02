<?php

function paskal_enqueue_assets() {
    // Enqueue scripts
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());
    wp_enqueue_style('main-style', ASSETS_THEME_PATH . '/css/all.css', array(), THEME_VERSION, 'all');


    // Enqueue scripts
    wp_enqueue_script('custom-script', ASSETS_THEME_PATH . '/js/all.js', array('jquery'), THEME_VERSION, true);
}
add_action('wp_enqueue_scripts', 'paskal_enqueue_assets');

