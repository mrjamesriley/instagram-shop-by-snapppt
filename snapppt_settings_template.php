<?php
  if(!defined( 'ABSPATH' )) exit; // Exit if accessed directly
?>

<div class="wrap snapppt-settings-container">

  <iframe style="margin-bottom: 20px" src="https://player.vimeo.com/video/193733383?color=0e00ca&title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

  <br />

  <a href="<?php echo SNAPPPT_URL ?>" target="_blank">
    <img src="<?php echo SNAPPPT_PLUGIN_URL . 'images/snapppt-logo-white.png' ?>" class="snapppt-logo">
  </a>

  <form method="POST" action="options.php">
    <?php settings_fields('snapppt_options'); ?>

    <?php if(snapppt_is_setup()) { ?>

      <p class="snapppt_large_line">Your Snapppt Account ID</p>

    <?php } else { ?>

      <p class="snapppt_large_line">New to Snapppt?</p>
      <a target="_blank" href="<?php echo SNAPPPT_URL ?>/users/sign_up" class="button-primary snapppt-button snapppt-button--white" style="margin-bottom: 30px">Get Started</a>
      <p class="snapppt_large_line">Have a Snapppt account?</p>
      <p class="snapppt_small_line">Copy paste your Account ID here</p>

    <?php } ?>

    <input name="snapppt[snapppt_notice_later]" type="hidden" value="<?php echo(strtotime("+1 day")); ?>">

    <input name="snapppt[account_id]" style="margin-bottom: 5px" placeholder="XXXXX-XXXX-XXXX-XXX-XXXXXXX"
      value="<?php echo snapppt_is_setup() ? esc_html($snapppt_options['account_id']) : ''; ?>" class="regular-text snapppt_input_field" />

    <br />
    <p style="margin-bottom: 20px" class="snapppt_small_line">You can find this in your Snapppt <a href="<?php echo SNAPPPT_URL ?>/account/edit" target="_blank">Account details</a> page</p>

    <br />
    <input type="submit" class="button-primary snapppt-button" value="Save">
  </form>
</div>
