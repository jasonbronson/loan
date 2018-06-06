<?php

wp_footer();

// footer navigation here
if (has_nav_menu('footer')) {
    // https://developer.wordpress.org/reference/functions/wp_nav_menu/
    wp_nav_menu(array('theme_location' => 'footer', 'container' => false, 'nav_menu_item_id' => false, 'nav_menu_css_class' => false, 'menu_class' => false));
}
?>

<footer>Copyright <?php echo date("Y") ?> &copy; Loanible.com</footer>
</div>
