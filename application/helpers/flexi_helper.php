<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Some helper functions for the Flexi Auth library
 * 
 * @package Helpers
 *
 */

if(!function_exists('get_username')) {
  /**
   * Shortcut for $this->flexi_auth->get_user_identity()
   * 
   * NOTE: 
   * If primary identity is set to 'email' in Flexi Auth config,
   * this will return email instead of username.
   *
   * @param bool $lowercase Whether or not to make the username all lowercase
   * @return string The currently logged in user's username
   */
  function get_username($lowercase = false) {
    $ci =& get_instance();
    $username = $ci->flexi_auth_lite->get_user_identity();
    if($lowercase) {
      $username = strtolower($username);
    }
    return $username;
  }
}

if(!function_exists('is_logged_in')) {
  /**
   * Shortcut for $this->flexi_auth->is_logged_in()
   *
   * @return bool Whether or not the user is logged in
   */
  function is_logged_in() {
    $ci =& get_instance();
    return $ci->flexi_auth_lite->is_logged_in();
  }
}

if(!function_exists('is_admin')) {
  /**
   * Shortcut for $this->flexi_auth->is_admin()
   *
   * @return bool Whether or not the user is an admin
   */
  function is_admin() {
    $ci =& get_instance();
    return $ci->flexi_auth_lite->is_admin();
  }
}

/* End of file flexi_get_username_helper.php */
/* Location: ./application/helpers/flexi_get_username_helper.php */