<?php
include '_include/connect.php';
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                                <h4>Products History</h4>
                            </div>
                            <nav aria-label='breadcrumb' role='navigation'>
                                <ol class='breadcrumb'>
                                    <li class='breadcrumb-item'>
                                        <a href='dashboard.php'>Home</a>
                                    </li>
                                    <li class='breadcrumb-item active' aria-current='page'>
                                        Products History
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
                            <h4 class='text-blue h4'>Products History</h4>
                            <p>
                                List of Product History
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
                                <th scope='col'>Product ID</th>
                                <th scope='col'>Date</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>Fullname</th>
                                <th scope='col'>Amount Paid</th>


                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
include '_include/connect.php';
$i = 1;
$query = mysqli_query( $con, "SELECT * FROM payment" );
while ( $row = mysqli_fetch_array( $query ) ) {
$user =  $row['email'];
    $user_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$user'");
    $user_row = mysqli_fetch_assoc($user_query);
    ?>
                            <tr>
                                <th><?php echo $i;
    ?></th>
                                <td><?php echo $row[ 'prod_ids' ];
    ?></td>
                                <td><?php echo $row[ 'cdate' ];
    ?></td>
                                <td><?php echo $user_row[ 'email' ];
    ?></td>
                                <td><?php echo $user_row[ 'fname' ].' '.$user_row[ 'lname' ];
    ?></td>
                                <td>&#8358; <?php echo number_format($row[ 'total' ]);
    ?></td>


                                <td style="text-align: center;">
                                    <a onclick="return confirm('Do you want to view this Product(s)?');"
                                        href='view_prod_his.php?id=<?php echo $row['prod_ids']; ?>' type='button'
                                        class='btn btn-primary btn-sm'>
                                        <i class='material-icons'>View Products</i>
                                    </a>
                                    <a onclick="return confirm('Are You Sure You want to Delete This Product');"
                                        href='delproducthist.php?id=<?php echo $row['id']; ?>' type='button'
                                        class='btn btn-danger btn-sm'>
                                        <i class='material-icons'>Delete</i>
                                    </a>
                                </td>
                            </tr>

                            <?php
                            $i++;
}

?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Bordered table End -->

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
                                <label for="description">Feedback:</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '_include/footer.php';
?>
    </div>
    </div>
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