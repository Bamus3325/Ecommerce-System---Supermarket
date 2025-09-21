<?php session_start(); ?>
<div class="header">
        <div class="header-left">
            <div class="menu-icon bi bi-list"></div>
            <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
            <div class="header-search">
                <form>
                    <div class="form-group mb-1">
                        <!-- <i class="dw dw-search2 search-icon"></i>
                        <input type="text" class="form-control search-input" placeholder="Search Here" /> -->
                        <h6>Design and Implementation of a Customer Relationship Management System<br>(A Case Study of Olatinwo Supermarket Offa)</h6>
                    </div>
                </form>
            </div>
        </div>
        <?php
        include '_include/connect.php';
        $u_email = $_SESSION['email'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$u_email'");
        $row = mysqli_fetch_array($query);
        ?>
        <div class="header-right">
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="vendors/images/photo1.jpg" alt="" />
                        </span>
                        <span class="user-name"><?php echo $row['lname'].' '.$row['fname']; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="settings.php"><i class="dw dw-user1"></i> Profile</a>
                        <a class="dropdown-item" href="logout.php"><i class="dw dw-logout"></i> Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>