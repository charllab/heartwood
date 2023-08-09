<?php
$body = get_field('body');
$layouts = $body['layout'];
//echo '<pre>';
//var_dump($body);
//echo '</pre>';
if ($layouts) : ?>
    <?php $counter = 0;
    foreach ($layouts as $layout) : ?>
        <?php if ($layout['acf_fc_layout'] == 'wide'): ?>
            <?php
            //acf fields data
            $content_area = $layout['content_area'];
            $images = $content_area['image_group'];
            $align = $content_area['buttons_set'];
            $buttons = $content_area['buttons_set']['buttons'];
            ?>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <?php
                            $pre_content = $content_area['pre_content'];
                            if ($pre_content):
                                echo '<section>';
                                echo $pre_content;
                                echo '<section>';
                            endif;
                            if ($images): ?>
                                <div class="owl-carousel owl-theme mb-50">
                                    <?php foreach ($images as $image) :
                                        $image = $image['image']; ?>
                                        <div class="item">
                                            <img src="<?php echo esc_attr($image['url']); ?>"
                                                 alt="<?php echo esc_attr($image['alt']); ?>"
                                                 class="img-fluid">
                                        </div><!-- item -->
                                    <?php endforeach; ?>
                                </div><!-- owl-carousel -->
                                <div class="owl-navigation">
                                    <div class="owl-nav mb-1">
                                        <div class="owl-dots">
                                        </div>
                                    </div>
                                </div><!-- owl-navigation -->
                            <?php endif;

                            $content = $content_area['content'];
                            if ($content):
                                echo $content;
                            endif;
                            if ($buttons): ?>
                                <div class="<?php echo esc_attr($align['alignment']) ?>">
                                    <?php foreach ($buttons as $button): ?>
                                        <a href="<?php echo $button['link']['url']; ?>"
                                           class="btn <?php echo esc_attr($button['style']); ?>">
                                            <?php echo $button['link']['title']; ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </section>
        <?php elseif ($layout['acf_fc_layout'] == 'column'): ?>
            <?php
            //acf fields data
            $content_area = $layout['content_area'];
            $align = $content_area['buttons_set'];
            $buttons = $content_area['buttons_set']['buttons'];
            $images = $layout['column_options']['image_group'];
            $image_order = $layout['column_options']['image_positions'];
            ?>
            <section class="column">
                <div class="container position-relative z-index-10">
                    <div
                        class="row <?php echo ($image_order == 'order-md-last') ? '' : 'justify-content-md-end'; ?> align-items-center">
                        <div class="col-md-6 pt-md-50 <?php echo esc_attr($image_order); ?>">
                            <?php
                            if ($images): ?>
                                <div class="owl-carousel owl-theme mb-50">
                                    <?php foreach ($images as $image) :
                                        $image = $image['image']; ?>
                                        <div class="item">
                                            <img src="<?php echo esc_attr($image['url']); ?>"
                                                 alt="<?php echo esc_attr($image['alt']); ?>"
                                                 class="img-fluid">
                                        </div><!-- item -->
                                    <?php endforeach; ?>
                                </div><!-- owl-carousel -->
                                <div class="owl-navigation">
                                    <div class="owl-nav mb-50">
                                        <div class="owl-dots">
                                        </div>
                                    </div>
                                </div><!-- owl-navigation -->
                            <?php endif;
                            ?>
                        </div>
                        <div class="col-md-6 z-index-100">
                            <div class="column-content d-flex flex-column justify-content-center align-content-center">
                                <div class="content bg-white py-1 px-75 px-md-150">
                                    <?php echo $content_area['content']; ?>
                                    <?php if ($buttons): ?>
                                        <div class="<?php echo esc_attr($align['alignment']) ?>">
                                            <?php foreach ($buttons as $button): ?>
                                                <a href="<?php echo $button['link']['url']; ?>"
                                                   class="btn <?php echo esc_attr($button['style']); ?>">
                                                    <?php echo $button['link']['title']; ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div><!-- content -->
                            </div><!-- column-content -->
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </section>
        <?php endif;
        $counter++;
    endforeach;
    wp_reset_postdata();
    ?>
<?php endif; ?>