<?php get_header()?>


<!--    --><?php //if (have_posts()): ?>
<!--        <ul>-->
<!--        --><?php //while(have_posts()): the_post(); ?>
<!---->
<!--            <li> --><?php //the_title() ?><!-- </li>-->
<!--        --><?php //endwhile ?>
<!--        </ul>-->
<!--    --><?php //else: ?>
<!--        <h1>Pas d'articles</h1>-->
<!--    --><?php //endif; ?>

    <aside class="site__sidebar">
        <ul>
			<?php dynamic_sidebar( 'footer-sidebar' ); ?>
        </ul>
    </aside>

<?php get_footer()?>