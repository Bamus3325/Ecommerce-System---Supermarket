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
                                <h4>Create Password</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Create Password
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


// if(isset($_POST['submit'])){

// 	$cdate = mysqli_real_escape_string($con, $_POST['cdate']);
// 	$email = mysqli_real_escape_string($con, $_POST['email']);
// 	$url = mysqli_real_escape_string($con, $_POST['url']);
// 	$pass = mysqli_real_escape_string($con, $_POST['pass']);
	
// 	$sql = "INSERT INTO info(cdate, email, url, pass) VALUES('$cdate','$email','$url','$pass')";
// 	$query = mysqli_query($con, $sql);

// 	if ($query == TRUE) {
// 		echo "<script>alert('Record Added Successful ✔✔✔'); window.location='table.php'; </script>";
// 	}else {
// 		echo "<script>alert('Record Not Added Successful'); </script>";

// 	}
// }

?>
                

                <!-- horizontal Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Create Password</h4>
							<p class="mb-30">Generate New Password</p>
						</div>
					</div>
					<form method="POST" action="">
                        <div class="form-group">
							<label>Enter Password Length</label>
							<input class="form-control" id="length" name="length" type="number" min="6" max="32" required/>
						</div>
                        <div class="btn-list">
                            <button type="submit" name="generate" class="btn btn-success btn-lg btn-block">
                            Generate Password
                            </button>
                        </div>
					</form>
				</div>
                <!-- horizontal Basic Forms End -->

                <!-- Form grid Start -->
                <!-- Form grid End -->

                <!-- Input Validation Start -->
                <!-- Input Validation End -->
            </div>
            <?php

   
    if(isset($_POST['generate'])) {
        
        $length = $_POST['length'];

        // Generate a strong password
        $strongPassword = generateStrongPassword($length);

        // Display the generated password
        echo "<p>Generated Password= <strong>$strongPassword</strong></p>";
    }

    // Function to generate strong password
    function generateStrongPassword($length) {
        // Define character sets for different types of characters
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $symbols = '!@#$%^&*()-_=+{}[]|;:,.<>?';

        $allCharacters = $lowercase . $uppercase . $numbers . $symbols;

        // Shuffle the combined character set to ensure randomness
        $shuffledCharacters = str_shuffle($allCharacters);

        // Select random characters from the shuffled set to create the password
        $password = substr($shuffledCharacters, 0, $length);

        return $password;
    }

    ?>
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