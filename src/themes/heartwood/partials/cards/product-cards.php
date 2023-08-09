<div class="col-md-6 col-lg-4">
    <div class="px-50">
        <div class="product product--wrapper bg-white text-center py-1 px-1 pt-md-2 pb-md-1 px-md-1 mb-1">
            <h2 class="h4"><?php the_title(); ?></h2>
            <?php
            if (has_post_thumbnail()) :
                $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post-thumbnail');
                ?>
                <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" class="img-fluid product-img"/>
            <?php endif; ?>
            <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read More</a>
        </div><!-- product -->
    </div>
</div><!-- col -->
