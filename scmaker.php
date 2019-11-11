<?php
/**
 * Plugin Name: Short Code Maker
 * Plugin URI: https://www.wordpress.org/phillipsalazar
 * Description: Add important links to the admin page!
 * Version: 1.0
 * Author: Phillip Salazar
 * Author URI: https://www.phillipsalazar.com
 */

// globals for the plugin
global $scamker_db_version;
$scmaker_db_version = '1.0';
//global $wpdb;
// linker obj
class SCMaker
{
  // xss defense
  public function stringSafe($data)
  {
      $string = htmlspecialchars($data);
      return $string;
  }

  // add item to database
  public  function add_Item($name, $content)
  {

        global $wpdb;
	      $this->table_name = $wpdb->prefix . 'scmaker';

    	  $wpdb->insert(
    		$this->table_name,
    		array(
    			   'name' => $name,
    			   'content' => $content,
    		    ) );
  }

  // read from db reverse
  public function read_DB()
  {
      global $wpdb;

  	   $table_name = $wpdb->prefix . 'scmaker';
       $result = $wpdb->get_results('SELECT * FROM ' . $table_name . " ORDER BY id DESC");
       return $result;
  }

  // delete item
  public function delete_Item($id)
  {
      global $wpdb;
      $table_name = $wpdb->prefix . 'scmaker';
      $wpdb->delete( $table_name, array( 'id' => $id ) );
  }
  // update item
  public function update_Item($id, $name, $content)
  {
      global $wpdb;

      $table_name = $wpdb->prefix . 'scmaker';
  	  $wpdb->update($table_name, ['name' => $name, 'content' => $content], ['id' => $id] );

  }

}
  $scmaker = new SCMaker();

// adds the table
function scmaker_install()
{

      global $wpdb;
      global $scmaker_db_version;

      $table_name = $wpdb->prefix . 'scmaker';
      $charset_collate = $wpdb->get_charset_collate();

       $sql = "CREATE TABLE $table_name (
             id mediumint(9) NOT NULL AUTO_INCREMENT,
             name TINYTEXT NOT NULL,
             content  TEXT NOT NULL,
             type VARCHAR(50) NOT NULL,
             attributes TEXT,
             PRIMARY KEY  (id)
             ) $charset_collate;";

       require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
       dbDelta( $sql );

       add_option( 'scmaker_db_version', $scmaker_db_version );
}

function scmaker_uninstall()
{
  if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit();
   global $wpdb;
   $wpdb->query( "DROP TABLE IF EXISTS wp_scmaker" );
   delete_option("scamker_db_version");
}

function addingAction()
{
  add_menu_page('scmaker', 'Shortcode Maker', 'manage_options', 'shortcode-maker', 'start_init');
  add_submenu_page( 'shortcode-maker', 'Add Shortcode', 'Add Shortcode', 'manage_options', 'shortcode-maker-add', 'start_init');
  add_submenu_page( 'shortcode-maker', 'Change Shortcode', 'Change Shortcode','manage_options', 'shortcode-maker-change', 'start_init');
  add_action('admin_submenu', 'scmaker_submenu');
}


function scmaker_style()
{
      wp_register_style('scmaker_style', plugins_url('/assets/style.css',__FILE__ ));
      wp_enqueue_style('scmaker_style');
}

function start_init()
{
      $scmaker = new SCMaker();
      $url = $_SERVER['REQUEST_URI'];
      $parsed = parse_url($url);
      $query = $parsed['query'];

      parse_str($query, $params);

      unset($params['page_number']);
      $string = http_build_query($params);
      $stuff = explode( '=', $string);

      // add a switch
      if ($stuff[1] == 'shortcode-maker')
      {
            include 'panel.php';
      }
      else if ($stuff[1] == 'shortcode-maker-add')
      {
          include 'scmaker_add.php';
      }
      else if ($stuff[1] == 'shortcode-maker-change')
      {
              include 'scmaker_change.php';
      }


}


// have atributes
function scmaker_create($atts, $content = null)
{
  global $wpdb;
  $a = shortcode_atts( array(
		'type' => 'text',
	), $atts );


  $row = $wpdb->get_row( "SELECT * FROM wp_scmaker WHERE name='$content' LIMIT 1" );
  return  $row->content . ' type is ' . $a['type'] ;

}

register_activation_hook( __FILE__, 'scmaker_install' );
//register_deactivation_hook(__FILE__, 'scmaker_uninstall');
register_uninstall_hook(__FILE__, 'scamker_uninstall');

add_shortcode('addcode', 'scmaker_create');

add_action('admin_menu', 'addingAction');
add_action('admin_init', 'scmaker_style');
