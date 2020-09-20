<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>All servers | Server Manager</title>
  </head>
  <body>
    <p>You can edit a the server.</p>

    <form method="POST" action="<?php print $form_action; ?>">
      <input type="hidden" name="server_id" value="<?php print $server['id']; ?>" />

      <label for="server_name">Name</label>
      <input type="text" value="<?php print $server['name']; ?>" name="server_name" required />

      <label for="server_description">Description</label>
      <textarea name="server_description" required><?php print $server['description']; ?></textarea>

      <input type="submit" name="server_submit" value="Save" />
    </form>

  </body>
</html>
