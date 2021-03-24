<aside id="fh5co-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
        <li style="background-image: url(<?= get_the_post_thumbnail_url() ?>);">
            <div class="overlay-gradient"></div>
            <div class="container">
                <div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
                    <div class="slider-text-inner desc">
                        <h2 class="heading-section"><?php the_title() ?></h2>
                        <p class="fh5co-lead"><?= get_the_excerpt() ?></p>
                    </div>
                </div>
            </div>
        </li>
        </ul>
    </div>
</aside>
