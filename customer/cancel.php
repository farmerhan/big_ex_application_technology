<?php

session_start();
include 'includes/db.php';

if(isset($_GET['order_id']) && isset($_SESSION['customer_email'])) {
    $query_get_cus_id = "SELECT * FROM khach_hang WHERE email='{$_SESSION['customer_email']}'";

    $get_cus_id = mysqli_query($con, $query_get_cus_id);

    $cus_id = mysqli_fetch_array($get_cus_id)['ma_kh'];

    $query_get_orders = "SELECT * FROM don_hang WHERE ma_dh={$_GET['order_id']} AND ma_khach_hang=$cus_id";

    $get_orders = mysqli_query($con, $query_get_orders);

    if(mysqli_num_rows($get_orders) == 0) {
        echo "<script>window.open('../checkout.php','_self')</script>";
    } else {
        $get_status_prod = "select trang_thai_don_hang from don_hang where ma_dh={$_GET['order_id']}";

        $data = mysqli_fetch_array(mysqli_query($con, $get_status_prod));
        
        if($data['trang_thai_don_hang'] == 'chua_thanh_toan') {

            $del_order = "delete from don_hang where ma_dh={$_GET['order_id']}";
    
            $is_del = mysqli_query($con, $del_order);

        }
        header("location: my_account.php?my_orders");
    }
    

} else {
    echo "<script>window.open('../checkout.php','_self')</script>";
}

?>
