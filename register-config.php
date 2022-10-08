<?php
include 'db_connection.php';

if (isset($_POST['register-button']) &&  isset($_POST['username'])  &&  isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {

  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $username = validate($_POST['username']);
  $email = validate($_POST['email']);
  $password = validate($_POST['password']);
  $confirmPassword = validate($_POST['confirm-password']);

  if ($password == $confirmPassword) {
    if (empty($username)) {
      header("location:register.php?error=<div class='alert alert-danger' role='alert'>Username is Required!</div>");
      exit();
    } else if (empty($email)) {
      header("location:register.php?error=<div class='alert alert-danger' role='alert'>Email is Required!</div>");
      exit();
    } else if (empty($password)) {
      header("location:register.php?error=<div class='alert alert-danger' role='alert'>Password is Required!</div>");
      exit();
    } else if (empty($confirmPassword)) {
      header("location:register.php?error=<div class='alert alert-danger' role='alert'>Confirm Password is Required!</div>");
      exit();
    } else {
      $sql = "INSERT INTO users (username, email, password) 
      VALUES('$username', '$email', '$password')";
      $result = mysqli_query($conn, $sql);
      header("location:register.php?error=<div class='alert alert-success' role='alert'>Successfully Created!</div>");
    }
  } else {
    header("location:register.php?error=<div class='alert alert-danger' role='alert'>Password is not Match!</div>");
    exit();
  }
} else {
  header('location:register.php');
}
