<?php 

class MainNav extends Loader {

    public function __construct(){
        
        //register main nav
        add_action('init', array(&$this, 'registerNavMenu'));
        
    }

    public function registerNavMenu(){
       
		register_nav_menus(
			array(
              'primary' => __( 'Header Nav Menu' ),
              'footer' => __( 'Footer Nav Menu' )
			 )
		   );
	
    }

}