<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Template library
 *
 * Use this to load a full page in a controller, rather than loading 
 * each view (header, footer, etc.) individually
 * 
 * @package Libraries
 * @author Nathan Johnson
 */

class Template {

    /**
     * Data to pass to the template
     * @var array
     */
    private $template_data = array();

    /**
     * Add an item to template_data
     * 
     * @param string $name 
     * @param string $value
     * @return void
     */
    private function set($name, $value) {
      $this->template_data[$name] = $value;
    }

    /**
     * Load a view into the main template
     * @param  string  $view      The view to load
     * @param  array   $view_data The data to pass to the view
     * @param  string  $template  The template to load the view into
     * @param  boolean $return    Whether or not to return the output as a HTML string
     * @return void|string
     */
    public function load($view = '', $view_data = array(), $template = 'templates/master', $return = FALSE) {

      $CI =& get_instance();

      $view_data['session'] = $CI->session;
      $view_data['loggedin'] = $CI->flexi_auth_lite->is_logged_in();
      $view_data['loggedin_via_password'] = $CI->flexi_auth_lite->is_logged_in_via_password();

      $view_data['view'] = $view;

      // Load alert box HTML
      $alert_box_data = array('alert' => $CI->alert->show_message());
      $alert_box = $CI->load->view('templates/alert_box', $alert_box_data, true);
      $this->set('alert', $alert_box);
      $view_data['alert'] = $alert_box;

      $title = (isset($view_data['title']) ? $view_data['title'].' - Time Tracker' : 'Time Tracker');
      $this->set('title', $title);

      $contents = $CI->load->view($view, $view_data, true);
      $this->set('contents', $contents);
      
      // If template param is null or false, make the output the content of the view
      if(!$template) {
        $output = $contents;
      }
      else {
        $output = $CI->load->view($template, $this->template_data, true);
      }

      if($return) return $output;
      else echo $output;
    }

}

/* End of file Template.php */
/* Location: ./application/libraries/template.php */