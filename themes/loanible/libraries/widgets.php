<?php

class Widgets
{

    public function __construct()
    {

        //register all widgets
        add_action('widgets_init', array(&$this, 'registerHeaderWidget'));
        add_action('widgets_init', array(&$this, 'registerFooterWidget'));
        // add_action('widgets_init', array(&$this, 'registerFooterRibbonWidget'));
        // add_action('widgets_init', array(&$this, 'registerFooterAdWidget'));
        // add_action('widgets_init', array(&$this, 'registerAdWidget'));
        // add_action('widgets_init', array(&$this, 'registerAdHomeWidget'));

    }

    public function registerAdWidget()
    {
        register_sidebar(array(
            'name' => 'Ad',
            'id' => 'a-d',
            'before_widget' => false,
            'after_widget' => false,
            'before_title' => false,
            'after_title' => false,
        ));
    }

    public function registerAdHomeWidget()
    {
        register_sidebar(array(
            'name' => 'Ad Homepage only',
            'id' => 'a-d-home',
            'before_widget' => false,
            'after_widget' => false,
            'before_title' => false,
            'after_title' => false,
        ));
    }

    public function registerFooterRibbonWidget()
    {

        register_sidebar(array(
            'name' => 'Footer Ribbon',
            'id' => 'footer-ribbon',
            'before_widget' => false,
            'after_widget' => false,
            'before_title' => false,
            'after_title' => false,
        ));

    }
    public function registerHeaderWidget()
    {

        register_sidebar(array(
            'name' => 'Header',
            'id' => 'header',
            'before_widget' => false,
            'after_widget' => false,
            'before_title' => false,
            'after_title' => false,
        ));

    }
    public function registerFooterWidget()
    {

        register_sidebar(array(
            'name' => 'Footer',
            'id' => 'footer',
            'before_widget' => false,
            'after_widget' => false,
            'before_title' => false,
            'after_title' => false,
        ));

    }
    public function registerFooterAdWidget()
    {

        register_sidebar(array(
            'name' => 'Footer Ad Widget',
            'id' => 'footerad-widget',
            'before_widget' => false,
            'after_widget' => false,
            'before_title' => false,
            'after_title' => false,
        ));

    }
    public function registerModalsWidget()
    {

        register_sidebar(array(
            'name' => 'Modals Widget',
            'id' => 'modals-widget',
            'before_widget' => false,
            'after_widget' => false,
            'before_title' => false,
            'after_title' => false,
        ));

    }

}
