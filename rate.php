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
                                <h4>Ratings & Feebacks</h4>
                            </div>
                            <nav aria-label='breadcrumb' role='navigation'>
                                <ol class='breadcrumb'>
                                    <li class='breadcrumb-item'>
                                        <a href='dashboard.php'>Home</a>
                                    </li>
                                    <li class='breadcrumb-item active' aria-current='page'>
                                    Ratings & Feebacks
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
                            <h4 class='text-blue h4'>Ratings & Feebacks</h4>
                            <p>
                                List of all Customer Ratings
                            </p>
                        </div>
                    </div>
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>S/N</th>
                                <th scope='col'>Date </th>
                                <th scope='col'>User ID</th>
                                <th scope='col'>Total Star Rate</th>
                                <th scope='col'>Feebacks</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
include '_include/connect.php';
$query = mysqli_query( $con, 'SELECT * FROM rate' );
while ( $row = mysqli_fetch_array( $query ) ) {
    ?>
                            <tr>
                                <th><?php echo $row[ 'id' ];
    ?></th>
                                <td><?php echo $row[ 'cdate' ];
    ?></td>
                                <td><?php echo $row[ 'email' ];
    ?></td>
                                <td><?php echo $row[ 'rating' ];
    ?>
                                <td>
                                <?php echo $row[ 'description' ];
    ?>
                                </td>
                                <td>
                                    <a onclick="return confirm('Do you want to view this product');" href='view_prod_his.php?id=<?php echo $row['prod_id']; ?>'
                                        type='button' class='btn btn-primary btn-sm'>
                                        <i class='material-icons'>View Product</i>
                                    </a>
                                    <!-- <a onclick="return confirm('Are You Sure You want to Delete This user');" href='deleteuser.php?id=<?php echo $row['id']; ?>'
                                        type='button' class='btn btn-danger btn-sm'>
                                        <i class='material-icons'>Delete</i>
                                    </a> -->
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