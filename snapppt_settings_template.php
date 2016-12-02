<!-- template for the Admin Snapppt settings page -->
<style type="text/css">
  #wpwrap {
    background-color: #ff7737;
  }

  .wrap {
    text-align: center;
    padding-top: 40px;
  }

  .snapppt_large_line {
    color: #fff;
    font-size: 16px;
    margin-bottom: 5px;
  }

  .snapppt_small_line {
    color: white;
    margin-top: 0;
  }

  .wp-core-ui .button-primary {
    height: 50px;
    width: 200px;
    font-size: 21px;
    line-height: 48px;
  }

  .notice {
    border-radius: 3px;
    text-align: center;
  }

  .notice p {
    font-size: 20px;
  }

  #wpfooter {
    display: none;
  }

  .wp-core-ui .snapppt-button {
    -webkit-font-smoothing: antialiased;
    background: none;
    background-color: #1200ff;
    border-color: #1200ff;
    border-radius: 5px;
    border: 2px solid #1200ff;
    box-shadow: none;
    font-size: 10px;
    font-weight: bold;
    height: 40px;
    letter-spacing: 3px;
    line-height: 34px;
    text-shadow: none;
    text-transform: uppercase;
  }

  .wp-core-ui .snapppt-button:hover {
    border-color: #1200ff;
    background-color: rgba(0, 0, 0, 0);
    color: #1200ff;
   }

  .wp-core-ui .snapppt-button--white {
    background-color: white;
    border-color: white;
    color: #ff7737;
  }

  .wp-core-ui .snapppt-button--white:hover {
    border-color: white;
    color: white
  }

  .snapppt_input_field {
    background-color: white;
    border-radius: 5px;
    border: 1px solid #000;
    box-shadow: none;
    color: #444;
    font-size: 16px;
    height: 40px;
    margin-bottom: 20px;
    outline: none
    padding: 11px 15px;
    text-align: center;
  }

  .toplevel_page_snapppt_settings .wp-menu-image img {
    width: 20px;
    height: 20px;
  }

  .snapppt-settings-container {
    padding-top: 20px;
    font-family: "Futura W01", "Helvetica Neue", Helvetica, Arial, sans-serif;
  }

  .snapppt-settings-container a {
    color: #fff
  }

  .snapppt-settings-container ::-webkit-input-placeholder {
     color: rgba(0, 0, 0, 0.2);
  }
</style>

<div class="wrap snapppt-settings-container">

  <iframe style="margin-bottom: 20px" src="https://player.vimeo.com/video/193733383?color=0e00ca&title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

  <br />

  <a href="<?php echo SNAPPPT_URL ?>" target="_blank">
    <img src="<?php echo SNAPPPT_PLUGIN_URL . 'images/snapppt-logo-white.png' ?>" class="snapppt-logo">
  </a>

  <form method="POST" action="options.php">
    <?php settings_fields('snapppt_options'); ?>

    <?php if($snapppt_options['account_id']) { ?>

      <p class="snapppt_large_line">Your Snapppt Account ID</p>

    <?php } else { ?>

      <p class="snapppt_large_line">New to Snapppt?</p>
      <a target="_blank" href="<?php echo SNAPPPT_URL ?>/users/sign_up" class="button-primary snapppt-button snapppt-button--white" style="margin-bottom: 30px">Get Started</a>
      <p class="snapppt_large_line">Have a Snapppt account?</p>
      <p class="snapppt_small_line">Copy paste your Account ID here</p>

    <?php } ?>

    <input name="snapppt[account_id]" style="margin-bottom: 5px" placeholder="XXXXX-XXXX-XXXX-XXX-XXXXXXX" value="<?php echo esc_html($snapppt_options['account_id']); ?>" class="regular-text snapppt_input_field" />
    <br />
    <p style="margin-bottom: 20px" class="snapppt_small_line">You can find this in your Snapppt <a href="<?php echo SNAPPPT_URL ?>/account/edit" target="_blank">Account details</a> page</p>

    <br />
    <input type="submit" class="button-primary snapppt-button" value="Save">
  </form>
</div>
