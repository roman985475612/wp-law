<div id="fh5co-blog" class="fh5co-bg-section">
	<div class="container">
		<div class="row">
			<?php $i = 1; while( have_posts() ) : the_post(); ?>
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

				<?php if ($i == 3) : $i = 0; ?>
					</div>
					<div class="row">    
				<?php endif ?>
			<?php $i++; endwhile ?>
			<?php wp_reset_postdata() ?>
		</div>
        <?php the_posts_pagination([
            'type'      => 'list',
            'prev_text' => '<i class="fas fa-chevron-left"></i>',
	        'next_text' => '<i class="fas fa-chevron-right"></i>',
        ]) ?>
	</div>
</div>
