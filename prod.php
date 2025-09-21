<!DOCTYPE html>
<html>

<?php include '_include/head.php';
?>

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
                                <h4>Product</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Available Product
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product-list">
                        <ul class="row">
                            <?php
include '_include/connect.php';
$query = mysqli_query( $con, 'SELECT * FROM products');
while ( $row = mysqli_fetch_array( $query ) ) {
    ?>
                            <li class="col-lg-4 col-md-6 col-sm-12">
                                <div class="product-box">
                                    <div class="producct-img">
                                        <img src="products/<?php echo $row['image'] ?>" alt=""
                                            style=" height: 400px; width: 100%;" />
                                    </div>
                                    <div class="product-caption">
                                        <h4><a href="#"><?php echo strtoupper($row['p_title']); ?></a></h4>
                                        <div style="display: flex; justify-content: center;">
                                            <div class="price"><ins>Price: </ins></div>
                                            <div class="price"><ins>&#x20A6;
                                                    <?php echo number_format($row['p_price']); ?></ins></div>
                                        </div>
                                        <div style="display: flex;">
                                            <div class="price"><ins>Total Sold: </ins></div>
                                            <div class="price"><ins><?php echo $row['t_sold']; ?></ins></div>&nbsp;&nbsp;&nbsp;
                                            <div class="price"><ins>Available: </ins></div>
                                            <div class="price"><ins>
                                                    <?php echo $row['t_prod']; ?></ins></div>
                                        </div>
                                        <div style="display: flex; justify-content: center;">
                                            <?php
                                            if ($row['t_prod'] == '0') {
                                                ?>
                                        <button class="btn btn-danger btn-block">Out of Stock</button>

                                                <?php
                                            }else {
                                                ?>
                                                <a href="prod_det.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary btn-block">View Product</a>
                                                <?php
                                            }
                                            ?>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                            </li>
                            <?php
}
?>





                        </ul>
                    </div>
                </div>
            </div>
            <?php include '_include/footer.php'; ?>
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