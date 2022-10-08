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
                            <th scope="col">Date</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>';

            $i = 1;
            $sql = "SELECT * FROM users ORDER BY DATE(created_at) DESC";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $username = $row['username'];
                $email = $row['email'];
                $date = date('M d, Y', strtotime($row['created_at']));
                $table .= '<tr>
                        <td>' . $i++ . '</td>
                        <td>' . $date . '</td>
                        <td>' . $username . '</td>
                        <td>' . $email . '</td>
                        <td>
                            <button type="button" class="btn btn-danger">
                                <a class="text-light" href="delete-user.php?deleteid=' . $id . '">DELETE</a>
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