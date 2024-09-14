<?php
// Shortcode to display searchable niches table
function cst_searchable_niches_table()
{
    $args = array(
        'post_type' => 'niches',
        'posts_per_page' => -1,
    );
    $niches = new WP_Query($args);

    ob_start();  // Start output buffering

?>
    <!-- Search bar -->
    <div class="cst-search-container" style="text-align: center; margin-bottom: 20px;">
        <input type="text" id="search-bar" placeholder="Search..." autocomplete="off" style="padding: 10px; width: 50%;" />
    </div>

    <!-- Table displaying the niches and features -->
    <table id="search-table" border="1" style="width: 100%; text-align: left; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Title</th>
                <th>Features</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <?php
            if ($niches->have_posts()) :
                while ($niches->have_posts()) : $niches->the_post();
                    $features = get_post_meta(get_the_ID(), '_niche_features', true);
                    // Displaying features as a list
                    $features_list = explode("\n", $features);  // Convert newline-separated text to list
            ?>
                    <tr>
                        <td><?php the_title(); ?></td>
                        <td>
                            <ul>
                                <?php foreach ($features_list as $feature) : ?>
                                    <li><?php echo esc_html($feature); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </tbody>
    </table>

<?php
    return ob_get_clean();  // Return the buffered content
}
add_shortcode('searchable_niches_table', 'cst_searchable_niches_table');
