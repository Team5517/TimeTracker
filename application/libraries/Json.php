<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * JSON output library
 */
class Json {

  private $ci;

  public function __construct() {
    parent::__construct();
    $this->ci =& get_instance();
  }

  public function output($data, $success) {
    $data['success'] = $success;
    $this->set_output($data);
  }

  public function success() {
    $data['success'] = true;
    $this->set_output($data);
  }

  public function error($message = '') {
    $data['success'] = false;
    $data['error_message'] = $message;
    $this->set_output($data);
  }

  private function set_output($data) {
    $json = json_encode($data);
    $this->ci->output
      ->set_content_type('application/json')
      ->set_output($json);
  }

}