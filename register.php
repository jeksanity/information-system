<?php
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
                        <h2>Register Form</h2>
                    </div>
                    <div class="card-body">
                        <form action="register-config.php" method="POST">
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="username">
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
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm-password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="register-button">Submit</button>
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