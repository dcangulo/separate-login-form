<style>
  label {
    font-weight: bold;
  }

  .form-control {
    width: 100%;
    margin-bottom: 20px;
  }

  .pull-right {
    float: right;
  }
</style>
<form action='<?php echo esc_url($_SERVER["REQUEST_URI"]); ?>' method='post'>
  <?php if ( $this->error ) echo "$this->error_msg<br><br>"; ?>
    <label for='username'>
      Username:
    </label>
    <input type='text' class='form-control' id='username' name='username'>

    <label for='password'>
      Password:
    </label>
    <input type='password' class='form-control' id='password' name='password'>

    <button type='submit' class='pull-right' id='login' name='login'>
      Login
    </button>
</form>
