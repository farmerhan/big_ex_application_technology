<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>

<!-- MAIN -->
<main>
  <!-- HERO -->
  <div class="nero">
    <div class="nero__heading">
      <span class="nero__bold">SHOP</span> Cart
    </div>
    <p class="nero__text">
    </p>
  </div>
</main>

<div id="content">
  <!-- content Starts -->

  <div class="container" style="padding-top: 20px;">
    <!-- container Starts -->

    <div class="col-md-9" id="cart">
      <!-- col-md-9 Starts -->

      <div class="box">
        <!-- box Starts -->

        <form action="cart.php" method="post" enctype="multipart-form-data">
          <!-- form Starts -->

          <h1> Shopping Cart </h1>

          <?php

          $select_cart = "select * from gio_hang where email='{$_SESSION['customer_email']}'";

          $run_cart = mysqli_query($con, $select_cart);

          $count = mysqli_num_rows($run_cart);

          ?>

          <p class="text-muted"> You currently have <?php echo $count; ?> item(s) in your cart. </p>

          <div class="table-responsive">
            <!-- table-responsive Starts -->

            <table class="table">
              <!-- table Starts -->

              <thead>
                <!-- thead Starts -->

                <tr>

                  <th colspan="2">Product</th>

                  <th>Quantity</th>

                  <th>Unit Price</th>

                  <th>Size</th>

                  <th colspan="1">Delete</th>

                  <th colspan="2"> Sub Total </th>


                </tr>

              </thead><!-- thead Ends -->

              <tbody>
                <!-- tbody Starts -->

                <?php

                $total = 0;

                while ($row_cart = mysqli_fetch_array($run_cart)) {

                  $pro_id = $row_cart['ma_do_the_thao'];

                  $pro_size = $row_cart['kich_thuoc'];

                  $pro_qty = $row_cart['so_luong'];

                  $pro_price = $row_cart['gia'];

                  // Lấy thông tin sản phẩm để in ra
                  $get_products = "select * from do_the_thao where ma_sp='$pro_id'";

                  $run_products = mysqli_query($con, $get_products);

                  $row_products = mysqli_fetch_array($run_products);

                  $product_name = $row_products['ten_sp'];

                  $product_img = $row_products['anh_chup'];

                  $sub_total = $pro_price * $pro_qty;

                  $_SESSION['pro_qty'] = $pro_qty;

                  $total += $sub_total;

                ?>

                    <tr>
                      <!-- tr Starts -->

                      <td>

                        <img src="admin/product_images/<?php echo $product_img; ?>">

                      </td>

                      <td>

                        <a href="#"> <?php echo $product_name; ?> </a>

                      </td>

                      <td>
                        <input type="number" name="quantity" value="<?php echo $_SESSION['pro_qty']; ?>" data-product_id="<?php echo $pro_id; ?>" min="1" step="1" class=" quantity form-control">
                      </td>

                      <td>

                        $<?php echo $pro_price; ?>.00

                      </td>

                      <td>

                        <?php echo $pro_size; ?>

                      </td>

                      <td>
                        <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                      </td>

                      <td>

                        $<?php echo $sub_total; ?>.00

                      </td>

                    </tr><!-- tr Ends -->

                <?php }?>

              </tbody><!-- tbody Ends -->

              <tfoot>
                <!-- tfoot Starts -->

                <tr>

                  <th colspan="5"> Total </th>

                  <th colspan="2"> $<?php echo $total; ?>.00 </th>

                </tr>

              </tfoot><!-- tfoot Ends -->

            </table><!-- table Ends -->

          </div><!-- table-responsive Ends -->


          <div class="box-footer">
            <!-- box-footer Starts -->

            <div class="pull-left">
              <!-- pull-left Starts -->

              <a href="index.php" class="btn btn-default">

                <i class="fa fa-chevron-left inline-block me-4"></i>
                <span class="inline-block ms-4"> Continue Shopping</span>
              </a>

            </div><!-- pull-left Ends -->

            <div class="pull-right">
              <!-- pull-right Starts -->

              <button class="btn btn-info" type="submit" name="update" value="Update Cart">

                <i class="fa fa-refresh"></i> Update Cart

              </button>

              <a href="checkout.php" class="btn btn-success">

                Proceed to Checkout <i class="fa fa-chevron-right"></i>

              </a>

            </div><!-- pull-right Ends -->

          </div><!-- box-footer Ends -->

        </form><!-- form Ends -->

      </div><!-- box Ends -->

      <?php
      function update_cart()
      {
        global $con;

        if (isset($_POST['update'])) {

          foreach ($_POST['remove'] as $remove_id) {

            $delete_product = "delete from gio_hang where ma_do_the_thao='$remove_id'";

            $run_delete = mysqli_query($con, $delete_product);

            if ($run_delete) {
              echo "<script>window.open('cart.php','_self')</script>";
            }
          }
        }
      }

      echo @$up_cart = update_cart();

      ?>

    </div><!-- col-md-9 Ends -->

    <div class="col-md-3">
      <!-- col-md-3 Starts -->

      <div class="box" id="order-summary">
        <!-- box Starts -->

        <div class="box-header">
          <!-- box-header Starts -->

          <h3>Order Summary</h3>

        </div><!-- box-header Ends -->

        <p class="text-muted">
          Shipping and additional costs are calculated based on the values you have entered.
        </p>

        <div class="table-responsive">
          <!-- table-responsive Starts -->

          <table class="table">
            <!-- table Starts -->

            <tbody>
              <!-- tbody Starts -->

              <tr>

                <td> Order Subtotal </td>

                <th> $<?php echo $total; ?>.00 </th>

              </tr>

              <tr>

                <td> Shipping and handling </td>

                <th>$0.00</th>

              </tr>

              <tr>

                <td>Tax</td>

                <th>$0.00</th>

              </tr>

              <tr class="total">

                <td>Total</td>

                <th>$<?php echo $total; ?>.00</th>

              </tr>

            </tbody><!-- tbody Ends -->

          </table><!-- table Ends -->

        </div><!-- table-responsive Ends -->

      </div><!-- box Ends -->

    </div><!-- col-md-3 Ends -->

  </div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

<script>
  $(document).ready(function(data) {

    function hanleChangeValueInput(e) {

      var id = $(this).data("product_id");

      var quantity = $(this).val();

      if (quantity > 0) {

        $.ajax({

          url: "change.php",

          method: "POST",

          data: {
            id: id,
            quantity: quantity
          },

          success: function(data) {

            $("body").load('cart_body.php');

          }

        });
      }

    }

    $(document).on('keyup', '.quantity', hanleChangeValueInput);
    $(document).on('change', '.quantity', hanleChangeValueInput);

  });
</script>

</body>

</html>
