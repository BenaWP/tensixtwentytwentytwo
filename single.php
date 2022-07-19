<?php
get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "content px-3 py-5 p-md-5" ); ?> >
	<?php 
		if ( have_posts() ) : 
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content-blog-post' );
			endwhile;
		endif;
	?>
</article>

<?php
get_footer();
?>