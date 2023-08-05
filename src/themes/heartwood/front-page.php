<?php get_header(); ?>
    <main>
        <?php get_template_part('partials/body/flexible-content'); ?>

        <section class="frontpage--posts bg-skin--tint py-2">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3>Latest News</h3>
                        <div class="post-carousel owl-theme"> <!-- Owl Carousel Container -->
                            <?php
                            $args = array(
                                'posts_per_page' => 6,
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'orderby' => 'date',
                                'order' => 'DESC'
                            );
                            $query = new WP_Query($args);
                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                    echo '<div class="position-relative mb-50 postcard pt-2 px-1 pb-1" style="background-image: url(' . esc_url($featured_img_url) . '); background-repeat: no-repeat; background-size: cover;">';
                                    echo '<div class="block__tint-overlay--mustard position-absolute z-index-1"></div>';
                                    echo '<div class="position-relative z-index-10 d-flex flex-column justify-content-between h-100">';
                                    echo '<h5 class="text-white">' . get_the_title() . '</h5>';
                                    echo '<div class="link-wrap text-center">';
                                    echo '<a href="' . get_the_permalink() . '" class="btn btn-primary">Learn More</a>';
                                    echo '</div><!-- link-wrap -->';
                                    echo '</div><!-- position-relative-->';
                                    echo '</div><!-- postcard -->';
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo 'No posts found';
                            endif;
                            ?>
                        </div><!-- owl-carousel -->
                        <div class="owl-navigation">
                            <div class="owl-nav mb-50">
                                <div class="owl-dots">
                                </div>
                            </div>
                        </div><!-- owl-navigation -->
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>


    </main>
<?php get_footer();
