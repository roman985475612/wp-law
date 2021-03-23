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
