<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>

<?php

$query_get_cus_id = "SELECT * FROM khach_hang WHERE email='{$_SESSION['customer_email']}'";

$get_cus_id = mysqli_query($con, $query_get_cus_id);

$cus_id = mysqli_fetch_array($get_cus_id)['ma_kh'];

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $qty = $_POST['quantity'];

    if ($qty > 0) {
        $change_qty = "update gio_hang set so_luong='$qty' where ma_do_the_thao='$id' AND ma_khach_hang='$cus_id'";
        $run_qty = mysqli_query($con, $change_qty);
    } else {
        echo "<script>alert('Your order has been fail because invalid amount,Please enter again')</script>";
    }
}

?>