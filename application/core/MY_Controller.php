<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  public function __construct() {
    parent::__construct();

    // If the request is ajax load the json library
    if($this->input->is_ajax_request()) {
      $this->load->library('json');
    }

    $this->auth = new stdClass;
    $this->load->library('flexi_auth_lite');
    
  }

  /**
   * Makes sure user is logged in, redirects if not
   */
  public function login_required() {
    $msg = lang('please_login');
    if(!$this->flexi_auth_lite->is_logged_in()) {
      // If request is ajax, output json
      if($this->input->is_ajax_request()) {
        $this->json->error($msg);
      }
      // Else redirect
      else {
        $this->alert->message($msg, 'error');
        redirect('/login?return='.urlencode(current_url()));
      }
    }
  }

}