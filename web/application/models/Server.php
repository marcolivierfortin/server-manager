<?php

/**
 * Model class for the server entity on the site, used to stored information on
 * servers and to make CRUD operations on it.
 */
class Server extends CI_Model {

  /**
   * The server name.
   *
   * @var string
   */
  public $name;

  /**
   * The server description.
   *
   * @var string
   */
  public $description;

  /**
   * The server status.
   *
   * @var string
   */
  public $status;

  /**
   * Retrieves a server entity.
   *
   * @return array
   *   The server entity.
   */
  function getServer($id = NULL) {
    // Make a query to retrieve the server entity in the "server" table in the
    // database matching the server id.
    $this->db->select('*');

    $results = $this->db->get_where('servers', [
      'id' => $id,
    ])->result_array();

    // Retrieve the first result server.
    return reset($results);
  }

  /**
   * Retrieves all the server entities.
   *
   * @return array
   *   The server entities.
   */
  function getAllServers() {
    // Make a query to retrieve all server entities in the "server" table in the
    // database.
    $this->db->select('*');

    $results = $this->db->get('servers')->result_array();

    // Retrieve all result servers.
    return $results;
  }

  /**
   * Create a server entity.
   *
   * @param array $values
   *   The key "name" and "description" are required and the key "status"
   *   is optional.
   *
   * @return bool
   *   The status of the operation;
   *   (TRUE = successfully created, FALSE = failed).
   */
  public function createServer(array $values) {
    // Create the server entity in the "servers" table with the values provided.
    $result = $this->db->insert('servers', $values);

    // Return the status of the operation.
    return $result;
  }

  /**
   * Update a server entity.
   *
   * @param array $values
   *   The key "id", name" and "description" are required and the key "status"
   *   is optional.
   *
   * @return bool
   *   The status of the operation;
   *   (TRUE = successfully updated, FALSE = failed).
   */
  public function updateServer(array $values) {
    // Update the server entity in the "servers" table with the values provided
    // where the id equals the id provided in the values.
    $result = $this->db->update('servers', $values, ['id' => $values['id']]);

    // Return the status of the operation.
    return $result;
  }

  /**
   * Delete a server entity.
   *
   * @param array $values
   *   The key "id" is required and no other key is required.
   *
   * @return bool
   *   The status of the operation;
   *   (TRUE = successfully deleted, FALSE = failed).
   */
  public function deleteServer(array $values) {
    // Delete the server entity in the "servers" table where the id equals the
    // id provided in the values.
    $result = $this->db->delete('servers', $values, ['id' => $values['id']]);

    // Return the status of the operation.
    return $result;
  }

}
