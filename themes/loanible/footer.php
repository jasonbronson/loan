<?php

wp_footer();

// footer navigation here
if (has_nav_menu('footer')) {
    // https://developer.wordpress.org/reference/functions/wp_nav_menu/
//    wp_nav_menu(array('theme_location' => 'footer', 'container' => false, 'nav_menu_item_id' => false, 'nav_menu_css_class' => false, 'menu_class' => false));
}
?>

<div class="footer">
    <div class="menu">
        
        <div class="item">
            <h4>Products</h4>
            <ul>
                <li>Credit Cards</li>
                <li>Mortgage Loans</li>
                <li>Student Loans</li>
                <li>Personal Loans</li>
                <li>Private Financing</li>
            </ul>
        </div>

        <div class="item">
            <h4>Company</h4>
            <ul>
                <li>About Us</li>
                <li>Reviews</li>
                <li>Press</li>
                <li>Jobs</li>
                <li>Blog</li>
                <li>FAQ</li>
            </ul>
        </div>

        <div class="item">
            <h4>Legal</h4>
            <ul>
                <li>Terms of Use</li>
                <li>Privacy Policy</li>
                <li>Abuse Contact</li>
            </ul>
        </div>

        <div class="item">
            <h4>Questions</h4>
            <ul>
                <li>Contact Us</li>
                <li>Customer Support Phone</li>
                <li>Customer Support Email</li>
            </ul>
        </div>

    </div>
    <div class="copyright">Copyright <?php echo date("Y") ?> &copy; Loanible.com</div>
</div>


</div>
