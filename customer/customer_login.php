<div class="box">
    <!-- box Starts -->

    <div class="box-header">
        <!-- box-header Starts -->

        <center>

            <h1>Đăng nhập tài khoản</h1>

        </center>

    </div><!-- box-header Ends -->
    <form action="checkout.php" method="post">
        <!--form Starts -->
        <div class="form-group form-signin">
            <!-- form-group Starts -->

            <label>Email: </label>

            <input type="text" class="form-control" name="c_email" required>

        </div><!-- form-group Ends -->

        <div class="form-group form-signin">
            <!-- form-group Starts -->

            <label>Mật khẩu: </label>

            <input type="password" class="form-control" name="c_pass" required>

        </div><!-- form-group Ends -->
        <div class="text-center">
            <!-- text-center Starts -->

            <button name="login" value="Login" class="btn btn-primary">

                <i class="fa fa-sign-in"></i> Đăng nhập


            </button>

        </div><!-- text-center Ends -->


    </form>
    <!--form Ends -->

    <center>
        <!-- center Starts -->
        <h3>Chưa có tài khoản? <span><a href="customer_register.php">Đăng kí ở đây</a></span></h3>

    </center><!-- center Ends -->


</div><!-- box Ends -->

<?php

if (isset($_POST['login'])) {

    $customer_email = $_POST['c_email'];

    $customer_pass = $_POST['c_pass'];

    $select_customer = "select * from tai_khoan where email='$customer_email' AND mat_khau='$customer_pass'";

    $result = mysqli_query($con, $select_customer);  

    if (mysqli_num_rows($result) == 0) {

        echo "<script>alert('Bạn nhập sai email hoặc mật khẩu')</script>";
        exit();

    } else {

        $_SESSION['customer_email'] = $customer_email;

        echo "<script>alert('Bạn đã đăng nhập thành công')</script>";

        echo "<script>window.open('./index.php','_self')</script>";
    }
}

?>