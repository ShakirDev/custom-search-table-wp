<?php
// Enqueue necessary scripts and styles
function cst_enqueue_assets()
{
    wp_enqueue_style('cst-styles', plugins_url('../css/styles.css', __FILE__)); // Assuming you have a stylesheet
    wp_enqueue_script('jquery'); // Ensure jQuery is loaded
    wp_enqueue_script('cst-search', plugins_url('../js/search.js', __FILE__), array('jquery'), null, true); // Load your custom search.js
    wp_localize_script('cst-search', 'ajaxurl', admin_url('admin-ajax.php'));  // Pass AJAX URL to JS
}
add_action('wp_enqueue_scripts', 'cst_enqueue_assets');
