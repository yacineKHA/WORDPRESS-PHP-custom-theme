<?php get_header(); ?>

<?php
// Boucle principale
	if( have_posts() ) : while( have_posts() ) : the_post();
		the_title(); // Titre de la page

		$my_query = new WP_Query( array( 'post_type' => 'post' ) );

		// Boucle personnalisée
		if( $my_query->have_posts() ) : while( $my_query->have_posts() ) :
			$my_query->the_post();

			the_title(); // Titre de chaque article
			the_content(); // Contenu de chaque article

		endwhile; endif;
		wp_reset_postdata(); // On réinitialise les données
		//N’oubliez donc jamais de terminer vos requêtes personnalisées
        //par wp_reset_postdata afin de retourner dans la boucle principale.

		the_content(); // Contenu de la page

	endwhile; endif;

//if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <!---->
    <!--	<h1>--><?php //the_title(); ?><!--</h1>-->
    <!---->
    <!--	--><?php //the_content(); ?>
    <!---->
<?php //endwhile; endif; ?>



<?php get_footer(); ?>