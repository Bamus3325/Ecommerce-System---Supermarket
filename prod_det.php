<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<?php include '_include/head.php';
?>
<style>
input[type=text].mee {
    border-style: none;
    font-size: 25px;
    font-weight: bold;
    background: none;
    text-transform: uppercase;
}

input[type=text].mee1 {
    border-style: none;
    font-size: 18px;
    font-weight: bold;
    background: none;
}

.star-rating {
    direction: rtl;
    display: inline-block;
    font-size: 2rem;
    unicode-bidi: bidi-override;
}

.star-rating input[type="radio"] {
    display: none;
}

.star-rating label {
    color: #ccc;
    cursor: pointer;
}

.star-rating label:hover,
.star-rating label:hover~label,
.star-rating input[type="radio"]:checked~label {
    color: #f5b301;
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

    <?php include '_include/header.php';
?>

    <?php include '_include/right-sidebar.php';
?>

    <?php include '_include/nav.php';
?>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Product Detail</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Product Detail
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <?php
$id = $_GET['id'];
include '_include/connect.php';
$query = mysqli_query( $con, "SELECT * FROM products WHERE id = '$id'" );
$row = mysqli_fetch_array($query);
$d = date('d-M-Y');
?>
                <form action="" method="POST" onkeyup="calc();">
                    <div class="product-wrap">
                        <div class="product-detail-wrap mb-30">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="product-slider slider-arrow">
                                        <div class="product-slide">
                                            <img src="products/<?php echo $row['image'] ?>"
                                                style=" height: 400px; width: 100%;" alt="" />
                                            <input type="hidden" value="<?php echo $row['image'] ?>" name="img">
                                            <input type="hidden" value="<?php echo $d; ?>" name="cdate">
                                            <input type="hidden" value="<?php echo $_SESSION['email']; ?>" name="email">
                                        </div>
                                        <!-- <div class="product-slide">
                                        <img src="vendors/images/product-img2.jpg" alt="" />
                                    </div>
                                    <div class="product-slide">
                                        <img src="vendors/images/product-img3.jpg" alt="" />
                                    </div>
                                    <div class="product-slide">
                                        <img src="vendors/images/product-img4.jpg" alt="" />
                                    </div> -->
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-md-6 col-6">
                                            <a href="#" data-id="<?php echo 1; ?>"
                                                class="btn btn-primary btn-block rate-link">Rate this Product</a>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <a href="#" class="btn btn-outline-primary btn-block">Give us Feedback</a>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="product-detail-desc pd-20 card-box height-100-p">
                                        <h4 class="mb-20 pt-20"><?php echo strtoupper($row['p_title']); ?></h4>
                                        <input type="hidden" class="form-control mee"
                                            value="<?php echo  $row['p_title']; ?>" name="p_title"
                                            style="background-color: none;" readonly>
                                        <p>
                                            <?php echo $row['p_desc'] ?>
                                        </p>
                                        <!-- <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p> -->
                                        <div class="price"><ins>
                                                <input type="text" class="mee1"
                                                    value="&#8358; <?php echo  number_format($row['p_price']); ?>"
                                                    readonly>
                                                <input type="hidden" value="<?php echo $row['p_price']; ?>"
                                                    name="p_price" id="price" readonly>
                                                <input type="hidden" name="total" id="total" readonly>

                                        </div>
                                        <div class="mx-w-150">
                                            <div class="form-group">
                                                <label class="text-blue">Enter Quantity</label>
                                                <input type="text" class="form-control" id="qty" name="qty" required/>
                                                <input type="hidden" class="form-control"
                                                    value="<?php echo $row['t_prod']; ?>" name="prod_qty" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-6">
                                                <input type="submit" name="submit" class="btn btn-primary btn-block"
                                                    value="Add To Cart" />
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <input type="submit" name="buy"
                                                    class="btn btn-outline-primary btn-block" value="Buy Now" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

include '_include/connect.php';

if(isset($_POST['buy'])){

	$cdate = mysqli_real_escape_string($con, $_POST['cdate']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$img = mysqli_real_escape_string($con, $_POST['img']);
	$p_title = mysqli_real_escape_string($con, $_POST['p_title']);
	$p_price = mysqli_real_escape_string($con, $_POST['p_price']);
	$total = mysqli_real_escape_string($con, $_POST['total']);
	$qty = mysqli_real_escape_string($con, $_POST['qty']);
	$prod_qty = mysqli_real_escape_string($con, $_POST['prod_qty']);
    
	if ($qty > $prod_qty) {
        echo "<script>alert('Product Quantity is not Available'); </script>";

    }else {

    
	$id = $_GET['id'];
   	$sql1 = "SELECT * FROM products WHERE id = '$id'";
   	$query1 = mysqli_query($con, $sql1);
   	$row1 = mysqli_fetch_array($query1);
	
	$t_prod = $row1['t_prod'];
	$t_sold = $row1['t_sold'];
	$tt = $t_prod - $qty;
	$ttt = intval($t_sold) + intval($qty);
	$sql2 = "UPDATE products SET t_prod = '$tt', t_sold = '$ttt' WHERE id = '$id'";
	$query2 = mysqli_query($con, $sql2);
    if ($query2 == TRUE) {
        $sql = "INSERT INTO product_details(cdate, email, img, p_title, p_price, qty, total) 
				VALUES('$cdate','$email','$img','$p_title','$p_price','$qty','$total')";
	$query = mysqli_query($con, $sql);

	if ($query == TRUE) {
		echo "<script> window.location='cart.php'; </script>";
	}else {
		echo "<script> window.location='prod.php'; </script>";

	}
    }else {
        echo "<script>alert('Product Not Updated'); </script>";
    }


        
    }
	
	
}



?>
<?php

include '_include/connect.php';

if(isset($_POST['submit'])){

	$cdate = mysqli_real_escape_string($con, $_POST['cdate']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$img = mysqli_real_escape_string($con, $_POST['img']);
	$p_title = mysqli_real_escape_string($con, $_POST['p_title']);
	$p_price = mysqli_real_escape_string($con, $_POST['p_price']);
	$total = mysqli_real_escape_string($con, $_POST['total']);
	$qty = mysqli_real_escape_string($con, $_POST['qty']);
	$prod_qty = mysqli_real_escape_string($con, $_POST['prod_qty']);
    
	if ($qty > $prod_qty) {
        echo "<script>alert('Product Quantity is not Available'); </script>";

    }else {

    
	$id = $_GET['id'];
   	$sql1 = "SELECT * FROM products WHERE id = '$id'";
   	$query1 = mysqli_query($con, $sql1);
   	$row1 = mysqli_fetch_array($query1);
	
	$t_prod = $row1['t_prod'];
	$t_sold = $row1['t_sold'];
	$tt = $t_prod - $qty;
	$ttt = intval($t_sold) + intval($qty);
	$sql2 = "UPDATE products SET t_prod = '$tt', t_sold = '$ttt' WHERE id = '$id'";
	$query2 = mysqli_query($con, $sql2);
    if ($query2 == TRUE) {
        $sql = "INSERT INTO product_details(cdate, email, img, p_title, p_price, qty, total) 
				VALUES('$cdate','$email','$img','$p_title','$p_price','$qty','$total')";
	$query = mysqli_query($con, $sql);

	if ($query == TRUE) {
		echo "<script>alert('Product Added to Cart Successful'); window.location='prod.php'; </script>";
	}else {
		echo "<script>alert('Product Not Added Successful'); window.location='prod.php'; </script>";

	}
    }else {
        echo "<script>alert('Product Not Updated'); </script>";
    }


        
    }
	
	
}



?>
                        <!-- <h4 class="mb-20">Recent Product</h4>
                    <div class="product-list">
                        <ul class="row">
                            <li class="col-lg-4 col-md-6 col-sm-12">
                                <div class="product-box">
                                    <div class="producct-img">
                                        <img src="vendors/images/product-img1.jpg" alt="" />
                                    </div>
                                    <div class="product-caption">
                                        <h4><a href="#">Gufram Bounce Black</a></h4>
                                        <div class="price"><del>$55.5</del><ins>$49.5</ins></div>
                                        <a href="#" class="btn btn-outline-primary">Read More</a>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-4 col-md-6 col-sm-12">
                                <div class="product-box">
                                    <div class="producct-img">
                                        <img src="vendors/images/product-img2.jpg" alt="" />
                                    </div>
                                    <div class="product-caption">
                                        <h4><a href="#">Gufram Bounce White</a></h4>
                                        <div class="price"><del>$75.5</del><ins>$50</ins></div>
                                        <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-4 col-md-6 col-sm-12">
                                <div class="product-box">
                                    <div class="producct-img">
                                        <img src="vendors/images/product-img3.jpg" alt="" />
                                    </div>
                                    <div class="product-caption">
                                        <h4><a href="#">Contrast Lace-Up Sneakers</a></h4>
                                        <div class="price">
                                            <ins>$80</ins>
                                        </div>
                                        <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> -->
                    </div>
                </form>
            </div>
            <?php include '_include/footer.php';
?>
        </div>
    </div>
    <!-- Rate Modal -->
    <div class="modal fade" id="rateModal" tabindex="-1" role="dialog" aria-labelledby="rateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rateModalLabel">Rate Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="rateForm" action="submit_rating.php" method="POST">
                        <input type="hidden" name="user_id" id="user_id">

                        <div class="form-group">
                            <label for="rating">Rate:</label>
                            <div class="star-rating">
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label for="star5" title="5 stars"><i class="fas fa-star"></i></label>

                                <input type="radio" id="star4" name="rating" value="4" />
                                <label for="star4" title="4 stars"><i class="fas fa-star"></i></label>

                                <input type="radio" id="star3" name="rating" value="3" />
                                <label for="star3" title="3 stars"><i class="fas fa-star"></i></label>

                                <input type="radio" id="star2" name="rating" value="2" />
                                <label for="star2" title="2 stars"><i class="fas fa-star"></i></label>

                                <input type="radio" id="star1" name="rating" value="1" />
                                <label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    function calc() {
        var price = document.getElementById('price');
        var qty = document.getElementById('qty');
        var tota = document.getElementById('total');


        tota.value = price.value * qty.value;
        document.getElementById('total').innerHTML = tota;


    }
    </script>
    <script>
    $(document).ready(function() {
        $('.rate-link').click(function(e) {
            e.preventDefault();

            var userId = $(this).data('id');
            $('#user_id').val(userId);

            $('#rateModal').modal('show');
        });
    });
    </script>
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <!-- Slick Slider js -->
    <script src="src/plugins/slick/slick.min.js"></script>
    <!-- bootstrap-touchspin js -->
    <script src="src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>