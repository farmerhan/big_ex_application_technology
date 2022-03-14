<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {

    date_default_timezone_set('Asia/Ho_Chi_Minh');

?>

<div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <h1 class="page-header">Dashboard</h1>

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

    <div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

        <div class="panel panel-primary"><!-- panel panel-primary Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <div class="row"><!-- panel-heading row Starts -->

                    <div class="col-xs-3"><!-- col-xs-3 Starts -->

                        <i class="fa fa-tasks fa-5x"> </i>

                    </div><!-- col-xs-3 Ends -->

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                        <div class="huge"> <?php echo $count_products; ?> </div>

                        <div>Products</div>

                    </div><!-- col-xs-9 text-right Ends -->

                </div><!-- panel-heading row Ends -->

            </div><!-- panel-heading Ends -->

            <a href="index.php?view_products">

            <!-- SELECT * FROM `don_hang` WHERE MONTH(ngay_thanh_toan) = MONTH(NOW()); -->

            <div class="panel-footer"><!-- panel-footer Starts -->

                <span class="pull-left"> View Details </span>

                <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                <div class="clearfix"></div>

            </div><!-- panel-footer Ends -->

            </a>

        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-3 col-md-6 Ends -->

    <div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

        <div class="panel panel-success"><!-- panel panel-primary Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <div class="row"><!-- panel-heading row Starts -->

                    <div class="col-xs-3"><!-- col-xs-3 Starts -->

                        <i class="fa fa-tasks fa-5x"> </i>

                    </div><!-- col-xs-3 Ends -->

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->
                        <?php 
                            $query_get_solved_prod = "SELECT ma_dh FROM don_hang WHERE MONTH(ngay_thanh_toan)=MONTH(NOW()) AND trang_thai_don_hang='da_thanh_toan'";

                            $get_solved_prod = mysqli_query($con, $query_get_solved_prod);

                            $number_of_sprod = mysqli_num_rows($get_solved_prod);

                        ?>

                        <div class="huge"> <?php echo $number_of_sprod; ?> </div>

                        <div>Sold</div>

                    </div><!-- col-xs-9 text-right Ends -->

                </div><!-- panel-heading row Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-footer"><!-- panel-footer Starts -->

                <span class="pull-right" style="color: green;"> <b><?php echo getdate()['month']; ?></b> </span>

                <div class="clearfix"></div>

            </div><!-- panel-footer Ends -->

        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-3 col-md-6 Ends -->

    <div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

        <div class="panel panel-info"><!-- panel panel-primary Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <div class="row"><!-- panel-heading row Starts -->

                    <div class="col-xs-3"><!-- col-xs-3 Starts -->

                        <i class="fa fa-tasks fa-5x"> </i>

                    </div><!-- col-xs-3 Ends -->

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->
                        <?php 
                            $query_get_total = "SELECT SUM(tong_tien) AS TOTAL FROM don_hang WHERE MONTH(ngay_thanh_toan)=MONTH(NOW())";

                            $get_total = mysqli_query($con, $query_get_total);

                            $total = mysqli_fetch_array($get_total)['TOTAL'];

                        ?>

                        <div class="huge"> <?php echo $total; ?> </div>

                        <div>$$</div>

                    </div><!-- col-xs-9 text-right Ends -->

                </div><!-- panel-heading row Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-footer"><!-- panel-footer Starts -->

                <span class="pull-right text-info"> <b><?php echo getdate()['month']; ?></b> </span>

                <div class="clearfix"></div>

            </div><!-- panel-footer Ends -->

        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-3 col-md-6 Ends -->


</div><!-- 2 row Ends -->

<div class="row" ><!-- 3 row Starts -->

    <div class="col-lg-12" ><!-- col-lg-8 Starts -->

        <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" style="display: flex; justify-content: space-between;" ><!-- panel-title Starts -->

                    <span>
                        <i class="fa fa-money fa-fw" ></i> New Orders
                    </span>


                    <?php 
                        if(isset($_GET['get_detail_order'])) {
                    ?>
                        <a style="text-decoration: underline;" href="index.php?dashboard">Back To Dashboard</a>
                    <?php } ?>

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body" ><!-- panel-body Starts -->

                <div class="table-responsive" ><!-- table-responsive Starts -->


                    <?php if(!isset($_GET['get_detail_order'])) { ?>

                    <table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

                        <thead><!-- thead Starts -->

                            <tr>
                                <th>Order #</th>
                                <th>Customer Phone</th>
                                <th>Customer Addr</th>
                                <th>Invoice No</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Order Date</th>
                                <th>Control</th>
                            </tr>

                        </thead><!-- thead Ends -->

                        <tbody><!-- tbody Starts -->

                            <?php

                                $i = 0;

                                $get_order = "select * from don_hang order by ngay_dat_hang DESC LIMIT 0,5";
                                
                                $run_order = mysqli_query($con, $get_order);

                                while ($row_order = mysqli_fetch_array($run_order)) {

                                    $order_id = $row_order['ma_dh'];

                                    $c_id = $row_order['ma_khach_hang'];

                                    $order_status = $row_order['trang_thai_don_hang'];

                                    $order_amount = $row_order['tong_tien'];

                                    $order_date = $row_order['ngay_dat_hang'];

                                    $i++;

                                ?>

                            <tr>

                            <td><?php echo $i; ?></td>

                            <td>

                            <?php

                                    $get_customer = "select * from khach_hang where email='$c_id'";
                                    $run_customer = mysqli_query($con, $get_customer);
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    $customer_email = $row_customer['so_dt'];
                                    $customer_addr = $row_customer['dia_chi'];
                                    echo $customer_email;
                                    ?>
                            </td>

                            <td><?php echo $customer_addr; ?></td>

                            <td><?php echo $order_id; ?></td>

                            <?php
                                if ($order_status == 'chua_thanh_toan') {
                                    echo "<td style='color: red;'>Pending</td>";
                                } else if($order_status == 'dang_giao_hang'){
                                    echo "<td style='color: orange;'>Delivering</td>";
                                }else {
                                    echo "<td style='color: green;'>Complete</td>";
                                }
                            ?>

                            <td>$ <?php echo $order_amount; ?></td>

                            <td><?php echo $order_date; ?></td>

                            <td>
                                <a href="index.php?dashboard&get_detail_order=<?php echo $order_id ?>">View detail</a>
                            </td>

                            </tr>

                            <?php }?>

                        </tbody><!-- tbody Ends -->


                    </table><!-- table table-bordered table-hover table-striped Ends -->

                    <?php } else if(!empty($_GET['get_detail_order'])) { ?>
                        <table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

                            <thead><!-- thead Starts -->

                                <tr>
                                    <th>Detail Order #</th>
                                    <th>Invoice Number</th>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Amount</th>
                                </tr>

                            </thead><!-- thead Ends -->

                            <tbody><!-- tbody Starts -->

                                <?php

                                    $i = 0;

                                    $get_order = "select * from don_hang_san_pham where ma_dh={$_GET['get_detail_order']}";
                                    
                                    $run_order = mysqli_query($con, $get_order);

                                    while ($row_order = mysqli_fetch_array($run_order)) {

                                        $order_id = $row_order['ma_dh'];

                                        $order_amount = $row_order['thanh_tien'];

                                        $order_qty = $row_order['so_luong_sp'];

                                        $order_size = $row_order['kich_co'];

                                        $product_id = $row_order['ma_sp'];

                                        $get_products = "select * from do_the_thao where ma_sp=$product_id";

                                        $run_products = mysqli_query($con, $get_products);
                                
                                        $row_products = mysqli_fetch_array($run_products);

                                        $pro_image = $row_products['anh_chup'];

                                        $i++;

                                    ?>

                                <tr>

                                <td><?php echo $i; ?></td>

                                <td><?php echo $order_id; ?></td>

                                <?php 
                                    $query_get_prod = "SELECT * FROM do_the_thao WHERE ma_sp='$product_id'";

                                    $get_prod = mysqli_query($con, $query_get_prod);

                                    $prods = mysqli_fetch_array($get_prod);
                                ?>

                                <td><?php echo $prods['ten_sp']; ?></td>

                                <center><td><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"></td></center>

                                <td><?php echo $order_qty; ?></td>

                                <td><?php echo $order_size; ?></td>

                                <td>$ <?php echo $order_amount; ?></td>

                                </tr>

                                <?php } ?>

                            </tbody><!-- tbody Ends -->


                        </table><!-- table table-bordered table-hover table-striped Ends -->   
                        
                        <?php } ?>

                </div><!-- table-responsive Ends -->

            </div><!-- panel-body Ends -->

        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-8 Ends -->

    <div class="col-md-4"><!-- col-md-4 Starts -->

    <div class="panel"><!-- panel Starts -->

    </div><!-- panel Ends -->

    </div><!-- col-md-4 Ends -->

</div><!-- 3 row Ends -->

<?php }?>