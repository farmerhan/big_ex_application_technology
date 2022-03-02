<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>

<?php

// Lấy thông tin sản phẩm
$product_id = @$_GET['pro_id'];

$get_product = "select * from products where product_url='$product_id'";

$run_product = mysqli_query($con, $get_product);

$check_product = mysqli_num_rows($run_product);

// Không có sản phẩm
if ($check_product == 0) {

  echo "<script> window.open('index.php','_self') </script>";
} else {

  $row_product = mysqli_fetch_array($run_product);

  $pro_id = $row_product['product_id'];

  $pro_title = $row_product['product_title'];

  $pro_price = $row_product['product_price'];

  $pro_desc = $row_product['product_desc'];

  $pro_img1 = $row_product['product_img1'];

  $pro_img2 = $row_product['product_img2'];

  $pro_img3 = $row_product['product_img3'];

  $pro_label = $row_product['product_label'];

  $pro_psp_price = $row_product['product_psp_price'];

  $pro_features = $row_product['product_features'];

  $pro_video = $row_product['product_video'];

  $status = $row_product['status'];

  $pro_url = $row_product['product_url'];

  // Lấy thông tin nhãn sản phẩm (sale, new, ...)
  if ($pro_label == "") {
  } else {

    $product_label = "

      <a class='label sale' href='#' style='color:black;'>

      <div class='thelabel'>$pro_label</div>

      <div class='label-background'> </div>

      </a>

      ";
  }

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

              <div id="myCarousel" class="carousel slide" data-ride="carousel">

                <ol class="carousel-indicators">
                  <!-- carousel-indicators Starts -->

                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>

                </ol><!-- carousel-indicators Ends -->

                <div class="carousel-inner">
                  <!-- carousel-inner Starts -->

                  <div class="item active">
                    <center>
                      <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
                    </center>
                  </div>

                  <div class="item">
                    <center>
                      <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
                    </center>
                  </div>

                  <div class="item">
                    <center>
                      <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
                    </center>
                  </div>

                </div><!-- carousel-inner Ends -->

                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                  <!-- left carousel-control Starts -->

                  <span class="glyphicon glyphicon-chevron-left"> </span>

                  <span class="sr-only"> Previous </span>

                </a><!-- left carousel-control Ends -->

                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <!-- right carousel-control Starts -->

                  <span class="glyphicon glyphicon-chevron-right"> </span>

                  <span class="sr-only"> Next </span>

                </a><!-- right carousel-control Ends -->

              </div>

            </div><!-- mainImage Ends -->

            <?php echo $product_label; ?>

          </div><!-- col-sm-6 Ends -->


          <div class="col-sm-6">
            <!-- col-sm-6 Starts -->

            <div class="box">
              <!-- box Starts -->

              <h1 class="text-center"> <?php echo $pro_title; ?> </h1>

              <?php

              // Nếu người dùng nhấn nút thêm vào giỏ hàng
              if (isset($_POST['add_cart'])) {

                $ip_add = getRealUserIp();

                $p_id = $pro_id;

                $product_qty = $_POST['product_qty'];

                $product_size = $_POST['product_size'];

                $sizeArray = ["small", "medium", "large"];

                // Kiểm tra xem người dùng xem người dùng đã order hay chưa
                // Nếu có rồi thì thêm sản phẩm vào danh mục orders nữa
                // Còn chưa có thì sẽ thêm vào orders
                $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

                $run_check = mysqli_query($con, $check_product);

                // Kiểm tra người dùng đã thêm lần thứ hai vào giỏ hàng trên cùng một sản phẩm hay không
                if (mysqli_num_rows($run_check) > 0) {

                  echo "<script>alert('This Product is already added in cart')</script>";
                  echo "<script>window.open('$pro_url','_self')</script>";

                } else if(!($product_qty > 0 && $product_qty < 6)) {
                  // Kiểm tra tính hợp lệ của số lượng sản phẩm
                  echo "<script>alert('This Amount Product is invalid, please enter valid amount')</script>";
                  
                } else if(!array_search(strtolower($product_size),$sizeArray)) {
                  // Kiểm tra tính hợp lệ của kích cỡ sản phẩm
                  echo "<script>alert('".array_search($product_size,$sizeArray)."This size product is invalid, please enter valid size')</script>";

                } else {
                  // Nếu không thì thêm vào trong cơ sở dữ liệu
                  $get_price = "select * from products where product_id='$p_id'";

                  $run_price = mysqli_query($con, $get_price);

                  $row_price = mysqli_fetch_array($run_price);

                  $pro_price = $row_price['product_price'];

                  $pro_psp_price = $row_price['product_psp_price'];

                  $pro_label = $row_price['product_label'];

                  // Sản phẩm thuộc danh mục đặc biệt (được giảm giá)
                  if ($pro_label == "Sale" or $pro_label == "Gift") {
                    // Lấy tiền giảm giá
                    $product_price = $pro_psp_price;
                  } else {
                    // Nếu không thuộc dm giảm giá thì lấy giá gốc
                    $product_price = $pro_price;
                  }

                  // Chèn vào csdl
                  $query = "insert into cart (p_id,ip_add,qty,p_price,size) values ('$p_id','$ip_add','$product_qty','$product_price','$product_size')";

                  $run_query = mysqli_query($db, $query);

                  // Reload lại trang
                  echo "<script>window.open('$pro_url','_self')</script>";
                }
              }

              ?>

              <form action="" method="post" class="form-horizontal">
                <!-- form-horizontal Starts -->
                <?php
                // Kiểm tra xem sản phẩm thuộc loại product hay bundle
                if ($status == "product") {

                ?>
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
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>


                      </select>

                    </div><!-- col-md-7 Ends -->


                  </div><!-- form-group Ends -->

                <?php } else { ?>
                  <!-- Nếu là bundle (commbo) thì in ra thông tin phù hợp với bundle -->
                  <div class="form-group">
                    <!-- form-group Starts -->

                    <label class="col-md-5 control-label">Bundle Quantity </label>

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

                    <label class="col-md-5 control-label">Bundle Size</label>

                    <div class="col-md-7">
                      <!-- col-md-7 Starts -->

                      <select name="product_size" class="form-control">

                        <option>Select a Size</option>
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>


                      </select>

                    </div><!-- col-md-7 Ends -->


                  </div><!-- form-group Ends -->


                <?php } ?>

                <?php

                // In ra thông tin phù hợp với từng sản phẩm thuộc product (sản phẩm đơn lẻ) hay combo
                if ($status == "product") {

                  if ($pro_label == "Sale" or $pro_label == "Gift") {

                    echo "

                      <p class='price'>

                      Product Price : <del> $$pro_price </del><br>

                      Product sale Price : $$pro_psp_price

                      </p>

                      ";
                  } else {

                    echo "

                      <p class='price'>

                      Product Price : $$pro_price

                      </p>

                      ";
                  }
                } else {

                  if ($pro_label == "Sale" or $pro_label == "Gift") {

                    echo "
                      <p class='price'>

                      Bundle Price : <del> $$pro_price </del><br>

                      Bundle sale Price : $$pro_psp_price

                      </p>

                      ";
                  } else {

                    echo "
                          <p class='price'>

                          Bundle Price : $$pro_price

                          </p>

                          ";
                  }
                }

                ?>

                <p class="text-center buttons">
                  <!-- text-center buttons Starts -->

                  <button class="btn btn-danger" type="submit" name="add_cart">

                    <i class="fa fa-shopping-cart"></i> Add to Cart

                  </button>

                </p><!-- text-center buttons Ends -->

              </form><!-- form-horizontal Ends -->

            </div><!-- box Ends -->


            <div class="row" id="thumbs">
              <!-- row Starts -->
              <!-- 3 hình ảnh của sản phẩm -->
              <div class="col-xs-4">
                <!-- col-xs-4 Starts -->

                <a href="#" class="thumb">

                  <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">

                </a>

              </div><!-- col-xs-4 Ends -->

              <div class="col-xs-4">
                <!-- col-xs-4 Starts -->

                <a href="#" class="thumb">

                  <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">

                </a>

              </div><!-- col-xs-4 Ends -->

              <div class="col-xs-4">
                <!-- col-xs-4 Starts -->

                <a href="#" class="thumb">

                  <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">

                </a>

              </div><!-- col-xs-4 Ends -->


            </div><!-- row Ends -->


          </div><!-- col-sm-6 Ends -->


        </div><!-- row Ends -->

        <div class="box" id="details">
          <!-- box Starts -->

          <a class="btn btn-info tab" style="margin-bottom:10px;" href="#description" data-toggle="tab">
            <!-- btn btn-primary tab Starts -->

            <?php
            // In ra mô tả phù hợp với từng loại sp (product hay bundle)
            if ($status == "product") {
              echo "Product Description";
            } else {
              echo "Bundle Description";
            }

            ?>

          </a><!-- btn btn-primary tab Ends -->

          <a class="btn btn-info tab" style="margin-bottom:10px;" href="#features" data-toggle="tab">
            <!-- btn btn-primary tab Starts -->

            Features

          </a><!-- btn btn-primary tab Ends -->

          <a class="btn btn-info tab" style="margin-bottom:10px;" href="#video" data-toggle="tab">
            <!-- btn btn-primary tab Starts -->

            Sounds and Videos

          </a><!-- btn btn-primary tab Ends -->

          <hr style="margin-top:0px;">

          <div class="tab-content">
            <!-- tab-content Starts -->

            <div id="description" class="tab-pane fade in active" style="margin-top:7px;">
              <!-- description tab-pane fade in active Starts -->

              <?php echo $pro_desc; ?>

            </div><!-- description tab-pane fade in active Ends -->

            <div id="features" class="tab-pane fade in" style="margin-top:7px;">
              <!-- features tab-pane fade in  Starts -->

              <?php echo $pro_features; ?>

            </div><!-- features tab-pane fade in  Ends -->

            <div id="video" class="tab-pane fade in" style="margin-top:7px;">
              <!-- video tab-pane fade in Starts -->

              <?php echo $pro_video; ?>

            </div><!-- video tab-pane fade in  Ends -->


          </div><!-- tab-content Ends -->

        </div><!-- box Ends -->

        <div id="row same-height-row">
          <!-- row same-height-row Starts -->
            <div class="col-md-3 col-sm-6">
              <!-- col-md-3 col-sm-6 Starts -->

              <div class="box same-height headline">
                <!-- box same-height headline Starts -->

                <h3 class="text-center"> You may also like these Products: We provide you top 3 product items. </h3>

              </div><!-- box same-height headline Ends -->

            </div><!-- col-md-3 col-sm-6 Ends -->

            <?php

            $get_products = "select * from products order by rand() LIMIT 0,3";
            
            $run_products = mysqli_query($con, $get_products);

            while ($row_products = mysqli_fetch_array($run_products)) {

              $pro_id = $row_products['product_id'];

              $pro_title = $row_products['product_title'];

              $pro_price = $row_products['product_price'];

              $pro_img1 = $row_products['product_img1'];

              $pro_label = $row_products['product_label'];

              $pro_psp_price = $row_products['product_psp_price'];

              $pro_url = $row_products['product_url'];


              if ($pro_label == "Sale" or $pro_label == "Gift") {

                $product_price = "<del> $$pro_price </del>";

                $product_psp_price = "| $$pro_psp_price";
              } else {

                $product_psp_price = "";

                $product_price = "$$pro_price";
              }


              if ($pro_label == "") {
              } else {

                $product_label = "

              <a class='label sale' href='#' style='color:black;'>

              <div class='thelabel'>$pro_label</div>

              <div class='label-background'> </div>

              </a>

              ";
              }


              echo "

              <div class='col-md-3 col-sm-6 center-responsive' >

              <div class='product' >

              <a href='$pro_url' >

              <img src='admin_area/product_images/$pro_img1' class='img-responsive' >

              </a>

              <div class='text' >

              <hr>

              <h3><a href='$pro_url' >$pro_title</a></h3>

              <p class='price' > $product_price $product_psp_price </p>

              <p class='buttons' >

              <a href='$pro_url' class='btn btn-default' >View Details</a>

              <a href='$pro_url' class='btn btn-danger'>

              <i class='fa fa-shopping-cart'></i> Add To Cart

              </a>


              </p>

              </div>

              $product_label


              </div>

              </div>

              ";
            }
            ?>


        </div><!-- row same-height-row Ends -->

      </div><!-- col-md-12 Ends -->


    </div><!-- container Ends -->
  </div><!-- content Ends -->



  <?php

  include("includes/footer.php");

  ?>

  <script src="js/jquery.min.js"> </script>

  <script src="js/bootstrap.min.js"></script>

  </body>

  </html>

<?php } ?>