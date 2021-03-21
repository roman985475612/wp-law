<?php get_header(); ?>


<aside id="fh5co-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <?php
                $query = new WP_Query([
                    'category_name' => 'hero-slider',
                    'posts_per_page' => 3,
                ]);
            ?>
            <?php if( $query->have_posts() ): while ( $query->have_posts() ) : $query->the_post(); ?>
                <li style="background-image: url(<?= get_the_post_thumbnail_url() ?>);">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <h1><?= the_title() ?></h1>
                                    <?= the_content() ?>
                                    <p><a class="btn btn-primary btn-lg" href="<?= get_post_meta($post->ID, 'link')[0] ?>">Make An Appointment</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endwhile ?>
            <?php wp_reset_postdata() ?>
            <?php endif ?>
        </ul>
    </div>
</aside>

<?php
$query = new WP_Query([
    'post_type'         => 'counter',
    'posts_per_page'    => 4,
]);
if( $query->have_posts() ): ?>
    <div id="fh5co-counter" class="fh5co-counters fh5co-bg-section">
        <div class="container">
            <div class="row">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-md-3 text-center animate-box">
                        <span class="icon"><i class="<?= get_post_meta($post->ID, 'icon')[0] ?>"></i></span>
                        <span class="fh5co-counter js-counter" data-from="0" data-to="<?= get_post_meta($post->ID, 'counter')[0] ?>" data-speed="5000" data-refresh-interval="50"></span>
                        <span class="fh5co-counter-label"><?= the_title() ?></span>
                    </div>
                <?php endwhile ?>
                <?php wp_reset_postdata() ?>
            </div>
        </div>
    </div>
<?php endif ?>

<?php get_footer(); ?>