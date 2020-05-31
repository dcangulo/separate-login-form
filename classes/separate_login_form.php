<?php
class SeparateLoginForm {
  private $error_message = '';



  public function __construct() {
    add_action('template_redirect', [$this, 'slf_check_session']);
    add_shortcode(SLF_LOGIN_FORM_SHORTCODE, [$this, 'slf_login_form']);
    add_action('init', [$this, 'slf_login_form_process']);
    add_action('wp_enqueue_scripts', [$this, 'slf_login_form_styles']);
    add_action('wp_enqueue_scripts', [$this, 'slf_login_form_scripts']);
  }

  public function slf_check_session() {
    global $post;

    $has_shortcode =
      has_shortcode($post->post_content, SLF_LOGIN_FORM_SHORTCODE);

    if (!$has_shortcode || !is_user_logged_in()) return;

    wp_redirect(admin_url());
    exit();
  }

  public function slf_login_form() {
    ob_start();

    include(SLF_ROOT_PATH . 'views/slf_login_form.php');

    return ob_get_clean();
  }

  public function slf_login_form_process() {
    if (!isset($_POST['slf-login'])) return;

    $h_captcha_handler = new SlfHCaptchaHandler($_POST['h-captcha-response']);

    if (!$h_captcha_handler->is_verified()) {
      $this->error_message = $h_captcha_handler->get_error_message();

      return;
    }

    $username = esc_sql($_POST['slf-username']);
    $password = esc_sql($_POST['slf-password']);
    $remember = false;
    $user_data = [
      'user_login' => $username,
      'user_password' => $password,
      'remember' => $remember
    ];

    $user = wp_signon($user_data);

    if (is_wp_error($user)) {
      $this->error_message = $user->get_error_message();

      return;
    }

    wp_redirect(admin_url());
    exit();
  }

  public function slf_login_form_styles() {
    $slfLoginFormStyles = SLF_ROOT_URL . 'scripts/slf-login-form-styles.css';

    wp_register_style('slf-login-form-styles', $slfLoginFormStyles);
    wp_enqueue_style('slf-login-form-styles');
  }

  public function slf_login_form_scripts() {
    wp_register_script('slf-form-captcha', 'https://hcaptcha.com/1/api.js');
    wp_enqueue_script('slf-form-captcha');
  }
}
