<?php if(!defined('BASEPATH')) exit( 'No direct script access allowed' );

/**
 * Alert Message Library
 * 
 * @package Libraries
 * @author Nathan Johnson
 */

class Alert {

  /**
   * CodeIgniter instance
   */
  private $ci;

  const FLASHDATA_NAME = 'alert_message';

  public function __construct() {
    $this->ci =& get_instance();
  }

  public function message($message, $type) {
    $alert = array('message' => $message, 'type' => $type);
    $this->ci->session->set_flashdata(self::FLASHDATA_NAME, $alert);
  }

  public function show_message() {
    $alertInfo = $this->ci->session->flashdata(self::FLASHDATA_NAME);
    $alert['exists'] = is_array($alertInfo) ? true : false;
    $alert['type'] = $alertInfo['type'];
    $alert['message'] = $alertInfo['message'];
    return $alert;
  }

}

/* End of file alerts.php */
/* Location: ./application/libraries/alerts.php */