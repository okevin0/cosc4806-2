<?php
  require_once ('database.php');

  // read user from database
  Class User {

    public function get_all_users () {
      $db = db_connect();
      $statement = $db->prepare("select * from users;");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }
    
  }
?>