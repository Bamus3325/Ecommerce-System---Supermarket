<!DOCTYPE html>
<html>

<?php include '_include/head.php'; ?>

<body>

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
                                <h4>Settings</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="teach_index.php">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Settings
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <div class="dropdown">
                                <p class="btn btn-primary dropdown-toggle no-arrow" role="button"
                                    data-toggle="dropdown">
                                    <?php echo date('M  Y'); ?>
                                </p>
                                <!-- <div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">Export List</a>
										<a class="dropdown-item" href="#">Policies</a>
										<a class="dropdown-item" href="#">View Assets</a>
									</div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <?php
        include '_include/connect.php';
        $u_email = $_SESSION['email'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$u_email'");
        $row = mysqli_fetch_array($query);
        ?>
                <?php
						if (isset($_POST['submit'])) {
							$id = $_SESSION['email'];
							include '_include/connect.php';
							$full_name = mysqli_real_escape_string($con, $_POST['full_name']);
							$username = mysqli_real_escape_string($con, $_POST['username']);
							$phone = mysqli_real_escape_string($con, $_POST['phone']);
							$address = mysqli_real_escape_string($con, $_POST['address']);

							$sql = "UPDATE users SET fname = '$full_name',email = '$email',phone = '$phone',adddress = '$address' WHERE email ='$id'";
							$query = mysqli_query($con, $sql);
							if ($query == TRUE) {
								echo "<script> alert('Record Upadated Successfully'); </script>";
							}else {
								echo "<script> alert('Record Not Upadated Successfully'); </script>";
							}

							} 
					?>
                <div class="row clearfix">

                    <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
                        <form method="POST" action="">
                            <div class="pd-20 card-box height-100-p">

                                <h4 class="text-blue h4">Settings</h4>
                                <h4 class="text-blue h5 mb-20">
                                    Edit Your Personal Setting</h4>

                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input class="form-control form-control-lg" type="text" name="full_name"
                                        value="<?php echo $row['fname']; ?>" />
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control form-control-lg" type="text" name="username"
                                        value="<?php echo $row['username']; ?>" />
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="form-control form-control-lg" type="text" name="phone"
                                        value="<?php echo $row['phone']; ?>" />
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control form-control-lg" type="text" name="address"
                                        value="<?php echo $row['adddress']; ?>" />
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" name="submit" class="btn btn-primary"
                                        value="Update Information" />
                                </div>
                            </div>
                        </form>
                    </div>

                    <?php
						if (isset($_POST['chang_pass'])) {
							$id = $_SESSION['email'];
							include '_include/connect.php';
							$cur_pass = mysqli_real_escape_string($con, $_POST['cur_pass']);
							$new_pass = mysqli_real_escape_string($con, $_POST['new_pass']);
							$con_pass = mysqli_real_escape_string($con, $_POST['con_pass']);

								$sql3 = "SELECT * FROM users WHERE email = '$id'";
								$query3 = mysqli_query($con, $sql3);
								$bb = mysqli_fetch_array($query3);

								if ($bb['pass'] != $cur_pass) {
									echo "<script> alert('Old Password is Incorrect');</script>";
								}elseif($new_pass != $con_pass){
									echo "<script> alert('New Password or Confirm Password is Incorrect');</script>";
								}else{
									$sql2 = "UPDATE users SET password = '$new_pass' WHERE id = '$id'";
									$query2 = mysqli_query($con, $sql2);
									if ($query2 == TRUE) {
										echo "<script> alert('Password Upadated Successfully'); </script>";
									}else{
										echo "<script> alert('Password Not Upadated'); </script>";
									}
								}
							} 
					?>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
                        <form method="POST" action="">
                            <div class="pd-20 card-box height-100-p">
                                <h4 class="text-blue h5 mb-20">
                                    Change Password</h4>

                                <div class="form-group">
                                    <label>Current Password:</label>
                                    <input type="password" class="form-control form-control-lg" name="cur_pass"
                                        placeholder="**********" required />
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>New Password:</label>
                                    <input type="password" class="form-control form-control-lg" name="new_pass"
                                        placeholder="**********" required />
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password:</label>
                                    <input type="password" class="form-control form-control-lg" name="con_pass"
                                        placeholder="**********" required />
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"></span>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" name="chang_pass" class="btn btn-primary"
                                        value="Save & Update" />
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                        <form method="POST" action="">
                            <div class="pd-20 card-box height-100-p">
                                <h4 class="text-blue h5 mb-20">
                                    Change PIN</h4>

                                <div class="form-group">
                                    <label>Current PIN:</label>
                                    <input type="password" class="form-control form-control-lg" name="cur_pass"
                                        placeholder="**********" required />
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>New PIN:</label>
                                    <input type="password" class="form-control form-control-lg" name="new_pass"
                                        placeholder="**********" required />
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Confirm PIN:</label>
                                    <input type="password" class="form-control form-control-lg" name="con_pass"
                                        placeholder="**********" required />
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"></span>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" name="chang_pass" class="btn btn-primary"
                                        value="Save & Update" />
                                </div>

                            </div>
                        </form>
                    </div> -->
                </div>
                <!-- Bordered table End -->



            </div>
            <?php include '_include/footer.php'; ?>
        </div>
    </div>

    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <script src="src/plugins/cropperjs/dist/cropper.js"></script>
    <script>
    window.addEventListener("DOMContentLoaded", function() {
        var image = document.getElementById("image");
        var cropBoxData;
        var canvasData;
        var cropper;

        $("#modal")
            .on("shown.bs.modal", function() {
                cropper = new Cropper(image, {
                    autoCropArea: 0.5,
                    dragMode: "move",
                    aspectRatio: 3 / 3,
                    restore: false,
                    guides: false,
                    center: false,
                    highlight: false,
                    cropBoxMovable: false,
                    cropBoxResizable: false,
                    toggleDragModeOnDblclick: false,
                    ready: function() {
                        cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
                    },
                });
            })
            .on("hidden.bs.modal", function() {
                cropBoxData = cropper.getCropBoxData();
                canvasData = cropper.getCanvasData();
                cropper.destroy();
            });
    });
    </script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>