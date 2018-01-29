<?php
/**
 * Plugin Name: WP-Mock-Test-Demo
 * Plugin URI:  https://www.php-developer.org
 * Description: Dummy plugin for demonstrating WP_Mock unit testing in a WordPress Plugin.
 * Version:     1.0
 * Author:      Emerson Maningo
 * Author URI:  https://www.php-developer.org
 */

define( 'WP_MOCK_DEMO_PLUGIN_PATH', dirname( __FILE__ ) );

//Require plugin class
require WP_MOCK_DEMO_PLUGIN_PATH . '/includes/class-wp-mock-demo-plugin.php';

//Instantiate class
$wp_mock_demo_plugin = new WP_Mock_Demo_Plugin();

//Initialize plugin hooks
$wp_mock_demo_plugin->init_hooks();