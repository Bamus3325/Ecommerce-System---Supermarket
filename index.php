<!DOCTYPE html>
<html>

<?php include '_include/head.php'; ?>
<style>
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

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="">
            <!-- <div class="container-fluid d-flex justify-content-between align-items-center"> -->
            <!-- <div class="brand-logo" style="height: 260px;"> -->
            <div >
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
            <!-- <div class="login-menu">
                <ul>
                    <li><a href="register.php">Register</a></li>
                </ul>
            </div> -->
        </div>
    </div><?php
                    if (isset($_POST['submit'])) {
                      include '_include/connect.php';

                      $username = mysqli_real_escape_string($con, $_POST['username']);
                      $password = mysqli_real_escape_string($con, $_POST['password']);
                      $user_type = mysqli_real_escape_string($con, $_POST['user_type']);
                      

                      $sql = "SELECT  * FROM users WHERE username='$username' and pass='$password' and user_type='$user_type'";
                      $query = mysqli_query($con, $sql);

                      $dd = mysqli_fetch_array($query);

                      if ($row = mysqli_num_rows($query) > 0) {
                        session_start();
                        
                        $_SESSION['email'] = $dd['email'];
                        $_SESSION['username'] = $username;
                        $_SESSION['user_type'] = $dd['user_type'];

                        //header(location: dashboard.php);

                        echo "<script>alert('Login Successful ✔✔✔'); window.location='dashboard.php'; </script>";
                      } else{
                        echo "<script> alert('Username or Password not correct')</script>";
                      }
                     }
            ?>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="vendors/images/login-page-img.png" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login Now</h2>
                        </div>
                        <form method="POST" action="">
                            <div class="select-role">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn active">
                                        <input type="radio" name="user_type" value="0" id="admin" required />
                                        <div class="icon">
                                            <img src="vendors/images/briefcase.svg" class="svg" alt="" />
                                        </div>
                                        <span>As</span>
                                        Admin
                                    </label>
                                    <label class="btn">
                                        <input type="radio" name="user_type" value="1" id="user" required />
                                        <div class="icon">
                                            <img src="vendors/images/person.svg" class="svg" alt="" />
                                        </div>
                                        <span>As</span>
                                        User
                                    </label>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Username"
                                    name="username" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" placeholder="**********"
                                    name="password" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-primary btn-lg btn-block" name="submit" type="submit"
                                            value="Sign In">

                                    </div>
                                    <!-- <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">
                                        OR
                                    </div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="register.php">Register
                                            To Create Account</a>
                                    </div> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <?php //include '_include/footer.php'; ?>

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