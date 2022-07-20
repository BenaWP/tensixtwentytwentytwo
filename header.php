<!DOCTYPE html>
<html lang="en"> 
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Site Template">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="images/logo.png"> 

	<?php 
		wp_head();
	?>

</head> 

<body <?php body_class(); ?>>
    
    <header class="header text-center">	    
	    <a class="site-title pt-lg-4 mb-0" href="<?php echo esc_url( home_url( '/' ) ) ;?>" rel="home">
			<?php echo get_bloginfo( 'name' ); ?>
		</a>
        
	    <nav class="navbar navbar-expand-lg navbar-dark" >
           
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div id="navigation" class="collapse navbar-collapse flex-column" >

				<?php 
					if ( function_exists( 'the_custom_logo' ) ) :
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$logo = wp_get_attachment_image_src( $custom_logo_id );
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ) ;?>" rel="home">
							<img class="mb-3 mx-auto logo" src="<?php echo ( $logo[0] != null ) ? $logo[0] : esc_url( get_template_directory_uri() . '/assets/images/logo.png' ) ; ?>" alt="logo" >
						</a>
						<?php	
					endif;
				?>

				<?php
				 
					$args = array(
						'menu' => 'primary',
						'container' => '',
						'theme_location' => 'primary',
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'menu_class'=> 'navbar-nav flex-column text-sm-center text-md-left',
						'li_class' => 'nav-item',
						'link_class' => 'nav-link'
					);

					wp_nav_menu( $args );
				?>
				<hr class="header-hr">
                <div id="sidebar_search">
	                <?php get_search_form(); ?>
                </div>
				<?php
					dynamic_sidebar( 'social-links' );
				?>

			</div>
		</nav>
    </header>

	<div class="main-wrapper">
	<header class="page-title theme-bg-light text-center gradient py-5">
		<h1 class="heading">
			<?php 
				if ( is_search() ) :
					echo __( 'Resultat(s) de recherche', 'tensixtwentytwentytwo');
				elseif ( is_404() ) :
					echo __( '404', 'tensixtwentytwentytwo');
				else :
					the_title(); 
				endif;
			?>
		</h1>
	</header>