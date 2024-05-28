<?php

  session_start();

  // The goal is to have a functional login form. You can hardcode username and password
  $valid_username = "shuming";
  $valid_password = "password";

  $username = $_REQUEST['username'];
  $_SESSION['username'] = $username;
  $password = $_REQUEST['password'];

  // If the username and password are correct then take them to index.php and display their username (welcome, NAME) with the current date (formatted in a readable way)
  // If they log in successfully, set a session variable 'authenticated' to true (or 1)
  if ($valid_username == $username && $valid_password == $password ) {
    
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