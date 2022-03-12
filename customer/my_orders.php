<center>
    <!-- center Starts -->

    <h1>My Orders</h1>

    <p class="lead"> Your orders on one place.</p>

    <p class="text-muted">
        If you have any questions, please feel free to contact us our customer service center is working for you 24/7.
    </p>

</center><!-- center Ends -->

<hr>

<div class="table-responsive">
    <!-- table-responsive Starts -->

    <table class="table table-bordered table-hover">
        <!-- table table-bordered table-hover Starts -->

        <thead>
            <!-- thead Starts -->

            <tr>
                <th>#</th>
                <th>Amount</th>
                <th>Qty</th>
                <th>Size</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

        </thead><!-- thead Ends -->

        <tbody>
            <!--- tbody Starts --->

            <?php

            $customer_email = $_SESSION['customer_email'];

            $get_customer = "select * from khach_hang where email='$customer_email'";

            $run_customer = mysqli_query($con, $get_customer);

            $row_customer = mysqli_fetch_array($run_customer);

            $customer_id = $row_customer['ma_kh'];

            $get_orders = "select * from don_hang where ma_khach_hang='$customer_id'";

            $run_orders = mysqli_query($con, $get_orders);

            $i = 0;

            while ($row_orders = mysqli_fetch_array($run_orders)) {

                $order_id = $row_orders['ma_dh'];

                $due_amount = $row_orders['tong_tien'];

                $qty = $row_orders['so_luong_sp'];

                $order_date = substr($row_orders['ngay_dat_hang'], 0, 11);

                $size = $row_orders['kich_co'];

                $order_status = $row_orders['trang_thai_don_hang'];

                $i++;

                if ($order_status == 'chua_thanh_toan') {
                    $order_status = "<b style='color:red;'>Unpaid</b>";
                } else {
                    $order_status = "<b style='color:green;'>Paid</b>";
                }

            ?>
                <tr>
                    <!-- tr Starts -->

                    <th><?php echo $i; ?></th>

                    <td>$<?php echo $due_amount; ?></td>

                    <td><?php echo $qty; ?></td>

                    <td><?php echo $size; ?></td>

                    <td><?php echo $order_date; ?></td>

                    <td><?php echo $order_status; ?></td>

                    <?php   
                        if($row_orders['trang_thai_don_hang'] == 'chua_thanh_toan') {
                            echo "<td>
                                    <a href='cancel.php?order_id=$order_id' target='blank' class='btn btn-danger btn-xs'> Cancel Your Order </a>
                                  </td>";
                        }
                    ?>

                </tr><!-- tr Ends -->

            <?php } ?>

        </tbody>
        <!--- tbody Ends --->

    </table><!-- table table-bordered table-hover Ends -->

</div><!-- table-responsive Ends -->