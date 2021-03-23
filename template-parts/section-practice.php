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
