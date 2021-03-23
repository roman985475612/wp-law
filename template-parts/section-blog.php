<?php
$query = new WP_Query([
    'tag'               => 'blog',
    'posts_per_page'    => 3,
]);
if( $query->have_posts() ) : ?>
    <div id="fh5co-blog" class="fh5co-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Recent Post</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
                <?php while( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-lg-4 col-md-4">
                        <div class="fh5co-blog animate-box">
                            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'full', [ 'class' => 'img-responsive' ] ); ?></a>
                            <div class="blog-text">
                                <span class="posted_on"><?php the_date( 'M. jS' ); ?></span>
                                <span class="comment"><a href="<?php the_permalink() ?>"><?= get_comments_number() ?><i class="icon-speech-bubble"></i></a></span>
                                <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                <?php the_excerpt() ?>
                                <a href="<?php the_permalink() ?>" class="btn btn-primary">Read More</a>
                            </div> 
                        </div>
                    </div>
                <?php endwhile ?>
                <?php wp_reset_postdata() ?>
			</div>
		</div>
	</div>
<?php endif ?>
