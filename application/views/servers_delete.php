<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>All servers | Server Manager</title>
  </head>
  <body>
    <p>You can delete the server.</p>

    <form method="POST" action="<?php print $form_action; ?>">
      <input type="hidden" name="server_id" value="<?php print $server['id']; ?>" />

      <input type="submit" name="server_submit" value="Delete" />
    </form>

  </body>
</html>
