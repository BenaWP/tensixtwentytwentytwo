<?php
get_header();
?>

    <article id="page-not-found" <?php post_class( 'content px-3 py-5 p-md-5' ); ?>>

        <h1> <?php esc_html_e( 'Page non trouvé !', 'tensixtwentytwentytwo' ); ?></h1>

		<?php
		get_search_form();
		?>

    </article>

<?php
get_footer();
?>