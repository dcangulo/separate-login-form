<div class='wrap'>
  <h1>Separate Login Form Settings</h1>

  <form id='slf_settings' method='post' action='options.php'>
    <?php settings_fields('slf_plugin_settings'); ?>

    <table class='form-table'>
      <tr>
        <th><label for='slf_h_captcha_sitekey'>Sitekey</label></th>
        <td>
          <input name='slf_h_captcha_sitekey' type='text' id='slf_h_captcha_sitekey' value='<?php echo get_option('slf_h_captcha_sitekey'); ?>' class='regular-text'>
          <p class='description'>Your hCaptcha sitekey.</p>
        </td>
      </tr>

      <tr>
        <th><label for='slf_h_captcha_secret'>Secret</label></th>
        <td>
          <input name='slf_h_captcha_secret' type='text' id='slf_h_captcha_secret' value='<?php echo get_option('slf_h_captcha_secret'); ?>' class='regular-text'>
          <p class='description'>Your hCaptcha secret.</p>
        </td>
      </tr>

      <tr>
        <th><label for='slf_h_captcha'>Activate hCaptcha</label></th>
        <td>
          <label for='slf_h_captcha'>
            <?php $slf_h_captcha = get_option('slf_h_captcha') === 'slf_h_captcha' ? 'checked=""' : ''; ?>
            <input name='slf_h_captcha' type='checkbox' id='slf_h_captcha' value='slf_h_captcha' <?php echo $slf_h_captcha; ?>> Use hCaptcha
          </label>
          <p class='description'>This will show hCaptcha on the login form. Make sure the credentials above are correct.</p>
        </td>
      </tr>
    </table>

    <p>
      <strong>Don't know your sitekey and secret?</strong>
      <a href='https://dashboard.hcaptcha.com/settings' target='_blank'>https://dashboard.hcaptcha.com/settings</a>
    </p>

    <?php submit_button(); ?>
  </form>
</div>
