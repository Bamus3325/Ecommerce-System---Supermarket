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
.mee {
    display: flex;
    padding-top: 10px;
    text-align: center;
    justify-content: center;
}
.s_mee{
    text-align: center;
}
</style>

<body>
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div>
                <a href="login.html" class="mee">
                    <img src="vendors/images/crm.png" style="height: 60px" alt="" />&nbsp;&nbsp;&nbsp;&nbsp;
                    <h3>Design and Implementation of a Customer Relationship Management System<br>(A Case Study of
                        Olatinwo Supermarket Offa)</h3>
                </a>
                <div class="s_mee">
                    <h5>Supervised By: Mr Jimoh H.O</h5>
                    <h4>Designed By</h4>
                    <h5>Ajilore Hannah O. <br>CS/HND/F22/3308</h5>
                </div>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="index.php">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    include '_include/connect.php';
if(isset($_POST['submit'])){

	$email = mysqli_real_escape_string($con, $_POST['email']);
	$user = mysqli_real_escape_string($con, $_POST['user']);
	$pass = mysqli_real_escape_string($con, $_POST['pass']);
	$fname = mysqli_real_escape_string($con, $_POST['fname']);
	$lname = mysqli_real_escape_string($con, $_POST['lname']);
	$gender = mysqli_real_escape_string($con, $_POST['gender']);
	$dob = mysqli_real_escape_string($con, $_POST['dob']);
	$tel = mysqli_real_escape_string($con, $_POST['tel']);
	$address = mysqli_real_escape_string($con, $_POST['address']);

    $query1= mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
    if ($row = mysqli_num_rows($query1) > 0) {

        echo "<script>alert('Email Already Exist ❌❌❌'); window.location='register.php'; </script>";

    }else {
        $sql = "INSERT INTO users(fname, lname, email, phone, adddress, gender, dob, username, pass) 
                            VALUES('$fname','$lname','$email','$tel','$address','$gender','$dob','$user','$pass')";
	$query = mysqli_query($con, $sql);

	if ($query == TRUE) {
		echo "<script>alert('Record Added Successful ✔✔✔'); window.location='index.php'; </script>";
	}else {
		echo "<script>alert('Record Not Added Successful'); </script>";

	}
    }
	
	
}

?>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="vendors/images/register-page-img.png" alt="" />
                </div>
                <div class="col-md-6">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <!-- <div class="login-title">
                            <h2 class="text-center text-primary">Register Now</h2>
                        </div> -->
                        <form class="tab-wizard2 wizard-circle wizard" method="POST" action="">
                            <!-- <h5>Basic Account Credentials</h5> -->
                            <section>
                                <h5 style="padding-bottom: 15px; text-align:center;">Customer
                                    Registration Page</h5>
                                <div class="form-wrap max-width-auto mx-auto">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Email Address*</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="email" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Username*</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="user" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Password*</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="pass" required />
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Confirm Password*</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" name="con-ass" required/>
                                            </div>
                                        </div> -->
                                </div>
                            </section>
                            <!-- Step 2 -->
                            <!-- <h5 style="padding-top: 10px; padding-bottom: 15px; text-align:center;">Customer
                                Registration Page</h5> -->
                            <section>
                                <div class="form-wrap max-width-auto mx-auto">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Last Name*</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="lname" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">First Name*</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="fname" required />
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-sm-4 col-form-label">Gender*</label>
                                        <div class="col-sm-8">
                                            <!-- <select class="form-control" name="gender" required>
                                            <option value="">---Select Gender--</option>
                                            <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select> -->
                                            <div class="custom-control custom-radio custom-control-inline pb-0">
                                                <input type="radio" id="male" value="male" name="gender"
                                                    class="custom-control-input" />
                                                <label class="custom-control-label" for="male">Male</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline pb-0">
                                                <input type="radio" id="female" value="female" name="gender"
                                                    class="custom-control-input" />
                                                <label class="custom-control-label" for="female">Female</label>
                                            </div>
                                            <!-- <input type="text" class="form-control" name="fname" required /> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Date of Birth</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="dob" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Phone Number</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name="tel" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="address" required />
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="Register Now" />

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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