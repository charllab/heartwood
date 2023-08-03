<header id="header" class="hero-nav-overlay">
    <nav class="navbar navbar-expand-lg py-0">
        <div class="container">
            <div class="nav-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo.svg"
                         alt="<?php bloginfo('name'); ?> - Logo"
                         class="img-fluid">
                    <span class="sr-only"><?php bloginfo('name'); ?></span>
                </a>
            </div>

            <button class="navbar-toggler m-0" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="d-lg-flex flex-lg-column d-none">
                <?php wp_nav_menu([
                    'theme_location' => 'primary',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'mainnav',
                    'menu_class' => 'navbar-nav ml-auto align-items-center',
                    'fallback_cb' => '',
                    'menu_id' => 'main-menu',
                    'walker' => new bootstrap_5_wp_nav_menu_walker(),
                ]); ?>
            </div>
        </div>
    </nav>
    <div class="navbar-placeholder"></div>

    <div class="collapse navbar-collapse bg-white d-lg-none" id="mobileNav">
        <?php wp_nav_menu([
            'theme_location' => 'primary',
            'container_class' => 'container',
            'container_id' => 'mainnav-mobile',
            'menu_class' => 'navbar-nav ml-auto',
            'fallback_cb' => '',
            'menu_id' => 'main-menu',
            'walker' => new bootstrap_5_wp_nav_menu_walker(),
        ]); ?>

        <div class="container d-flex justify-content-start align-items-center mb-150">
            <div class="social-links">
                <?php while( have_rows('social_links', 'options') ): the_row(); ?>
                    <a class="social-link btn btn-link text-dark pt-250 px-250 pb-250 my-0" style="margin-right: 4px" target="_blank" href="<?php the_sub_field('url'); ?>">
                        <i class="<?php the_sub_field('icon_class'); ?>" style="font-size: 28px;">
                            <span class="sr-only"><?php the_sub_field('label'); ?></span>
                        </i>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <?php $header = get_field('header');
    $align = $header['buttons_set'];
    $buttons = $header['buttons_set']['buttons'];
    //echo '<pre>';
    //var_dump($header);
    //echo '</pre>';
    ?>
    <?php if($header) : ?>
        <section class="header__banner d-flex justify-content-center align-items-center position-relative" style="background-image: url(<?php echo esc_attr($header['banner_image']['url']);?>);background-repeat: no-repeat; background-size: cover; background-position: center;">
            <div class="block__tint-overlay <?php echo esc_attr($header['overlay']);?> position-absolute h-100 z-index-1"></div>
            <div class="container position-relative z-index-10">
                <div class="row justify-content-center">
                    <div class="col text-white text-decoration-none py-2">
                        <?php echo $header['content'];?>
                        <?php if ($buttons):?>
                            <div class="<?php echo esc_attr($align['alignment'])?>">
                                <?php foreach ($buttons as $button):?>
                                    <a href="<?php echo $button['link']['url']; ?>"
                                       class="btn <?php echo esc_attr($button['style']);?>">
                                        <?php echo $button['link']['title']; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</header>