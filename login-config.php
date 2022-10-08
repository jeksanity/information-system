<?php
session_start();
include 'db_connection.php';

if (isset($_POST['login-button']) &&  isset($_POST['username']) && isset($_POST['password'])) {

  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $username = validate($_POST['username']);
  $password = validate($_POST['password']);

  if (empty($username)) {
    header("location:index.php?error=<div class='alert alert-danger' role='alert'>Username is Required!</div>");
    exit();
  } else if (empty($password)) {
    header("location:index.php?error=<div class='alert alert-danger' role='alert'>Password is Required!</div>");
    exit();
  } else {

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['username'] === $username && $row['password'] === $password) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        header("location:admin/dashboard.php");
        exit();
      } else {
        header("location: index.php?error=<div class='alert alert-danger' role='alert'>Invalid Username or Password!</div>");
        exit();
      }
    } else {
      header("location: index.php?error=<div class='alert alert-danger' role='alert'>Invalid Username or Password!</div>");
      exit();
    }
  }
} else {
  header("location:index.php");
}
