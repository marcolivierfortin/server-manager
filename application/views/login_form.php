<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Log in | Server Manager</title>
  </head>
  <body>
    <p>Log in to be able to view the site.</p>

    <?php print isset($error) ? $error : ''; ?>

    <form method="POST" action="<?php print $form_action; ?>">
      <label for="login_username">Username</label>
      <input type="text" placeholder="Enter your username" name="login_username" required />

      <label for="login_password">Password</label>
      <input type="password" placeholder="Enter your password" name="login_password" required />

      <input type="submit" name="login_submit" value="Log in" />
    </form>
  </body>
</html>
