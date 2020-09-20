<?php

class Server extends CI_Model {

  public $name;
  public $description;
  public $status;

  function getServer($id = NULL) {
    $response = [];

    $this->db->select('*');

    $results = $this->db->get_where('servers', ['id' => $id])->result_array();

    return reset($results);
  }

  function getAllServers() {
    $response = [];

    $this->db->select('*');

    $results = $this->db->get('servers')->result_array();

    return $results;
  }

  public function createServer($values) {
    $this->db->insert('servers', $values);
  }

  public function updateServer($values) {
    $this->db->update('servers', $values, ['id' => $values['id']]);
  }

  public function deleteServer($values) {
    $this->db->delete('servers', $values, ['id' => $values['id']]);
  }

}
