<?php
include '_include/connect.php';
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<?php include '_include/head.php';
?>
<script type='text/javascript' src='jquery.js'>
</script>
<style>
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
    <!-- <div class = 'pre-loader'>
<div class = 'pre-loader-box'>
<div class = 'loader-logo'>
<img src = 'vendors/images/deskapp-logo.svg' alt = '' />
</div>
<div class = 'loader-progress' id = 'progress_div'>
<div class = 'bar' id = 'bar1'></div>
</div>
<div class = 'percent' id = 'percent1'>0%</div>
<div class = 'loading-text'>Loading...</div>
</div>
</div> -->

    <?php include '_include/header.php';
?>

    <?php include '_include/right-sidebar.php';
?>

    <?php include '_include/nav.php';
?>
    <div class='mobile-menu-overlay'></div>

    <div class='main-container'>
        <div class='pd-ltr-20 xs-pd-20-10'>
            <div class='min-height-200px'>
                <div class='page-header'>
                    <div class='row'>
                        <div class='col-md-6 col-sm-12'>
                            <div class='title'>
                                <h4>View Carts</h4>
                            </div>
                            <nav aria-label='breadcrumb' role='navigation'>
                                <ol class='breadcrumb'>
                                    <li class='breadcrumb-item'>
                                        <a href='dashboard.php'>Home</a>
                                    </li>
                                    <li class='breadcrumb-item active' aria-current='page'>
                                        View Carts
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class='col-md-6 col-sm-12 text-right'>
                            <div class='dropdown'>
                                <a class='btn btn-primary dropdown-toggle' href='#' role='button'
                                    data-toggle='dropdown'>
                                    <?php echo date('M  Y'); ?> 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bordered table  start -->
                <div class='pd-20 card-box mb-30'>
                    <div class='clearfix mb-20'>
                        <div class='pull-left'>
                            <h4 class='text-blue h4'>View Carts</h4>
                            <p>
                                List of Products
                            </p>
                        </div>
                    </div>
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>S/N</th>
                                <th scope='col'>Date</th>
                                <th scope='col'>Product Image</th>
                                <th scope='col'>Product Name</th>
                                <th scope='col'>Product Quantity</th>
                                <th scope='col'>Product Price</th>
                                <th scope='col'>Price</th>
                                <th scope='col'>Action</th>

                                <!-- <th style="text-align: center;">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
include '_include/connect.php';
$i =1;
$query = mysqli_query( $con, "SELECT * FROM product_details WHERE email = '{$_SESSION['email']}' AND status = '0'");
while ( $row = mysqli_fetch_array( $query ) ) {
    ?>
                            <tr>
                                <th><?php echo $i; ?></th>
                                <td><?php echo $row['cdate']; ?></td>
                                <td><img src="products/<?php echo $row['img']; ?>" style="height: 60px; width: 80px;" />
                                </td>
                                <td><?php echo $row['p_title']; ?></td>
                                <td><?php echo $row['qty']; ?></td>
                                <td>&#8358; <?php echo number_format($row['p_price']); ?></td>
                                <td>&#8358; <?php echo number_format($row['total']); ?></td>
                                <td>
                                    <a onclick="return confirm('Are You Sure You want to Delete This Product');"
                                        href='deleteprodetails.php?id=<?php echo $row['id']; ?>' type='button'
                                        class='btn btn-danger btn-sm'>
                                        <i class='material-icons'>Delete</i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            $i++;

}
    ?>

                            <?php
								include '_include/connect.php';
								$sql1 = "SELECT SUM(total) AS value_sum FROM product_details WHERE email= '{$_SESSION['email']}' and status = '0'";
								$query1 = mysqli_query($con, $sql1);
								$row1 = mysqli_fetch_array($query1);
                                $rand = rand(1000,9999);
                                $d= date('Y');
                                $prod_ids = $d.$rand;
								?>
                            <tfooter>
                                <th colspan="4">
                                    <h4>Grand Total Price: &#8358;
                                        <?php echo number_format($row1['value_sum']); ?><input type="hidden" id="total"
                                            value="<?php echo $row1['value_sum']; ?>" /></h4>
                                </th>
                                <input type="hidden" value="<?php echo $prod_ids; ?>" id="prod_ids" name="prod_ids">
                                <script src="https://js.paystack.co/v1/inline.js"></script>
                                <!-- <button type="submit" name="submit" onclick="payWithPaystack()"
                                        class="book-now-btn">Book Now</button> -->
                                <th colspan="4"><button class="btn btn-success btn-block"
                                        onclick="payWithPaystack()">Proceed to Make Payment</buuton>
                                </th>
                                <tfooter>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Bordered table End -->
    </div>
    <!-- Rate Modal -->
    <div class="modal fade" id="rateModal" tabindex="-1" role="dialog" aria-labelledby="rateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rateModalLabel">Rate User</h5>
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

    <?php include '_include/footer.php';
?>
    </div>
    </div>
    <!-- js -->
    <script src='vendors/scripts/core.js'></script>
    <script src='vendors/scripts/script.min.js'></script>
    <script src='vendors/scripts/process.js'></script>
    <script src='vendors/scripts/layout-settings.js'></script>
    <!-- Google Tag Manager ( noscript ) -->
    <noscript><iframe src='https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS' height='0' width='0'
            style='display: none; visibility: hidden'></iframe></noscript>
    <!-- End Google Tag Manager ( noscript ) -->
</body>
<script>
function payWithPaystack() {
    var prod_ids = document.getElementById("prod_ids").value;
    var total = document.getElementById("total").value;
    // var n_sit = document.getElementById("n_sit").value;
    // var cdate = document.getElementById("cdate").value;
    // var total = document.getElementById("total").value;
    // var track_id = document.getElementById("track_id").value;

    var handler = PaystackPop.setup({
        key: 'pk_test_b04fbb7505efdf5918fcc2e3ff69c3614feb4503', // pk_live_7d28b77f409c1d36b942dd67b3f302ffe34772a9
        //   $use = $_SESSION['email'];
        email: '<?php echo $_SESSION['email']; ?>',
        amount: document.getElementById("total").value * 100,
        currency: "NGN",
        ref: 'MY' + Math.floor((Math.random() * 1000000000) +
        1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

        callback: function(response) {
            let message = 'Payment Completed! ref is ' + response.reference;
            // alert(message);
            window.location = 'verify_transaction.php?reference=' + response.reference + '&total=' + total + '&prod_ids=' + prod_ids;
            //document.write('<?php // include 'connect.php'; $conn->query("UPDATE student SET payment = 1 WHERE email='$email'") or die(mysqli_error($conn)); ?>');
        },
        onClose: function() {
            document.write(
                '<?php  //include 'admin/connect.php'; $con->query("INSERT INTO booking_hist(cdate, email, location, track_id, price, no_sit, t_price, amount_p,) 
                        //VALUES('$cdate','$email','$n_locat','$track_id','$price','$n_sit','$total','$amount')") or die(mysqli_error($conn)); ?>'
                );
            alert('window closed');

        }
    });
    handler.openIframe();
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
<!--Start of Tawk.to Script-->
<!-- <script type="text/javascript">
var Tawk_API = Tawk_API || {},
    Tawk_LoadStart = new Date();
(function() {
    var s1 = document.createElement("script"),
        s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/66cc6b7eea492f34bc0a31cf/1i6787s5m';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
})();
</script> -->
<!--End of Tawk.to Script-->

</html>