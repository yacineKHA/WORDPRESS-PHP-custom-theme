</div>
    <?php wp_footer()?>
</body>
<footer class="site__footer">
	<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
    <aside class="site__sidebar">
        <ul>
			<?php dynamic_sidebar( 'footer-sidebar' ); ?>
        </ul>
    </aside>
</footer>
</html>