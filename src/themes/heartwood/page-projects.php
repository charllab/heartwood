<?php
get_header();
?>
<main>
    <?php get_template_part('partials/body/flexible-content'); ?>

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
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1, // Set to a specific number if you want to limit the number of products
                );

                $products_query = new WP_Query($args);

                if ($products_query->have_posts()) :
                    while ($products_query->have_posts()) : $products_query->the_post();
                        global $product;
                        ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="px-50">
                                <div class="product bg-white text-center py-1 px-1 pt-md-2 pb-md-1 px-md-1">
                                    <h2 class="h4"><?php the_title(); ?></h2>
                                    <?php
                                    if (has_post_thumbnail()) :
                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post-thumbnail');
                                        ?>
                                        <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" class="img-fluid"/>
                                    <?php endif; ?>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read More</a>
                                </div><!-- product -->
                            </div>
                        </div><!-- col -->
                    <?php
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
