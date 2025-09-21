<?php include '_include/connect.php'; ?>
<!DOCTYPE html>
<html>

<?php include '_include/head.php'; ?>
<style>
.input-icon {
    position: relative;
    display: inline-block;
}

.icon {
    position: absolute;
    right: 30px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: auto;
    cursor: pointer;
    color: #888;
}

input[type="password"] {
    padding-right: 30px;
}
</style>

<body>
    <!-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="vendors/images/deskapp-logo.svg" alt="" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div> -->

    <?php include '_include/header.php'; ?>

    <?php include '_include/right-sidebar.php'; ?>

    <?php include '_include/nav.php'; ?>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Edit User</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Edit User
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <div class="dropdown">
                                <a class="btn btn-secondary" href="#" role="button">
                                <?php echo date('M  Y'); ?>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
$id = $_GET['id'];
include '_include/connect.php';
$query = mysqli_query( $con, "SELECT * FROM users WHERE id = '$id'" );
$row = mysqli_fetch_array($query);

if(isset($_POST['submit'])){

	$fname = mysqli_real_escape_string($con, $_POST['fname']);
	$lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
	$address = mysqli_real_escape_string($con, $_POST['address']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$pass = mysqli_real_escape_string($con, $_POST['pass']);
	
	$sql = "UPDATE users SET fname = '$fname', lname = '$lname', email = '$email', phone = '$phone', adddress = '$address', username = '$username' WHERE id = '$id'";
	$query = mysqli_query($con, $sql);

	if ($query == TRUE) {
		echo "<script>alert('User Updated Successful ✔✔✔'); window.location='view_users.php'; </script>";
	}else {
		echo "<script>alert('User Not Updated'); </script>";

	}
}

?>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Edit User</h4>
                            <p class="mb-30">All Fields Must be Filled</p>
                        </div>
                    </div>
                    <form method="POST" action="">
                        <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">FirstName</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="fname" type="text" value="<?php echo $row['fname'];?>" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">LastName</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="lname" value="<?php echo $row['lname'];?>" type="text" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="email" placeholder="user@gmail.com" value="<?php echo $row['email'];?>" type="email" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Address</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="address" value="<?php echo $row['adddress'];?>" type="text" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Phone Number</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="phone" value="<?php echo $row['phone'];?>" type="number" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="username" value="<?php echo $row['username'];?>"  type="text" required/>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                            <div class="col-sm-12 col-md-10 input-icon">
                                <input class="form-control" name="pass" id="passwordField" placeholder="Enter password" type="password" required/>
                                <span class="icon" id="showPassword" onclick="pass()">&#128273;</span>
                            </div>
                        </div>
                        <p class="col-sm-12">Click &#128273; to view the typed Password</p> -->
                        <div class="btn-list">
                            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">
                                Update User Details
                            </button>
                        </div>

                    </form>
                </div>
                <!-- Default Basic Forms End -->

                <!-- horizontal Basic Forms Start -->
                <!-- horizontal Basic Forms End -->

                <!-- Form grid Start -->
                <!-- Form grid End -->

                <!-- Input Validation Start -->
                <!-- Input Validation End -->
            </div>
            <?php include '_include/footer.php'; ?>
        </div>
    </div>
    <script>
    function pass() {
        document.getElementById('showPassword').addEventListener('click', function() {
            var passwordField = document.getElementById('passwordField');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    }
    </script>
    <!-- welcome modal start -->
    <!-- welcome modal end -->
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>