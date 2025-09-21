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
                                <h4>Product History</h4>
                            </div>
                            <nav aria-label='breadcrumb' role='navigation'>
                                <ol class='breadcrumb'>
                                    <li class='breadcrumb-item'>
                                        <a href='dashboard.php'>Home</a>
                                    </li>
                                    <li class='breadcrumb-item active' aria-current='page'>
                                        Product History
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
                            <h4 class='text-blue h4'>Product History</h4>
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

                                <!-- <th style="text-align: center;">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = $_GET['id'];
include '_include/connect.php';
$i =1;
$query = mysqli_query( $con, "SELECT * FROM product_history WHERE prod_ids = '$id'");
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
                            </tr>
                            <?php
                            $i++;

}
    ?>

                            <?php
                            $id = $_GET['id'];
								include '_include/connect.php';
								$sql1 = "SELECT SUM(total) AS value_sum FROM product_history WHERE prod_ids = '$id'";
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

                                <th colspan="4"><a href="producthists.php" class="btn btn-primary btn-block">Back</a>
                                </th>
                                <tfooter>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Bordered table End -->
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


</html>