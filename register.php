<?php
  // Create a register.php page that has a basic register form (username, password, submit)
 session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Create New Account</title>
  </head>
  <body>
    <h1>Create New Account</h1>
    <?php
      // only print when new user exist
      if(isset($_SESSION['user_exist']) && $_SESSION['user_exist'] > 0 ) {
        echo "The account already exist.";
      }
    ?>
    <form action="/register_validate.php" method="post">
      <label for="username">Username:</label>
      <br>
      <input type="text" id="username" name="username">
      <br>
      <label for="password">Password:</label>
      <br>
      <input type="password" id="password" name="password">
      <br><br>
      <input type="submit" value="Submit">
    </form> 
    
  </body>
</html>