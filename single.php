<?php get_header(); ?>
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

    <article class="post">
		<?php the_post_thumbnail(); ?>

        <h1><?php the_title(); ?></h1>
<!--        Les fonctions en the_ affichent directement la donnée dans le template ;-->
<!--        Les fonctions en get_ la récupèrent sans l’afficher, en vue d’un traitement (en php par ex).-->

        <div class="post__meta">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
<!--            Le premier paramètre attendu est l’identifiant de l’utilisateur dont on doit afficher l’avatar. -->
<!--            Dans notre cas, c’est l’auteur. On récupère son identifiant par -->
<!--            un autre template tag get_the_author_meta('ID').-->
<!--            Le second paramètre est la taille de l’image. En effet Gravatar peut la générer à la volée pour vous. -->
<!--            J’ai défini 40 pour une image carrée de 40px de côté.-->

            <p>
                Publié le <?php the_date(); ?>
                par <?php the_author(); ?>
                Dans la catégorie <?php the_category(); ?>
                Avec les étiquettes <?php the_tags(); ?>
            </p>
        </div>

        <div class="post__content">
			<?php the_content(); ?>
        </div>
    </article>

<?php endwhile; endif; ?>
<?php get_footer(); ?>