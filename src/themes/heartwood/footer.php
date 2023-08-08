<footer class="bg-dark">
    <section class="pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-7 text-white text-center text-md-start">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php bloginfo('template_url'); ?>/images/logo.svg"
                             alt="<?php bloginfo('name'); ?> - Logo"
                             class="img-fluid mb-1 rounded">
                        <span class="sr-only"><?php bloginfo('name'); ?></span>
                    </a>
                    <p class="mb-150 pe-md-1">
                        Lorem ipsum dolor sit amet, consectetur elit. Curabitur ullamcorper scelerisque nisi et
                        tincidunt. In sit amet metus condimentum, faucibus ipsum sed, pellentesque mi. Aliquam dolor
                        odio, pharetra et pellentesque non, vulputate vitae purus. Curabitur interdum, justo id mollis
                        interdum, justo sem lacinia tellus, quis consectetur augue neque ut leo. Suspendisse justo
                        magna, pellentesque sed accumsan vitae, ullamcorper at turpisv
                    </p>
                    <?php
                    $button = get_field('footer_button', 'option');
                    if ($button): ?>
                        <a href="<?php echo $button['url']; ?>"
                           class="btn btn-secondary">
                            <?php echo $button['title']; ?>
                        </a>
                    <?php endif; ?>
                </div><!-- col-->
                <div class="col-md text-mustard d-none d-md-block">
                    <h4>Explore</h4>
                    <?php wp_nav_menu([
                        'theme_location' => 'secondary',
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => 'navbar-nav',
                        'fallback_cb' => '',
                        'menu_id' => '',
                        'walker' => new bootstrap_5_wp_nav_menu_walker(),
                    ]); ?>
                </div><!-- col-->
                <div class="col-md text-mustard d-none d-md-block">
                    <h4>Contact Us</h4>
                    <table>
                        <tr>
                            <td>
                                <a href="tel:+1<?php echo strip_tel(get_field('primary_number', 'option')); ?>"
                                   class="text-decoration-none"><?php echo get_field('primary_number', 'option'); ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="mailto:<?php echo get_field('primary_email', 'option'); ?>"
                                   class="text-decoration-none"><?php echo get_field('primary_email', 'option'); ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="text-white">
                                <?php echo get_field('physical_address', 'option'); ?></td>
                            </p>
                        </tr>
                    </table>
                    <div class="d-flex justify-content-start align-items-center mb-150">
                        <div class="social-links">
                            <?php while (have_rows('social_links', 'option')): the_row(); ?>
                                <a class="social-link btn btn-link text-mustard pt-250 ps-0 pe-250 pb-250 my-0"
                                   style="margin-right: 4px" target="_blank" href="<?php the_sub_field('url'); ?>">
                                    <i class="<?php the_sub_field('icon_class'); ?>" style="font-size: 28px;">
                                        <span class="sr-only"><?php the_sub_field('label'); ?></span>
                                    </i>
                                </a>
                            <?php endwhile; ?>
                        </div><!-- social-links -->
                    </div><!-- container -->
                </div><!-- col-->
            </div><!-- row-->
        </div><!-- container-->
    </section>
    <section class="pb-50">
        <div class="container">
            <div class="row text-white small">
                <div class="col-md text-center text-lg-start">
                    <p>
                        &copy; <?php echo Date('Y') . ' ' . get_bloginfo('name') . ' ' . get_bloginfo('description'); ?></p>
                </div>
                <div class="col-md text-center">
                    <p class="text-mustard"><a
                            href="<?php echo esc_url(home_url('/terms-of-use-and-privacy-policy')); ?>"
                            class="text-decoration-none">Terms and Conditions</a></p>
                </div>
                <div class="col-md text-center text-lg-end">
                    <p class="text-mustard">Website by <a href="https://sproing.ca" class="text-decoration-none">Sproing&nbsp;Creative</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</footer>

<?php wp_footer(); ?>

</body>

</html>