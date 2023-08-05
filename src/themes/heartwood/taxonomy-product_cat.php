<?php
get_header();
?>
<main>
    <?php get_template_part('partials/body/flexible-content'); ?>

    <h1>Taxonomy Product Cat</h1>

    <section class="bg-skin--tint py-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Our Work</h2>

                    <?php
                    $product_categories = get_terms('product_cat', array(
                        'hide_empty' => false, // Change to true if you want to hide empty categories
                    ));

                    if (!empty($product_categories) && !is_wp_error($product_categories)) :
                        echo '<ul class="product-categories-list">';
                        foreach ($product_categories as $product_category) :
                            $category_link = get_term_link($product_category->term_id, 'product_cat');
                            $thumbnail_id = get_term_meta($product_category->term_id, 'thumbnail_id', true);
                            $image = wp_get_attachment_url($thumbnail_id);
                            ?>
                            <li class="product-category">
                                <a href="<?php echo esc_url($category_link); ?>">
                                    <?php if ($image): ?>
                                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($product_category->name); ?>" />
                                    <?php endif; ?>
                                    <h2><?php echo esc_html($product_category->name); ?></h2>
                                </a>
                            </li>
                        <?php
                        endforeach;
                        echo '</ul>';
                    else :
                        echo 'No product categories found';
                    endif;
                    ?>

                </div>
                <?php

                $category_slug = get_query_var('product_cat');

                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => $category_slug,
                        ),
                    ),
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        wc_get_template_part('content', 'product');
                    endwhile;
                else :
                    echo 'No products found';
                endif;

                wp_reset_postdata();
                ?>
            </div><!-- row -->
        </div><!-- container -->
    </section>
</main>

<?php get_footer(); ?>
