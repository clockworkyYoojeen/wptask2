<?php 
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- Цикл WordPress -->
	<div class="container">
	<h4><?php the_title();  ?></h4>	
	</div>
<?php endwhile; else : ?>
	<div class="container">
	<p>Записей нет.</p>	
</div>
<?php endif; ?>
		

    <!-- ***** Newsletter Area Start ***** -->
    <section class="uza-newsletter-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!-- Newsletter Content -->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="nl-content mb-80">
                        <h2>Subscribe to our Newsletter</h2>
                        <p>Subscribe our newsletter gor get notification about new updates, etc...</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="nl-form mb-80">
                        <form action="#" method="post">
                            <input type="email" name="nl-email" value="" placeholder="Your Email">
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Border Bottom -->
            <div class="border-line"></div>
        </div>
    </section>
    <!-- ***** Newsletter Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
<?php get_footer(); ?>