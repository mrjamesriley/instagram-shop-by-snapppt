<?php

function snapppt_shortcodes_init() {
  function snapppt_embed_func($atts) {
    global $snapppt_options;
    $embed_endpoint = SNAPPPT_URL . '/widgets/widget_loader/';

    $embed_data = shortcode_atts(array(
      'embed_type' => 'grid',
      'account_id' => $snapppt_options['account_id']
    ), $atts);

    if($embed_data['account_id'] == '') {
      return "<p>[ Snapppt Embed - No account ID provided! ]</p>";
    } else {
      return "<script src='" . $embed_endpoint . esc_html($embed_data['account_id']) . "/" .
        esc_html($embed_data['embed_type']) . ".js' class='snapppt-widget'></script>";
    }
  }
  add_shortcode('snapppt_embed', 'snapppt_embed_func');
}
add_action('init', 'snapppt_shortcodes_init');

?>
