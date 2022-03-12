<?php

session_start();
include "includes/db.php";
include "includes/header.php";
include "functions/functions.php";

?>

<?php

$query_get_cus_id = "SELECT * FROM khach_hang WHERE email='{$_SESSION['customer_email']}'";

$get_cus_id = mysqli_query($con, $query_get_cus_id);

$cus_id = mysqli_fetch_array($get_cus_id)['ma_kh'];

$select_cart = "select * from gio_hang where ma_khach_hang='$cus_id'";

$run_cart = mysqli_query($con, $select_cart);

while ($row_cart = mysqli_fetch_array($run_cart)) {

    $pro_id = $row_cart['ma_do_the_thao'];

    $pro_size = $row_cart['kich_thuoc'];

    $pro_qty = $row_cart['so_luong'];

    $sub_total = $row_cart['gia'] * $pro_qty;

    $insert_customer_order = "insert into don_hang (tong_tien, so_luong_sp, hinh_thuc_thanh_toan, ma_khach_hang, kich_co, ngay_dat_hang, ma_sp) values ($sub_total,$pro_qty,'truc_tiep',$cus_id,'$pro_size', NOW(), $pro_id)";

    $run_customer_order = mysqli_query($con, $insert_customer_order);

    $delete_cart = "delete from gio_hang where ma_khach_hang='$cus_id'";

    $run_delete = mysqli_query($con, $delete_cart);

    echo "<script>alert('Your order has been submitted,Thanks ')</script>";

    echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

    echo $insert_customer_order;
}

?>
