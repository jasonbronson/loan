<?php

/**
 * This is used to execute all items needed for functions
 *
 * @package    Main Class
 * @author     Jason Bronson <jasonbronson@gmail.com>
 */
class Main
{

    protected $loader;

    public function __construct()
    {
        $loader = new Loader();
        $this->init();
    }

    /**
     * Load all classes for rendering
     *
     * @return void
     */
    public function init()
    {
        $mainNav = new MainNav();
        $widgets = new Widgets();
        $shortCodes = new ShortCodes();

    }

}
