<?php

session_start();

include "includes/db.php";

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    ?>

<?php

    $admin_session = $_SESSION['admin_email'];

    $get_admin = "select * from nguoi_quan_tri where email='$admin_session'";

    $run_admin = mysqli_query($con, $get_admin);

    $row_admin = mysqli_fetch_array($run_admin);

    // $admin_id = $row_admin['admin_id'];

    // $admin_name = $row_admin['admin_name'];

    // $admin_email = $row_admin['admin_email'];

    // $admin_image = $row_admin['admin_image'];

    // $admin_country = $row_admin['admin_country'];

    // $admin_job = $row_admin['admin_job'];

    // $admin_contact = $row_admin['admin_contact'];

    // $admin_about = $row_admin['admin_about'];

    $get_products = "SELECT * FROM do_the_thao";
    $run_products = mysqli_query($con, $get_products);
    $count_products = mysqli_num_rows($run_products);

    // $get_customers = "SELECT * FROM customers";
    // $run_customers = mysqli_query($con, $get_customers);
    // $count_customers = mysqli_num_rows($run_customers);

    // $get_p_categories = "SELECT * FROM product_categories";
    // $run_p_categories = mysqli_query($con, $get_p_categories);
    // $count_p_categories = mysqli_num_rows($run_p_categories);

    // $get_total_orders = "SELECT * FROM customer_orders";
    // $run_total_orders = mysqli_query($con, $get_total_orders);
    // $count_total_orders = mysqli_num_rows($run_total_orders);

    // $get_pending_orders = "SELECT * FROM customer_orders WHERE order_status='pending'";
    // $run_pending_orders = mysqli_query($con, $get_pending_orders);
    // $count_pending_orders = mysqli_num_rows($run_pending_orders);

    // $get_completed_orders = "SELECT * FROM customer_orders WHERE order_status='Complete'";
    // $run_completed_orders = mysqli_query($con, $get_completed_orders);
    // $count_completed_orders = mysqli_num_rows($run_completed_orders);

    // $get_total_earnings = "SELECT SUM( due_amount) as Total FROM customer_orders WHERE order_status = 'Complete'";
    // $run_total_earnings = mysqli_query($con, $get_total_earnings);
    // $row = mysqli_fetch_assoc($run_total_earnings);
    // $count_total_earnings = $row['Total'];

    ?>


<!DOCTYPE html>
<html>

<head>

<title>Admin Panel</title>

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" >
<link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/2484/9148/files/SDQSDSQ_32x32.png?v=1511436147" type="image/png">

</head>

<body>

<div id="wrapper"><!-- wrapper Starts -->

<?php include "includes/sidebar.php";?>

<div id="page-wrapper"><!-- page-wrapper Starts -->

<div class="container-fluid"><!-- container-fluid Starts -->

<?php

    if (isset($_GET['dashboard'])) {

        include "dashboard.php";

    }

    if (isset($_GET['insert_product'])) {

        include "insert_product.php";

    }

    if (isset($_GET['view_products'])) {

        include "view_products.php";

    }

    if (isset($_GET['delete_product'])) {

        include "delete_product.php";

    }

    if (isset($_GET['edit_product'])) {

        include "edit_product.php";

    }

    if (isset($_GET['view_orders'])) {

        include "view_orders.php";

    }

    ?>

</div><!-- container-fluid Ends -->

</div><!-- page-wrapper Ends -->

</div><!-- wrapper Ends -->

<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>


</body>


</html>

<?php }?>