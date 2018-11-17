<?php


class Options {

    function __construct(){
      $this->addOptions();
    }
 
    /**
     * Adds the options page for global settings.
     *
     * @return void
     */
    public function addOptions(){
      acf_add_options_page(array(
           'page_title' 	=> 'Global Settings',
           'menu_title'	=> 'Global Settings',
           'menu_slug' 	=> 'site-options',
           'capability'	=> 'manage_options',
           'redirect'		=> false,
       'icon_url' => 'dashicons-admin-settings'
       ));
 
       acf_add_options_sub_page(array(
           'page_title' 	=> 'Social Icons',
           'menu_title'	=> 'Social Icons',
           'parent_slug'	=> 'site-options',
       ));
    }
 
  }
 
 $options = new Options();
