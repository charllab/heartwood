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
                        <?php get_template_part('partials/cards/product-cards'); ?>
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
