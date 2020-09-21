<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Log in | Server Manager</title>
    <link rel="stylesheet" href="/skin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&family=Roboto:wght@100&display=swap" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  </head>
  <body>

    <div class="page">

      <h1>Log in</h1>

      <?php if (!empty($status)): ?>
        <div class="messages status">
          <?php print $status; ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($error)): ?>
        <div class="messages error">
          <?php print $error; ?>
        </div>
      <?php endif; ?>

      <form method="POST" action="<?php print $form_action; ?>">

        <div class="form-item">
          <label for="login_username">Username <span class="marker">*</span></label>
          <input id="login_username" class="form-text<?php print (!empty($error)) ? ' error' : ''?>" type="text" placeholder="Enter your username" name="login_username" required />
        </div>

        <div class="form-item">
          <label for="login_password">Password <span class="marker">*</span></label>
          <input id="login_password" class="form-password<?php print (!empty($error)) ? ' error' : ''?>" type="password" placeholder="Enter your password" name="login_password" required />
        </div>

        <div class="form-actions">
          <input class="form-submit" type="submit" name="login_submit" value="Log in" />
        </div>

      </form>

    </div>

  </body>
</html>
