<?php
/* Template Name: Blog Page */
get_header();
?>
<main>
    <section>
        <div class="container">
            <div class="row page-blog">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC'
            );

            $blog_posts = new WP_Query($args);

            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    echo '<div class="col-xs-6 col-lg-4">';
                    echo '<div class="position-relative mb-50 postcard pt-2 px-1 pb-1" style="background-image: url(' . esc_url($featured_img_url) . '); background-repeat: no-repeat; background-size: cover;">';
                    echo '<div class="block__tint-overlay--mustard position-absolute z-index-1"></div>';
                    echo '<div class="position-relative z-index-10 d-flex flex-column justify-content-between h-100">';
                    echo '<h3 class="text-white">' . get_the_title() . '</h3>';
                    echo '<div class="link-wrap text-center">';
                    echo '<a href="' . get_the_permalink() . '" class="btn btn-secondary">Learn More</a>';
                    echo '</div><!-- link-wrap -->';
                    echo '</div><!-- position-relative-->';
                    echo '</div><!-- postcard -->';
                    echo '</div><!-- col -->';
                endwhile;
                wp_reset_postdata();
            else :
                echo 'No posts found';
            endif;
            ?>
            </div><!-- row -->
        </div><!-- container -->
    </section>
</main>

<?php get_footer(); ?>
