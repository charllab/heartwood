<?php
get_header();
?>

    <main>
        <section class="py-2">
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-blog-post'); ?>>
                <div class="container mb-1">
                    <div class="row justify-content-center">
                        <div class="col-sm-10">
                            <header class="blog-post-header">
                                <h1 class="blog-post-title"><?php the_title(); ?></h1>
                                <div class="blog-post-meta mb-1">
                                    <span class="h6 post-date"><?php the_date(); ?></span>
                                </div>
                            </header>
                            <div class="blog-post-content">
                                <?php the_content(); ?>
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </article>
            <div class="container">
                <div class="row justify-content-center blog-nav-single text-mustard">
                    <div class="col col-sm-5">
                        <span class="nav-previous text-decoration-none"><?php previous_post_link('%link', '<span class="meta-nav">' . _x('&larr;', 'Previous post link', '') . '</span> %title'); ?></span>
                    </div><!-- col -->
                    <div class="col col-sm-5 d-flex justify-content-end blog-nav-single-right">
                        <span class="nav-next text-decoration-none"><?php next_post_link('%link', '%title <span class="meta-nav">' . _x('&rarr;', 'Next post link', '') . '</span>'); ?></span>
                    </div><!-- col -->
                </div><!-- row -->
            </div>
        </section>
        <?php endwhile; endif; ?>
    </main>

<?php get_footer();