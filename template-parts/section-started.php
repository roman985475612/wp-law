<?php
$query = new WP_Query([
    'post_type'         => 'started',
    'posts_per_page'    => 1,
]);
if( $query->have_posts() ) : $query->the_post(); ?>
	<div id="fh5co-started" style="background-image:url(<?php the_post_thumbnail_url( 'full' ) ?>);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2><?php the_title() ?></h2>
                    <?php the_content() ?>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center">
					<p><a href="<?= get_post_meta($post->ID, 'link', true) ?>" class="btn btn-default btn-lg">Consultation</a></p>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>
<?php wp_reset_postdata() ?>