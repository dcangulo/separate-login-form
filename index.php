<?php
/*
  Plugin Name: Separate Login Form
  Plugin URI: https://www.davidangulo.xyz/portfolio/separate-login-form/
  Description: Use the shortcode [separate_login_form] to show a WordPress login form on any page, post, or even custom post types.
  Version: 2.0.0
  Author: David Angulo
  Author URI: https://www.davidangulo.xyz/
  Requires at least: 4.8.5
  Tested Up to: 5.1.1
  License: GPL2
*/

/*
  Copyright 2019 David Angulo (email: hello@davidangulo.xyz)

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
*/

require('separate_login_form.php');

$separate_login_form = new SeparateLoginForm;

?>
