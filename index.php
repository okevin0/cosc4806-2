<?php 
 session_start();

  // check if user is authenticated
  if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 1){
    // do nothing
  } else {
    // if not, redirect to login page
    header('location: /login.php');
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Shuming Lin</title>
  </head>
  
  <body
    
    <h1>COSC4806 - Assignment1</h1>
  
    <p>Welcome, <?php echo $_SESSION['username'] . " and today is " . date("Y-m-d H:i:s"); ?></p>
    
  </body>

  <footer>
    <p><a href='/logout.php'>Click Here to logout</a></p>
  
</html>