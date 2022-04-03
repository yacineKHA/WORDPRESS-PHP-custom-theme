<?php get_header(); ?>

<h1 class="site__heading"><?php post_type_archive_title(); ?></h1>

<main class="site__portfolio">
	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    	<div class="project">
        	<h2 class="project__title">
                <a href="<?php the_permalink(); ?>">
                	<?php the_title(); ?>
                </a>
            </h2>
         	<?php the_post_thumbnail(); ?>
    	</div>
    <?php endwhile; endif; ?>
</main>

<?php the_posts_pagination(); ?>
<?php get_footer(); ?>

<!--	Conditionnal Tags pour les Custom Post Types-->
<!--	is_post_type_archive()-->
<!--	Vous vous êtes peut-être dit qu’un is_archive('portfolio') fonctionnerait ? Eh bien non, pourquoi faire simple quand on peut faire compliqué ? En réalité vous devez utiliser le tag spécifique is_post_type_archive() :-->
<!---->
<!--	PHP-->
<!--	1-->
<?php //if( is_post_type_archive( 'portfolio' ) ) { … }
//	is_singular()
//Là ici, petit piège ! Pour tester si vous êtes dans la page single d’un Custom Post Type, il faut utiliser is_singular( 'portfolio' ) et non pas is_single().
//PHP
//1
//<?php if( is_singular( 'portfolio' ) ) { … }
//Conditionnal Tags pour les Taxonomies
//On peut également tester si on est dans une taxonomie en particulier, ou même si on a sélectionné un terme dans cette taxonomie.
//
//                                                                                                                      PHP
//1
//<?php
//2
//​
//3
//if( is_tax( 'type-projet' ) { … } // Si on est dans une page taxonomie
//4
//if( is_tax( 'type-projet', 'photo' ) { … } // Et que le terme est photo