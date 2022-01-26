<?php
/**
* Plugin Name: List all plugin
* Description: List details of all the plugins.
* Version: 1.0
* Author: Atulya Singh
**/

$wordpress_version = get_bloginfo('version');
// echo $wordpress_version;

function list_all_plugin_info()
{
  include_once('wp-admin/includes/plugin.php');
  $all_plugins = get_plugins();

  $active_plugins = get_option('active_plugins');

  foreach($all_plugins as $key => $value)
  {
    $is_active = (in_array($key, $active_plugins)) ? 'active' : 'inactive';
    $plugins[$key] = array(
      'name' => $value['Name'],
      'version' => $value['Version'],
      'active'  => $is_active,
    );
    // echo $value['Name'];
  }

  return $plugins;

}

function html_code()
{
  $all_plugins = list_all_plugin_info();
  foreach($all_plugins as $result) {
    echo '<ul>';
    echo '<strong> Name: </strong>' .$result['name'];
    echo '<li> <strong> Version: </strong>' .$result['version']. '</li>';
    echo '<li><strong> Status: </strong>' .$result['active']. '</li>';
    echo '</ul>';
  }

}

add_shortcode('list_all', 'html_code');
// list_all_plugin_info();
