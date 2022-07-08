<?php
get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "content px-3 py-5 p-md-5" ); ?>>
	<?php 
		if ( have_posts() ) : 
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
		endif;
	?>
</article>

<!-- Istagram Api -->
<section class="container">
 	<?php get_template_part( 'template-parts/content', 'instagram-feed' ); ?>
</section> 

<?php
get_footer();
?>