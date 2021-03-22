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
                        <span class="icon"><i class="<?= get_post_meta($post->ID, 'icon', true) ?>"></i></span>
                        <span class="fh5co-counter js-counter" data-from="0" data-to="<?= get_post_meta($post->ID, 'counter', true) ?>" data-speed="5000" data-refresh-interval="50"></span>
                        <span class="fh5co-counter-label"><?= the_title() ?></span>
                    </div>
                <?php endwhile ?>
                <?php wp_reset_postdata() ?>
            </div>
        </div>
    </div>
<?php endif ?>

<?php $page_id = get_page_by_path( 'home' )->ID ?>

<?php
$query = new WP_Query([
    'post_type'         => 'progress',
    'posts_per_page'    => 4,
]);
if( $query->have_posts() ): ?>
<div id="fh5co-content">
    <div class="video fh5co-video" style="background-image: url(<?= get_template_directory_uri() ?>/assets/images/video.jpg);">
        <a href="<?= get_post_meta( $page_id, 'video', true) ?>" class="popup-vimeo"><i class="icon-video2"></i></a>
        <div class="overlay"></div>
    </div>
    <div class="choose animate-box">
        <div class="fh5co-heading">
            <h2>Why Choose Us?</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts far from the countries Vokalia and Consonantia, there live the blind texts. </p>
        </div>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?= get_post_meta($post->ID, 'progress', true) ?>%">
                    <?= the_title() ?> <?= get_post_meta($post->ID, 'progress', true) ?>%
                </div>
            </div>
        <?php endwhile ?>
        <?php wp_reset_postdata() ?>
    </div>
</div>
<?php endif ?>

<?php
$query = new WP_Query([
    'post_type'         => 'practice',
    'orderby'           => 'date',
    'order'             => 'ASC',
    'posts_per_page'    => 6,
]);
if( $query->have_posts() ): ?>
<div id="fh5co-practice" class="fh5co-bg-section">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>Our Legal Practice Area</h2>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
        </div>
        <div class="row">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-md-4 text-center animate-box">
                    <div class="services">
                        <span class="icon">
                            <i class="<?= get_post_meta($post->ID, 'icon', true) ?>"></i>
                        </span>
                        <div class="desc">
                            <h3><a href="#"><?=the_title()?></a></h3>
                            <p><?=$post->post_content?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
            <?php wp_reset_postdata() ?>
            <div class="col-md-12 text-center animate-box">
                <p><a class="btn btn-primary btn-lg btn-learn" href="/<?=get_page_by_path( 'practice-areas' )->post_name?>">View More</a></p>
            </div>
        </div>
    </div>
</div>
<?php endif ?>




<?php get_footer(); ?>