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
                <th>Image</th>
                <th>Action</th>
            </tr>

        </thead><!-- thead Ends -->

        <tbody>
            <!--- tbody Starts --->

            <?php

            $customer_email = $_SESSION['customer_email'];

            $get_orders = "select * from don_hang_san_pham, don_hang where don_hang.ma_dh = don_hang_san_pham.ma_dh and ma_khach_hang='$customer_email'";

            $run_orders = mysqli_query($con, $get_orders);

            $i = 0;

            while ($row_orders = mysqli_fetch_array($run_orders)) {

                $prod_id=$row_orders['ma_sp'];

                $order_id = $row_orders['ma_dh'];

                $due_amount = $row_orders['thanh_tien'];

                $qty = $row_orders['so_luong_sp'];

                $order_date = substr($row_orders['ngay_dat_hang'], 0, 11);

                $size = $row_orders['kich_co'];

                $get_img_prod = "select anh_chup from do_the_thao where ma_sp={$row_orders['ma_sp']}";

                $product_img = mysqli_fetch_array(mysqli_query($con, $get_img_prod))['anh_chup'];

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

                    <td><img width="70" height="70" src="../admin/product_images/<?php echo $product_img; ?>"></td>

                    <?php   
                        if($row_orders['trang_thai_don_hang'] == 'chua_thanh_toan') {
                            echo "<td>
                                    <a href='cancel.php?order_id=$order_id&prod_id=$prod_id' target='blank' class='btn btn-danger btn-xs'> Cancel Your Order </a>
                                  </td>";
                        }
                    ?>

                </tr><!-- tr Ends -->

            <?php } ?>

        </tbody>
        <!--- tbody Ends --->

    </table><!-- table table-bordered table-hover Ends -->

</div><!-- table-responsive Ends -->