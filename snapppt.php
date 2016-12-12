<?php

if(!defined( 'ABSPATH' )) exit; // Exit if accessed directly

/*
  Plugin Name: Instagram Shop by Snapppt
  Plugin URI: http://help.snapppt.com/woocommerce-and-wordpress/instagram-shop-plugin-for-wordpress-and-woocommerce-by-snapppt
  Description: Instagram Shop plugin by Snapppt is a free WP plugin that lets your customers shop your Instagram feed.
  Author: Snapppt
  Version: 1.0.0
  Author URI: http://getsnapppt.com
  License: GPLv2
*/

/**
* Copyright (c) 2016 Snapppt (email : admin@snapppt.com)
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License, version 2 or, at
* your discretion, any later version, as published by the Free
* Software Foundation.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('SNAPPPT_URL', 'https://snapppt.com');
define('SNAPPPT_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('SNAPPPT_PLUGIN_URL', plugin_dir_url(__FILE__));

$snapppt_options = get_option('snapppt');
function snapppt_options() { register_setting('snapppt_options', 'snapppt'); }
add_action('admin_init', 'snapppt_options');

function snapppt_plugin_uninstall() { delete_option('snapppt'); }
register_uninstall_hook(__FILE__, 'snapppt_plugin_uninstall');

if(is_admin()) {
  // handles the settings page, and the editor additions for Snapppt shortcode
  include SNAPPPT_PLUGIN_PATH . 'snapppt-backend.php';
}

if(!is_admin()) {
  // Shortcode used in the Public pages to render the Snapppt embed snippet
  include SNAPPPT_PLUGIN_PATH . 'snapppt-frontend.php';
}
?>
