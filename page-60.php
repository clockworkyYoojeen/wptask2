<?php get_header(); ?>
    <!-- ****** Gallery Area Start ****** -->
    <section class="uza-portfolio-area section-padding-80">
        <!-- Portfolio Menu -->
        <div class="portfolio-menu text-center mb-80">
            <button class="btn active" data-filter="*">All Portfolio</button>
            <button class="btn" data-filter=".ux-ui">UX/UI Design</button>
            <button class="btn" data-filter=".market-analytics">Market Analytics</button>
            <button class="btn" data-filter=".marketing-social">Marketing Social</button>
        </div>
		
        <div class="container-fluid">
            <div class="row uza-portfolio">
	<?php 
		$portfolios = new WP_Query(array('post_type'=>'portfolio'));
		//print_r($portfolios);
		if($portfolios->have_posts()){
			while($portfolios->have_posts()){
				$portfolios->the_post();
				$taxonomies = wp_get_object_terms( $post->ID, array('design','market_analytics','marketing_social') );
				//print_r($taxonomies);
				$taxname = $taxonomies[0]->slug; 
				?>
                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item <?php echo $taxname; ?>">
                    <div class="single-portfolio-slide">
                        <?php the_post_thumbnail(); ?>
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4><?php the_title(); ?></h4>
                            <p><?php the_content(); ?></p>
                        </div>
                        <!-- View More -->
                        <div class="view-more-btn">
                            <a href="<?php echo the_permalink(); ?>"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>				
		<?php } 
		}
		?>

            </div>

            <div class="row">
                <div class="col-12 text-center mt-30">
                    <a href="#" class="btn uza-btn btn-3">Load More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Gallery Area End ****** -->

<?php get_footer(); ?>
