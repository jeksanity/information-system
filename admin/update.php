<?php
include '../db_connection.php';

if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    if (isset($_POST['update-button'])) {
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $course = $_POST['course'];

        $sql = "UPDATE students SET id = '$id', lastname = '$lastname', firstname = '$firstname', email = '$email', course = '$course' WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        header("location:update.php?error=<div class='alert alert-success' role='alert'>Update Successfully!</div>");
    }
}

include('header.php');
include('navbar.php');
?>
<!-- PAGE CONTENT -->
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (isset($_GET['error'])) { ?>
                    <?php echo $_GET['error']; ?>
                <?php } ?>
                <div class="card">
                    <div class="card-header">
                        <h2>Update Student</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="">Lastname</label>
                                    <input type="text" class="form-control" name="lastname">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="">Firstname</label>
                                    <input type="text" class="form-control" name="firstname">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="">Course and Year</label>
                                    <input type="text" class="form-control" name="course">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="update-button">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>