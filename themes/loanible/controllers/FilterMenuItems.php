<?php

function remove_menus(){
  
    //Remove add new item in menu
    remove_submenu_page( 'edit.php', 'post-new.php' );
    
  }

add_action( 'admin_menu', 'remove_menus', 999 );

