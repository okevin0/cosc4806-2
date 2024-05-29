<?php

  session_start();
  require_once ('user.php');

  $username = $_REQUEST['username'];
  $_SESSION['username'] = $username;
  $password = $_REQUEST['password'];

  //Modify your login code so it is no longer hard-coded and the user should be able to login with their account details
  $user = new User();
  $check_password = $user->get_user_by_username($username);
  // echo $check_password['password'];

  // If the username and password are correct then take them to index.php and display their username (welcome, NAME) with the current date (formatted in a readable way)
  // If they log in successfully, set a session variable 'authenticated' to true (or 1)
  if (!empty($check_password) && $check_password['password'] == $password) {
    $_SESSION['authenticated'] = 1;
    header ('location: /');
  } else {
    
    // Implement session variables and for every failed login attempt, keep track of it in a session variable
    if(!isset($_SESSION['failed_attempts'])){
      $_SESSION['failed_attempts'] = 1;
    } else {
      $_SESSION['failed_attempts'] = $_SESSION['failed_attempts'] + 1;
    }

    // redirect to login page and prin the number of failed attempts
    // echo "This is unsuccessful attempt number: " . $_SESSION['failed_attempts'];
    header('location: /login.php');
        
  }
?>