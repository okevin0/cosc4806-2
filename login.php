<?php
  // Create a login.php page that has a basic login form (username, password, submit)
 session_start();

 require_once ('user.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>
  <body>
    <h1>Login Form</h1>
    <?php
      // only print when user fail to login
      if(isset($_SESSION['failed_attempts']) && $_SESSION['failed_attempts'] > 0 ) {
        echo "This is unsuccessful attempt number: " . $_SESSION['failed_attempts'] . "<br><br>";
      }

    // test print user list from database
    // $user = new User();
    // $user_list = $user->get_all_users();

    // echo "<pre>";
    // print_r($user_list);
    
    ?>
    <form action="/validate.php" method="post">
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

    <a href="/register.php">Create New Account</a>
  </body>
</html>