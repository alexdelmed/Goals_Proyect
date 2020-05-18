<?php
if (isset($_POST['signup-submit'])) {

  require 'dbh.inc.php';
//put data
  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];

//if something wrong in signup
  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Locatio: ../signup.pgp?error=emptyfields&uid=".$username."&mail=".$email); //lets some info back, but gets you back
    exit();
  }
  elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
    header("Locatio: ../signup.pgp?error=invalidmail");
    exit();
  }
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Locatio: ../signup.pgp?error=invalidmail&uid=".$username);
    exit();
  }
  elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Locatio: ../signup.pgp?error=invaliduidl&mail=".$email);
    exit();
  }
  elseif($password !== $passwordRepeat){
    header("Locatio: ../signup.pgp?error=passwordCheck&uid=".$username."&mail=".$email);
    exit();
  }
  else{

    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
    $stmr =mysqli_stmr_init($conn);
    if(!mysqli_stmr_prepare($stmt, $sql)){
      header("Locatio: ../signup.pgp?error=sqlerror");
      exit();
    }
    else {                        //s for string, can be i = integer, b=blob, d=double
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysli_stmt_execute($stmt);
      mysli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        header("Locatio: ../signup.pgp?error=usertaken&mail=".$email);
        exit();
      }
      //singup users
      else {                                                           //placeholders for safe
        $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
        $stmr =mysqli_stmr_init($conn);
        if(!mysqli_stmr_prepare($stmt, $sql)){
          header("Locatio: ../signup.pgp?error=sqlerror");
          exit();
        }
        else {
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
          mysli_stmt_execute($stmt);
          header("Locatio: ../signup.pgp?signup=success");
          exit();
        }
      }
    }
  }  //close connection, to save resouces
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

} //in case they dont clic signup, return them
else {
  header("Location: ../signup.php")
  exit();
}
