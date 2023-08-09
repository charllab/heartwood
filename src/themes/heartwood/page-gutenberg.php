<?php
/**
 *
 * Template Name: Gutenberg Page
 *
 **/
get_header(); ?>

    <main>
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
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>
    </main>

<?php get_footer();