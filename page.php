<?php
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- Цикл WordPress -->
	<div class="container">
	<h2><?php the_title();  ?> regular page template</h2>	
</div>
<?php endwhile; else : ?>
	<p>Записей нет.</p>
<?php endif; ?>

<?php get_footer(); ?>