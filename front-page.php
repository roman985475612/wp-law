<?php get_header(); ?>

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
                    <p><a class="btn btn-primary btn-lg btn-learn" href="<?php the_permalink(); ?>">View More</a></p>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>

<?php
$query = new WP_Query([
    'post_type'         => 'counseling',
    'orderby'           => 'date',
    'order'             => 'ASC',
    'posts_per_page'    => 6,
]);
if( $query->have_posts() ): ?>
    <div id="fh5co-project">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Counseling</h2>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-md-4 col-sm-6 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
                        <a href="#">
                            <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] )?>
                            <h3><?=the_title()?></h3>
                            <span><?=$post->post_content?></span>
                        </a>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata() ?>
            </div>
        </div>
    </div>
<?php endif ?>

<?php
$query = new WP_Query([
    'post_type'         => 'testimonial',
    'orderby'           => 'date',
    'order'             => 'ASC',
    'posts_per_page'    => 6,
]);
if( $query->have_posts() ): ?>
    <div id="fh5co-testimonial" class="fh5co-bg-section">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
                    <h2>Testimonials</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row animate-box">
                        <div class="owl-carousel owl-carousel-fullwidth">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <div class="item">
                                    <div class="testimony-slide active text-center">
                                        <figure>
                                            <?php the_post_thumbnail( 'full' ) ?>
                                        </figure>
                                        <span><?=the_title()?>, via <a href="https://twitter.com/<?=get_post_meta($post->ID, 'twitter', true)?>" class="twitter">Twitter</a></span>
                                        <blockquote>
                                            <p>&ldquo;<?=$post->post_content?>&rdquo;</p>
                                        </blockquote>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>

<div id="fh5co-consult">
    <div class="choose animate-box">
        <div class="fh5co-heading">
            <h2>Contact Us</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto blanditiis corporis dicta eaque, earum iure nihil omnis quod sequi tempora vitae? Accusantium error laborum maiores nostrum obcaecati praesentium quasi qui vero. Aliquid architecto deserunt, distinctio dolores est eveniet fuga ipsa nisi numquam praesentium quas quos recusandae soluta totam vitae.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus ex praesentium rerum. Ab aliquid amet aspernatur commodi cumque delectus dolores ducimus ea, eius eveniet id, ipsam, laboriosam libero magni maxime nulla quaerat quia quidem recusandae rem repellendus sed sint soluta vero voluptatum. Commodi delectus iste perferendis praesentium soluta sunt unde!</p>
            </div>
        </div>
    </div>
    <div class="choose animate-box">
        <div class="fh5co-heading">
            <h2>Free Legal Consultation</h2>
        </div>
        <?= do_shortcode('[contact-form-7 id="96" title="Free Legal Consultation"]') ?>
    </div>
</div>


<?php get_footer(); ?>