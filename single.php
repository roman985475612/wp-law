<?php get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_post_thumbnail( 'full', [ 'class' => 'img-responsive' ] ) ?>
					
					<h1 class="single-header"><?= the_title() ?></h1>
					<?php if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<?php
							law_posted_on();
							law_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>

					<?php the_content() ?>

					<?php 
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;			
					?>
				<?php endwhile ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
