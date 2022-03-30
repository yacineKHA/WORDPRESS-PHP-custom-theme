<?php get_header(); ?>
    <h1>Le blog Capitaine WP</h1>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

    <article class="post">

	    <?php
		    if ( is_category() ) {
			    $title = "Catégorie : " . single_tag_title( '', false );
		    }
            elseif ( is_tag() ) {
			    $title = "Étiquette : " . single_tag_title( '', false );
		    }
            elseif ( is_search() ) {
			    $title = "Vous avez recherché : " . get_search_query();
		    }
		    else {
			    $title = 'Le Blog';
		    }
	    ?>
        <h1><?php echo $title; ?></h1>
        <h2><?php the_title(); ?></h2>

	    <?php if ( has_post_thumbnail() ): ?>
            <div class="post__thumbnail">
			    <?php the_post_thumbnail(); ?>
            </div>
	    <?php endif; ?>


        <p class="post__meta">
            Publié le <?php the_time( get_option( 'date_format' ) ); ?>
            par <?php the_author(); ?> • <?php comments_number(); ?>
        </p>

	    <?php the_excerpt();
		    //utilisé à la place de 'the_content()'afin de n’afficher qu’un extrait de l’article,
		    // et pas l’article en entier. Le but reste que la personne clique sur l’article de son choix
		    // pour l’afficher.
	    ?>
        <!--        Aparté: The Excerpt VS The Content-->
        <!--        En réalité c’est légèrement plus compliqué que ça ! Vous pourriez aussi conserver the_content() : -->
        <!--        dans le cas d’une page archive il s’arrête aussi dès qu’il voit le bloc « Lire la suite ». -->
        <!--        De plus il ajoutera un lien (lire la suite) mais qui est plus difficile à personnaliser en CSS.-->
        <!--        Par contre il ignore complètement le champ « Extrait » et affiche l’article en entier-->
        <!--        si le bloc « Lire la suite » n’est pas présent.-->
        <!--        En définitive je préconise l’utilisation de the_excerpt() en priorité sur les pages archive.-->

        <p>
            <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
        </p>
    </article>

<?php endwhile; endif; ?>
    <div>
        <aside class="site__sidebar">
            <ul>
			    <?php dynamic_sidebar( 'blog-sidebar' ); ?>
            </ul>
        </aside>
    </div>


<?php get_footer(); ?>