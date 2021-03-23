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
