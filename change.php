<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>

<?php

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $qty = $_POST['quantity'];

    if ($qty > 0) {
        $change_qty = "update gio_hang set so_luong='$qty' where ma_do_the_thao='$id' AND ma_khach_hang='{$_SESSION['customer_email']}'";
        $run_qty = mysqli_query($con, $change_qty);
    } else {
        echo "<script>alert('Your order has been fail because invalid amount,Please enter again')</script>";
    }
}

?>