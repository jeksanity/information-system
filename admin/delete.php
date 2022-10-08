<?php
include '../db_connection.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM students WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:view-student.php');
    } else {
        die(mysqli_error($conn));
    }
}
