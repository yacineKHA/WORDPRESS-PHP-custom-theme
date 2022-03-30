<?php
	/* Les hooks permettent donc de
	configurer / agir / modifier WordPress au bon moment.*/

	/* Notez que j’ai préfixé ma fonction avec le nom de mon thème : capitaine_.
	Prenez la bonne habitude de le faire à chaque fois. Pourquoi ?
	Si vous mettez des noms de fonctions trop génériques elles pourraient
	entrer en conflit avec des fonctions natives
	de WordPress ou déclarées par une extension car elles porteraient le même nom*/

	function capitaine_remove_menu_pages() {
		remove_menu_page( 'tools.php' );
		remove_menu_page( 'edit-comments.php' );
	}

	function capitaine_child_register_assets() {

		// Chargement de la feuille du style du theme parent
		wp_enqueue_style( 'capitaine-theme', get_template_directory_uri() . '/style.css' );

		// Chargement de la feuille de style complémentaire du thème enfant
		wp_enqueue_style( 'capitaine-child-theme', get_stylesheet_directory_uri() . '/style.css' );
	}

	add_action( 'wp_enqueue_scripts', 'capitaine_child_register_assets' );
	add_action( 'admin_menu', 'capitaine_remove_menu_pages' );

	function capitaine_thumbnails(){
//		Le premier paramètre est la taille en largeur que doit avoir l’image,
//		le second la hauteur maximale (passez ce paramètre à 0 pour ne pas limiter) et
//		le dernier paramètre, s’il est passé à true permet de découper
//		l’image pour se conformer à ces dimensions exactes.

		// Définir la taille des images mises en avant
		set_post_thumbnail_size( 2000, 400, true );

		// Définir d'autres tailles d'images
		add_image_size( 'products', 800, 600, false );
		add_image_size( 'square', 256, 256, false );
		add_image_size('tata', 150, 150, false);
	}

	add_action('after_setup_theme', 'capitaine_thumbnails');

	//création de menus
	register_nav_menus( array(
		'main' => 'Menu Principal',
		'footer' => 'Bas de page',
	) );

	//Création de sidebar
	//Il faut a minima indiquer son nom et son identifiant (id, name)
	//Le reste permet de modifier les balises html (de base est du li)
	//donc a mettre dans une balise UL
	register_sidebar( array(
		'id' => 'blog-sidebar',
		'name' => 'blog',
//		'before_widget'  => '<div class="site__sidebar__widget %2$s">',
//		'after_widget'  => '</div>',
//		'before_title' => '<p class="site__sidebar__widget__title">',
//		'after_title' => '</p>',
	) );

	register_sidebar( array(
		'id' => 'footer-sidebar',
		'name' => 'footer',
//		'before_widget'  => '<div class="site__sidebar__widget %2$s">',
//		'after_widget'  => '</div>',
//		'before_title' => '<p class="site__sidebar__widget__title">',
//		'after_title' => '</p>',
	) );


	/*-----------------------ancien cours youtube dessous--------------------------*/
	function yasstheme_supports(){
	    add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
	}

	function yasstheme_register_assets(){
	    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', [], null, true);
	    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', [], false, true);
	    wp_enqueue_style('bootstrap');
	    wp_enqueue_script('bootstrap');
	}

	function yasstheme_title($title){
	    return 'salut !'. $title;
	}

	function yasstheme_document_title_parts($title){
		return $title;
	}

	/*WordPress comprend deux types de Hooks appelés Actions et Filtres.
	Les actions vous permettent de faire quelque chose à certains points prédéfinis
	du temps d’exécution de WordPress, tandis que les filtres vous
	permettent de modifier toute donnée traitée par WordPress et de la return.*/
	//un filtre va permettre d'altérer une valeur (add_filter)

	add_action('after_setup_theme', 'yasstheme_supports');
	add_action('wp_enqueue_scripts', 'yasstheme_register_assets');
	add_filter('wp_title', 'yasstheme_title');
	add_filter('document_title_parts', 'yasstheme_document_title_parts');