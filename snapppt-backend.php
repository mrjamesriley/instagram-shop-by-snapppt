<?php

// add the 'Add Snapppt Embed' feed button to the editor
function snapppt_embed_editor_button($context) {
  $button_logo = SNAPPPT_PLUGIN_URL . 'images/snapppt-logo-square-small.png';
  $onclick_button = "tinyMCE.activeEditor.execCommand('openSnappptEmbedSelector')";
  $context .= '<a class="button" href="#" onclick="tinyMCE.activeEditor.execCommand(\'openSnappptEmbedSelector\')"; return false"><span class="wp-media-buttons-icon wdi_media_button_icon" style="vertical-align: text-bottom; background: url(' . $button_logo . ') no-repeat scroll left top rgba(0, 0, 0, 0);background-size:contain;"></span> Add Snapppt Embed</a>';
  return $context;
}
add_filter('media_buttons_context', 'snapppt_embed_editor_button');


function snapppt_settings_content() {
  global $snapppt_options;
  include SNAPPPT_PLUGIN_PATH .'snapppt_settings_template.php';
}

function register_snapppt_tinymce_plugin() {
  function tinymce_snapppt_plugin($plugins) {
    $plugins['snappptEmbedSelector'] = plugins_url('tinymce/', __FILE__) . 'editor_plugin.js';
    return $plugins;
  }
  add_filter('mce_external_plugins', 'tinymce_snapppt_plugin');
}
add_filter('admin_init', 'register_snapppt_tinymce_plugin');

function snapppt_settings_menu() {
 $menu_icon = SNAPPPT_PLUGIN_URL .'/images/snapppt-logo-square.png';

 // developer.wordpress.org/reference/functions/add_menu_page/
 add_menu_page('Snapppt', 'Snapppt', 'manage_options', 'snapppt_settings','snapppt_settings_content', $menu_icon);
}
add_action('admin_menu', 'snapppt_settings_menu');


function style_snapppt_menu() {
  echo '<style>
    .toplevel_page_snapppt_settings .wp-menu-image img {
      width: 20px;
      height: 20px;
    }
  </style>';
}
add_action('admin_head', 'style_snapppt_menu')

?>
