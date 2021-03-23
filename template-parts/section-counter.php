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
