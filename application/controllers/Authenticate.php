<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends CI_Controller {

  function __construct() {
    parent::__construct();

    // Load the URL helper.
    $this->load->helper('url');

    // Load the session helper.
    $this->load->library('session');

    if ($this->session->userdata('name')) {
      // Define the list of method that can't be acceded when logged in and need
      // to be redirected to the authenticated user home page (server list).
      $allowed = [
        'index',
      ];

      if (in_array($this->router->fetch_method(), $allowed)) {
        redirect('servers/list');
      }
    }
  }

  /**
   * Log in form page of the application (also the anonymous home page).
   *
   * Maps to the following URL
   *    http://example.com/authenticate/login
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   */
  public function index() {
    // Load the URL helper.
    $this->load->helper('url');

    // Prepare template data.
    $data['form_action'] = site_url('authenticate/process');

    // Display the log in form to the anonymous user.
    $this->load->view('login_form', $data);
  }

  /**
   * Authentication logic page of the application.
   *
   * Maps to the following URL
   *    http://example.com/authenticate/process
   */
  public function process() {
    $name = $this->input->post('login_username');
    $pass = $this->input->post('login_password');

    if ($name == 'juhi' && $pass == '123') {
      // Load the session helper.
      $this->load->library('session');

      // Load the URL helper.
      $this->load->helper('url');

      // Declare the session of the authenticated user.
      $this->session->set_userdata(['name' => $name]);

      // Redirect to the login form after log out.
      redirect('/servers/list');
    }
    else {
      // Load the URL helper.
      $this->load->helper('url');

      // Prepare template data.
      $data['form_action'] = site_url('authenticate/process');
      $data['error'] = 'The username or the password is invalid, please try again.';

      // Display the log in form to the anonymous user.
      $this->load->view('login_form', $data);
    }
  }

  /**
   * Log out page of the application.
   *
   * Maps to the following URL
   *    http://example.com/authenticate/logout
   */
  public function logout() {
    // Load the session helper.
    $this->load->library('session');

    // Load the URL helper.
    $this->load->helper('url');

    // Restroy the session of the authenticated user.
    $this->session->unset_userdata('name');

    // Redirect to the login form after log out.
    redirect('/');
  }
}
