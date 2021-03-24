<?php get_header(); ?>

<?php get_template_part( 'template-parts/section', 'hero' ) ?>

<div id="fh5co-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6 animate-box">
                
                <div class="fh5co-contact-info">
                    <h3>Contact Information</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> 198 West 21th Street, Suite 721 New York NY 10016</li>
                        <li><i class="fas fa-phone"></i> <a href="tel://1234567920">+ 1235 2355 98</a></li>
                        <li><i class="fas fa-envelope"></i> <a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
                        <li><i class="fas fa-globe-americas"></i> <a href="http://gettemplates.co">gettemplates.co</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-6 animate-box">
                <h3>Send A Message</h3>
                <?= do_shortcode('[contact-form-7 id="96" title="Free Legal Consultation"]') ?>
            </div>
        </div>
    </div>

</div>

<iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2246.422559441462!2d37.7022054159002!3d55.73378668054826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54acb0177276b%3A0xe901f7d08cc02033!2sNizhegorodskaya%20Ulitsa%2C%20Moskva!5e0!3m2!1sen!2sru!4v1616569386929!5m2!1sen!2sru" 
    style="border:0"
    height="500"
    width="100%"
    allowfullscreen="" 
    loading="lazy"
></iframe>

<?php get_footer(); ?>