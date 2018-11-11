<?php


class Options {

    function __construct(){
      $this->addOptions();
      add_shortcode('sumo-contact-form', array($this, 'sumoContactForm'));
      add_action('wp_head', array($this, 'dfpHeader'), 99);
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
 
    /**
     * Returns the sumo form code for the sumo contact form shortcode.
     *
     * @return string
     */
    public function sumoContactForm(){
      return get_field('contact_form_sumo_code', 'option');
    }
 
    /**
     * Adds the DFP ad code to the header.
     *
     * @return string
     */
    public function dfpHeader(){
      $code = get_field('google_dfp_header_code', 'option');
      echo (!empty($code)) ? $code : '';
    }
 
    /**
     * Adds the DFP ad code to the ad block.
     *
     * @return string
     */
    public static function dfpAd(){
      $code = get_field('google_dfp_ad_code', 'option');
      return (!empty($code)) ? $code : '';
    }
 
  }
 
 $options = new Options();
