<?php
  //Create a logout page that destroys the session variables
  session_start();
  session_destroy();

  header('location: /login.php');
?>