<?php

session_start();
include 'includes/db.php';

if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
} else {

    include "includes/db.php";

    if (isset($_GET['order_id'])) {
        $get_status_prod = "select order_status from customer_orders where order_id={$_GET['order_id']}";

        $data = mysqli_fetch_array(mysqli_query($con, $get_status_prod));
        
        if($data['order_status'] == 'pending') {
            $del_order = "delete from customer_orders where order_id={$_GET['order_id']}";
    
            $is_del = mysqli_query($con, $del_order);
        }
        echo "<script>window.open('my_account.php?my_orders')</script>";
    }
}
