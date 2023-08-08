<?php
get_header();
?>
<main>
    <section class="bg-skin--tint pt-2 pb-3 mb-0">
        <div class="container">
            <div class="row justify-content-between mb-1">
                <div class="col-md-3">
                    <h2>Products</h2>
                </div>
                <div class="col">
                    <div class="d-md-flex justify-content-md-end align-content-center pt-md-50">
                        <?php get_template_part('partials/sorting/sort-by-cat'); ?>
                    </div><!-- d-flex-->
                </div><!-- col-->
            </div><!-- row-->
            <div class="row">
                <?php
                $category_slug = get_query_var('product_cat');
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            'terms' => $category_slug,
                        ),
                    ),
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
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
                                        <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"
                                             class="img-fluid"/>
                                    <?php endif; ?>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read More</a>
                                </div><!-- product -->
                            </div>
                        </div><!-- col -->
                    <?php
                    endwhile;
                else :
                    echo '<div class="col">';
                    echo 'No products found';
                    echo '</div>';
                endif;
                wp_reset_postdata();
                ?>
            </div><!-- row -->
        </div><!-- container -->
    </section>
</main>

<?php get_footer(); ?>
