<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>All servers | Server Manager</title>
  </head>
  <body>
    <p>You can add a server.</p>

    <form method="POST" action="<?php print $form_action; ?>">
      <label for="server_name">Name</label>
      <input type="text" value="" name="server_name" required />

      <label for="server_description">Description</label>
      <textarea name="server_description" required></textarea>

      <input type="submit" name="server_submit" value="Save" />
    </form>

  </body>
</html>
