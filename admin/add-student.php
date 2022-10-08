<?php
include '../db_connection.php';

if (isset($_POST['add-button']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['course'])) {

    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $course = $_POST['course'];


    if (empty($lastname)) {
        header("location:insert-student.php?error=<div class='alert alert-danger' role='alert'>Lastname is Required!</div>");
        exit();
    } else if (empty($firstname)) {
        header("location:insert-student.php?error=<div class='alert alert-danger' role='alert'>Firstname is Required!</div>");
        exit();
    } else if (empty($email)) {
        header("location:insert-student.php?error=<div class='alert alert-danger' role='alert'>Email is Required!</div>");
        exit();
    } else if (empty($course)) {
        header("location:insert-student.php?error=<div class='alert alert-danger' role='alert'>Course is Required!</div>");
        exit();
    } else {
        $sql = "INSERT INTO students (lastname, firstname, email, course)
        VALUE('$lastname', '$firstname', '$email', '$course')";
        $result = mysqli_query($conn, $sql);

        header("location:insert-student.php?error=<div class='alert alert-success' role='alert'>Successfully Added!</div>");
        exit();
    }
}
