<?php

/**
 * Plugin Name: test
 * Plugin URI: http://www.mywebsite.com/my-first-plugin
 * Description: The very first plugin that I have ever created.
 * Version: 1.0
 * Author: Mohammed Alama
 * Author URI: http://www.mywebsite.com
 */

// function to create the DB / Options / Defaults

function my_plugin_create_db() {

  global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'table_test';

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		firstname varchar(255) NOT NULL,
		lastname varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    message text NOT NULL,
		UNIQUE KEY id (id)
    ) $charset_collate;";
    
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

// function my_plugin_drop_db()
// {
//     global $wpdb;
//     $table_name = $wpdb->prefix . 'table_test';
//     $sql = "DROP TABLE  $table_name";
//     dbDelta( $sql );
// }
// run the install scripts upon plugin activation
register_activation_hook(__FILE__,'my_plugin_create_db');
//run the install scripts upon plugin deactiva
//register_deactivation_hook(__FILE__ ,'my_plugin_drop_db');

add_shortcode("form","form_creation");

// add_action('wp_ajax_insert_db','insert_db');
// add_action('wp_ajax_nopriv_insert_db', 'insert_db');

function form_creation(){
    ?>

    
        <form id="form" action="<?php echo plugins_url('test/insert_db.php') ?>" method="POST">
          First name: <input type="text" name="firstname"><br>
          Last name: <input type="text" name="lastname" id="lastname"><br>
          Email: <input type="email" name="email" id="email"><br>
          Message: <textarea name="message" id="message"></textarea>
          <input type="submit" id="submit" value="Submit" name="submit" >
        </form> 
    <?php 
}


//Include jQuery library  //It Didn't WORK :(
// add_action('wp_enqueue_scripts','load_js');

// function load_js() {
//     wp_register_script('file',plugins_url('/js/file.js',__FILE__), array('jquery') );
//     wp_enqueue_script('file');
//     wp_localize_script('file','MyAjax',array( 'ajaxurl' => plugins_url('test/insert_db.php')));
// }
?>