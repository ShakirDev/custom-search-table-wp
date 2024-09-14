<?php
/*
Plugin Name: Custom Search Table with Niches
Description: A plugin that creates a searchable table for custom post type "Niches" with features, where only admins can add, edit, or delete.
Version: 1.0.1
Author: Shakir Ahmed Joy
*/

// Load custom post type
require_once plugin_dir_path(__FILE__) . 'includes/cpt-niches.php';

// Load meta boxes
require_once plugin_dir_path(__FILE__) . 'includes/meta-boxes.php';

// Load shortcode for the searchable table
require_once plugin_dir_path(__FILE__) . 'includes/shortcode.php';

// Enqueue scripts and styles
require_once plugin_dir_path(__FILE__) . 'includes/enqueue-scripts.php';
