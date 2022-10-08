<?php
session_start();
include '../db_connection.php';
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {

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
                            <h2>Add Student</h2>
                        </div>
                        <div class="card-body">
                            <form action="add-student.php" method="POST">
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
                                <button type="submit" class="btn btn-primary" name="add-button">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include('footer.php');
} else {
    header("location:../index.php");
}
?>