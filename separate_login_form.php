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

class SeparateLoginForm {

	private $wpdb;
	private $error;
	private $error_msg;



	public function __construct() {
		global $wpdb;

		$this->wpdb = $wpdb;
    $this->error_msg = '';

		add_action('init', array($this, 'separate_login'));
    add_action('wp_enqueue_scripts', array($this, 'separate_login_form_style'));
		add_shortcode('separate_login_form', array($this, 'separate_login_form_shortcode'));
	}

  public function separate_login_form_style() {
    wp_register_style('separate-login-form-style', plugin_dir_url(__FILE__) . 'style.css');
    wp_enqueue_style('separate-login-form-style');
  }

	public function separate_login() {
		if ( isset($_POST['login']) ) {
			$username = $this->wpdb->escape($_POST['username']);
			$password = $this->wpdb->escape($_POST['password']);
			$remember = false;

			$user_data = array(
        'user_login' => $username,
        'user_password' => $password,
        'remember' => $remember
      );

			$user = wp_signon($user_data);

			if ( is_wp_error($user) ) {
				$this->error_msg = $user->get_error_message() . '<br><br>';
  		}
  		else {
  			wp_redirect(admin_url());
			  exit;
  		}
		}
	}

	public function separate_login_form() {
		if ( is_user_logged_in() ) {
      echo "<meta http-equiv='refresh' content='0;URL=" . admin_url() . "'>";
		}
		else {
      include(plugin_dir_path(__FILE__) . 'form.php');
		}
	}

	public function separate_login_form_shortcode() {
		ob_start();

  	$this->separate_login_form();

    return ob_get_clean();
	}
}

$separate_login_form = new SeparateLoginForm;

?>
