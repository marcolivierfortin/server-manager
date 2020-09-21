<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller class for the authentication process of the user on the site;
 * (log in, log out).
 */
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

    // Load the flash data value of the key "status" to display it as a message.
    $data['status'] = $this->session->flashdata('status');

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
    // Get the username input value from the log in form.
    $name = $this->input->post('login_username');

    // Get the password input value from the log in form.
    $pass = $this->input->post('login_password');

    // Make a query to retrieve the user in the database matching the user input
    // value from the log in form.
    $this->db->select('*');

    // Verify the username and the status of the user, username need to match a
    // record in the database and status need to be active;
    // (TRUE = active, FALSE = inactive).
    $results = $this->db->get_where('users', [
      'name' => $name,
      'status' => TRUE,
    ])->result_array();

    // Retrieve the first result user, we are not supposed to have more than one
    // result because the username is unique.
    $user = reset($results);

    // Verify if we have a user and if the password match the hash stored in the
    // database. The stored hash in the database was generated with
    // password_hash() and the PASSWORD_DEFAULT algorithm and we verify the hash
    // we the user input value with password_verify().
    if (!empty($user) && password_verify($pass, $user['pass'])) {
      // Load the session helper.
      $this->load->library('session');

      // Load the URL helper.
      $this->load->helper('url');

      // Declare the session of the authenticated user.
      $this->session->set_userdata(['name' => $name]);

      // Build the status message string to display.
      $status = 'You are now logged in to the site.';

      // Push a status message in the "status" key of flash data.
      $this->session->set_flashdata('status', $status);

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

    // Build the status message string to display.
    $status = 'You are now logged out of the site.';

    // Push a status message in the "status" key of flash data.
    $this->session->set_flashdata('status', $status);

    // Redirect to the login form after log out.
    redirect('/');
  }
}
