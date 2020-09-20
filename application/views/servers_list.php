<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>All servers | Server Manager</title>
  </head>
  <body>
    <p>You can view the list of all servers and edit or delete them as needed.</p>

    <a href="<?php print $add_link; ?>">Add server</a>

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
            <td><a href="<?php print $server['edit_link']; ?>">Edit</a></td>
            <td><a href="<?php print $server['delete_link']; ?>">Delete</a></td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php endif; ?>

  </body>
</html>
