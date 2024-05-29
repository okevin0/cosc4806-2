<?php
  session_start();
  require_once ('user.php');

  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];

  // echo $username . " " . $password;
  
  $user = new User();

  $check_user = $user->get_user_by_username($username);
  if ($check_user > 0) {
    // if user exist, redirect to regiser page
    $_SESSION['user_exist'] = 1;
    header('location: /register.php');
    
  } else {
    // create a new user
    $user->create_user($username, $password);
    // redirect to login page
    header('location: /login.php');
  }
  

?>