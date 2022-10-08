<?php
session_start();
include '../db_connection.php';
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {


    include('header.php');
    include('navbar.php');
?>
    <div class="py-5">
        <div class="container">
            <?php
            $table = '  <table class="table">
                    <thead class="thead-dark tex-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Course</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>';

            $i = 1;
            $sql = "SELECT * FROM students ORDER BY DATE(created_at) DESC";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $lastname = $row['lastname'];
                $firstname = $row['firstname'];
                $email = $row['email'];
                $course =  $row['course'];
                $table .= '<tr>
                        <td>' . $i++ . '</td>
                        <td>' . $lastname . '</td>
                        <td>' . $firstname . '</td>
                        <td>' . $email . '</td>
                        <td>' . $course . '</td>
                        <td>
                            <button type="button" class="btn btn-primary">
                            <a class="text-light" href="update.php?updateid=' . $id . '">UPDATE</a>
                            </button>
                            <button type="button" class="btn btn-danger">
                                <a class="text-light" href="delete.php?deleteid=' . $id . '">DELETE</a>
                            </button>
                        </td>
                    </tr>';
            }
            $table .= '</table>';
            echo $table;
            ?>
        </div>
    </div>
<?php
    include('footer.php');
} else {
    header("location:../index.php");
}
?>