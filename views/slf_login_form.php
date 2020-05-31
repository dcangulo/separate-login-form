<form id='slf-login-form' method='post'>
  <p>
    <label for='slf-username' class='slf-label'>Username:</label>
    <input type='text' class='slf-form-control' id='slf-username' name='slf-username'>
  </p>

  <p>
    <label for='slf-password' class='slf-label'>Password:</label>
    <input type='password' class='slf-form-control' id='slf-password' name='slf-password'>
  </p>

  <p><div class='h-captcha' data-sitekey='96111882-7d47-4574-ab00-5ada7a8575fd'></div></p>

  <p><?php echo $this->error_message; ?></p>

  <p><input type='submit' value='Login' id='slf-login' name='slf-login'></p>
</form>
