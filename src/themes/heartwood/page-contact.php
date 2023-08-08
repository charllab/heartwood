<?php
/**
 *
 * Template Name: Contact Page
 *
 **/
get_header(); ?>

    <main>

        <section>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6">

                        <?php if (have_posts()) : ?>
                            <?php /* Start the Loop */ ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <?php the_content(); ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php echo do_shortcode('[gravityform id="1" title="false" ajax="true"]');?>

                    </div><!-- col -->

                    <div class="col-lg-5">
                        <div class="px-1 pt-2 pb-3 bg-dark contact-sidebar rounded-top text-white">
                            <div class="container">
                                <div class=".row content">
                                    <div class="col">
                                        <h2 class="h3">Contact Us</h2>
                                    </div>
                                </div><!-- row content -->
                                <div class="row">
                                    <div class="col">
                                        <h5 class="mb-0">Phone</h5>
                                    </div><!-- col -->
                                    <div class="col text-end">
                                        <i class="fa fa-phone fa-flip-horizontal" aria-hidden="true"></i>
                                    </div><!-- col -->
                                </div><!-- row -->
                                <div class="row">
                                    <div class="col">
                                        <p class="text-mustard">
                                        <a
                                            href="tel:+1<?php echo strip_tel(get_field('primary_number', 'option')); ?>"
                                            class="text-decoration-none"><?php echo get_field('primary_number', 'option'); ?></a>
                                        </p>
                                    </div><!-- col -->
                                </div><!-- row -->
                                <div class="row">
                                    <div class="col"><h5 class="mb-0">Email</h5></div><!-- col -->
                                    <div class="col text-end"><i class="fa fa-envelope" aria-hidden="true"></i></div><!-- col -->
                                </div><!-- row -->
                                <div class="row">
                                    <div class="col">
                                        <p class="text-mustard">
                                        <a href="mailto:<?php echo get_field('primary_email', 'option'); ?>"
                                           class="text-decoration-none"><?php echo get_field('primary_email', 'option'); ?></a>
                                        </p>
                                    </div><!-- col -->
                                </div><!-- row -->
                                <div class="row">
                                    <div class="col"><h5 class="mb-0">Address</h5></div><!-- col -->
                                    <div class="col text-end"><i class="fa fa-map-marker" aria-hidden="true"></i></div><!-- col -->
                                </div><!-- row -->
                                <div class="row">
                                    <div class="col">
                                        <p>
                                            <?php echo get_field('physical_address', 'option'); ?>
                                        </p>
                                    </div>
                                    <!-- col -->
                                </div><!-- row -->
                            </div><!-- container -->
                        </div><!-- p-2 bg-dark -->

                        <div class="px-0">
                            <?php $mapurl = get_field('map_embed_code', 'option'); ?>
                            <iframe src="<?php echo $mapurl; ?>" width="600" height="412" style="border:0;"
                                    allowfullscreen="" loading="lazy"></iframe>
                        </div><!-- px-0 -->
                    </div><!-- col -->
                </div><!-- row -->

            </div><!-- container -->
        </section>

    </main>

<?php get_footer();