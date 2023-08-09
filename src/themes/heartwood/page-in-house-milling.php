<?php
/**
 *
 * Template Name: In-House Milling
 *
 **/
get_header(); ?>

    <main>

        <?php get_template_part('partials/body/flexible-content'); ?>

        <section>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col">
                        <?php if (have_posts()) : ?>
                            <?php /* Start the Loop */ ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <?php the_content(); ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php echo do_shortcode('[gravityform id="2" title="false" ajax="true"]');?>
                    </div><!-- col -->
                </div><!-- row -->

            </div><!-- container -->
        </section>

    </main>

<?php get_footer();