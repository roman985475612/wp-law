<?php
$query = new WP_Query([
    'post_type'         => 'slides',
    'posts_per_page'    => 3,
]);
if( $query->have_posts() ): ?>
    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li style="background-image: url(<?= get_the_post_thumbnail_url() ?>);">
                        <div class="overlay-gradient"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                                    <div class="slider-text-inner">
                                        <h1><?= the_title() ?></h1>
                                        <h2><?= $post->post_content ?></h2>
                                        <p><a class="btn btn-primary btn-lg" href="<?= get_post_meta($post->ID, 'link', true) ?>">Make An Appointment</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endwhile ?>
                <?php wp_reset_postdata() ?>
            </ul>
        </div>
    </aside>
<?php endif ?>
