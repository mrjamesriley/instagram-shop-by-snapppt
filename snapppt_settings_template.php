<!-- template for the Admin Snapppt settings page -->
<style type="text/css">
  #wpwrap {
    background-color: #ff7737;
  }

  .wrap {
    text-align: center;
    padding-top: 40px;
  }

  .snapppt_account_header {
    color: #fff;
    font-size: 20px;
    margin-bottom: 5px;
  }

  .snapppt_input_field {
    border: 1px solid #000;
    border-radius: 2px;
    padding: 10px;
    text-align: center;
    margin-bottom: 20px;
    font-size: 20px;
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

  .snapppt-logo {
    width: 240px;
  }
</style>

<div class="wrap">
  <img src="https://snapppt.com/assets/snapppt-logo-white-cut-out-1-c9ebe49ab5c776d4b1802264adf3d3b8e2c99ebe6bd4675198e49ef0e7de27ad.svg" class="snapppt-logo">

  <form method="POST" action="options.php">
    <?php settings_fields('snapppt_options'); ?>

    <?php if($snapppt_options['account_id']) { ?>

    <p class="snapppt_account_header">Enter your Snapppt Account ID</p>

    <?php } else { ?>

    <p class="snapppt_account_header">New to Snapppt?</p>
    <a target="_blank" href="http://snapppt.dev/users/sign_up" class="button-primary" style="margin-bottom: 30px">Get Started</a>
    <p class="snapppt_account_header">Already on Snapppt?</p>

    <?php } ?>

    <input name="snapppt[account_id]" placeholder="your Snapppt account ID" value="<?php echo esc_html($snapppt_options['account_id']); ?>" class="regular-text snapppt_input_field" />

    <br />
    <input type="submit" class="button-primary" value="Save">
  </form>
</div>
