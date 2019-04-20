<form action='<?php echo esc_url($_SERVER["REQUEST_URI"]); ?>' method='post'>
  <?php if ( $this->error ) echo "$this->error_msg<br><br>"; ?>
    <label for='username' class='slf-label'>
      Username:
    </label>
    <input type='text' class='slf-form-control' id='username' name='username'>

    <label for='password' class='slf-label'>
      Password:
    </label>
    <input type='password' class='slf-form-control' id='password' name='password'>

    <button type='submit' class='slf-pull-right' id='login' name='login'>
      Login
    </button>
</form>
