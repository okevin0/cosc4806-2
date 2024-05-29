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

    // create a new user
    public function create_user ($username, $password) {
      $db = db_connect();
      $statement = $db->prepare("insert into users (username, password) values (?, ?);");
      $new_user = $statement->execute([$username, $password]);
      return $new_user;
    }

    // check if username exists
    public function get_user_by_username ($username) {
      $db = db_connect();
      $statement = $db->prepare("select * from users where username = ?;");
      $statement->execute([$username]);
      $rows = $statement->rowCount();
      return $rows;
    }
    
  }
?>