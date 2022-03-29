<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() //Rendre titre dynamique, afficher des scripts (et styles)?> 
</head>
<body <?php body_class() //body_class() nous permet d’obtenir des noms de classe CSS en fonction de la page visitée, ce qui pourra nous faciliter la création de nos styles ?>>
    <header>
        <a href="<?php echo home_url( '/' ); ?>">
            <?php //On utilise la fonction get_template_directory_uri() afin 
            //d’obtenir l’adresse absolue (c’est-à-dire complète) du logo.?>
            <img style="width: 200px" src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo">
        </a>
	    <?php get_search_form(); ?>

<!--        Le paramètre theme_location me permet de définir le slug de l’emplacement,-->
<!--        parmi ceux définis juste au-dessus dans le functions.php.-->
	    <?php wp_nav_menu( array( 'theme_location' => 'main',
	                              'container' => 'ul', // afin d'éviter d'avoir une div autour
	                              'menu_class' => 'site__header__menu', // ma classe personnalisée
                                ) ); ?>
    </header>
    <div class="container">

    