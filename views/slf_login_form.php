<form id='slf-login-form' method='post'>
  <p>
    <label for='slf-username' class='slf-label'>Username:</label>
    <input type='text' class='slf-form-control' id='slf-username' name='slf-username'>
  </p>

  <p>
    <label for='slf-password' class='slf-label'>Password:</label>
    <input type='password' class='slf-form-control' id='slf-password' name='slf-password'>
  </p>

  <?php if (get_option('slf_h_captcha')) { ?>
    <p><div class='h-captcha' data-sitekey='<?php echo get_option('slf_h_captcha_sitekey'); ?>'></div></p>
  <?php } ?>

  <?php if ($this->error_message) { ?>
    <p><?php echo $this->error_message; ?></p>
  <?php } ?>

  <p><input type='submit' value='Login' id='slf-login' name='slf-login'></p>
</form>
