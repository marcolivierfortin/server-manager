<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Delete server <?php print $server['name']; ?> | Server Manager</title>
    <link rel="stylesheet" href="/skin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&family=Roboto:wght@100&display=swap" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  </head>
  <body>

    <div class="page">

      <h1>Delete server <em><?php print $server['name']; ?></em></h1>

      <div class="logout-link">
        <a href="<?php print $logout_link; ?>">Log out</a>
      </div>

      <form method="POST" action="<?php print $form_action; ?>">

        <input type="hidden" name="server_id" value="<?php print $server['id']; ?>" />

        <div class="form-item">
          <p>This anction is permanent and can not be undone. Are you sure you want to delete the server <em><?php print $server['id']; ?></em>?</p>
        </div>

        <div class="form-actions">
          <input class="form-submit" type="submit" name="server_submit" value="Delete" />
        </div>

      </form>

    </div>

  </body>
</html>
