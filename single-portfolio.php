<?php get_header(); ?>

<div class="container">
	<h2>Portfolio post type page</h2>
	<?php if(have_posts()){
	while(have_posts()){
	the_post();
	the_post_thumbnail();
	}
} ?>
</div>

<?php get_footer(); ?>