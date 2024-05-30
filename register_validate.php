<?php
  session_start();
  require_once ('user.php');

  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];
  $confirm_password = $_REQUEST['confirm_password'];

  // echo $username . " " . $password;
  
  $user = new User();
  $check_user = $user->get_user_by_username($username);
  // print_r($check_user);
  // check password match and need to meet a minimum security standard
  if ($password != $confirm_password) {
    $_SESSION['diff_password'] = 1;
    header('location: /register.php');
  }

  if (strlen($password) < 8) {
    $_SESSION['password_length'] = 1;
    header('location: /register.php');
  }

  // Check to see if the account name exists already
  if (!empty($check_user)) {
    // if user exist, redirect to regiser page
    $_SESSION['user_exist'] = 1;
    header('location: /register.php');
  }

  // create new user when pass the condition 
  if($password == $confirm_password && strlen($password) > 7 && empty($check_user)) { 
    // hash password, then save to database
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $user->create_user($username, $hash);

    // redirect to login page
    header('location: /login.php');
  }
  

?>