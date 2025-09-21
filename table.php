<?php
include '_include/connect.php';
?>
<!DOCTYPE html>
<html>

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
                                <h4>Payment History</h4>
                            </div>
                            <nav aria-label='breadcrumb' role='navigation'>
                                <ol class='breadcrumb'>
                                    <li class='breadcrumb-item'>
                                        <a href='dashboard.php'>Home</a>
                                    </li>
                                    <li class='breadcrumb-item active' aria-current='page'>
                                        Payment History
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
                            <h4 class='text-blue h4'>Payment History</h4>
                            <p>
                                List of Payment Made
                            </p>
                        </div>
                    </div>
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>S/N</th>
                                <!-- <th scope='col'>Customer Name</th> -->
                                <!-- <th scope='col'>Customer Email</th> -->
                                <!-- <th scope='col'>Customer Address</th> -->
                                <th scope='col'>Date</th>
                                <th scope='col'>Product ID</th>
                                <th scope='col'>Total Paid</th>

                                <th style="text-align: center;">Payment Method</th>
                                <th style="text-align: center;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
include '_include/connect.php';
$i = 1;
$query = mysqli_query( $con, "SELECT * FROM payment WHERE email = '{$_SESSION['email']}'");
while ( $row = mysqli_fetch_array( $query ) ) {
$user =  $row['email'];
    $user_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$user'");
    $user_row = mysqli_fetch_assoc($user_query);
    ?>
                            <tr>
                                <th><?php echo $row[ 'id' ];
    ?></th>
                                <td><?php echo $row[ 'cdate' ];
    ?></td>
                                <td><?php echo $row[ 'prod_ids' ];
    ?></td>
                                <td>&#8358; <?php echo number_format($row[ 'total' ]);
    ?>
                                <td>
                                    <?php echo $row[ 'channel' ];
    ?>
                                </td>
                                <td>
                                    <a href="" type='button' class='btn btn-success btn-sm'>
                                        <i class='material-icons'>Success</i>
                                    </a>
                                    <a onclick="return confirm('Do you want to print receipt for this product(s)?');"
                                        href='receipt.php?id=<?php echo $row['prod_ids']; ?>' type='button'
                                        class='btn btn-primary btn-sm'>
                                        <i class='material-icons'>Print Receipt</i>
                                    </a>
                                </td>
                            </tr>

                            <?php
}

?>
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