<?php
$product_categories = get_terms('product_cat', array(
    'hide_empty' => false, // Change to true if you want to hide empty categories
));
$current_url = add_query_arg( $_SERVER['QUERY_STRING'], '', home_url( $_SERVER['REQUEST_URI'] ) );

if (is_tax('product_cat')) {
    $current_term_id = get_queried_object_id();
} else {
    $current_term_id = 0;
}

if (!empty($product_categories) && !is_wp_error($product_categories)) :
    echo '<span class="d-inline-block me-50 mb-50">Sort&nbsp;by</span>';
    echo '<ul class="product-categories-list list-inline">';
    foreach ($product_categories as $product_category) :
        $category_link = get_term_link($product_category->term_id, 'product_cat');
        $thumbnail_id = get_term_meta($product_category->term_id, 'thumbnail_id', true);
        $image = wp_get_attachment_url($thumbnail_id);
        $class = ( $current_url == esc_url( $category_link ) ) ? 'active' : '';
        ?>
        <li class="product-category mb-50 list-inline-item <?php echo esc_attr($class); ?>">
            <a href="<?php echo esc_url($category_link); ?>" class="text-decoration-none text-dark">
                <?php echo esc_html($product_category->name); ?>
            </a>
        </li>
    <?php
    endforeach;
    echo '</ul>';
endif;
?>
