<?php
  /*
    Plugin Name: Snapppt - Instagram Shop
    Plugin URI: https://developer.wordpress.org/plugins/snapppt
    Description: Get Snapppt to let your customers shop your Instagram feed. We made it really, really simple for people to make shoppable, embeddable Instagram galleries, catalogues & lookbooks from their feed and put whatever they want in it. Fashion, design, art, extreme sports, kids, jewelry. Snapppt is a gazillion different shoppable Instagram catalogues, filled with literally whatever.
    Author: Snapppt
    Version: 0.1
    Author URI: http://getsnapppt.com
    License: GPLv2 or later
    License URI: https://www.gnu.org/licenses/gpl-2.0.html
  */

  define('SNAPPPT_PATH', plugin_dir_path(__FILE__));
  define('SNAPPPT_PLUGIN_URL', plugin_dir_url(__FILE__));
  $snapppt_options = get_option('snapppt');

  function snapppt_options() { register_setting('snapppt_options', 'snapppt'); }
  add_action('admin_init', 'snapppt_options');

  // ADMIN PAGES
  // handles the settings page, and the editor additions for Snapppt shortcode
  if(is_admin()) {

    function snapppt_embed_editor_button($context) {
      $ig_logo = 'http://localhost:8888/wordpress/wp-content/plugins/wd-instagram-feed/images/menu_icon.png';
      $context .= '<a class="button" href="#" onclick="window.parent.send_to_editor(\'[snapppt_embed]\')"; return false"><span class="wp-media-buttons-icon wdi_media_button_icon" style="vertical-align: text-bottom; background: url(' . $ig_logo . ') no-repeat scroll left top rgba(0, 0, 0, 0);background-size:contain;"></span>Add Snapppt Embed</a>';
      return $context;
    }
    add_filter('media_buttons_context', 'snapppt_embed_editor_button');


    function snapppt_settings_menu() {
      // developer.wordpress.org/reference/functions/add_submenu_page/
      add_options_page('Snapppt', 'Snapppt', 'administrator', 'snapppt', 'snapppt_settings_content');
    }
    add_action('admin_menu', 'snapppt_settings_menu');


    function snapppt_settings_content() {
      global $snapppt_options;
      include SNAPPPT_PATH .'snapppt_settings_template.php';
    }

  }

  // PUBLIC PAGES
  // Shortcode used in the Public pages to render the Snapppt embed snippet
  if(!is_admin()) {
    function snapppt_shortcodes_init() {
      function snapppt_embed_func($atts) {
        global $snapppt_options;

        $embed_data = shortcode_atts(array(
          'kind' => 'grid',
          'account_id' => $snapppt_options['account_id']
        ), $atts);

        if($embed_data['account_id'] == '') {
          return "<p>[ Snapppt Embed - No account ID provided! ]</p>";
        } else {
          return "<script src='http://snapppt.dev/widgets/widget_loader/" . esc_html($embed_data['account_id']) . "/" .
            esc_html($embed_data['kind']) . ".js' class='snapppt-widget'></script>";
        }
      }
      add_shortcode('snapppt_embed', 'snapppt_embed_func');
    }
    add_action('init', 'snapppt_shortcodes_init');
  }

  function snapppt_plugin_uninstall() { delete_option('snapppt'); }
  register_uninstall_hook(__FILE__, 'snapppt_plugin_uninstall');

?>
