<?php
// Add a custom meta box for niche features
function cst_add_niche_meta_box()
{
    add_meta_box(
        'niche_features_meta_box',  // Unique ID
        'Niche Features',           // Box title
        'cst_niche_features_meta_box_html',  // Content callback
        'niches',                   // Post type
        'normal',                   // Context
        'default'                   // Priority
    );
}
add_action('add_meta_boxes', 'cst_add_niche_meta_box');

// Meta box HTML callback
function cst_niche_features_meta_box_html($post)
{
    $value = get_post_meta($post->ID, '_niche_features', true);
?>
    <label for="niche_features">Enter the features for this niche:</label>
    <textarea name="niche_features" id="niche_features" rows="5" style="width:100%;"><?php echo esc_textarea($value); ?></textarea>
<?php
}

// Save the custom meta box data
function cst_save_niche_features_meta_box($post_id)
{
    if (array_key_exists('niche_features', $_POST)) {
        update_post_meta(
            $post_id,
            '_niche_features',
            sanitize_textarea_field($_POST['niche_features'])
        );
    }
}
add_action('save_post', 'cst_save_niche_features_meta_box');
