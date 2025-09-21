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
                                <h4>Edit Product</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Edit Product
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
$query = mysqli_query( $con, "SELECT * FROM products WHERE id = '$id'" );
$row = mysqli_fetch_array($query);

if(isset($_POST['submit'])){

	$c_date = mysqli_real_escape_string($con, $_POST['c_date']);
	$p_title = mysqli_real_escape_string($con, $_POST['p_title']);
	$p_price = mysqli_real_escape_string($con, $_POST['p_price']);
	$p_desc = mysqli_real_escape_string($con, $_POST['p_desc']);
	$t_prod = mysqli_real_escape_string($con, $_POST['t_prod']);

	// $rand = rand(1000000000,9999999999);
	// $imagename = $_FILES['image']['name'];
	// $imagesync = $_FILES['image']['tmp_name'];
	// $imagetype = $_FILES['image']['type'];
	// $targetdir = "products/";
	// $img = $rand.'_'.$imagename;
	// $extension = pathinfo($imagename, PATHINFO_EXTENSION);

// if (!in_array($extension, ['jpg','jpeg','png','JPG','JPEG','PNG'])){
//    ?>
  <!-- <div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
   The File Uploaded is Not jpg, jpeg, png Format 
  </div> -->
  <?php
// }else{

// if (move_uploaded_file($imagesync,$targetdir.$img)){ 
	
	
	$sql = "UPDATE products SET cdate = '$c_date', p_title = '$p_title', p_price = '$p_price', p_desc = '$p_desc', t_prod = '$t_prod' WHERE id = '$id'";
	$query = mysqli_query($con, $sql);

	if ($query == TRUE) {
		echo "<script>alert('Product Updated Successful'); window.location='view_prod.php'; </script>";
	}else {
		echo "<script>alert('Product Not Updated Successful'); window.location='view_prod.php'; </script>";

	}
}
// }

// }


?>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Edit Product</h4>
                            <p class="mb-30">All Fields Must be Filled</p>
                        </div>
                    </div>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <?php
						$d = date('d-M-Y');
						?>
                        <div class="form-group row">

                            <label class="col-sm-12 col-md-2 col-form-label">Date</label>
                            <div class="col-sm-12 col-md-10">
                                <input type="text" class="form-control" name="c_date" value="<?php echo $row['cdate']; ?>"
                                    readonly>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Product
                                Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="p_title" type="text" value="<?php echo $row['p_title']; ?>" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Price
                            </label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="p_price" type="text" value="<?php echo $row['p_price']; ?>" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea class="form-control" name="p_desc"> <?php echo $row['p_desc']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Total
                                Number of Products</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="t_prod" type="text" value="<?php echo $row['t_prod']; ?>" required />
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Product
                                Images</label>
                            <div class="col-sm-12 col-md-10">
                                <input type="file" id="fileinput" class="form-control" name="image" required />
                                <img src="#" id="preview" alt="selected image"
                                    style="display:none; width:200px; height:100px;"><br>
                            </div>
                        </div> -->
                        <div class="form-group row">

                            <div class="col-sm-12 col-md-12">

                                <div class="btn-list">
                                    <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">
                                        Update Product
                                    </button>
                                </div>
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
    <script type="text/javascript">
    document.getElementById('fileinput').addEventListener('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('preview').setAttribute('src', event.target.result);
                document.getElementById('preview').style.display = 'block';

            };
            reader.readAsDataURL(file);
        }

    });
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