
<!--Il est également possible de personnaliser le HTML du moteur de recherche si-->
<!--celui par défaut ne vous convient pas. Pour cela créez un fichier searchform.php à la racine de votre thème et-->
<!--ajoutez ce code de base que vous pourrez personnaliser selon votre envie :-->

<form action="<?php echo home_url( '/' ); ?>" method="get">
	<label for="search">Rechercher :</label>
	<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
<!--	<input type="image" alt="Search" src="--><?php //bloginfo( 'template_url' ); ?><!--/images/search.png" />-->
    <button type="submit">Rechercher</button>
</form>
