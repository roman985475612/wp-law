<?php
$query = new WP_Query([
    'post_type'         => 'about',
    'posts_per_page'    => 3,
]);
if( $query->have_posts() ): ?>
	<div id="fh5co-about">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Our Attorneys</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-md-4 col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co-staff">
                            <?php the_post_thumbnail() ?>
                            <h3><?php the_title() ?></h3>
                            <strong class="role"><?= get_post_meta($post->ID, 'position', true) ?></strong>
                            <?php the_content() ?>
                            <ul class="fh5co-social-icons">
                                <li><a href="<?= get_post_meta($post->ID, 'facebook', true) ?>"><i class="icon-facebook"></i></a></li>
                                <li><a href="<?= get_post_meta($post->ID, 'twitter', true) ?>"><i class="icon-twitter"></i></a></li>
                                <li><a href="<?= get_post_meta($post->ID, 'dribbble', true) ?>"><i class="icon-dribbble"></i></a></li>
                                <li><a href="<?= get_post_meta($post->ID, 'github', true) ?>"><i class="icon-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                <?php endwhile ?>
                <?php wp_reset_postdata() ?>
            </div>
		</div>
	</div>
<?php endif ?>
