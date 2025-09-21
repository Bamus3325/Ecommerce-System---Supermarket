<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <!-- <h2 style="text-align: center">CRM</h2> -->
            <img src="vendors/images/crm.png" style="margin:auto; display:block;" width="60px" height="60px">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="dashboard.php" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-house"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <?php
					if ($_SESSION['user_type'] == 0) {
						?>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                    <i class="micon icon-copy dw dw-add-file1"></i><span class="mtext">Users Mangement</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="add_user.php">Add User</a></li>
                        <li><a href="view_users.php">View Users</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-table"></span><span class="mtext">Products Mangement</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="add_prod.php">Add Product</a></li>
                        <li><a href="view_prod.php">View Products</a></li>
                    </ul>
                </li>

                <li>
                    <a href="producthists.php" class="dropdown-toggle no-arrow">
                        <!-- view_prod_his -->
                        
                        <span class="micon icon-copy ti-layout-grid3-alt"></span><span class="mtext">Products History</span>
                    </a>
                </li>
                <li>
                    <a href="adtable.php" class="dropdown-toggle no-arrow">
                    <i class="micon icon-copy ion-android-menu"></i><span class="mtext">Payment History</span>
                    </a>
                </li>
                <li>
                    <a href="rate.php" class="dropdown-toggle no-arrow">
                    <i class="micon icon-copy ion-ios-keypad"></i><span class="mtext">Ratings & Feedback</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="perm.php" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-table"></span><span class="mtext">Users Permisions</span>
                    </a>
                </li> -->

                <?php
					}else {
include '_include/connect.php';
$query1 = mysqli_query( $con, "SELECT * FROM product_details WHERE email = '{$_SESSION['email']}' AND status = '0'");
$count = mysqli_num_rows($query1);
if ($count < 1) {
	?>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon icon-copy ti-layout-accordion-merged"></span><span class="mtext">Products Mangement</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="prod.php">View Product</a></li>
                    </ul>
                </li>
                <?php
}else {
	?>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon icon-copy ti-layout-accordion-merged"></span><span class="mtext">Products Mangement</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="prod.php">View Product</a></li>
                        <li><a href="cart.php">View Carts</a></li>
                    </ul>
                </li>
                <?php
}
?>
                <li>
                    <a href="producthist.php" class="dropdown-toggle no-arrow">
                        <!-- view_prod_his -->
                        <i class="micon icon-copy dw dw-rows"></i><span class="mtext">Products History</span>
                    </a>
                </li>
                <li>
                    <a href="table.php" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-table"></span><span class="mtext">Payment History</span>
                    </a>
                </li>
                <?php
						
					}
						?>

                <li>
                    <a href="settings.php" class="dropdown-toggle no-arrow">
                        <i class="micon icon-copy dw dw-settings2"></i><span class="mtext">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php" class="dropdown-toggle no-arrow">
                        <i class="micon icon-copy dw dw-logout1"></i><span class="mtext">Logout</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>