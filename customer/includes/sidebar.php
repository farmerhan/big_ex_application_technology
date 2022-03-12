<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<?php

    $customer_session = $_SESSION['customer_email'];

    $get_customer = "select * from khach_hang where email='$customer_session'";

    $run_customer = mysqli_query($con,$get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $customer_name = $row_customer['ten_kh'];

    if(!isset($_SESSION['customer_email'])){
    }
    else {

        echo "

        <center>

            <img src='customer_images/user-icn-min.png' class='img-responsive'>

        </center>

        <br>

        <h3 align='center' class='panel-title'> Name : $customer_name </h3>

        ";

    }

?>

</div><!-- panel-heading Ends -->

    <div class="panel-body"><!-- panel-body Starts -->

        <ul class="nav nav-pills nav-stacked"><!-- nav nav-pills nav-stacked Starts -->

            <li class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">

                <a href="my_account.php?my_orders"> <i class="fa fa-list"> </i> My Orders </a>

            </li>

            <li>

                <a href="logout.php"> <i class="fa fa-sign-out"></i> Logout </a>

            </li>

        </ul><!-- nav nav-pills nav-stacked Ends -->

    </div><!-- panel-body Ends -->

</div><!-- panel panel-default sidebar-menu Ends -->