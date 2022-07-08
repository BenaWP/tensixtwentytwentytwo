<?php
	get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "content px-3 py-5 p-md-5" ); ?> >
	<?php

		if (have_posts()) :

			while (have_posts()) :
				the_post();
				get_template_part( 'template-parts/content', 'blog-home' );
			endwhile;

			// pagination numérique
			?>
			<div class="container">
				<?php
					the_posts_pagination();
				?>
			</div>
			<?php
		else :
			?><h2><?php echo __( "Désolé, aucun résultats", "tensixtwentytwentytwo" ); ?></h2>
			<p data-toggle="collapse" data-target="#demo">Refaire la recherche</p>
			<div id="demo" class="collapse">
				<?php get_search_form(); ?>
			</div>
			<?php
		endif;

	?>
</article>

<?php
get_footer();
?>