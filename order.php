<?php

session_start();
include "includes/db.php";
include "includes/header.php";
include "functions/functions.php";

?>

<?php

$select_cart = "select * from gio_hang where ma_khach_hang='{$_SESSION['customer_email']}'";

$get_addr_cus = "select dia_chi from khach_hang where email='{$_SESSION['customer_email']}'";

$addr_cus = mysqli_fetch_array(mysqli_query($con, $get_addr_cus))['dia_chi'];

$run_cart = mysqli_query($con, $select_cart);

// Trước khi thêm sản phẩm vào don_hang_san_pham thì thêm một bản ghi vào trong bảng đơn hàng trước

$insert_customer_order = "insert into don_hang (hinh_thuc_thanh_toan, ma_khach_hang, ngay_dat_hang, dia_chi_giao_hang) values ('truc_tiep','{$_SESSION['customer_email']}', NOW(), '$addr_cus')";

$run_customer_order = mysqli_query($con, $insert_customer_order);

$last_id_order = mysqli_insert_id($con);

// Biến tổng tiền cho đơn hàng
$total_orders_amount = 0;

// Lấy ra những  sản phẩm có trong giỏ hàng

while ($row_cart = mysqli_fetch_array($run_cart)) {

    $pro_id = $row_cart['ma_do_the_thao'];

    $pro_size = $row_cart['kich_thuoc'];

    $pro_qty = $row_cart['so_luong'];

    $sub_total = $row_cart['gia'] * $pro_qty;

    $total_orders_amount += $sub_total;

    $insert_customer_order = "insert into don_hang_san_pham (ma_dh, thanh_tien, so_luong_sp, kich_co, ma_sp) values ($last_id_order, $sub_total,$pro_qty,'$pro_size', $pro_id)";

    $run_customer_order = mysqli_query($con, $insert_customer_order);

    $delete_cart = "delete from gio_hang where ma_khach_hang='{$_SESSION['customer_email']}'";

    $run_delete = mysqli_query($con, $delete_cart);

    echo "<script>alert('Your order has been submitted,Thanks ')</script>";

    echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

}

$update_customer_order = "update don_hang set tong_tien=$total_orders_amount where ma_dh=$last_id_order";

mysqli_query($con, $update_customer_order);

?>
