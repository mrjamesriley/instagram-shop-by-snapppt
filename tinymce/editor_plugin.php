<?php
  require_once('mnm_config.php');
  $site_url = get_option('siteurl');
?>
<html>
<head>
  <title>Insert Snapppt Embed</title>
  <link rel="stylesheet" type="text/css" href="<?php echo $site_url ?>/wp-includes/js/tinymce/plugins/compat3x/css/dialog.css" />
  <link rel="stylesheet" href="<?php echo $site_url ?>/wp-includes/js/tinymce/plugins/compat3x/css/dialog.css?wp-mce-4401-20160726">
  <style>
    #mnmshortcode_tag { width: 200px }
    #mnmshortcode_panel { margin-bottom: 8px }
    #mnmshortcode_panel table { width: 100%; font-size: 12px; }
    .mnmshortcode_description { color: #666; font-size: 12px; }
    .mnmshortcode_att_name { text-transform: capitalize }
    #mnmshortcode_panel input, #mnmshortcode_panel select, #mnmshortcode_panel textarea { width: 100%; padding: 4px 4px; font-size: 12px; font-family: 'Open Sans', sans-serif; }
    #mnmshortcode_panel textarea { height: 120px }
  </style>
  <script language="javascript" type="text/javascript" src="<?php echo $site_url ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
  <script language="javascript" type="text/javascript" src="<?php echo $site_url ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
</head>

<body>

<script>
  function addSnappptShortcode() {
    var embedTypeSelected = document.getElementById('snapppt-embed-type-select').value
    window.parent.send_to_editor('[snapppt_embed embed_type="' + embedTypeSelected + '"]')
    tinyMCEPopup.close();
  }
</script>

<form name="mnm_tabs" action="#" id="mnmshortcode_form">

  <div id="mnmshortcode_panel" class="panel">
    <table border="0" cellpadding="4" cellspacing="0">
      <tr>
      <td>
        <label for="mnmshortcode_tag">Select Shortcode</label>
      </td>
      <td>
        <select id="snapppt-embed-type-select">
        <option value="grid">Grid</option>
        <option value="carousel">Carousel</option>
        </select>
      </td>
      </tr>
    </table>
  </div>

  <div class="mceActionPanel" >
    <div style="float: left">
      <input type="button" id="cancel" name="cancel" value="Cancel" onClick="tinyMCEPopup.close();" />
    </div>

    <div style="float: right">
      <input type="submit" id="insert" name="insert" value="Insert" onClick="addSnappptShortcode();" />
    </div>
  </div>

</form>

</body>
</html>
