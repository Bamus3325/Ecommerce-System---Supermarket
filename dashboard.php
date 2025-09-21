<!DOCTYPE html>
<html>

<?php include '_include/head.php'; ?>



    <?php include '_include/header.php'; ?>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                <div class="sidebar-radio-group pb-10 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-1" checked="" />
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-2" />
                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-3" />
                        <label class="custom-control-label" for="sidebaricon-3"><i
                                class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-1" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-1"><i
                                class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-2" />
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                                aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-3" />
                        <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-4" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-4"><i
                                class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-5" />
                        <label class="custom-control-label" for="sidebariconlist-5"><i
                                class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-6" />
                        <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">
                        Reset Settings
                    </button>
                </div>
            </div>
        </div>
    </div>

    <?php include '_include/nav.php'; ?>
    <div class="mobile-menu-overlay"></div>
    <?php
        include '_include/connect.php';
        $u_email = $_SESSION['email'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$u_email'");
        $row = mysqli_fetch_array($query);
        ?>
    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img src="vendors/images/banner-img.png" alt="" />
                    </div>
                    <div class="col-md-8">
                        <h4 class="font-20 weight-500 mb-10 text-capitalize">
                            Welcome back
                            <div class="weight-600 font-30 text-blue"><?php echo $row['lname'].' '.$row['fname']; ?></div>
                        </h4>
                        <p class="font-18 max-width-600">
                        A Customer Relationship Management (CRM) system is a strategic tool designed to manage and enhance a company's interactions with current and potential customers. 
                        The core purpose of a CRM system is to streamline processes, 
                        improve communication, and foster stronger relationships with clients.
                        </p>
                        <!-- <p class="font-18 max-width-600">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde
                            hic non repellendus debitis iure, doloremque assumenda. Autem
                            modi, corrupti, nobis ea iure fugiat, veniam non quaerat
                            mollitia animi error corporis.
                        </p> -->
                    </div>
                </div>
            </div>
            <?php
        include '_include/connect.php';
        $u_email = $_SESSION['email'];
        $query1 = mysqli_query($con, "SELECT * FROM users");
        $query2 = mysqli_query($con, "SELECT * FROM products");
        $query4 = mysqli_query($con, "SELECT * FROM rate");
        $query3 = mysqli_query($con, "SELECT * FROM product_details WHERE email = '$u_email' and status = '1'");
		$t_user = mysqli_num_rows($query1);
		$t_info = mysqli_num_rows($query2);
		$to_info = mysqli_num_rows($query3);
		$rate = mysqli_num_rows($query4);
        $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$u_email'");
        $row = mysqli_fetch_array($query);
        $t_user = mysqli_num_rows($query1);
        ?>

            <div class="row pb-10">
                <?php
					if ($_SESSION['user_type'] == 0) {
						?>

                <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark"><?php echo $t_info; ?></div>
                                <div class="font-14 text-secondary weight-500">
                                    Total Products
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#00eccf">
                                    <i class="icon-copy fa fa-list-alt" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark"><?php echo $t_user; ?></div>
                                <div class="font-14 text-secondary weight-500">
                                    Total Users
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#ff5b5b">
                                    <i class="icon-copy fa fa-group" aria-hidden="true"></i>
                                    <!-- <span class="icon-copy ti-heart"></span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-600 font-20 text-dark"><?php echo $rate; ?></div>
                                <div class="font-14 text-secondary weight-500">
                                    Total Feedback
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon">
                                    <i class="icon-copy fa fa-spinner fa-spin" aria-hidden="true"></i>
                                    <!-- <i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
					}else {
						?>
                <div class="col-xl-6 col-lg-6 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark"><?php echo $to_info; ?></div>
                                <div class="font-14 text-secondary weight-500">
                                    Total Products
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#00eccf">
                                    <i class="icon-copy fa fa-list-alt" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark"><?php echo $row['l_active']; ?></div>
                                <div class="font-14 text-secondary weight-500">
                                    Last Active
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon">
                                    <i class="icon-copy fa fa-spinner fa-spin" aria-hidden="true"></i>
                                    <!-- <i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
					}
						?>

                <!-- <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">$50,000</div>
								<div class="font-14 text-secondary weight-500">Earning</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06">
									<i class="icon-copy fa fa-money" aria-hidden="true"></i>
								</div>
							</div>
						</div>
					</div>
				</div> -->
            </div>
            <?php
            if ($_SESSION['user_type'] == 0) {
                ?>
            <div class="card-box mb-30">
                <h2 class="h4 pd-20">Available Products</h2>
                <table class="table nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">S/N</th>
                            <th scope='col'>Date </th>
                            <th scope='col'>Product Image</th>
                            <th scope='col'>Product Name</th>
                            <th scope='col'>Product Price</th>
                            <th scope='col'>Total Product</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '_include/connect.php';
                         $i =1;
                        $query = mysqli_query( $con, "SELECT * FROM products ORDER BY ID DESC LIMIT 4");
                        while ( $row = mysqli_fetch_array( $query ) ) {
                            ?>
                        <tr>
                            <td class="table-plus">
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <h5 class="font-16"><?php echo $row['cdate'] ?></h5>

                            </td>
                            <td><img src="products/<?php echo $row['image'] ?>" style="height:70px; width:100px;" /></td>
                            <td><?php echo $row['p_title'] ?></td>
                            <td>&#8358; <?php echo number_format($row['p_price']); ?></td>
                            <td><?php echo $row['t_prod'] ?></td>
                        </tr>
                        <?php
                        $i++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <?php
            }else {
                ?>
            <div class="card-box mb-30">
                <h2 class="h4 pd-20">Recently Bought Products</h2>
                <table class="table nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">S/N</th>
                            <th scope='col'>Date </th>
                            <th scope='col'>Product Image</th>
                            <th scope='col'>Product Name</th>
                            <th scope='col'>Product Price</th>
                            <th scope='col'>Product Quantity</th>
                            <th scope='col'>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '_include/connect.php';
                         $i =1;
                        $query = mysqli_query( $con, "SELECT * FROM product_details WHERE email = '{$_SESSION['email']}' AND status = '1' ORDER BY ID DESC LIMIT 4");
                        while ( $row = mysqli_fetch_array( $query ) ) {
                            ?>
                        <tr>
                            <td class="table-plus">
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <h5 class="font-16"><?php echo $row['cdate'] ?></h5>

                            </td>
                            <td><img src="products/<?php echo $row['img'] ?>" style="height:70px; width:100px;" /></td>
                            <td><?php echo $row['p_title'] ?></td>
                            <td>&#8358; <?php echo number_format($row['p_price']); ?></td>
                            <td><?php echo $row['qty'] ?></td>
                            <td>&#8358; <?php echo number_format($row['total']); ?></td>
                        </tr>
                        <?php
                        $i++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <?php
            }
            ?>

            <?php include '_include/footer.php'; ?>
        </div>
    </div>
    <!-- welcome modal start -->
    <!-- welcome modal end -->
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <script src="src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="vendors/scripts/dashboard.js"></script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>
<?php
if ($_SESSION['user_type'] != 0) {
?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
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
</script>
<!--End of Tawk.to Script-->
<?php
}
?>