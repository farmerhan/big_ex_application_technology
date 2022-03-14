<?php

session_start();

include "includes/db.php";
include "includes/header.php";
include "functions/functions.php";
include "includes/main.php";

?>

<?php

// Lấy thông tin sản phẩm
$product_id = @$_GET['pro_id'];

$get_product = "select * from do_the_thao where url_san_pham='$product_id'";

$run_product = mysqli_query($con, $get_product);

$check_product = mysqli_num_rows($run_product);

// Không có sản phẩm
if ($check_product == 0) {
    echo "<script> window.open('index.php','_self') </script>";
} else {

    $row_product = mysqli_fetch_array($run_product);

    $pro_id = $row_product['ma_sp'];

    $pro_name = $row_product['ten_sp'];

    $pro_price = $row_product['gia_sp'];

    $pro_img = $row_product['anh_chup'];

    $pro_url = $row_product['url_san_pham'];

    ?>

  <main>
    <!-- HERO -->
    <div class="nero">
      <div class="nero__heading">
        <span class="nero__bold">Product </span>View
      </div>
      <p class="nero__text">
      </p>
    </div>
  </main>

  <div id="content">
    <!-- content Starts -->
    <div class="container">
      <!-- container Starts -->

      <div class="col-md-12">
        <!-- col-md-12 Starts -->

        <div class="row" id="productMain">
          <!-- row Starts -->

          <div class="col-sm-6">
            <!-- col-sm-6 Starts -->

            <div id="mainImage">
              <!-- mainImage Starts -->
              <img src="./admin/product_images/<?php echo $pro_img; ?>" alt="Product Image">

            </div><!-- mainImage Ends -->

          </div><!-- col-sm-6 Ends -->


          <div class="col-sm-6">
            <!-- col-sm-6 Starts -->

            <div class="box">
              <!-- box Starts -->

              <h1 class="text-center"> <?php echo $pro_name; ?> </h1>

              <?php

    // Nếu người dùng nhấn nút thêm vào giỏ hàng
    if (isset($_POST['add_cart'])) {

        if (!isset($_SESSION['customer_email'])) {
            echo "<script>window.open('./checkout.php', '_self');</script>";
        } else {

            $product_qty = $_POST['product_qty'];

            $product_size = $_POST['product_size'];

            $sizeArray = ["S", "M", "L", "XL", "2XL", "3XL", "4XL"];
            
            // Kiểm tra xem người dùng xem người dùng đã order hay chưa
            // Nếu có rồi thì thêm sản phẩm vào danh mục orders nữa
            // Còn chưa có thì sẽ thêm vào orders

            $check_product = "select * from gio_hang where ma_khach_hang='{$_SESSION['customer_email']}' AND ma_do_the_thao='$pro_id'";

            $run_check = mysqli_query($con, $check_product);

            // Kiểm tra người dùng đã thêm lần thứ hai vào giỏ hàng trên cùng một sản phẩm hay không
            if (mysqli_num_rows($run_check) > 0) {

                echo "<script>alert('This Product is already added in cart')</script>";
                echo "<script>window.open('$pro_url','_self')</script>";

            } else if (!($product_qty > 0 && $product_qty < 6)) {
                // Kiểm tra tính hợp lệ của số lượng sản phẩm
                echo "<script>alert('This Amount Product is invalid, please enter valid amount')</script>";

            } else if (!in_array($product_size, $sizeArray)) {
                // Kiểm tra tính hợp lệ của kích cỡ sản phẩm
                echo "<script>alert('" . array_search($product_size, $sizeArray) . "This size product is invalid, please enter valid size')</script>";

            } else {
                // Chèn vào csdl
                $query = "insert into gio_hang (ma_do_the_thao, so_luong, kich_thuoc, gia, ma_khach_hang) values ('$pro_id','$product_qty','$product_size','$pro_price','{$_SESSION['customer_email']}')";

                $run_query = mysqli_query($db, $query);

                // Reload lại trang
                echo "<script>window.open('$pro_url','_self')</script>";
            }

        }

    }

    ?>

              <form action="" method="post" class="form-horizontal">
                <!-- form-horizontal Starts -->
                  <div class="form-group">
                    <!-- form-group Starts -->
                    <label class="col-md-5 control-label">Product Quantity </label>
                    <div class="col-md-7">
                      <!-- col-md-7 Starts -->
                      <select name="product_qty" class="form-control">
                        <option>Select quantity</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>

                    </div><!-- col-md-7 Ends -->

                  </div><!-- form-group Ends -->

                  <div class="form-group">
                    <!-- form-group Starts -->

                    <label class="col-md-5 control-label">Product Size</label>

                    <div class="col-md-7">
                      <!-- col-md-7 Starts -->

                      <select name="product_size" class="form-control">

                        <option>Select a Size</option>
                        <option value="S">Small</option>
                        <option value="M">Medium</option>
                        <option value="L">Large</option>

                      </select>

                    </div><!-- col-md-7 Ends -->


                  </div><!-- form-group Ends -->

                  <p class='price'>

                    Product Price : <b> $<?php echo $pro_price; ?> </b><br>

                  </p>

                <p class="text-center buttons">
                  <!-- text-center buttons Starts -->

                  <button class="btn btn-danger" type="submit" name="add_cart">

                    <i class="fa fa-shopping-cart"></i> Add to Cart

                  </button>

                </p><!-- text-center buttons Ends -->

              </form><!-- form-horizontal Ends -->

            </div><!-- box Ends -->


        </div><!-- row Ends -->

      </div><!-- col-md-12 Ends -->


    </div><!-- container Ends -->
  </div><!-- content Ends -->



  <?php

    include "includes/footer.php";

    ?>

  <script src="js/jquery.min.js"> </script>

  <script src="js/bootstrap.min.js"></script>

  </body>

  </html>

<?php }?>