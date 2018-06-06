<?php

class ShortCodes
{

    public function __construct()
    {

        //register all shortcodes
        //add_shortcode('footer', array(&$this, 'registerFooterShortCode'));
        //add_shortcode('header', array(&$this, 'registerHeaderShortCode'));
        // add_shortcode( 'footerribbonshortcode', array(&$this, 'registerFooterRibbonShortCode') );
        // add_shortcode( 'modalshortcode', array(&$this, 'registerModalShortCode') );

    }
    public function registerFooterShortCode()
    {
        require_once THEME_PATH . '/layout/footer.php';
    }
    public function registerFooterRibbonShortCode()
    {
        require_once THEME_PATH . '/layout/footer-ribbon.php';
    }
    public function registerModalShortCode()
    {
        require_once THEME_PATH . '/layout/modals.php';
    }
    public function registerHeaderShortCode()
    {
        require_once THEME_PATH . '/layout/header.php';
    }

}
