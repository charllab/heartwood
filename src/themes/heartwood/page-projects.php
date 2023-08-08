<?php
get_header();
?>
<main>
    <?php get_template_part('partials/body/flexible-content'); ?>

    <section class="bg-skin--tint py-1">
        <div class="container">
            <div class="row justify-content-between mb-1">
                <div class="col-md-3">
                    <h2>Our Work</h2>
                </div>
                <div class="col">
                    <div class="d-md-flex justify-content-md-end align-content-center pt-md-50">
                        <?php get_template_part('partials/sorting/sort-by-cat'); ?>
                    </div><!-- d-flex-->
                </div><!-- col-->
            </div><!-- row-->
            <div class="row">
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
