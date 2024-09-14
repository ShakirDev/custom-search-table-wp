<?php
// Register Custom Post Type: Niches
function cst_register_niche_post_type()
{
    $labels = array(
        'name'               => 'Niches',
        'singular_name'      => 'Niche',
        'menu_name'          => 'Niches',
        'name_admin_bar'     => 'Niche',
        'add_new'            => 'Add New Niche',
        'add_new_item'       => 'Add New Niche',
        'new_item'           => 'New Niche',
        'edit_item'          => 'Edit Niche',
        'view_item'          => 'View Niche',
        'all_items'          => 'All Niches',
        'search_items'       => 'Search Niches',
        'not_found'          => 'No niches found.',
        'not_found_in_trash' => 'No niches found in Trash.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,  // Not publicly accessible
        'show_ui'            => true,   // Show UI in admin
        'show_in_menu'       => true,   // Show in admin menu
        'query_var'          => true,
        'rewrite'            => array('slug' => 'niches'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title'),  // Only show title field, no editor
        'menu_icon'          => 'dashicons-tag',  // Icon in the admin menu
    );

    register_post_type('niches', $args);
}
add_action('init', 'cst_register_niche_post_type');
