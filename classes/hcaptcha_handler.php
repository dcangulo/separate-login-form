<?php
class HCaptchaHandler {
  private $verify_url = 'https://hcaptcha.com/siteverify';
  private $error_message = '';
  private $token;



  public function __construct($token) {
    $this->token = $token;
  }

  public function is_verified() {
    $context = stream_context_create($this->http_request());
    $response = file_get_contents($this->verify_url, false, $context);
    $json_response = json_decode($response, true);

    if($json_response['success']) return true;

    $error_code = $json_response['error-codes'][0];
    $this->error_message = $this->error_code_to_message($error_code);

    return false;
  }

  public function get_error_message() {
    return $this->error_message;
  }



  private function params() {
    return [
      'response' => $this->token,
      'secret' => '0xb9F553E3c189f8E2EC655Df8a78a05551F557Fad'
    ];
  }

  private function http_request() {
    return [
      'http' => [
        'method' => 'POST',
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'content' => http_build_query($this->params()),
        'ssl' => ['verify_peer' => true],
        'ignore_errors' => true
      ]
    ];
  }

  private function error_code_to_message($error_code) {
    switch ($error_code) {
      case 'missing-input-secret':
        return 'Your secret key is missing.';

      case 'invalid-input-secret':
        return 'Your secret key is invalid or malformed.';

      case 'missing-input-response':
        return 'The response parameter (verification token) is missing.';

      case 'invalid-input-response':
        $message = 'The response parameter (verification token) is invalid ';
        $message .= 'or malformed.';

        return $message;

      case 'bad-request':
        return 'The request is invalid or malformed.';

      case 'invalid-or-already-seen-response':
        $message = 'The response parameter has already been checked, or has ';
        $message .= 'another issue.';

        return $message;

      case 'sitekey-secret-mismatch':
        return 'The sitekey is not registered with the provided secret.';

      default:
        return 'An unknown error has occured';
    }
  }
}
