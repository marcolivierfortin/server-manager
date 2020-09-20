<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Servers extends CI_Controller {

  function __construct() {
    parent::__construct();

    // Load the URL helper.
    $this->load->helper('url');

    // Load the session helper.
    $this->load->library('session');

    if (!$this->session->userdata('name')) {
      // Define the list of method that can't be acceded when not logged in and
      // need to be redirected to the anonymous user home page (login form).
      $restricted = [
        'index',
        'add',
        'addProcess',
        'edit',
        'editProcess',
        'delete',
        'deleteProcess',
      ];

      if (in_array($this->router->fetch_method(), $restricted)) {
        redirect('/');
      }
    }
  }

  /**
   * List all servers on the site.
   *
   * Maps to the following URL
   *    http://example.com/servers/list
   */
  public function index() {
    // Load the URL helper.
    $this->load->helper('url');

    // Load the server model.
    $this->load->model('server');

    // Generate the server add link.
    $data['add_link'] = site_url('servers/add');

    // Get all server to display all of them in a list.
    $data['servers_list'] = $this->server->getAllServers();

    foreach ($data['servers_list'] as &$server) {
      // Generate the server edit link for the current server.
      $server['edit_link'] = site_url('servers/edit/' . $server['id']);

      // Generate the server delete link for the current server.
      $server['delete_link'] = site_url('servers/delete/' . $server['id']);
    }

    // Display the server list.
    $this->load->view('servers_list', $data);
  }

  /**
   * Display a server add form on the site.
   *
   * Maps to the following URL
   *    http://example.com/servers/add
   */
  public function add() {
    // Load the URL helper.
    $this->load->helper('url');

    // Prepare template data.
    $data['form_action'] = site_url('servers/add/process');

    // Display the server add form.
    $this->load->view('servers_add', $data);
  }

  /**
   * Add a server on the site.
   *
   * Maps to the following URL
   *    http://example.com/servers/add/process
   */
  public function addProcess() {
    // Load the URL helper.
    $this->load->helper('url');

    // Load the server model.
    $this->load->model('server');

    // Get the server information to display in the form.
    $this->server->createServer([
      'id' => $this->input->post('server_id'),
      'name' => $this->input->post('server_name'),
      'description' => $this->input->post('server_description'),
    ]);

    // Redirect to the servers list page.
    redirect('servers/list');
  }

  /**
   * Display a edit server form on the site.
   *
   * Maps to the following URL
   *    http://example.com/servers/edit/:server_id
   */
  public function edit($server_id) {
    // Load the URL helper.
    $this->load->helper('url');

    // Load the server model.
    $this->load->model('server');

    // Prepare template data.
    $data['form_action'] = site_url('servers/edit/process');

    // Get the server information to display in the form.
    $data['server'] = $this->server->getServer($server_id);

    // Display the server edit form.
    $this->load->view('servers_edit', $data);
  }

  /**
   * Edit a server on the site.
   *
   * Maps to the following URL
   *    http://example.com/servers/edit/process
   */
  public function editProcess() {
    // Load the URL helper.
    $this->load->helper('url');

    // Load the server model.
    $this->load->model('server');

    // Get the server information to display in the form.
    $this->server->updateServer([
      'id' => $this->input->post('server_id'),
      'name' => $this->input->post('server_name'),
      'description' => $this->input->post('server_description'),
    ]);

    // Redirect to the servers list page.
    redirect('servers/list');
  }

  /**
   * Display a delate server form on the site.
   *
   * Maps to the following URL
   *    http://example.com/servers/delete/:server_id
   */
  public function delete($server_id) {
    // Load the URL helper.
    $this->load->helper('url');

    // Load the server model.
    $this->load->model('server');

    // Prepare template data.
    $data['form_action'] = site_url('servers/delete/process');

    // Get the server information to display in the form.
    $data['server'] = $this->server->getServer($server_id);

    // Display the server edit form.
    $this->load->view('servers_delete', $data);
  }

  /**
   * Delete a server on the site.
   *
   * Maps to the following URL
   *    http://example.com/servers/delete/process
   */
  public function deleteProcess() {
    // Load the URL helper.
    $this->load->helper('url');

    // Load the server model.
    $this->load->model('server');

    // Get the server information to display in the form.
    $this->server->deleteServer([
      'id' => $this->input->post('server_id'),
    ]);

    // Redirect to the servers list page.
    redirect('servers/list');
  }
}
