<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>All servers | Server Manager</title>
    <link rel="stylesheet" href="/skin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&family=Roboto:wght@100&display=swap" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  </head>
  <body>

    <div class="page">

      <h1>All servers</h1>

      <div class="logout-link">
        <a href="<?php print $logout_link; ?>">Log out</a>
      </div>

      <?php if (!empty($status)): ?>
        <div class="messages status">
          <?php print $status; ?>
        </div>
      <?php endif; ?>

      <div class="action-links">
        <a href="<?php print $create_link; ?>">Add server</a>
      </div>

      <?php if (!empty($servers_list)): ?>
        <table>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th></th>
            <th></th>
          </tr>
          <?php foreach ($servers_list as $server): ?>
            <tr>
              <td><?php print $server['id']; ?></td>
              <td><?php print $server['name']; ?></td>
              <td><?php print $server['description']; ?></td>
              <td><a class="edit-link" href="<?php print $server['edit_link']; ?>">Edit</a></td>
              <td><a class="delete-link" href="<?php print $server['delete_link']; ?>">Delete</a></td>
            </tr>
          <?php endforeach; ?>
        </table>
      <?php else: ?>
        <p>There is currently no server on the site. Use the add server button above to add some on the site.</p>
      <?php endif; ?>
    </div>

  </body>
</html>
