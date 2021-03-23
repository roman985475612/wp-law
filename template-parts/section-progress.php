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
