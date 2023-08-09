<?php
get_header();
?>

<main class="pt-2">
    <section>
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <?php
                if (has_post_thumbnail()) :
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post-thumbnail');
                    ?>
                    <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" class="img-fluid"/>
                <?php endif;
                ?>
            </div>
            <div class="col-lg-7">
                <?php if (have_posts()) : ?>
                    <?php /* Start the Loop */ ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                        <a href="<?php echo esc_url(home_url('/projects')); ?>" class="btn btn-secondary text-decoration-none">Back</a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </section>
</main>

<?php get_footer(); ?>
