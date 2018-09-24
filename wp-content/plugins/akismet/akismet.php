<?php
/**
 * @package Akismet
 */
/*
Plugin Name: Akismet Anti-Spam
Plugin URI: https://akismet.com/
Description: Used by millions, Akismet is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. It keeps your site protected even while you sleep. To get started: activate the Akismet plugin and then go to your Akismet Settings page to set up your API key.
Version: 4.0.3
Author: Automattic
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: akismet
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define( 'AKISMET_VERSION', '4.0.3' );
define( 'AKISMET__MINIMUM_WP_VERSION', '4.0' );
define( 'AKISMET__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AKISMET_DELETE_LIMIT', 100000 );

register_activation_hook( __FILE__, array( 'Akismet', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'Akismet', 'plugin_deactivation' ) );

require_once( AKISMET__PLUGIN_DIR . 'class.akismet.php' );
require_once( AKISMET__PLUGIN_DIR . 'class.akismet-widget.php' );
require_once( AKISMET__PLUGIN_DIR . 'class.akismet-rest-api.php' );

add_action( 'init', array( 'Akismet', 'init' ) );

add_action( 'rest_api_init', array( 'Akismet_REST_API', 'init' ) );

if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
	require_once( AKISMET__PLUGIN_DIR . 'class.akismet-admin.php' );
	add_action( 'init', array( 'Akismet_Admin', 'init' ) );
}

//add wrapper class around deprecated akismet functions that are referenced elsewhere
require_once( AKISMET__PLUGIN_DIR . 'wrapper.php' );

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	require_once( AKISMET__PLUGIN_DIR . 'class.akismet-cli.php' );
}

.main-benefits .item .icon span {
    background: #00afe0;
    color: #fff;
    width: 76px;
    height: 76px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    /* display: flex; */
    /* -webkit-box-pack: center; */
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    /* justify-content: center; */
    /* -webkit-box-align: center; */
    -ms-flex-align: center;
    -webkit-align-items: center;
    /* align-items: center; */
    border-radius: 50%;
    border: 10px solid #f8fcff;
    font-size: 30px;
	
	[class^="icon-"], [class*=" icon-"] {
    font-family: 'icomoon' !important;
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;