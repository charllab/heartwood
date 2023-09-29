<div class="col-md-6 col-lg-4">
    <div class="px-50">
        <div class="product product--wrapper bg-white text-center py-1 px-1 pt-md-2 pb-md-1 px-md-1 mb-1">
            <?php
            global $product;
            $product = wc_get_product(get_the_ID());

            // Debugging line
            // var_dump($product);
            ?>

            <?php
            if (has_post_thumbnail()) :
                $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post-thumbnail');
                ?>
                <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" class="img-fluid product-img"/>
            <?php endif; ?>

            <h2 class="h5 mt-1 mb-250"><?php the_title(); ?></h2>
            <!-- Display the product price -->
            <div class="product-price mb-250">
                <?php
                if ($product && $product instanceof WC_Product) {
                    echo $product->get_price_html();
                } else {
                    echo 'Price not available';
                }
                ?>
            </div>

            <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read More</a>
        </div><!-- product -->
    </div>
</div><!-- col -->
